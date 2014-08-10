<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#site-navigation">
                <span class="sr-only">Toggle Navigation</span>
            </button>
            <a class="navbar-brand" href="{{URL::to('/')}}">NerdAfterDark</a>
        </div>
        <div class="collapse navbar-collapse" id="site-navigation">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Podcast <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{URL::to('/podcasts')}}">New</a></li>
                        <li><a href="{{URL::to('/podcasts/archived')}}">Archive</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Live Action</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Members <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#Sign-up">Your Page</a></li>
                        <li><a href="#Support">Posts</a></li>
                        <li><a href="#SomethingCool">Friends</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Discussion <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#ReportIssue">Forum</a></li>
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

