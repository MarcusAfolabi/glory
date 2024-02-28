@guest
    <header class="top-0 left-0 pt-4 position-absolute w-100">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div>
                        <a wire:navigate.hover href="/">
                            <img src="assets/img/logo/logo-m.svg" alt />
                        </a>
                    </div>
                </div>

                <div class="col-auto">
                    <div class="d-flex align-items-center aai-signup-in-links">
                        <a wire:navigate.hover href="{{ url('register') }}" class="aai-gradient-outline-btn">Protocol </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endguest

@auth
    <header class="header-primary">
        <div class="container">
            <nav class="navbar navbar-expand-xl justify-content-between">
                <a wire:navigate.hover href="/">
                    <img src="assets/img/logo/logo-m.svg" alt />
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="mx-auto navbar-nav">
                        <li class="d-block d-xl-none">
                            <div class="logo">
                                <a wire:navigate.hover href="/"><img src="assets/img/logo/logo-m.svg" alt /></a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                data-bs-auto-close="outside" aria-expanded="false">Home</a>
                            <div class="dropdown-menu">
                                <div class="d-flex flex-column flex-xl-row">
                                    <ul>
                                        <li>
                                            <a wire:navigate.hover href="/" class="dropdown-item"><span>Home
                                                    Main</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate.hover href="{{ url('members') }}" class="nav-link"> All Members</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">All Attendance</a>
                        </li>
                    </ul>
                    <div class="gap-4 mt-4 d-flex align-items-center">
                        <div class="align-items-center aai-signup-in-links d-flex d-lg-none">
                            <a wire:navigate.hover href="{{ url('login') }}"></a>Login</a>
                            <a wire:navigate.hover href="{{ url('register') }}" class="aai-gradient-outline-btn">Protocol
                            </a>
                        </div>
                    </div>
                </div>
                <div class="gap-4 navbar-right d-flex align-items-center">
                    <div class="align-items-center aai-signup-in-links d-none d-lg-flex">
                        <a wire:navigate.hover href="{{ url('login') }}">Login</a>
                        <a wire:navigate.hover href="{{ url('login') }}" class="text-white">Attendance</a>
                        <a wire:navigate.hover href="{{ url('members') }}" class="text-white">Members</a>
                        <a wire:navigate.hover href="{{ url('register') }}" class="aai-gradient-outline-btn">Protocol </a>
                    </div>
                    <button class="navbar-toggler d-block d-xl-none" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span></span>
                    </button>
                </div>
            </nav>
        </div>
    </header>
@endauth
