@extends('adminlte::page')

@section('title', '予約登録')

@section('content_header')
    <h1>予約登録</h1>
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

            <div class="card card-primary">
                <form method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="user_id">会員番号</label>
                            <input type="number" class="form-control" id="user_id" name="user_id" min="1" max="1000" placeholder="会員番号" />
                        </div>

                        <div class="form-group">
                            <label for="menu">メニュー</label><br>
                            <input type="radio" name="menu" id="menuA" value="0" {{ old('menu') == 0 ? "checked" : null }} />ラッシュリフト 90分 7,700円<br>
                            <input type="radio" name="menu" id="menuB" value="1" {{ old('menu') == 1 ? "checked" : null }} />ラッシュリフト上下 90分 9,900円<br>
                            <input type="radio" name="menu" id="menuC" value="2" {{ old('menu') == 2 ? "checked" : null }} />まつ毛エクステ120本 90分 5,500円<br>
                            <input type="radio" name="menu" id="menuD" value="3" {{ old('menu') == 3 ? "checked" : null }} />ハリウッドブロウリフト 90分 5,500円
                        </div>

                        <div class="form-group">
                            <label for="reservedatetime">予約日時</label><br>
                            <li><label for="date">予約日（必須）</label><br><span>※本日から１年後の末日まで予約可能です。過去を選択しないようにお気を付けください。</span>
                            <input type="date" id="date" name="date" value="" min="" max="" /></li><br>
                            <li><label for="time">予約時間（必須）</label><br><span>※予約可能時間(11:00、12:30、14:00、15:30、17:00、18:30)</span>
                            <input type="time" id="time" name="time" value="11:00" min="11:00" max="18:30" /></li>
                        </div>

                        <div class="form-group">
                            <label for="detail">メッセージ</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="メッセージ" />
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-dark">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
