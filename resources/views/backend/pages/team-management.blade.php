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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($projectTopics as $key => $projectTopic)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $projectTopic->name }}</td>
                                <td>{{ $projectTopic->description }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#projectTopicEditModal{{ $projectTopic->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <button onclick="deleteData({{ $projectTopic->id }})" type="button"
                                        class="btn btn-danger btn-sm">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $projectTopic->id }}"
                                        action="{{ url('project-topic/' . $projectTopic->id) }}" method="post"
                                        class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    <div class="modal fade" id="projectTopicEditModal{{ $projectTopic->id }}" tabindex="-1"
                                        style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Project Topic</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <form class="row g-3"
                                                        action="{{ route('project-topic.update', $projectTopic->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="col-md-12">
                                                            <label for="name" class="form-label">Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-book"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Name" name="name"
                                                                    value="{{ $projectTopic->name }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="description" class="form-label">Description</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-book"></i></span>
                                                                <textarea type="text" class="form-control" placeholder="Description" name="description" required>{{ $projectTopic->description }}</textarea>
                                                            </div>
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
                                </td>

                            </tr>
                        @endforeach --}}
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
                                {{-- member 1 --}}
                                <label for="name" class="form-label">Member 1</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" name="member1"
                                        value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }} ({{ Auth::user()->roll_no }})"
                                        readonly>
                                </div>
                                {{-- member 2 --}}
                                <label for="name" class="form-label">Member 2</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <select class="form-select" name="member2" required>
                                        <option value="" selected disabled>Select Member 2</option>
                                        @foreach ($students as $student)
                                            @if ($student->id != Auth::user()->id)
                                                <option value="{{ $student->id }}">
                                                    {{ $student->first_name }} {{ $student->last_name }}
                                                    ({{ $student->roll_no }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
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
{{-- @push('js')
    <script>
        $('#example').dataTable({
            "columnDefs": [{
                "width": "20%",
                "targets": 3
            }]
        });
    </script>
@endpush --}}
