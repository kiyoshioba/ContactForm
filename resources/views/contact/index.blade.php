@extends('layouts.master')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-offset-4 col-xs-4">
            <h1>お問い合わせ</h1>
            <form method="POST" action="{{ route('contact.confirm') }}"　enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                <label>名前</label>
                    <input type="text" class="form-control" name="user_name" placeholder="お名前を入力してください" value="{{ old('user_name')}}">
                @if ($errors->has('user_name'))
                    <p class="error-message">{{ $errors->first('user_name') }}</p>
                @endif
                </div>

                <div class="form-group">
                <label>メールアドレス</label>
                    <input type="text" class="form-control" name="email" placeholder="メールアドレスを入力してください" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
                </div>

                <div class="form-group">
                <label>メールアドレス（確認）</label>
                    <input type="text" class="form-control" name="email" placeholder="もう一度メールアドレスを入力してください" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <p class="error-message">{{ $errors->first('email') }}</p>
                @endif
                </div>

                <div class="form-group">
                <label>件名</label>
                    <input type="text" class="form-control" name="title" placeholder="件名" value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <p class="error-message">{{ $errors->first('title') }}</p>
                @endif
                </div>

                <div class="form-group">
                <label>お問い合わせ内容</label>
                    <textarea class="form-control" name="body" rows="5" placeholder="本文">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <p class="error-message">{{ $errors->first('body') }}</p>
                @endif
                </div>

                <!-- 添付ファイルはフロントエンドのみしか実装していないことに留意 -->
                <div class="form-group">
                <label>添付ファイル（任意）</label>
                    <input type="file" id="file" name="file" class="form-control">
                </div>

                <button type="submit" class="btn btn-success btn-block">入力内容確認</button>
            </form>
        </div>
    </div>
</div>

@endsection