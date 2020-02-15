@extends('layouts.master')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8">
         <h1 class="page-title">UpSighter for Finance<br>パーソナルプランのご利用</h1>
            <form method="POST" action="{{ route('contact.confirm') }}"　enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                <label>名前</label>
                    <input type="text" class="form-control" name="user_name" placeholder="例：コグ　太郎" value="{{ old('user_name')}}">
                @if ($errors->has('user_name'))
                    <p class="error-message">※名前が正しく入力されていません</p>
                @endif
                </div>

                <div class="form-group">
                <label>メールアドレス</label>
                    <input type="text" class="form-control" name="email" placeholder="例：aaa@example.com" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <p class="error-message">※メールアドレスが正しく入力されていません</p>
                @endif
                </div>

                <div class="form-group">
                <label>レポート名を指定<br><span style="font-size: 0.75em">指定がない場合は、ファイル名をそのまま利用いたします。</span></label>
                    <input type="text" class="form-control" name="title" placeholder="レポート名" value="{{ old('title') }}">
                @if ($errors->has('title'))
                    <p class="error-message">{{ $errors->first('title') }}</p>
                @endif
                </div>

                <div class="form-group">
                <label>音声ファイル</label>
                    <input type="file"  name="file" class="form-control" value="{{ old('file') }}" >
                </div>

                <div class="form-group">
                <label>今回のトークを、自己採点で評価してください（任意）</label>
                    <ul class="form__radio">
                    <p class="talk__score">うまくいかなかった</p>
                        <li class="talk__score">
                        <p>1</p>
                        <input type="radio" name="score" value="1" id="check1">
                        <label for="check1"></label>
                        </li>
                        <li class="talk__score">
                        <p>2</p>
                        <input type="radio" name="score" value="2" id="check2">
                        <label for="check2"></label>
                        </li>
                        <li class="talk__score">
                        <p>3</p>
                        <input type="radio" name="score" value="3" id="check3">
                        <label for="check3"></label>
                        </li>
                        <li class="talk__score">
                        <p>4</p>
                        <input type="radio" name="score" value="4" id="check4">
                        <label for="check4"></label>
                        </li>
                        <li class="talk__score">
                        <p>5</p>
                        <input type="radio" name="score" value="5" id="check5">
                        <label for="check5"></label>
                        </li>
                    <p class="talk__score">とてもうまくいった</p>
                    </ul>
                </div>

                <div class="form-group">
                <label>備考・連絡等</label>
                    <textarea class="form-control" name="body" rows="5" placeholder="本文">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <p class="error-message">{{ $errors->first('body') }}</p>
                @endif

                </div>
                <button type="submit" class="btn btn-success btn-block">入力内容確認</button>
            </form>
        </div>
    </div>
</div>

@endsection