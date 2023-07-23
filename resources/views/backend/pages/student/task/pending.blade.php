@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">Pending Task List</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>#</th>
                            <th>Prject Title</th>
                            <th>Task Title</th>
                            <th>Assigned By</th>
                            <th>Assigned Time</th>
                            <th>Deadline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $task->project->title }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->supervisor->first_name }} {{ $task->supervisor->last_name }}</td>
                                <td>{{ Carbon\Carbon::parse($task->started_at)->format('d-m-Y h:i A') }}</td>
                                <td>{{ Carbon\Carbon::parse($task->ended_at)->format('d-m-Y h:i A') }}</td>
                                <td>
                                    <a href="javascript:;" data-bs-toggle="modal"
                                        data-bs-target="#taskShowModal{{ $task->id }}" class="btn btn-primary btn-sm"><i
                                            class="bx bx-show"></i></a>
                                </td>
                            </tr>
                            {{-- Show Task Modal --}}
                            <div class="modal fade" id="taskShowModal{{ $task->id }}" tabindex="-1"
                                style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Task Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <h6>Task Title</h6>
                                                    <p>{{ $task->title }}</p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <h6>Project Title</h6>
                                                    <p>{{ $task->project->title }}</p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <h6>Assigned By</h6>
                                                    <p>{{ $task->supervisor->first_name }}
                                                        {{ $task->supervisor->last_name }}</p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <h6>Status</h6>
                                                    @if ($task->status == 0)
                                                        <span class="badge rounded-pill bg-warning text-dark">Pending</span>
                                                    @elseif($task->status == 1)
                                                        <span class="badge rounded-pill bg-primary text-dark">In
                                                            Progress</span>
                                                    @elseif($task->status == 2)
                                                        <span
                                                            class="badge rounded-pill bg-success text-dark">Completed</span>
                                                    @elseif($task->status == 3)
                                                        <span class="badge rounded-pill bg-danger text-dark">Failed</span>
                                                    @elseif($task->status == 4)
                                                        <span class="badge rounded-pill bg-danger text-dark">Rejected</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <h6>Assigned Time</h6>
                                                    <p>{{ Carbon\Carbon::parse($task->started_at)->format('d-m-Y h:i A') }}
                                                    </p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <h6>Deadline</h6>
                                                    <p>{{ Carbon\Carbon::parse($task->ended_at)->format('d-m-Y h:i A') }}
                                                    </p>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <h6>Description</h6>
                                                    <p>{{ $task->description }}</p>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <h6>Attachment</h6>
                                                    @if ($task->attachment)
                                                        <a href="{{ asset('storage/files/' . $task->attachment) }}"
                                                            target="_blank" class="btn btn-primary btn-sm"><i
                                                                class="bx bx-download"></i> Download</a>
                                                    @else
                                                        <span class="badge rounded-pill bg-info text-dark">No
                                                            Attachment</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                    data-bs-dismiss="modal"><i class="bx bx-x d-block d-sm-none"></i><span
                                                        class="d-none d-sm-block">Close</span></button>
                                                <button type="submit" class="btn btn-primary ml-1"><i
                                                        class="bx bx-check d-block d-sm-none"></i><span
                                                        class="d-none d-sm-block">Save</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
@endsection
