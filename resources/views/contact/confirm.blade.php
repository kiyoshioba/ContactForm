@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-offset-4 col-xs-4">
            <h1>確認画面</h1>
            <h4>入力した内容を確認してください</h4>
            <form method="POST" action="{{ route('contact.send') }}">
                @csrf

                <div class="form-group">
                <label>お名前</label>
                <br>{{ $inputs['user_name'] }}
                    <input type="hidden" class="form-control" name="user_name" value="{{ $inputs['user_name'] }}">
                </div>

                <div class="form-group">
                <label>メールアドレス</label>
                <br>{{ $inputs['email'] }}
                    <input type="hidden" class="form-control" name="email" value="{{ $inputs['email'] }}">
                </div>

                <div class="form-group">
                <label>件名</label>
                <br>{{ $inputs['title'] }}
                    <input type="hidden" class="form-control" name="title" value="{{ $inputs['title'] }}">
                </div>


                <label>お問い合わせ内容</label>
                <br>{!! nl2br(e($inputs['body'])) !!}
                <input
                    name="body"
                    value="{{ $inputs['body'] }}"
                    type="hidden">
                
                <br>
                <button type="submit" class="btn btn-success btn-block" name="action" value="back"　style="background-color:red;">
                    入力内容修正
                </button>
                <button type="submit" class="btn btn-success btn-block" name="action" value="submit">
                    送信する
                </button>
            </form>
        </div>
    </div>
</div>
@endsection