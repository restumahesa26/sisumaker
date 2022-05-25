<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <img src="{{ url('logo.png') }}" alt="" class="app-brand-logo demo" style="width: 35px">
            <span class="demo menu-text fw-bolder ms-2">SISUMAKER</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item @if(Route::is('dashboard')) active @endif">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">MAIN MENU</span>
        </li>
        <li class="menu-item @if(Route::is('surat-masuk.*')) active @endif">
            <a href="{{ route('surat-masuk.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Analytics">Surat Masuk</div>
            </a>
        </li>
        <li class="menu-item @if(Route::is('surat-keluar.*')) active @endif">
            <a href="{{ route('surat-keluar.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Analytics">Surat Keluar</div>
            </a>
        </li>
        @if (Auth::user()->role == 'Sekretariat')
        <li class="menu-item @if(Route::is('data-user.*')) active @endif">
            <a href="{{ route('data-user.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Analytics">Data User</div>
            </a>
        </li>
        @endif
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">PERSONAL</span>
        </li>
        <li class="menu-item @if(Route::is('profile.*')) active @endif">
            <a href="{{ route('profile.edit') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Analytics">My Profile</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
