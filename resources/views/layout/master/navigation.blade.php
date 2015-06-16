<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Instagram</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                @if(auth()->guest())
                    <li class="{{ Menu::isActiveRoute('login') }}">
                        <a href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="{{ Menu::isActiveRoute('register') }}">
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('logout') }}">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->

    <!-- Notifications -->
    @if(session()->has('success') || session()->has('error'))
        <div class="alert alert-dismissable {!! session()->has('success') ? 'alert-info' : 'alert-danger' !!}">
            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            {!! session()->get('success') !!}{!! session()->get('error') !!}
        </div>
    @endif

</nav>