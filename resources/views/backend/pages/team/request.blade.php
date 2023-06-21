@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">Team Requests</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Team Name</th>
                            <th>Request Send By</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teams as $key => $team)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $team->name }}</td>
                                <td>{{ $team->member1->first_name }} {{ $team->member1->last_name }}
                                    ({{ $team->member1->roll_no }})
                                </td>
                                <td>
                                    <a href="{{ route('team-management.request.accept', $team->id) }}"
                                        class="btn btn-success btn-sm">Accept</a>
                                    <a href="{{ route('team-management.request.reject', $team->id) }}"
                                        class="btn btn-danger btn-sm">Reject</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
