@if (Auth::user()->admin == '1')
    <li class= "{{ (Request::url() == route('home'))? 'active menu' : 'menu'}} ">
        <a href="/home">
            <i class="text-purple fa fa-fw fa-dashboard"></i><span>Dashboard</span>
        </a>
    </li>
    <li class= "{{ (Request::url() == 'http://extension.dev/home/users')? 'active menu treeview' : 'menu treeview'}}">
        <a href="#">
            <i class="text-purple fa fa-sliders"></i>
            <i class="fa fa-angle-left pull-right"></i><span>General</span>
        </a>
        <ul class="treeview-menu">
            <li class="menu-open">
                <a href="/home/users">
                    <i class="text-purple fa fa-fw fa-users"></i><span>Users</span>
                </a>
            </li>
        </ul>
    </li>
    <li class= "{{ (Request::url() == 'http://extension.dev/home/announcements')? 'active menu treeview' : 'menu treeview'}}">
        <a href="#">
            <i class="text-purple fa fa-info-circle"></i>
            <i class="fa fa-angle-left pull-right"></i><span>Announcements</span>
        </a>
        <ul class="treeview-menu">
            <li class="menu-open">
                <a href="/home/announcements">
                    <i class="text-purple fa fa-fw fa-edit"></i><span>View Announcements</span>
                </a>
            </li>
        </ul>
    </li>
    <li class= "menu">
        <a href="/home/gallery">
            <i class="text-purple fa fa-fw fa-photo"></i><span>Gallery</span>
        </a>
    </li>
    <li class="{{ (Request::url() == ('http://extension.dev/home/about'))? 'active menu treeview' : 'menu treeview'}}">
        <a href="">
            <i class="text-purple fa fa-fw fa-cogs"></i><span>Settings</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            {{-- <li class="menu-open">
                <a href="/home/about">
                    <i class="text-purple fa fa-fw fa-question-circle"></i><span>About Us</span>
                </a>
            </li>
            <li class="menu-open">
                <a href="">
                    <i class="text-purple fa fa-fw fa-phone"></i><span>Contact Us</span>
                </a>
            </li> --}}
            <li class="menu-open">
                <a href="/home/settings">
                    <i class="text-purple fa fa-fw fa-cogs"></i><span>Account</span>
                </a>
            </li>
        </ul>
    </li>
@elseif (Auth::user()->admin == '2')
    <li id="dash" class= "{{ (Request::url() == route('home'))? 'active menu' : 'menu'}} ">
        <a href="/home">
            <i class="text-purple fa fa-fw fa-dashboard"></i><span>&nbsp;&nbsp;&nbsp;Dashboard</span>
        </a>
    </li>
    <li class= "{{ (Request::url() == ('http://extension.dev/home/projects'))? 'active menu' : 'menu'}}">
        <a href="/home/projects">
            <i id="proj" class="text-purple fa fa-fw fa-book"></i><span>&nbsp;&nbsp;&nbsp;Projects</span>
        </a>
    </li>
    <li  class= "{{ (Request::url() == ('http://extension.dev/training/evaluation') || (Request::url() == ('http://extension.dev/resource/evaluation')))? 'active menu treeview' : 'menu treeview'}}">
        <a href="#">
            <i class="text-purple fa fa-fw fa-folder-open"></i>
            <i class="fa fa-angle-left pull-right"></i><span>&nbsp;&nbsp;&nbsp;Evaluation Forms</span>
        </a>
        <ul class="treeview-menu">
            <li class= "{{ (Request::url() == ('http://extension.dev/training/evaluation'))? 'active menu-open' : 'menu-open'}}">
                <a href="/training/evaluation">
                    <i id="train" class="text-green fa fa-fw fa-check-circle"></i><span>&nbsp;&nbsp;&nbsp;Training Evaluation</span>
                </a>
            </li>
            <li class= "{{ (Request::url() == ('http://extension.dev/resource/evaluation'))? 'active menu-open' : 'menu-open'}}">
                <a class="text-truncate" href="/resource/evaluation" data-toggle="tooltip" title="Resource Person Evaluation">
                    <i id="resource" class="text-green fa fa-fw fa-check-circle"></i><span>&nbsp;&nbsp;&nbsp;Resource Person Evaluation</span>
                </a>
            </li>
            <li class= "">
                <a class="text-truncate" href="/home/summary/training" data-toggle="tooltip" title="Training Evaluations Summary">
                    <i id="training" class="text-green fa fa-fw fa-check-circle"></i><span>&nbsp;&nbsp;&nbsp;Training Evaluations Summary</span>
                </a>
            </li>
            <li class= "">
                <a class="text-truncate" href="/home/summary/resource" data-toggle="tooltip" title="Resource Evaluations Summary">
                    <i id="training" class="text-green fa fa-fw fa-check-circle"></i><span>&nbsp;&nbsp;&nbsp;Resource Evaluations Summary</span>
                </a>
            </li>
        </ul>
    </li>
    <li class= "menu">
        <a href="/report">
            <i id="rep" class="text-purple fa fa-fw fa-file"></i><span>&nbsp;&nbsp;&nbsp;Reports</span>
        </a>
    </li>
   
    <li class="{{ (Request::url() == ('http://extension.dev/home/settings'))? 'active menu' : 'menu'}}">
        <a href="/home/settings">
            <i id="set" class="text-purple fa fa-fw fa-cogs"></i><span>&nbsp;&nbsp;&nbsp;Settings</span>
        </a>
    </li>
@endif