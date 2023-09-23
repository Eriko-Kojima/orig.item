<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 管理画面
     * 顧客一覧
     */
    public function index(Request $request)
    {
        $users = User::paginate(5);

        $search = $request->input('search');
        $query = User::query();

        if ($search) {
            // 全角スペースを半角に変換
            $spaceConversion = mb_convert_kana($search, 's');

            // 単語を半角スペースで区切り、配列にする（例："山田 翔" → ["山田", "翔"]）
            $wordArraySearched = preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回し、ユーザーネームと部分一致するものがあれば、$queryとして保持される
            foreach($wordArraySearched as $value) {
                $query->where('name', 'like', '%'.$value.'%');
            }

            $users = $query->paginate(5);
        }

        return view('/admin/member/index')->with([
            'users' => $users,
            'search' => $search,
        ]);
    } 

    /**
     * 編集画面の表示
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('/admin/member/edit', [
            'user' => $user
        ]);
    }

    /**
     * 更新
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:20',
            'kana' => 'required|string|max:40',
            'phone' => 'required|string|max:11|regex:/^[0-9]+$/',
            'birthdate' => 'nullable|date|date_format:Y-m-d',
            'email' => [
                'required',
                'string',
                'email',
                'max:100', 
                Rule::unique('users')->ignore($request->id),
            ],    
        ]);

        User::where('id', $request->id)->update([
            'name' => $request->name,
            'kana' => $request->kana,
            'email' => $request->email,
            'phone' => $request->phone,
            'birthdate' => $request->birthdate,
            'role' => $request->role,
        ]);

        return redirect('/admin/member/index');
    }

    /**
     * 顧客削除
     */
    public function delete($id)
    {
        $user = User::find($id); 
        $user->delete();

        return redirect('/admin/member/index');
    }
}