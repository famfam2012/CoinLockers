<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Coin Locker</title>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600"
	rel="stylesheet">
<script>setTimeout(function(){window.location.href="/CoinLocker/public/"},3000);</script>
<!-- Styles -->
<style>
html, body {
	background-color: #001621;
	color: #001621;
	font-family: 'Nunito', sans-serif;
	font-weight: 200;
	height: 100vh;
	margin: 0;
}

.full-height {
	height: 100vh;
}

.flex-center {
	align-items: center;
	display: flex;
	justify-content: center;
}

.position-ref {
	position: relative;
}

.top-right {
	position: absolute;
	right: 10px;
	top: 18px;
}

.content {
	text-align: center;
}

.title {
	font-size: 84px;
}

.links>a {
	color: #b2e5ff;
	padding: 0 25px;
	font-size: 13px;
	font-weight: 600;
	letter-spacing: .1rem;
	text-decoration: none;
	text-transform: uppercase;
}

.m-b-md {
	margin-bottom: 30px;
}
</style>
</head>
<body onLoad="" background="/CoinLocker/resources/views/js/html-color-codes-color-tutorials-hero-00e10b1f.jpg">
	<div class="flex-center position-ref full-height"
		onclick="window.location.href='{{url('/')}}'">
		@if (Route::has('login'))
		<!--     <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>  -->
		@endif

		<div class="content">
		<div class="title m-b-md"> <?php echo $thankyou;?></div>
		<div class="title m-b-md"><?php echo $message;?></div>


			</div>
		</div>
	</div>
</body>
</html>
