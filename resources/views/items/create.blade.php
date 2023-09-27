@extends('layouts.app')

@section('content')
<div id="pic-top">
    <img src="{{ asset('img/salon_screen_cut.jpg') }}" alt="">
</div>
<div class="items-title">
    <h2 class="text-center">予約する</h2>
</div>
<div id="create-form" class="form-container">
    <form method="post" action="/items/confirm"> 
    @csrf
        <table class="form-group m-auto">
            <tr class="form-control border-bottom-0">
                <th>※ログインしている状態で予約可能になります
                    <p class="error-msg">{{ $errors->first('error') }}</p>
                </th>
            </tr>
            <tr class="form-control border-bottom-0">
                <th>メニュー選択（必須）</th>
                <td class="w-auto">
                    <p><label for="menuA" ><input type="radio" name="menu" id="menuA" value="0" {{ old('menu') == 0 ? "checked" : null }} />ラッシュリフト 90分 7,700円</label></p>
                    <p><label for="menuB" ><input type="radio" name="menu" id="menuB" value="1" {{ old('menu') == 1 ? "checked" : null }} />ラッシュリフト上下 90分 9,900円</label></p>
                    <p><label for="menuC" ><input type="radio" name="menu" id="menuC" value="2" {{ old('menu') == 2 ? "checked" : null }} />まつ毛エクステ120本 90分 5,500円</label></p>
                    <p><label for="menuD" ><input type="radio" name="menu" id="menuD" value="3" {{ old('menu') == 3 ? "checked" : null }} />ハリウッドブロウリフト 90分 5,500円</label></p>
                </td>
            </tr> 
            <tr class="form-control border-bottom-0">
                <th class="pt-0"></th>
                <td><p class="error-msg">{{ $errors->first('menu') }}</p></td>
            </tr>
            <div id="reservedatetime">
                <tr class="form-control border-bottom-0">
                    <th><label for="date">予約日（必須）</label>
                        <p>※本日から１年後まで予約可能です</p>
                    </th>
                    <td><input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" min="{{ now()->format('Y-m-d') }}" max="{{ now()->addYear(1)->format('Y-m-d') }}" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" /></td>
                </tr>
                <tr class="form-control border-bottom-0">
                    <th class="pt-0"></th>
                    <td><p class="error-msg">{{ $errors->first('date') }}</p></td>
                </tr>
                <tr class="form-control border-bottom-0">
                    <th><label for="time">予約時間（必須）</label>
                        <p>※予約可能時間(11:00、12:30、14:00、15:30、17:00、18:30)</p>
                    </th>
                    <td>
                        <select name="time" class="form-control" id="time">
                            <option value="" selected>予約時間をお選びください</option>
                            <option value="11:00" @if(old('time')=='11:00') selected  @endif>11:00</option>
                            <option value="12:30" @if(old('time')=='12:30') selected  @endif>12:30</option>
                            <option value="14:00" @if(old('time')=='14:00') selected  @endif>14:00</option>
                            <option value="15:30" @if(old('time')=='15:30') selected  @endif>15:30</option>
                            <option value="17:00" @if(old('time')=='17:00') selected  @endif>17:00</option>
                            <option value="18:30" @if(old('time')=='18:30') selected  @endif>18:30</option>
                        </select>
                    </td>
                </tr>
                <tr class="form-control border-bottom-0">
                    <th class="pt-0"></th>
                    <td><p class="error-msg">{{ $errors->first('time') }}</p></td>
                </tr>
            </div>
            <tr class="form-control border-bottom-0">
                <th><label for="detail">メッセージ</label>
                    <p>※ご要望や留意する点がありましたらお気軽にご記入ください</p>
                </th>
                <td><textarea type="text" id="input_detail" class="detail_textarea" name="detail" max="500" cols="45" rows="8">{{ old('detail') }}</textarea>
                </td>
            </tr>
            <tr class="form-control">
                <th class="pt-0"></th>
                <td><p class="error-msg">{{ $errors->first('detail') }}</p></td>
            </tr>
        </table>

        <div class="row justify-content-center">
            <div class="d-grid gap-2 col-1 mx-auto mb-1">
                <a href="/" type="button" class="btn btn-light btn-danger">戻る</a>
            </div>
            <div class="d-grid gap-2 col-3 mx-auto mb-1">
                <button class="btn btn-dark" type="submit">予約する</button>
            </div>
        </div>
    </form>   
</div>
@endsection