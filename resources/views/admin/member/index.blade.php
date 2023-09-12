@extends('adminlte::page')

@section('title', '顧客一覧')

@section('content_header')
    <h1>顧客一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div>
                    <form class="form-inline" style="margin:15px;">
                        <div class="form-group">
                            <label>検索：</label>
                            <input type="text" name="search" class="form-control" style="width:200px;" value="@if (isset($search)) {{ $search }} @endif" />
                        </div>
                        <div class="form-group">
                            <input type="submit" value="検索" class="btn btn-dark" />
                        </div>
                    </form>
                </div>    
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>会員番号</th>
                                <th>名前</th>
                                <th>フリガナ</th>
                                <th>メールアドレス</th>
                                <th>電話番号</th>
                                <th>生年月日</th>
                                <th>管理者</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->kana }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->birthdate }}</td>
                                    <td>{{ $user->role == 1 ? '管理者' : '一般ユーザー' }}</td>
                                    <td class="table-text">
                                        <a class="btn btn-primary btn-sm" href="/admin/member/edit/{{ $user->id }}">編集</a>
                                    </td>

                                    <td class="table-text">
                                        <form action="/admin/member/delete/{{ $user->id }}" method="POST">
                                        @csrf
                                        <input type="submit" class="btn btn-danger btn-sm" value="削除" onclick='return confirm("この内容を削除してもよろしいでしょうか？")' />
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- ページネーション --}}
            </div>
        </div>  
        @if ($users->hasPages())
            <div class="card-footer clearfix">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@stop

@section('css')
@stop

@section('js')
@stop

