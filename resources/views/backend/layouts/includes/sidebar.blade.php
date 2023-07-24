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

        @if (auth()->user()->user_type == 'Admin')
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

            {{-- Team List --}}
            <li>
                <a href="{{ route('team-management.index') }}">
                    <div class="parent-icon">
                        <i class="bx bx-group"></i>
                    </div>
                    <div class="menu-title">Team List</div>
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

            <li>
                <a href="{{ route('project.index') }}">
                    <div class="parent-icon">
                        <i class="bx bx-book"></i>
                    </div>
                    <div class="menu-title">Project List</div>
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
            @php
                $team = \App\Models\Team::where('member_2', auth()->user()->id)
                    ->where('status', 0)
                    ->get();
            @endphp
            @if ($team->count() > 0)
                <li>
                    <a href="{{ route('team-management.request') }}">
                        <div class="parent-icon">
                            <i class="bx bx-group"></i>
                        </div>
                        <div class="menu-title">Team Request</div>
                    </a>
                </li>
            @endif
            {{-- Project Proposal --}}
            @if (auth()->user()->team->status)
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-group"></i>
                        </div>
                        <div class="menu-title">Project</div>
                    </a>
                    <ul>
                        @php
                            $project = \App\Models\Project::where('team_id', auth()->user()->team->id)->first();
                        @endphp
                        @if (!$project)
                            <li>
                                <a href="{{ route('project.proposal') }}">
                                    <i class='bx bx-radio-circle'></i>
                                    Project Proposal
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('project.details', $project->id) }}">
                                    <i class='bx bx-radio-circle'></i>
                                    My Project Details
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ route('project.index') }}">
                                <i class='bx bx-radio-circle'></i>
                                Project List
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon"><i class="bx bx-task"></i>
                        </div>
                        <div class="menu-title">Tasks</div>
                    </a>
                    <ul>
                        @if ($project)
                            <li>
                                <a href="{{ route('student.task.pending', $project->id) }}">
                                    <i class='bx bx-radio-circle'></i>
                                    Pending
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('student.task.in-progress', $project->id) }}">
                                    <i class='bx bx-radio-circle'></i>
                                    In Progress
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('student.task.approved', $project->id) }}">
                                    <i class='bx bx-radio-circle'></i>
                                    Approved
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{ route('student.task.rejected', $project->id) }}">
                                    <i class='bx bx-radio-circle'></i>
                                    Rejected
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('student.task.failed', $project->id) }}">
                                    <i class='bx bx-radio-circle'></i>
                                    Failed
                                </a>
                            </li> --}}
                        @endif
                    </ul>
                </li>
            @endif
        @elseif(auth()->user()->user_type == 'Teacher')
            @php
                $pendingProject = \App\Models\Project::where('supervisor_id', auth()->user()->id)
                    ->where('status', 0)
                    ->get();
                $approvedProject = \App\Models\Project::where('supervisor_id', auth()->user()->id)
                    ->where('status', 1)
                    ->get();
            @endphp
            <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="bx bx-group"></i>
                    </div>
                    <div class="menu-title">Project</div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('project.pending') }}">
                            <i class='bx bx-radio-circle'></i>
                            Pending Project
                            @if ($pendingProject->count() > 0)
                                <span
                                    class="badge rounded-pill bg-danger ms-auto">{{ $pendingProject->count() }}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('project.supervisor.list') }}">
                            <i class='bx bx-radio-circle'></i>
                            Project List
                            @if ($approvedProject->count() > 0)
                                <span
                                    class="badge rounded-pill bg-success ms-auto">{{ $approvedProject->count() }}</span>
                            @endif

                        </a>
                    </li>

                </ul>
            </li>
        @endif
    </ul>
    <!--end navigation-->
</div>
