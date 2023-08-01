@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">Project List</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Team Name</th>
                            <th>Member 1</th>
                            <th>Member 2</th>
                            <th>Project Title</th>
                            <th>Project Topic</th>
                            <th>Supervisor</th>
                            <th>Status</th>
                            @if (auth()->user()->user_type == 'Teacher')
                                <th>Task Create</th>
                                <th>Task List</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr class="text-center">
                                <td>{{ $project->team->name }}</td>
                                <td>{{ $project->team->member1->first_name }} {{ $project->team->member1->last_name }}
                                    ({{ $project->team->member1->roll_no }})
                                </td>
                                <td>{{ $project->team->member2->first_name }} {{ $project->team->member2->last_name }}
                                    ({{ $project->team->member2->roll_no }})</td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->topic->name }}</td>
                                <td>{{ $project->supervisor->first_name }} {{ $project->supervisor->last_name }}</td>
                                <td>
                                    @if ($project->status == 0)
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($project->status == 1)
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                                @if (auth()->user()->user_type == 'Teacher')
                                    <td>
                                        {{-- task assign modal --}}
                                        <a data-bs-toggle="modal" data-bs-target="#taskAssignModal{{ $project->id }}"
                                            class="btn btn-sm btn-primary"><i class="bx bx-task"></i></a>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('task.list', $project->id) }}" class="btn btn-sm btn-success"><i
                                                class="bx bx-list-ul"></i></a>
                                    </td>
                                @endif

                                {{-- task assign modal --}}
                                <div class="modal fade" id="taskAssignModal{{ $project->id }}" tabindex="-1"
                                    style="display: none;" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Create New Task</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('task.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">

                                                        <div class="col-md-12 mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" class="form-control" id="title"
                                                                name="title" placeholder="Enter Title" required>
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" required></textarea>
                                                        </div>

                                                        <div class="col-md-12 mb-3">
                                                            <label for="file" class="form-label">File(optional)</label>
                                                            <input type="file" class="form-control" id="file"
                                                                name="file" placeholder="Enter File">
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label for="start_at" class="form-label">Start At</label>
                                                            <input type="datetime-local" class="form-control" id="start_at"
                                                                value="{{ date('Y-d-m\TH:i', strtotime('+6 hour')) }}"
                                                                name="started_at" placeholder="Enter Start At" required>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label for="deadline" class="form-label">Deadline</label>
                                                            <input type="datetime-local" class="form-control" id="deadline"
                                                                name="ended_at" placeholder="Enter Deadline" required>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="project_id" value="{{ $project->id }}">
                                                    <input type="hidden" name="team_id" value="{{ $project->team->id }}">
                                                    <input type="hidden" name="supervisor_id"
                                                        value="{{ $project->supervisor->id }}">



                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
