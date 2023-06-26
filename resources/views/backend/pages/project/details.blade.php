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
                        @if (auth()->user()->user_type == 'Teacher' && $project->status == 0)
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <td class="float-end">
                                        {{-- approve --}}
                                        <a class="btn btn-success btn-sm approve">Approve</a>
                                        {{-- reject --}}
                                        <a class="btn btn-danger btn-sm reject">Reject</a>
                                    </td>
                                </tr>
                            </tfoot>
                        @endif
                        @if (auth()->user()->user_type == 'Student' && $project->status == 2)
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <td class="float-end">
                                        {{-- edit & resubmit --}}
                                        <a href="{{ route('project.proposal.edit', $project->id) }}"
                                         class="btn btn-primary btn-sm">Edit &
                                            Resubmit</a>
                                    </td>
                                </tr>
                            </tfoot>
                        @endif
                    </table>
                @else
                    <h4 class="text-center">No Project Found</h4>
                @endif

                {{-- Modal for approve and reject --}}
                <div class="modal fade" id="approveRejectModal" tabindex="-1" style="display: none;" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create New Team</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    {{-- comment --}}
                                    <div class="col-md-12">
                                        <label for="comment" class="form-label">Write Comment</label>
                                        <textarea name="supervisor_comment" id="comment" cols="30" rows="5" class="form-control"></textarea>
                                    </div>

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
            </div>
        </div>
    </div>
@endsection
@push('js')
    {{-- approve --}}
    <script>
        $('.approve').click(function() {
            $('#approveRejectModal').modal('show');
            $('#approveRejectModal .modal-title').html('Approve Project');
            $('#approveRejectModal form').attr('action', "{{ route('project.approve', $project->id) }}");
        });
    </script>

    {{-- reject --}}
    <script>
        $('.reject').click(function() {
            $('#approveRejectModal').modal('show');
            $('#approveRejectModal .modal-title').html('Reject Project');
            $('#approveRejectModal form').attr('action', "{{ route('project.reject', $project->id) }}");
        });
    </script>
@endpush
