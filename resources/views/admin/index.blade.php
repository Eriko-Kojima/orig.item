@extends('adminlte::page')

@section('title', '予約一覧')

@section('content_header')
    <h1>予約一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">予約一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('admin/add') }}" class="btn btn-default">予約登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <div class="table-responsive">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>会員番号</th>
                                    <th>メニュー</th>
                                    <th>予約日時</th>
                                    <th>メッセージ</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $item->user_id }}</td>
                                        <td>{{ $item->menu == 0 ? 'ラッシュリフト 90分 7,700円' : ($item->menu == 1 ? 'ラッシュリフト上下 90分 9,900円' : ($item->menu == 2 ? 'まつ毛エクステ120本 90分 5,500円' : 'ハリウッドブロウリフト 90分 5,500円')) }}</td>
                                        <td>{{ $item->reservedatetime }}</td>
                                        <td>{{ $item->detail }}</td>
                                        <td class="table-text">
                                            <a class="btn btn-primary btn-sm" href="/admin/edit/{{ $item->id }}">編集</a>
                                        </td>
                                        <td class="table-text">
                                            <form action="/admin/delete/{{ $item->id }}" method="POST">
                                            @csrf
                                            <input type="submit" class="btn btn-danger btn-sm" value="削除" onclick='return confirm("この内容を削除してもよろしいでしょうか？")' />
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    </div>
                </div>
                {{-- ページネーション --}}
            </div>
        </div>  
        @if ($items->hasPages())
            <div class="card-footer clearfix">
                {{ $items->links() }}
            </div>
        @endif
    </div>
@stop

@section('css')
@stop

@section('js')
@stop

