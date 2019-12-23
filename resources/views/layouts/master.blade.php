<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>問い合わせフォーム</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
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
	@yield('content')
</body>
</html>