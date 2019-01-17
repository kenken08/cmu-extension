<h2 class="hidden">Navigation</h2>
<aside class="main-sidebar">
    <section class="sidebar">
        
        <nav>
            <ul class="active sidebar-menu" data-widget="tree">
                <li>
                    <div class="user-panel">
                        <br>
                        <div class="image text-center">
                            <img src="/storage/profile_images/{{auth()->user()->profile_image}}" class="img img-circle" style="">
                        </div>
                        <br>
                        <div class="info text-center" style="margin-left:-11px;">
                            <p>{{ Auth::user()->firstname .' '. Auth::user()->lastname }}</p>
                        </div>
                    </div>
                </li>
                <li class="header text-green">NAVIGATION</li>
                @include('admin.partials.navigation_list')
            </ul>
        </nav>
    </section>
</aside>