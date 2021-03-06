<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <img src="{{ url('logo.png') }}" alt="" class="app-brand-logo demo" style="width: 35px">
            <span class="demo menu-text fw-bolder ms-2">BAPPEDA <br> PROVINSI BENGKULU</span>
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
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">MAIN MENU</span>
        </li>
        <li class="menu-item @if(Route::is('surat-masuk.*')) active @endif">
            <a href="{{ route('surat-masuk.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Analytics">Surat Masuk</div>
            </a>
        </li>
        <li class="menu-item @if(Route::is('surat-keluar.*')) active @endif">
            <a href="{{ route('surat-keluar.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope-open"></i>
                <div data-i18n="Analytics">Surat Keluar</div>
            </a>
        </li>
        <li class="menu-item @if(Route::is('undangan.*')) active @endif">
            <a href="{{ route('undangan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-send"></i>
                <div data-i18n="Analytics">Undangan</div>
            </a>
        </li>
        <li class="menu-item @if(Route::is('laporan.*')) active @endif">
            <a href="{{ route('laporan.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-file-doc"></i>
                <div data-i18n="Analytics">Laporan</div>
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
            <span class="menu-header-text">Company Profile</span>
        </li>
        <li class="menu-item @if(Route::is('visi-misi.*')) active @endif">
            <a href="{{ route('visi-misi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-cabinet"></i>
                <div data-i18n="Analytics">Visi Misi</div>
            </a>
        </li>
        <li class="menu-item @if(Route::is('struktur.*')) active @endif">
            <a href="{{ route('struktur.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-network-chart"></i>
                <div data-i18n="Analytics">Struktur</div>
            </a>
        </li>
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
