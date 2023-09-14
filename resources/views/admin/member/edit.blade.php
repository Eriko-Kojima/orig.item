@extends('adminlte::page')

@section('title', '顧客編集')

@section('content_header')
    <h1>顧客編集</h1>
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

    <div class="card">
        <form method="post" action="/admin/member/update/{{ $user->id }}">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="id">会員番号</label>
                    <input type="number" class="form-control" id="id" name="id" min="1" max="1000" value="{{ old('id', $user->id) }}" />
                </div>
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" />
                </div>
                <div class="form-group">
                    <label for="kana">フリガナ</label>
                    <input type="text" class="form-control" id="kana" name="kana" pattern="[ァ-ヴー\s　]+" value="{{ old('kana', $user->kana) }}" />
                </div>
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" />
                </div>
                <div class="form-group">
                    <label for="phone">電話番号</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" />
                </div>
                <div class="form-group">
                    <label for="birthdate">生年月日（任意）</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', $user->birthdate) }}" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" />
                </div>
                <div class="form-group">
                    <label for="role">管理者</label>
                    <input type="radio" class="form-control" name="role" id="role" value="0" {{ $user->role == 0 ? "checked" : null }} />一般ユーザー
                    <input type="radio" class="form-control" name="role" id="role" value="1" {{ $user->role == 1 ? "checked" : null }} />管理者
                </div>
            </div>
            <div class="card-footer">
                <div class="ml-auto">
                    <button type="submit" class="btn btn-dark">編集</button>
                </div>
            </div>
        </form>
    </div>
@stop