<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;

use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function home(Request $request)
    {
        $user = Auth::user();
        $items = null;
        if(isset($user)) {
            $items = Item::where('user_id', $user->id)->get();
        }
        

        return view('items.home',compact('user', 'items'));        
    }


    /**
     * 予約登録
     */
    public function create(Request $request)
    {
        return view('items.create');
    }

    public function store(Request $request)
    {

        // バリデーション
        $this->validate($request, [
            'menu' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        // 予約登録
        $item = Item::create([
            'user_id' => Auth::user()->id,
            'menu' => $request->menu,
            'reservedatetime' => $request->date .' '.$request->time,
            'detail' => $request->detail,
        ]);
        $name =  Auth::user()->name;
        $email = Auth::user()->email;
        $id = $item->id;
        $menu = $request->menu == 0 ? 'ラッシュリフト 90分 7,700円' : ($request->menu == 1 ? 'ラッシュリフト上下 90分 9,900円' : ($request->menu == 2 ? 'まつ毛エクステ120本 90分 5,500円' : 'ハリウッドブロウリフト 90分 5,500円'));
        $reservedatetime = $item->reservedatetime;
        $detail = $request->detail;
        Mail::send(new SampleMail($name, $email, $id, $menu, $reservedatetime, $detail));

        return redirect('/items/complete?id='.$item->id);
    }     
    
    /**
     * 予約確認
     */
    // public function show(Request $request)
    // {
    //     return view('items.confirm');
    // }

        /**
     * 予約完了のお知らせ
     */
    public function complete(Request $request)
    {
        return view('items.complete', ['id'=>$request->id]);
    }


    /**
     * 管理画面
     * 予約一覧
     */
    public function index()
    {
        // 予約一覧取得
        $items = Item::paginate(5);

        return view('admin.index', ['items' => $items]);
    }  

    /**
     * 予約登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'menu' => 'required',
                'date' => 'required',
                'time' => 'required',
            ]);

            // 予約登録
            Item::create([
                'user_id' => $request->user_id,
                'menu' => $request->menu,
                'reservedatetime' => $request->date .' '.$request->time,
                'detail' => $request->detail,
            ]);

            return redirect('/admin/index');
        }

        return view('admin.add');
    }

    /**
     * 編集画面の表示
     */
    public function edit($id)
    {
        $item = Item::find($id);

        return view('admin.edit', [
            'item' => $item
        ]);
    }

    /**
     * 更新
     */
    public function update(Request $request)
    {
        $item = item::find($id);
        $item->fill($request->all())->save();

        // 一覧へ戻り完了メッセージを表示
        return redirect('admin.index')->with('message', '編集しました');
    }

    /**
     * 予約削除
     */
    public function delete($id)
    {
        Item::where('id', $id)->delete();

        // 完了メッセージを表示
        return redirect('admin.index')->with('message', '削除しました');
    }
}
