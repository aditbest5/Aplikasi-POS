<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="#!">
                        <img src="{{ ('assets/img/rki.png') }}" class="navbar-logo" width="100%" alt="logo">
                    </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>
        {{-- <div class="profile-info">
            <div class="user-info">
                <div class="profile-img">
                    <img src="{{ asset('assets/dashboard/src/assets/img/profile-30.png') }}" alt="avatar">
                </div>
                <div class="profile-content">
                    <h6 class="">Shaun Park</h6>
                    <p class="">Project Leader</p>
                </div>
            </div>
        </div> --}}

        {{-- <div class="shadow-bottom"></div> --}}
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>MAIN MENU</span></div>
            </li>
            @if($tingkatan != 'anggota')
            <li class="menu {{ request()->routeIs('overview') ? 'active' : '' }}">
                <a href="{{ route('overview') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        <span>Overview</span>
                    </div>
                </a>
            </li>
            @else
            <li class="menu {{ request()->routeIs('member.overview') ? 'active' : '' }}">
                <a href="{{ route('member.overview') }}" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                        <span>Overview</span>
                    </div>
                </a>
            </li>
            @endif

            <li class="menu {{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota']) ? 'active' : '' }}">
                @if($tingkatan != 'anggota')
                <a href="#side-data" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota']) ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        <span>Data</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                @endif
                <ul class="submenu list-unstyled collapse {{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota', 'view-kategori','view-produk']) ? 'show' : '' }}" id="side-data" data-bs-parent="#accordionExample" style="">
                    <li>
                        <a href="#side-cooperative" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota']) ? 'true' : 'false' }}" class="dropdown-toggle"> Koperasi <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="list-unstyled sub-submenu collapse {{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota']) ? 'show' : '' }}" id="side-cooperative" data-bs-parent="#pages" style="">
                            @if($tingkatan == 'rki')
                                <li class="{{ request()->routeIs('view-inkop') ? 'active' : '' }}">
                                    <a href="/list_inkop"> INKOP  </a>
                                </li>
                                <li class="{{ request()->routeIs('view-puskop') ? 'active' : '' }}">
                                    <a href="/list_puskop"> PUSKOP </a>
                                </li>
                                <li class="{{ request()->routeIs('view-primkop') ? 'active' : '' }}">
                                    <a href="/list_primkop"> PRIMKOP </a>
                                </li>
                            @elseif($tingkatan == 'inkop')
                                <li class="{{ request()->routeIs('view-puskop') ? 'active' : '' }}">
                                    <a href="/list_puskop"> PUSKOP </a>
                                </li>
                            @elseif($tingkatan == 'puskop')
                                <li class="{{ request()->routeIs('view-primkop') ? 'active' : '' }}">
                                    <a href="/list_primkop"> PRIMKOP </a>
                                </li>
                            @else
                                <li class="{{ request()->routeIs('view-anggota') ? 'active' : '' }}">
                                    <a href="/list_anggota"> ANGGOTA </a>
                                </li>
                            @endif
                        </ul>
                    </li>

                    @if($tingkatan == 'rki')
                    <li>
                        <a href="#side-pengajuan" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs('view-pengajuan') ? 'true' : 'false' }}" class="dropdown-toggle"> Pengajuan <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="list-unstyled sub-submenu collapse {{ request()->routeIs('view-pengajuan') ? 'show' : '' }}" id="side-pengajuan" data-bs-parent="#pages" style="">
                            <li class="{{ request()->routeIs('view-pengajuan') ? 'active' : '' }}">
                                <a href="{{ route('view-pengajuan') }}"> Pengajuan </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
                @if($tingkatan != 'rki' && $tingkatan != 'anggota')

                <ul class="submenu list-unstyled collapse {{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota', 'view-kategori','view-produk']) ? 'show' : '' }}" id="side-data" data-bs-parent="#accordionExample" style="">
                    <li>
                        <a href="#product-cooperative" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs(['view-kategori', 'view-produk']) ? 'true' : 'false' }}" class="dropdown-toggle"> Produk <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                        <ul class="list-unstyled sub-submenu collapse {{ request()->routeIs(['view-kategori', 'view-produk']) ? 'show' : '' }}" id="product-cooperative" data-bs-parent="#pages" style="">
                            <li class="{{ request()->routeIs('view-kategori') ? 'active' : '' }}">
                                <a href="/list_kategori_produk"> Kategori </a>
                            </li>

                            <li class="{{ request()->routeIs('view-produk') ? 'active' : '' }}">
                                <a href="/list_produk"> Inventori Produk </a>
                            </li>

                            {{-- <li class="{{ request()->routeIs('view-primkop') ? 'active' : '' }}">
                                <a href="/riwayat_stok"> Laporan Stok </a>
                            </li>
                            <li class="{{ request()->routeIs('view-primkop') ? 'active' : '' }}">
                                <a href="/riwayat_stok"> Mutasi Stok </a>
                            </li> --}}
                        </ul>
                    </li>
                </ul>
                @endif
            </li>
            @if($tingkatan != 'rki' && $tingkatan != 'anggota')
            <li class="menu {{ request()->routeIs(['view-pos','view-history-pos']) ? 'active' : '' }}">
                <a href="#sales-data" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs(['view-pos','view-history-pos']) ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        <span>Sales</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse {{ request()->routeIs(['view-pos','view-history-pos']) ? 'show' : '' }}" id="sales-data" data-bs-parent="#accordionExample" style="">
                    <li>
                        <a href="/pos" aria-expanded="{{ request()->routeIs(['view-pos','view-history-pos']) ? 'true' : 'false' }}" class="dropdown-toggle"> POS <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                    </li>
                    <li>
                        <a href="/history-pos" aria-expanded="{{ request()->routeIs(['view-pos','view-history-pos']) ? 'true' : 'false' }}" class="dropdown-toggle"> History POS <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                    </li>
                </ul>
            </li>
            @endif

            @if($tingkatan != 'rki' && $tingkatan != 'anggota')
            <li class="menu {{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota']) ? 'active' : '' }}">
                <a href="#simpin-data" data-bs-toggle="collapse" aria-expanded="{{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota']) ? 'true' : 'false' }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        <span>SimPin</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="submenu list-unstyled collapse {{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota']) ? 'show' : '' }}" id="simpin-data" data-bs-parent="#accordionExample" style="">
                    <li>
                        <a href="/simpanan" aria-expanded="{{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota']) ? 'true' : 'false' }}"> Simpanan  </a>
                    </li>
                    <li>
                        <a href="/pinjaman" aria-expanded="{{ request()->routeIs(['view-inkop', 'view-puskop', 'view-primkop', 'view-anggota']) ? 'true' : 'false' }}"> Pinjaman  </a>
                    </li>
                </ul>
            </li>
            @endif

            @if($tingkatan == 'anggota')
            <li class="menu {{ request()->routeIs('view-pos') ? 'active' : '' }}">
                <a href="/pos" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        <span>Pos</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ (Request::segment(2) == 'simpanan') ? 'active' : '' }}">
                <a href="/member/simpanan" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        <span>Simpanan</span>
                    </div>
                </a>
            </li>
            <li class="menu {{ (Request::segment(2) == 'pinjaman') ? 'active' : '' }}">
                <a href="/member/pinjaman" aria-expanded="false" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                        <span>Pinjaman</span>
                    </div>
                </a>
            </li>
            @endif

        </ul>
    </nav>
</div>
