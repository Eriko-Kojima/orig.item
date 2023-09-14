@extends('layouts.app')

@section('content')
@can ('isAdministrator')
    <div class="d-grid gap-2 col-8 mx-auto mb-1">
        <a href="/admin/index" type="button" class="btn btn-danger">管理画面へ</a>
    </div>
@endcan

<div id="pic-top">
    <img src="{{ asset('img/salon_screen_cut.jpg') }}" alt="">    
</div>
<h5>--- -- --- -- --- -- --- -- --- -- くつろげる上質空間 -- --- -- --- -- --- -- --- -- ---</h5>
<div class="d-grid gap-2 col-8 mx-auto mb-1">
    <a href="/items/create" type="button" class="btn btn-light btn-dark">予約する</a>
</div>

@auth 
<div class="items-title">
    <h2 class="text-center">ようこそ、{{ $user->name }} 様</h2>
    <table>
        @foreach($items as $item)
        <tr class="items-reserve">
            <th>ご予約中</th>
            <td>{{ $item->menu == 0 ? 'ラッシュリフト 90分 7,700円' : ($item->menu == 1 ? 'ラッシュリフト上下 90分 9,900円' : ($item->menu == 2 ? 'まつ毛エクステ120本 90分 5,500円' : 'ハリウッドブロウリフト 90分 5,500円')) }}</td>
            <td>{{ $item->reservedatetime }}</td>
            <td>{{ $item->detail }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endauth

@endsection