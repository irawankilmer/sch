<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="{{ route('dashboard') }}" class="app-brand-link">
      <span class="app-brand-text demo menu-text fw-bold ms-2">Seekola v1.0.0</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="bx bx-chevron-left d-block d-xl-none align-middle"></i>
    </a>
  </div>

  <div class="menu-divider mt-0"></div>

  <div class="menu-inner-shadow"></div>
  <ul class="menu-inner py-1">
    <li class="menu-item {{ request()->routeIs('dashboard') ? 'active': '' }}">
      <a href="{{ route('dashboard') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home"></i>
        <div class="text-truncate" data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <li class="menu-item {{ request()->routeIs('master.*') ? 'active open': '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-home-smile"></i>
        <div class="text-truncate" data-i18n="Master Data">Master Data</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item {{ request()->routeIs('master.profilSekolah') ? 'active': '' }}">
          <a href="{{ route('master.profilSekolah') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Profil Sekolah">Profil Sekolah</div>
          </a>
        </li>

        <li class="menu-item {{ request()->routeIs('master.tahunAjaranIndex') ? 'active': '' }}">
          <a href="{{ route('master.tahunAjaranIndex') }}" class="menu-link">
            <div class="text-truncate" data-i18n="Tahun Ajaran">Tahun Ajaran</div>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</aside>
