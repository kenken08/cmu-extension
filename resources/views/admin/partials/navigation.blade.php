<h2 class="hidden">Navigation</h2>
<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel hide">
            <div class="pull-left image">
            <img src="/storage/profile_images/{{auth()->user()->profile_image}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->firstname .' '. Auth::user()->lastname }}</p>
            </div>
        </div>

        <nav>
            <ul class="active sidebar-menu" data-widget="tree">
                <li class="header text-green">NAVIGATION</li>
                @include('admin.partials.navigation_list')
            </ul>
        </nav>
    </section>
</aside>