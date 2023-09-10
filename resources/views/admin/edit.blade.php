@extends('adminlte::page')

@section('title', '予約編集')

@section('content_header')
    <h1>予約編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

    {{-- 編集画面 --}}
    <div class="card">
        <form action="{{ route('admin.update', $item->id) }}" method="post">
            @csrf
            <div class="card-body">
                {{-- 会員番号入力 --}}
                <div class="form-group">
                    <label for="user_id">会員番号</label>
                    <input type="text" class="form-control" id="user_id" name="user_id"
                        value="{{ old('user_id', $item->user_id) }}" placeholder="会員番号" />
                </div>
                {{-- メニュー選択 --}}
                <div class="form-group">
                    <label for="menu">メニュー</label>
                    <input type="text" class="form-control" id="menu" name="menu"
                        value="{{ old('menu', $item->menu) }}" placeholder="メニュー" />
                </div>
                {{-- 日付選択 --}}
                <div class="form-group">
                    <label for="reservedatetime">日付</label>
                    <input type="text" class="form-control" id="reservedatetime" name="reservedatetime"
                        value="{{ old('reservedatetime', $item->reservedatetime) }}" placeholder="日付" />
                </div>
                {{-- メッセージ入力 --}}
                <div class="form-group">
                    <label for="detail">メッセージ</label>
                    <input type="text" class="form-control" id="detail" name="detail"
                        value="{{ old('detail', $item->detail) }}" placeholder="メッセージ" />
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <a class="btn btn-default" href="{{ route('admin.index') }}" role="button">戻る</a>
                    <div class="ml-auto">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop