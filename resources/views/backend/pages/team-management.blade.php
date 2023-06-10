@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">All Teams</h4>
                </div>
                <div class="col-md-6 text-end">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#teamAddModal">
                        <i class="bx bx-plus"></i>
                        Create New Team
                    </button>
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
                            <th>Member 1</th>
                            <th>Member 2</th>
                            <th>Status</th>
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
                                <td>{{ $team->member2->first_name }} {{ $team->member2->last_name }}
                                    ({{ $team->member2->roll_no }})</td>
                                <td>
                                    @if ($team->status == 0)
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif($team->status == 1)
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

        {{-- Add Modal --}}
        <div class="modal fade" id="teamAddModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('team-management.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="name" class="form-label">Team Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-book"></i></span>
                                    <input type="text" class="form-control" placeholder="Team Name" name="name"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                {{-- member 1 --}}
                                <label for="name" class="form-label">Member 1</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="member1"
                                        value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} ({{ Auth::user()->roll_no }})"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-12">
                                {{-- member 2 --}}
                                <label for="name" class="form-label">Member 2</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <select class="form-select" id="mySelect2" name="member2" required>
                                        <option value="" selected disabled>Select Member 2</option>
                                        @foreach ($students as $student)
                                            @if ($student->id != Auth::user()->id && ($student->team_member1 == null && $student->team_member1 == null))
                                                <option value="{{ $student->id }}">
                                                    {{ $student->first_name }} {{ $student->last_name }}
                                                    ({{ $student->roll_no }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {

            $('#mySelect2').select2({
                theme: 'bootstrap-5',
                dropdownParent: $('#teamAddModal')
            });
        });
    </script>
@endpush
