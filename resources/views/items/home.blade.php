@extends('layouts.app')

@section('content')

<div class="home-form">
    <div class="row justify-content-center">
        @can ('isAdministrator')
        <div class="d-grid gap-2 col-3 mx-auto mb-1">
            <a href="/admin/index" type="button" class="btn btn-secondary">管理画面へ</a>
        </div>
        @endcan

        <div class="d-grid gap-2 col-3 mx-auto mb-1">
            <a href="/items/create" type="button" class="btn btn-light btn-dark">予約する</a>
        </div>
    </div>
</div>

<div id="pic-top">
    <img src="{{ asset('img/salon_screen_cut.jpg') }}" alt="">
        <h5>くつろげる上質空間</h5>
</div>

@auth 
<div class="items-title">
    <h2 class="text-center">ようこそ、{{ $user->name }} 様</h2>
</div>
<div id="home-form" class="form-container">
    @if (!($items->isEmpty()))
    <table class="table table-bordered">
        <thead class="table-secondary">
            <tr>
                <th></th>
                <th>メニュー</th>
                <th>予約日時</th>
                <th>メッセージ</th>
            </tr>
        </thead>
        @foreach($items as $item)
        <tbody>        
            <tr>
                <td>ご予約中</td>
                <td>{{ $item->menu == 0 ? 'ラッシュリフト 90分 7,700円' : ($item->menu == 1 ? 'ラッシュリフト上下 90分 9,900円' : ($item->menu == 2 ? 'まつ毛エクステ120本 90分 5,500円' : 'ハリウッドブロウリフト 90分 5,500円')) }}</td>
                <td>{{ $item->reservedatetime }}</td>
                <td>{{ $item->detail }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    @endif
</div>
@endauth

@endsection

@section('css')
    <link rel="stylesheet" href="/css/style.css">
@stop