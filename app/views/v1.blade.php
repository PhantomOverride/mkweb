    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

    <title>@yield('v1-title')</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/mk.css" rel="stylesheet">

    <link href="/css/resslides.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="brand hidden-xs">
        <div class="row" >
            <div class="banner container">
                <div class="box">   
                    <div class="headline">
                        <div class="col-lg-2 col-md-2 col-sm-2 text-center">
                                <div class="logo"></div>
                        </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 text-center">
                                <h1> Mammas Källare </h1>
                        </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 text-center">
                        </div>
                            
                    </div>
                </div>
            </div>
            <!-- Slideshow 1 -->
            <ul class="rslides" id="slider1">
              @yield('v1-headerslider')
            </ul>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">MKdev</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @yield('v1-navbar-1')
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container">
        <div class="row">
                <div class="col-lg-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="box-rounded bread col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10"> 
                            <ul class="breadcrumb_trans">
                                 @yield('v1-breadcrumbs')
                            </ul>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-right">
                            <a href="#">Login</a>
                        </div>
                    <div>
                </div>
            </div>  
        </div>
    </div>
        <div class="row">
        <div class="col-lg-2 col-md-2 hidden-sm hidden-xs">
            <div class="box">
            <div class="list-group">
              @yield('v1-navbar-2')
            </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8">
            <div class="box-rounded main">
                <h1 class="page-header">
                    @yield('v1-contentname')
                    <small>@yield('v1-contenttitle')</small>
                </h1>
                <!-- Content -->
                @yield('v1-content')

            </div>
            <p></p>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="box-rounded-padles">
            <!-- Blog Search Well -->
                <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
                </span>
                </div>
            <!-- /.input-group -->
            </div>
            <div class="box-rounded spons col-md-2 col-lg-2 col-sm-12 col-xs-12">
            <!-- Sponsorer -->
                <h4>Sponsorer</h4>
                    @yield('v1-sponsor')
                </div>
            <!-- /.input-group -->
            </div>
            <p></p>
        </div>
        </div>

        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Mammas Källare 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery Version 1.11.0 -->
    <script src="/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.js"></script>

    <!-- Script to Activate the Carousel -->
    </script>
    <script src="/js/responsiveslides.js"></script>
        <script>
        // You can also use "$(window).load(function() {"
        $(function () {

          // Slideshow 1
          $("#slider1").responsiveSlides({
            maxheight: 100,
            speed: 800
          });
        });
    </script>

</body>

</html>
