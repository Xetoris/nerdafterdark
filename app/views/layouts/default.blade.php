<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">   

        <title>Nerd After Dark</title>

        <!-- Bootstrap -->
        {{HTML::style('/css/bootstrap_311/bootstrap.min.css')}}
        {{HTML::style('/css/layout.css')}}

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>       
            <header class="container navbar-fixed-top" id="site-header">
                <div class="row" id="header">
                    <div class="col-sm-8" id="logo"> </div>
                    <div class="col-sm-2" id="social_links">
                        <ul class="list-inline">
                            <li>@include('content\social\twitter')</li>
                        </ul>
                    </div>
                </div>
                <div class="row" id="navigation-container">
                    @include('content\navigation\navigation')
                </div>
            </header>
            <div class="container" id="foreground">
                <div class="row" id="content-container">
                    <div class="col-sm-8" id="content">
                        @yield('content')
                    </div>
                    <div class="col-sm-4 hidden-xs" id="side-bar">
                        <div class="row" id="ads">
                            Podcasts released every week and more content coming!
                        </div>
                    </div>
                </div>
            </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        {{HTML::script('/js/bootstrap_311/bootstrap.min.js')}}
    </body>
</html>


