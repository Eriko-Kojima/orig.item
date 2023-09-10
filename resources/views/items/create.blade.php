@extends('layouts.app')

@section('content')
<div id="pic-top">
    <img src="{{ asset('img/salon_screen_cut.jpg') }}" alt="">
</div>
<div class="items-title">
    <h2 class="text-center">予約する</h2>
</div>
<div id="create-form" class="form-container">
    <form method="post" action="/items/store" onsubmit="return confirm('この内容で予約の確定をしてもよろしいでしょうか？');"> 
    @csrf
        <table class="form-group m-auto">
            <tr class="form-control border-bottom-0">
                <th>メニュー選択（必須）</th>
                <td class="w-auto"><label for="menuA" ><input type="radio" name="menu" id="menuA" value="0" {{ old('menu') == 0 ? "checked" : null }}>ラッシュリフト 90分 7,700円</input></label></td>
                <td class="w-auto"><br><label for="menuB" ><input type="radio" name="menu" id="menuB" value="1" {{ old('menu') == 1 ? "checked" : null }}>ラッシュリフト上下 90分 9,900円</input></label></td>
                <td class="w-auto"><label for="menuC" ><input type="radio" name="menu" id="menuC" value="2" {{ old('menu') == 2 ? "checked" : null }}>まつ毛エクステ120本 90分 5,500円</input></label></td>
                <td class="w-auto"><br><label for="menuD" ><input type="radio" name="menu" id="menuD" value="3" {{ old('menu') == 3 ? "checked" : null }}>ハリウッドブロウリフト 90分 5,500円</input></label></td>
            </tr> 
            <tr class="form-control border-top-0 border-bottom-0 pt-0">
                <th class="pt-0"></th>
                <td><p class="error-msg">{{ $errors->first('menu') }}</p></td>
            </tr>
            <div id="reservedatetime">
                <tr class="form-control border-bottom-0">
                    <th><label for="date">日付指定（必須）</label><br><span>※本日から１年後の末日まで予約可能です。過去を選択しないようにお気を付けください。</span></th>
                    <td><input type="date" id="date" name="date" value="" min="" max="" required></td>
                </tr>
                <tr class="form-control border-bottom-0">
                    <th class="pt-0"></th>
                    <td><p class="error-msg">{{ $errors->first('date') }}</p></td>
                </tr>
                <tr class="form-control border-bottom-0">
                    <th><label for="time">予約時間（必須）</label><br><span>※予約可能時間(11:00、12:30、14:00、15:30、17:00、18:30)</span></th>
                    <td><input type="time" id="time" name="time" value="11:00" min="11:00" max="18:30" required></td>
                </tr>
                <tr class="form-control border-bottom-0">
                    <th class="pt-0"></th>
                    <td><p class="error-msg">{{ $errors->first('time') }}</p></td>
                </tr>
            </div>
            <tr class="form-control border-bottom-0">
                <th><label for="detail">メッセージ</label><br><span>※ご要望や留意する点がありましたらお気軽にご記入ください</span>
                </th>
                <td><textarea id="detail" class="detail_textarea" name="message" cols="45" rows="8" value=""></textarea>
                </td>
            </tr>
            <tr class="form-control border-bottom-0">
                <th class="pt-0"></th>
                <td><p class="error-msg">{{ $errors->first('detail') }}</p></td>
            </tr>
        </table>
        <div class="d-grid gap-2 col-8 mx-auto mb-1">
            <button class="btn btn-dark" type="submit">予約する</button>
        </div>
    </form>

    <div class="d-grid gap-2 col-8 mx-auto mb-1">
        <a href="/" type="button" class="btn btn-light btn-outline-dark">戻る</a>
    </div>
</div>
@endsection