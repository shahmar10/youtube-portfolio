<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

        <div class="sidebar-brand-text mx-3">Portfolio <sup>v.0</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(Request::segment(2) == "") active @endif">
        <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item @if(Request::segment(2) == "messages") active @endif">
        <a class="nav-link " href="{{ route('admin.messages') }}">
            <i class="fas fa-fw fa-comments"></i>
            <span>Messages</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <li class="nav-item @if(Request::segment(2) == "about") active @endif">
        <a class="nav-link " href="{{ route('admin.about') }}">
            <i class="fas fa-fw fa-address-card"></i>
            <span>About</span></a>
    </li>

    <li class="nav-item @if(Request::segment(2) == "skills") active @endif">
        <a class="nav-link " href="{{ route('admin.skills.index') }}">
            <i class="fas fa-fw fa-skull"></i>
            <span>Skills</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item @if(Request::segment(2) == "settings") active @endif">
        <a class="nav-link " href="{{ route('admin.settings') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
<!-- End of Sidebar -->