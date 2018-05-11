<header class="sticky-top fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar-collapse" aria-controls="main-navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <h2 class="d-none">Navigation</h2>
            <div id="main-navbar-collapse" class="collapse navbar-collapse">
                <ul class="navbar-nav pull-left mr-auto">
                    <li class="nav-item"><a id="home" href="/" class="nav-link"><i class=" fa fa-fw fa-home" onclick="event.preventDefault();document.getElementById('home').className('text-white')"></i><span>Home</span></a></li>
                    <li class="nav-item"><a id="gal" href="/gallery" class="nav-link"><i class=" fa fa-fw fa-photo"></i><span>Gallery</span></a></li>
                    <li class="nav-item"><a id="for" href="/projects" class="nav-link"><i class=" fa fa-fw fa-comments"></i><span>Forum</span></a></li>
                    <li class="nav-item"><a id="ab" href="/about" class="nav-link"><i class=" fa fa-fw fa-info-circle"></i><span>About Us</span></a></li>
                    <li class="nav-item"><a id="con" href="/contact-us" class="nav-link"><i class=" fa fa-fw fa-phone"></i><span> Contact Us</span></a></li>
                </ul>
                @if(Auth::check())
                    <ul class="navbar-nav pull-right text-white ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class=" text-white dropdown-toggle" href="#" role="combobox" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user-circle"><span class="caret"> My Account</span></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/account"><i class="fa fa-user"><span> {{ __('Profile') }}</span></i></a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"><span>{{ __('Logout') }}</span></i></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                            </div>
                        </li>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
