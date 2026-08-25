 <div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('home') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('home') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    <div class="dropdown sidebar-user m-1 rounded">
        <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="d-flex align-items-center gap-2">
                <img class="rounded header-profile-user" src="{{ asset('assets/images/avatar-1.jpg') }}" alt="Header Avatar">
                <span class="text-start">
                    <span class="d-block fw-medium sidebar-user-name-text">StarCode Kh</span>
                    <span class="d-block fs-14 sidebar-user-name-sub-text"><i class="ri ri-circle-fill fs-10 text-success align-baseline"></i> <span class="align-middle">Online</span></span>
                </span>
            </span>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <h6 class="dropdown-header">Welcome StarCode Kh!</h6>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
            <a class="dropdown-item" href="{{ route('tasks-kanban') }}"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
            <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
            <a class="dropdown-item" href="{{ route('profile') }}"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
            <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
        </div>
    </div>
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link {{ set_active(['analytics','crm','home','crypto','projects','nft','job','blog']) }}" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="{{ set_expanded(['analytics','crm','home','crypto','projects','nft','job','blog']) }}" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i>
                        <span data-key="t-dashboards">Dashboards</span>
                    </a>
                    <div class="menu-dropdown collapse {{ set_show(['analytics','crm','home','crypto','projects','nft','job','blog']) }}" id="sidebarDashboards" style="">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('analytics') }}" class="nav-link {{ set_active(['analytics']) }}" data-key="t-analytics"> Analytics </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('crm') }}" class="nav-link {{ set_active(['crm']) }}" data-key="t-crm"> CRM </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link {{ set_active(['home']) }}" data-key="t-ecommerce"> Ecommerce </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('crypto') }}" class="nav-link {{ set_active(['crypto']) }}" data-key="t-crypto"> Crypto </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('projects') }}" class="nav-link {{ set_active(['projects']) }}" data-key="t-projects"> Projects </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('nft') }}" class="nav-link {{ set_active(['nft']) }}" data-key="t-nft"> NFT</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('job') }}" class="nav-link {{ set_active(['job']) }}" data-key="t-job">Job</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('blog') }}" class="nav-link {{ set_active(['blog']) }}"><span data-key="t-blog">Blog</span> <span class="badge bg-success" data-key="t-new">New</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link {{ set_active(['tasks-kanban','tasks-list-view','tasks-details']) }}" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="{{ set_expanded(['tasks-kanban','tasks-list-view','tasks-details']) }}" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span data-key="t-apps">Apps</span>
                    </a>
                    <div class="collapse menu-dropdown {{ set_show(['tasks-kanban','tasks-list-view','tasks-details']) }}" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="#sidebarTasks" class="nav-link {{ set_active(['tasks-kanban','tasks-list-view','tasks-details']) }}" data-bs-toggle="collapse" role="button" aria-expanded="{{ set_expanded(['tasks-kanban','tasks-list-view','tasks-details']) }}" aria-controls="sidebarPosition" data-key="t-tasks"> Tasks
                                </a>
                                <div class="collapse menu-dropdown {{ set_show(['tasks-kanban','tasks-list-view','tasks-details']) }}" id="sidebarPosition">
                                    <ul class="nav nav-sm flex-column">
                                        <li class="nav-item">
                                            <a href="{{ route('tasks-kanban') }}" class="nav-link {{ set_active(['tasks-kanban']) }}" data-key="t-kanbanboard">
                                                Kanban Board
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('tasks-list-view') }}" class="nav-link {{ set_active(['tasks-list-view']) }}" data-key="t-list-view">
                                                List View
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('tasks-details') }}" class="nav-link {{ set_active(['tasks-details']) }}" data-key="t-task-details"> Task Details </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- Players section -->
                <li class="nav-item">

                    <a class="nav-link menu-link {{ set_active(['players*']) }}"
                    href="#sidebarPlayers"
                    data-bs-toggle="collapse"
                    role="button"
                    aria-expanded="{{ set_expanded(['players*']) }}"
                    aria-controls="sidebarPlayers">

                        <i class="ri-team-line"></i>
                        <span>Players</span>

                    </a>

                    <div class="collapse menu-dropdown {{ set_show(['players*']) }}"
                        id="sidebarPlayers">

                        <ul class="nav nav-sm flex-column">

                            {{-- Forwards --}}
                            <li class="nav-item">

                                <a href="{{ route('players.index', ['group' => 'Forward']) }}"
                                class="nav-link {{ set_active(['players-forwards']) }}">

                                    <i class="ri-shield-user-line"></i>
                                    Forwards

                                </a>

                            </li>

                            {{-- Backs --}}
                            <li class="nav-item">

                                <a href="{{ route('players.index', ['group' => 'Backs']) }}"
                                class="nav-link {{ set_active(['players-backs']) }}">

                                    <i class="ri-run-line"></i>
                                    Backs

                                </a>

                            </li>

                        </ul>

                    </div>

                </li>

                <li class="nav-item">

                    {{-- Positions --}}
                    <a class="nav-link menu-link {{ set_active(['format', '15s', '7s']) }}"
                    href="#sidebarPositions"
                    data-bs-toggle="collapse"
                    role="button"
                    aria-expanded="{{ set_expanded(['format', '15s', '7s']) }}"
                    aria-controls="sidebarPositions">

                        <i class="ri-user-settings-line"></i>
                        <span data-key="t-positions">Positions</span>

                    </a>

                    {{-- Positions Main Collapse --}}
                    <div class="collapse menu-dropdown {{ set_show(['format', '15s', '7s']) }}"
                        id="sidebarPositions">

                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">

                                {{-- Format --}}
                                <a href="#sidebarPositionFormat"
                                class="nav-link {{ set_active(['format', '15s', '7s']) }}"
                                data-bs-toggle="collapse"
                                role="button"
                                aria-expanded="{{ set_expanded(['format', '15s', '7s']) }}"
                                aria-controls="sidebarPositionFormat"
                                data-key="t-format">

                                    Format

                                </a>

                                {{-- Format Collapse --}}
                                <div class="collapse menu-dropdown {{ set_show(['format', '15s', '7s']) }}"
                                    id="sidebarPositionFormat">

                                    <ul class="nav nav-sm flex-column">

                                        {{-- 15s --}}
                                        <li class="nav-item">

                                            <a href="{{ route('position.index',['format'=>'15s']) }}"
                                            class="nav-link {{ set_active(['15s']) }}"
                                            data-key="t-15s">

                                                15s

                                            </a>

                                        </li>

                                        {{-- 7s --}}
                                        <li class="nav-item">

                                            <a href="{{ route('position.index',['format'=>'7s']) }}"
                                            class="nav-link {{ set_active(['7s']) }}"
                                            data-key="t-7s">

                                                7s

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </li>

                        </ul>

                    </div>

                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <div class="sidebar-background"></div>
</div>
