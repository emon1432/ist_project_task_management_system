<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand gap-3">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
            </div>
            <div class="top-menu ms-auto">
                <ul class="navbar-nav align-items-center gap-1">
                    <li class="nav-item dropdown dropdown-app">
                        <div class="dropdown-menu dropdown-menu-end p-0">
                            <div class="app-container p-2 my-2">

                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        @php
                            $notifications = App\Models\Notification::with('fromUser')
                                ->where('to', Auth::user()->id)
                                ->where('status', 'unread')
                                ->get();
                        @endphp
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                            data-bs-toggle="dropdown">
                            @if (count($notifications) > 0)
                                <span class="alert-count">{{ count($notifications) }}</span>
                            @endif
                            <i class='bx bx-bell'></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:;">
                                <div class="msg-header">
                                    <p class="msg-header-title">Notifications</p>
                                    @if (count($notifications) > 0)
                                        <p class="msg-header-badge">{{ count($notifications) }} New</p>
                                    @endif
                                </div>
                            </a>
                            <div class="header-notifications-list">
                                @foreach ($notifications as $notification)
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('uploads') }}/{{ $notification->fromUser->image }}"
                                                    class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="msg-name">{{ $notification->title }}<span
                                                        class="msg-time float-end">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </span></h6>
                                                <p class="msg-info">{{ $notification->message }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end">

                            <div class="header-message-list">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="user-box dropdown px-3">
                <a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret"
                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (Auth::user()->image != null && file_exists(public_path('uploads/' . Auth::user()->image)))
                        <img src="{{ asset('uploads') }}/{{ Auth::user()->image }}" class="user-img" alt="user avatar">
                    @else
                        <img src="{{ asset('uploads') }}/default.png" class="user-img" alt="user avatar">
                    @endif
                    <div class="user-info">
                        <p class="user-name mb-0">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                        <p class="designattion mb-0">{{ Auth::user()->user_type }}</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
                            <i class="bx bx-user fs-5"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center" href="javascript:;"><i
                                class="bx bx-cog fs-5"></i><span>Settings</span></a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('dashboard') }}">
                            <i class="bx bx-home-circle fs-5"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class='bx bx-log-out-circle'></i>
                            <span>Logout</span>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </nav>
    </div>
</header>
