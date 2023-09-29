@extends('layouts.app')

@section('content')
<div id="confirm-form" class="form-container">
    <div class="py-12">
        <div><h2 class="text-center">予約内容の最終確認をお願いいたします</h2>
            <p class="text-center">※まだ予約は完了していません</p>
        </div>
        <table class="form-group m-auto">
            <form method="post" action="/items/store" class="mt-6 space-y-6">
                @csrf
                <input type="hidden" name="menu" value="{{ request('menu') }}">
                <input type="hidden" name="date" value="{{ request('date') }}">
                <input type="hidden" name="time" value="{{ request('time') }}">
                <input type="hidden" name="detail" value="{{ request('detail') }}">

                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    <div class="border-t">
                        <dl>        
                            <div class="form-control">
                                <dt class="text-sm font-medium">メニュー</dt>
                                <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ request('menu') == 0 ? 'ラッシュリフト 90分 7,700円' : (request('menu') == 1 ? 'ラッシュリフト上下 90分 9,900円' : (request('menu') == 2 ? 'まつ毛エクステ120本 90分 5,500円' : 'ハリウッドブロウリフト 90分 5,500円')) }}</dd>
                            </div>
                            <div class="form-control">
                                <dt class="text-sm font-medium">予約日</dt>
                                <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ request('date') }}</dd>
                            </div>
                            <div class="form-control">
                                <dt class="text-sm font-medium">予約時間</dt>
                                <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ request('time') }}</dd>
                            </div>
                            <div class="form-control">
                                <dt class="text-sm font-medium">メッセージ</dt>
                                <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">{{ request('detail') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="d-grid gap-2 col-2 mx-auto mb-1">
                        <a href="/items/create" type="button" class="btn btn-secondary" type="submit">修正する</a>
                    </div>
                    <div class="d-grid gap-2 col-3 mx-auto mb-1">
                        <button class="btn btn-dark" type="submit">この内容で予約する</button>
                    </div>
                </div>
            </form>                
        </table>
    </div>
</div>
@endsection