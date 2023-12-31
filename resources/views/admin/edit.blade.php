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

    <div class="card">
        <form method="post" action="/admin/update/{{ $item->id }}">
        @csrf
            <div class="card-body">
            <p class="error-msg">{{ $errors->first('error') }}</p>
                <div class="form-group">
                    <label for="user_id">会員番号</label>
                    <input type="number" class="form-control" id="user_id" name="user_id" min="1" max="1000" value="{{ old('user_id', $item->user_id) }}" />
                </div>
                <div class="form-group">
                    <label for="menu">メニュー（必須）</label><br>
                    <input type="radio" name="menu" id="menuA" value="0" {{ $item->menu == 0 ? "checked" : null }} />ラッシュリフト 90分 7,700円<br>
                    <input type="radio" name="menu" id="menuB" value="1" {{ $item->menu == 1 ? "checked" : null }} />ラッシュリフト上下 90分 9,900円<br>
                    <input type="radio" name="menu" id="menuC" value="2" {{ $item->menu == 2 ? "checked" : null }} />まつ毛エクステ120本 90分 5,500円<br>
                    <input type="radio" name="menu" id="menuD" value="3" {{ $item->menu == 3 ? "checked" : null }} />ハリウッドブロウリフト 90分 5,500円
                </div>
                <div class="form-group">
                    <label for="reservedatetime">予約日時</label><br>
                    <li><label for="date">予約日（必須）</label>
                        <p>※本日から１年後まで予約可能です</p>
                        <input type="date" class="form-control" id="date" name="date" value="{{ old('date', $item->date) }}" min="{{ now()->format('Y-m-d')}}" max="{{ now()->addYear(1)->format('Y-m-d') }}" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" />
                    </li><br>
                    <li><label for="time">予約時間（必須）</label>
                        <p>※予約可能時間(11:00、12:30、14:00、15:30、17:00、18:30)</p>
                        <select name="time" class="form-control" id="time">
                            <option value="">予約時間をお選びください</option>
                            <option value="11:00:00" @if(old('time', $item->time)=='11:00:00') selected  @endif>11:00</option>
                            <option value="12:30:00" @if(old('time', $item->time)=='12:30:00') selected  @endif>12:30</option>
                            <option value="14:00:00" @if(old('time', $item->time)=='14:00:00') selected  @endif>14:00</option>
                            <option value="15:30:00" @if(old('time', $item->time)=='15:30:00') selected  @endif>15:30</option>
                            <option value="17:00:00" @if(old('time', $item->time)=='17:00:00') selected  @endif>17:00</option>
                            <option value="18:30:00" @if(old('time', $item->time)=='18:30:00') selected  @endif>18:30</option>
                        </select>
                    </li>
                </div>
                <div class="form-group">
                    <label for="detail">メッセージ</label>
                    <input type="text" class="form-control" id="detail" name="detail" value="{{ old('detail', $item->detail) }}" />
                </div>
            </div>
            <div class="card-footer">
                <div class="ml-auto">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </div>
        </form>
    </div>
@stop