@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-offset-3 col-xs-6">
            <h1>確認画面</h1>
            <h4>入力した内容を確認してください</h4>
            <form method="POST" action="{{ route('contact.store') }}"　enctype="multipart/form-data">
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
                <label>レポート名</label>
                <br>{{ $inputs['title'] }}
                    <input type="hidden" class="form-control" name="title" value="{{ $inputs['title'] }}">
                </div>

                <div class="form-group">
                <label>音声ファイル</label>
                <br>{{ $inputs['file'] }}
                    <input type="hidden" class="form-control" name="file" value="{{ $inputs['file'] }}">
                </div>

                <div class="form-group">
                <label>トークの自己採点</label>
                <br>{{ $inputs['score']}}点
                    <input type="hidden" class="form-control" name="score" value="{{ $inputs['score']}}">
                </div>

                <div class="form-group">
                <label>備考・連絡等</label>
                <br>{!! nl2br(e($inputs['body'])) !!}
                <input name="body" value="{{ $inputs['body'] }}" type="hidden">
                <br>
                </div>

                <button type="submit" class="btn btn-block btn-back" name="action" value="back">
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