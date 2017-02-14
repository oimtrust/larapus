<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>No. access</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300">

	<style>
		html, body {
			height: 100%;
		}

		body {
			margin: 0;
			padding: 0;
			width: 100%;
			color: #B0BEC5;
			display: table;
			font-weight: 300;
			font-family: 'Source Sans Pro';
		}

		.container {
			text-align: center;
			display: table-cell;
			vertical-align: middle;
		}

		.content {
			text-align: center;
			display: inline-block;
		}

		.title {
			font-size: 72px;
			margin-bottom: 40px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="content">
			<div class="title">
				:(
			</div>
			<p>Maaf, Anda tidak memiliki akses untuk fitur ini</p>
			<p><a href="{{ url('/') }}">Kembali ke halaman awal</a></p>
		</div>
	</div>
</body>
</html>