<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css">
<title>Новости</title>
</head>
<body>
<div class="main">
	<div class="container">
		<div class="gfx"><a href="#"><span></span></a></div>

		@yield('navigation')

		<div class="content">
			<div class="row item">

				@yield('content')

			</div>
		</div>
		<div class="clearer"></div>
		<div class="footer">
			<span class="right">© Новостной портал - 2022</span>
		<div class="clearer"></div>
		</div>
	</div>	
</div>
</body>
</html>

