<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets') }}/images/ist_logo_mini.gif" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">IST</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        {{-- Dashboard --}}
        <li>
            <a href="{{ route('dashboard') }}">
                <div class="parent-icon">
                    <i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @if (auth()->user()->user_type == 'admin')
            {{-- Admin list --}}
            <li>
                <a href="{{ route('admin-management.index') }}">
                    <div class="parent-icon">
                        <i class='bx bx-user-circle'></i>
                    </div>
                    <div class="menu-title">Admin List</div>
                </a>
            </li>

            {{-- Teacher List --}}
            <li>
                <a href="{{ route('teacher-management.index') }}">
                    <div class="parent-icon">
                        <i class='bx bx-user-circle'></i>
                    </div>
                    <div class="menu-title">Teacher List</div>
                </a>
            </li>

            {{-- Student List --}}
            <li>
                <a href="{{ route('student-management.index') }}">
                    <div class="parent-icon">
                        <i class="bx bx-user-circle"></i>
                    </div>
                    <div class="menu-title">Student List</div>
                </a>
            </li>

            {{-- Project Topics --}}
            <li>
                <a href="{{ route('project-topic.index') }}">
                    <div class="parent-icon">
                        <i class="bx bx-book"></i>
                    </div>
                    <div class="menu-title">Project Topics</div>
                </a>
            </li>
        @elseif(auth()->user()->user_type == 'Student')
            {{-- Create Team --}}
            <li>
                <a href="{{ route('team-management.index') }}">
                    <div class="parent-icon">
                        <i class="bx bx-group"></i>
                    </div>
                    <div class="menu-title">Team</div>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-map-alt"></i>
                    </div>
                    <div class="menu-title">Maps</div>
                </a>
                <ul>
                    <li> <a href="map-google-maps.html"><i class='bx bx-radio-circle'></i>Google Maps</a>
                    </li>
                    <li> <a href="map-vector-maps.html"><i class='bx bx-radio-circle'></i>Vector Maps</a>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
    <!--end navigation-->
</div>
