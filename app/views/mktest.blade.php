<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mammas Källare - @yield('title')</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
                .content {
                        width:700px;
                        background-color: #fafafa;
                        margin:0 auto;
                }
	</style>
</head>
<body>
    <div id="wrapper">
        <h1>MKWEB TEST TEMPLATE</h1>
	<div class="content">
		@yield('content')
	</div>
    </div>
</body>
</html>
