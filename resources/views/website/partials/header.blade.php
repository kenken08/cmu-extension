<div class="container">
    <div class="row p-3 d-flex align-items-center">
        <a href="/" class="logo" title="{{ config('app.name') }}">
            <img src="/images/cmulogob1.png">
        </a>
        <div class="ml-auto" role="group" aria-label="...">
            @if(!\Auth::check())
                <a href="/login" class="btn btn-info" data-icon="fa-sign-in">
                    <i class="fa fa-sign-in"></i>
                    @lang('Login')
                </a>
                <a href="/register" class="btn btn-warning" data-icon="fa-edit">
                    <i class="fa fa-external-link"></i>
                    @lang('Register')
                </a>
            @else
                @if(auth()->user()->admin == '1')
                   <a href="/home" class="btn btn-outline-primary"><i class="fa fa-user-secret"></i> Admin</a>
                @elseif(auth()->user()->admin == '2')
                    <a href="/home" class="btn btn-outline-danger"><i class="fa fa-user-secret"></i> Units</a>
                @else
                    <a href="/" class="btn btn-warning"><i class="fa fa-user-secret"></i>Guest</a>
                @endif
            @endif
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">
        $(function () {
            $('#form-search').on('submit', function () {
                var search = $("#form-search input[name='search']").val();
                window.location.href = "https://www.google.com.na/search?q={{ config('app.url') }}+" + encodeURI(search);
                return false;
            });
        })
    </script>
    <script type="text/javascript" src="{{ asset('js/locale.js') }}"></script>
@endsection
