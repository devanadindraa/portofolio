<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">devanadindra</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li class="{{ Request::is('admin/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        <li class="{{ Request::is('admin/about/create*') ? 'active' : '' }}">
            <a href="{{ route('admin.create_about') }}">
                <i class='bx bx-user'></i>
                <span class="links_name">About</span>
            </a>
            <span class="tooltip">About</span>
        </li>
        <li
            class="{{ Request::is('admin/project/show*') || Request::is('admin/project/create*') || Request::is('admin/project/edit*') ? 'active' : '' }}">
            <a href="{{ route('admin.show_project') }}">
                <i class='bx bx-folder'></i>
                <span class="links_name">Project</span>
            </a>
            <span class="tooltip">Project</span>
        </li>
        <li
            class="{{ Request::is('admin/certification/show*') || Request::is('admin/certification/create*') || Request::is('admin/certification/edit*') ? 'active' : '' }}">
            <a href="{{ route('admin.show_certif') }}">
                <i class='bx bx-certification'></i>
                <span class="links_name">Certificate</span>
            </a>
            <span class="tooltip">Certificate</span>
        </li>
        <li
        class="{{ Request::is('admin/skill/show*') || Request::is('admin/skill/create*') || Request::is('admin/skill/edit*') ? 'active' : '' }}">
        <a href="{{ route('admin.show_skill') }}">
            <i class='bx bx-bulb'></i>
            <span class="links_name">Skill</span>
        </a>
        <span class="tooltip">Skill</span>
    </li>
        <li>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" onclick="document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out'></i>
                <span class="links_name">Logout</span>
            </a>

            <span class="tooltip">Logout</span>
        </li>
    </ul>
</div>
