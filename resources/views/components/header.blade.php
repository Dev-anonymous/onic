<header class="app-header">
    <div class="main-header-container container-fluid">
        <div class="header-content-left">
            <div class="header-element">
                @auth
                    @php
                        $user = auth()->user();
                        $img = userimage($user);
                        $href = '';
                        $dah = '';
                        if ($user->user_role == 'admin') {
                            $href = route('admin.profile');
                            $dah = route('admin.home');
                        }
                        if ($user->user_role == 'nurse') {
                            $href = route('nurse.profile');
                            $dah = route('nurse.home');
                        }

                        $logo = @getappconfig()->logo;
                        if (!$logo) {
                            $logo = 'ressources/images/logo.png';
                        } else {
                            $logo = asset('storage/' . $logo);
                        }
                    @endphp
                @endauth
                <div class="horizontal-logo">
                    <a href="{{ $dah }}" class="header-logo">

                        <img src="{{ $logo }}" alt="logo" class="desktop-dark">
                        <img src="{{ $logo }}}" alt="logo" class="desktop-logo">
                        <img src="{{ $logo }}" alt="logo" class="toggle-logo">
                        <img src="{{ $logo }}" alt="logo" class="desktop-dark">
                        <img src="{{ $logo }}" alt="logo" class="toggle-dark">
                        <img src="{{ $logo }}" alt="logo" class="desktop-white">
                        <img src="{{ $logo }}" alt="logo" class="toggle-white">

                        {{-- <img src="{{ asset('assets/images/brand-logos/desktop-logo.png') }}" alt="logo"
                            class="desktop-logo">
                        <img src="{{ asset('assets/images/brand-logos/toggle-logo.png') }}" alt="logo"
                            class="toggle-logo">
                        <img src="{{ asset('assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                            class="desktop-dark">
                        <img src="{{ asset('assets/images/brand-logos/toggle-dark.png') }}" alt="logo"
                            class="toggle-dark">
                        <img src="{{ asset('assets/images/brand-logos/desktop-white.png') }}" alt="logo"
                            class="desktop-white">
                        <img src="{{ asset('assets/images/brand-logos/toggle-white.png') }}" alt="logo"
                            class="toggle-white"> --}}
                    </a>
                </div>
            </div>
            <div class="header-element">
                @if (!Route::is('home'))
                    <a aria-label="Hide Sidebar"
                        class="sidemenu-toggle header-link animated-arrow hor-toggle horizontal-navtoggle"
                        data-bs-toggle="sidebar" href="javascript:void(0);">
                        <span></span>
                    </a>
                @endif
            </div>
        </div>
        <div class="header-content-right">

            @if (!Route::is('home'))
                <div class="header-element">
                    <a href="{{ route('home') }}" class="header-link">
                        <i class="bx bxs-home-smile header-link-icon"></i> Accueil
                    </a>
                </div>
            @endif
            <div class="header-element header-theme-mode">
                <a href="javascript:void(0);" class="header-link layout-setting">
                    <span class="light-layout">
                        <i class="bx bx-moon header-link-icon"></i>
                    </span>
                    <span class="dark-layout">
                        <i class="bx bx-sun header-link-icon"></i>
                    </span>
                </a>
            </div>
            <div class="header-element">
                @guest
                    <div class="d-flex align-items-center">
                        <a href="{{ route('login') }}" class="btn btn-sm btn-primary-light" type="button">
                            Connexion
                        </a>
                    </div>
                @endguest
                @auth
                    <a href="javascript:void(0);" class="header-link dropdown-toggle" id="mainHeaderProfile"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <div class="me-sm-2 me-0">
                                <img src="{{ $img }}" alt="img" width="32" height="32"
                                    class="rounded-circle">
                            </div>
                            <div class="d-sm-block d-none">
                                <p class="fw-semibold mb-0 lh-1">{{ auth()->user()->name }}</p>
                                <span class="op-7 fw-normal d-block fs-11">{{ ucfirst(auth()->user()->user_role) }}</span>
                            </div>
                        </div>
                    </a>
                    <ul class="main-header-dropdown dropdown-menu pt-0 overflow-hidden header-profile-dropdown dropdown-menu-end"
                        aria-labelledby="mainHeaderProfile">
                        <li>
                            <a class="dropdown-item d-flex" href="{{ $dah }}">
                                <i class="ti ti-home fs-18 me-2 op-7"></i>Dashbord</a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex" href="{{ $href }}">
                                <i class="ti ti-user-circle fs-18 me-2 op-7"></i>Profil</a>
                        </li>
                        <li>
                            <a class="dropdown-item d-flex" href="#" logout>
                                <i class="ti ti-logout fs-18 me-2 op-7"></i>Déconnexion</a>
                        </li>
                    </ul>
                </div>
            @endauth

            @if (!Route::is('home'))
                <div class="header-element">
                    <a href="javascript:void(0);" class="header-link switcher-icon" data-bs-toggle="offcanvas"
                        data-bs-target="#switcher-canvas">
                        <i class="bx bx-cog header-link-icon"></i>
                    </a>
                </div>
            @endif
        </div>
    </div>
</header>
