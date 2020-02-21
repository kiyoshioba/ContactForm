@extends('layouts.master')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-offset-2 col-xs-8">
         <h1 class="page-title">UpSighter for Finance<br>パーソナルプランのご利用</h1>
            <form method="POST" action="{{ route('contact.confirm') }}"　enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                <label>お名前</label>
                    <input type="text" class="form-control" name="user_name" placeholder="例：コグ　太郎" value="{{ old('user_name')}}">
                @if ($errors->has('user_name'))
                    <p class="error-message">※お名前が正しく入力されていません</p>
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
                </div>

                <!-- <div class="form-group">
                <label>音声ファイル</label>
                    <input type="file"  name="file" class="form-control" value="{{ old('file') }}" >
                </div> -->
                <div class="form-group">
                <label>音声ファイル(必須)</label>
                    <div class="contentsBox clearfix">
                        <div class="left-box">
                        <p><br>対応ファイル:mp3/mp4/wav<br>※サイズ上限:〇〇MB</p>
                        </div>
                        <div class="right-box">
                            <input type="file" id="file" name="file" class="form-control" >
                            <!-- <input type="file" id="file2" name="file2" class="form-control">
                            <input type="file" id="file3" name="file3" class="form-control"> -->
                        @if ($errors->has('file'))
                            <p class="error-message">※ファイルが指定されていません</p>
                        @endif
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>スコア（任意）</label>
                    <div class="contentsBox clearfix">
                        <div class="left-box">
                            <p>今回のトークを<br>自己採点してください</p>
                        </div>
                        <div class="right-box">
                            <ul class="talk__score">
                                <li class="talk__score">
                                <input type="radio" name="score" value="1" id="check1">1点:全くうまくいかなかった
                                <label for="check1"></label>
                                </li>
                                <li class="talk__score">
                                <input type="radio" name="score" value="2" id="check2">2点:あまりうまくいかなかった
                                <label for="check2"></label>
                                </li>
                                <li class="talk__score">
                                <input type="radio" name="score" value="3" id="check3">3点:どちらともいえない
                                <label for="check3"></label>
                                </li>
                                <li class="talk__score">
                                <input type="radio" name="score" value="4" id="check4">4点:ある程度うまく行った
                                <label for="check4"></label>
                                </li>
                                <li class="talk__score">
                                <input type="radio" name="score" value="5" id="check5">5点:とてもうまくいった
                                <label for="check5"></label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                <label>備考・連絡等</label>
                    <textarea class="form-control" name="body" rows="5" placeholder="本文">{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                    <p class="error-message">※正しく入力されていません</p>
                @endif

                </div>
                <button type="submit" class="confirmation_btn btn btn-block">確認画面へすすむ</button>
            </form>
        </div>
    </div>
</div>

@endsection