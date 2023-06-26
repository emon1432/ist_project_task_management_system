@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">My Project Details</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($project)
                    <table class="table table-striped table-bordered">
                        <tbody>
                            <tr>
                                <th>Team Name</th>
                                <td>{{ $project->team->name }}</td>
                            </tr>
                            <tr>
                                <th>Member 1</th>
                                <td>{{ $project->team->member1->first_name }} {{ $project->team->member1->last_name }}
                                    ({{ $project->team->member1->roll_no }})
                                </td>
                            </tr>
                            <tr>
                                <th>Member 2</th>
                                <td>{{ $project->team->member2->first_name }} {{ $project->team->member2->last_name }}
                                    ({{ $project->team->member2->roll_no }})</td>
                            </tr>
                            <tr>
                                <th>Project Title</th>
                                <td>{{ $project->title }}</td>
                            </tr>
                            <tr>
                                <th>Project Topic</th>
                                <td>{{ $project->topic->name }}</td>
                            </tr>
                            <tr>
                                <th>Supervisor</th>
                                <td>{{ $project->supervisor->first_name }} {{ $project->supervisor->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Project Description</th>
                                <td>{{ $project->description }}</td>
                            </tr>
                            <tr>
                                <th>Project Document</th>
                                <td>
                                    <a href="{{ asset('storage/' . $project->document) }}" target="_blank"
                                        class="btn btn-primary btn-sm">View</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Project Status</th>
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
                            <tr>
                                <th>Supervisor Comment</th>
                                @if ($project->supervisor_comment == null)
                                    <td>No Comment</td>
                                @else
                                    <td>{{ $project->supervisor_comment }}</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                @else
                    <h4 class="text-center">No Project Found</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
