<footer class="pt-5 bg-dark text-white mt-auto" role="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 text-left">
                <a href="/" class="logo" title="{{ config('app.name') }}">
                    <img src="/images/cmulogow1.png">
                </a>
                <hr>
                <small>
                    Website by {!! env('APP_AUTHOR') !!}
                </small>
            </div>
            <div class="col-sm-8 text-center">
                <div class="row text-left">
                    <ul class="col-sm-4">
                        <li><a class="'text-white'" href="/">Home</a></li>
                        <li><a class="text-grey" href="/gallery">Gallery</a></li>
                    </ul>
                    <ul class="col-sm-4">
                        <li><a class="text-white" href="#">Forum</a></li>
                        <li><a class="text-grey" href="">About Us</a></li>
                    </ul>
                    <ul class="col-sm-4">
                        <li><a class="text-white" href="#">Contact Us</a></li>
                        <li><a class="text-grey" href="#">Services</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-3 bg-custom">
        {{-- <p class="text-right float-right text-muted small">
            Copyright &copy; {{config('app.name') . ' ' . date('Y')}}
        </p> --}}
        <div class="text-md-center">
            <a>Copyright &copy; {{config('app.name') . ' ' . date('Y')}}</a>
        </div>
    </div>
</footer>