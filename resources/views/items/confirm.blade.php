@extends('layouts.app')

@section('content')
<div class="items-title">
    <div id="confirm-form" class="form-container">
        <h2 class="text-center">予約内容の最終確認をお願いいたします</h2>
        <p>※まだ予約は完了していません</p>
        <form method="get" action="/user/confirm">
            <ul>
                <li>{{ $item->user_id }}</li>
                <li>{{ $item->menu }}</li>
                <li>{{ $item->reservedatetime }}</li>
                <li>{{ $item->detail }}</li>
            </ul>
            <div class="d-grid gap-2 col-10 mx-auto mb-1">
                <button class="btn btn-dark" type="submit">確定する</button>
            </div>
        </form>

        <div class="d-grid gap-2 col-5 mx-auto mb-1">
            <a href="/items/create" type="button" class="btn btn-light btn-outline-dark">戻る</a>
        </div>
    </div>
</div>

@endsection