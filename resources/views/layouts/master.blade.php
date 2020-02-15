<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>UpSighter for Finance パーソナルプランのご利用</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <style>
		/* 一時的にここにstyleを記述 */
        body {
            background: #f3f3f3;
        }
        .container {
            font-family: "Noto Sans JP";
            margin-top: 60px;
        }
        h1 {
            margin-bottom: 50px;
            text-align: center;
				}
				h4 {
						margin-bottom: 25px;
						text-align: center;
				}
        button {
            margin-top: 30px;
        }
    </style>
</head>
<body>
  <header>
    <div>
      <img src="{{ asset('asset/img/UpSighter-logo.png') }}" class="UpSighter-logo f-left">
      <p class="header-copy f-left in-sp-hidden">ビジネスコミュニケーションを見える化</p>
    </div>
  </header>
	@yield('content')
  <footer class="footer">
    <ul>
      <li><a href="https://www.facebook.com/cognitee/"
          onclick="gtag('event','click',{'event_category' : 'facebook','event_label' : 'inqueiry_facebook_footer'});"
          target="_blank"><img src="{{ asset('asset/img/fb@2x.png') }}" alt="facebook"></a></li>
      <li><a href="https://twitter.com/cognitee"
          onclick="gtag('event','click',{'event_category' : 'twitter','event_label' : 'inqueiry_twitter_footer'});"
          target="_blank"><img src="{{ asset('asset/img/tw@2x.png') }}" alt="twitter"></a></li>
      <li><a href="http://cognitee.com/indexJ.html"><img src="{{ asset('asset/img/cognitee_logo.svg') }}" alt="COGNITEE"></a></li>
    </ul>
  </footer>
</body>
</html>