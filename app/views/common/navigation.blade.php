<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-navigation">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}">NerdAfterDark</a>
        </div>
        <div class="collapse navbar-collapse" id="site-navigation">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">News <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#InterestingArticles">Interesting Articles</a></li>
                        <li><a href="#SomethingElse">Something Else</a></li>
                        <li><a href="#SomethingElseElse">Something Else Else</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Podcasts <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('/podcasts')}}">Recent</a></li>
                        <li><a href="{{URL::to('/curl')}}">Test CURL</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#Sign-up">Sign-up</a></li>
                        <li><a href="#Support">Support</a></li>
                        <li><a href="#SomethingCool">Something Cool</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Discussion <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#LinkCoolArticle">Link Cool Articles</a></li>
                        <li><a href="#Suggestions">Suggestions</a></li>
                        <li><a href="#ReportIssue">Report Issues</a></li>
                    </ul>
                </li>
            </ul> 

            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">                
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</nav>

