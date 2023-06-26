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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
