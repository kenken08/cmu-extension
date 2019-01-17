<div class="side col-md-3">
    <div class="card2">
        <div id="grad" class="card-header bg-dark text-light text-center">
            <img class="img img-circle image" src="/storage/profile_images/{{user()->profile_image}}" alt=""><br><br>
            <h5>{!! user()->firstname.' '.user()->lastname !!}</h5>
            <p>{!! user()->email !!}</p>
        </div>
    </div>
    <a class="text-light" href="/account-profile">
        <div class="card2">
            <div class="card-body bg-navy-active">
                <h5>Profile<i class="fa fa-user-circle-o pull-right"></i></h5>
            </div>
        </div>
    </a>
    <a class="text-light" href="/account-requests">
        <div class="card2">
            <div class="card-body bg-blue-active">
                <h5>Requests<i class="fa fa-briefcase pull-right"></i></h5>
            </div>
        </div>
    </a>
    <a class="text-light" href="/account-messages">
        <div class="card2">
            <div class="card-body bg-primary">
                <h5>Messages<i class="fa fa-comments pull-right"></i></h5>
            </div>
        </div>
    </a>
    <a class="text-light" href="/account-activities">
        <div class="card2">
            <div class="card-body bg-green-active">
                <h5>Activities<i class="fa fa-clock-o pull-right"></i></h5>
            </div>
        </div>
    </a>
    <a class="text-light" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
        <div class="card2">
            <div class="card-footer bg-red-active" style="height:70px">
                <h5>Logout<i class="fa fa-sign-out pull-right"></i></h5>
            </div>
        </div>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
</div>