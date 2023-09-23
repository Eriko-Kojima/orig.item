@extends('layouts.app')

@section('content')
<div class="items-complete">
    <div id="complete-form" class="form-container">
        <div class="items-title">
            <h2 class="text-center">ご予約完了いたしました、ありがとうございます。</h2>
            <p class="text-center">※予約確認メールをご確認くださいませ</p>
        </div>
        <table class="form-group m-auto">
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="border-t">    
                    <dl>        
                        <div class="form-control">
                            <dt class="text-sm font-medium">予約番号</dt>
                            <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ $id }}</dd>
                        </div>
                        <div class="form-control">
                            <dt class="text-sm font-medium">ご来店をお待ちしております。</dt>
                        </div>
                    </dl>
                </div>
            </div>
        </table>
        <div class="d-grid gap-2 col-5 mx-auto mb-1">
            <a href="/" type="button" class="btn btn-light btn-dark">マイページへ</a>
        </div>
    </div>
</div>
    
@endsection