<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo me-1">

            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">TASK</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="menu-toggle-icon d-xl-block align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

   <ul class="menu-inner py-1">
    <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-sofa-line"></i>
            <div data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>

    <li class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-user-line"></i>
            <div data-i18n="Users">Users</div>
        </a>
    </li>

    <li class="menu-item {{ request()->routeIs('projects.*') ? 'active' : '' }}">
        <a href="{{ route('projects.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-ancient-gate-line"></i>
            <div data-i18n="Projects">Projects</div>
        </a>
    </li>

    <li class="menu-item {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
        <a href="{{ route('tasks.index') }}" class="menu-link">
            <i class="menu-icon tf-icons ri-chat-history-line"></i>
            <div data-i18n="Tasks">Tasks</div>
        </a>
    </li>
</ul>

</aside>
