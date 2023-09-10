@extends('layouts.app')

@section('content')
<div class="items-complete">
    <div class="items-title">
        <h2 class="text-center">ご予約完了いたしました、ありがとうございます。</h2>
        <p>※予約確認メールをご確認くださいませ</p>
    </div>
    <div id="complete-form" class="form-container">
        <tr class="form-control border-bottom-0">
            <th><label for="item-id" >予約番号</label></th>
            <td>{{ $id }}</td>
            <p>ご来店をお待ちしております。</p>
        </tr>
        <div class="d-grid gap-2 col-8 mx-auto mb-1">
            <a href="/" type="button" class="btn btn-light btn-dark">マイページへ</a>
        </div>
    </div>
</div>
    
@endsection