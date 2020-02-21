@extends('layouts.master')

@section('content')
<h1 class="page-title">送信完了</h1>
  <p class="page-read">お問い合わせありがとうございました。<br>後日、担当者よりご連絡差し上げます。</p>

  <a href="http://127.0.0.1:8000/contact/create">続けて解析依頼を出す方はこちら</a>

  <hr width="100%">

  <p class="page-read">進化するUpSighter！バリエーションも増加中！</p>

<div class="container">
  <div class="row">
    <div class="col-xs-6 col-md">
      <a href="https://upsighter.com/UpSighterWeb/index.html" target="_blank">
        <div class="hrbox"> <img src="https://www.upsighter.com/img/document.png"></div>
        <div class="hrboxb">UpSighter</div>
        <div class="hrboxt">コミュニケーションを数値で見える化！</div>
      </a>
    </div>
    <div class="col-xs-6 col-md">
      <a href="https://www.upsighter.com/F" target="_blank">
        <div class="hrbox"> <img src="https://www.upsighter.com/F/img/masthead.png"></div>
        <div class="hrboxb">UpSighter For<br>Finance</div>
        <div class="hrboxt">傾向把握不要！金融業界と比較！</div>
      </a>
    </div>
    <div class="col-xs-6 col-md">
      <a href="https://www.upsighter.com/P" target="_blank">
        <div class="hrbox"> <img src="https://www.upsighter.com/P/img/demo-screen.png"></div>
        <div class="hrboxb">UpSighter For<br>プレゼン！</div>
        <div class="hrboxt">あなたのプレゼンが見える！</div>
      </a>
    </div>

    
  </div>
</div>

  <br>
@endsection