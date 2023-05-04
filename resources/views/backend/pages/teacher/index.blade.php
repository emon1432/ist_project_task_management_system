@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">Teachers List</h4>
                </div>
                <div class="col-md-6 text-end">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#teacherAddModal">
                        <i class="bx bx-plus"></i>
                        Add New Teacher
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $key => $teacher)
                            <tr class="text-center">
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @if ($teacher->image != null && file_exists(public_path('uploads/' . $teacher->image)))
                                        <img src="{{ asset('uploads') }}/{{ $teacher->image }}" alt="user image"
                                            class="rounded-circle" width="60px" height="60px">
                                    @else
                                        <img src="{{ asset('uploads/default.png') }}" alt="user image"
                                            class="rounded-circle" width="60px" height="60px">
                                    @endif
                                </td>
                                <td>{{ $teacher->first_name . ' ' . $teacher->last_name }}</td>
                                <td>{{ $teacher->email }}</td>
                                <td>{{ $teacher->phone }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>
                                    <a href="{{ route('teacher-management.show', $teacher->id) }}" class="btn btn-info btn-sm">
                                        <i class="bx bx-user"></i>
                                    </a>

                                    <a class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#teacherEditModal{{ $teacher->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <button onclick="deleteData({{ $teacher->id }})" type="button"
                                        class="btn btn-danger btn-sm {{ $teacher->id == auth()->user()->id ? 'disabled' : '' }}">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $teacher->id }}"
                                        action="{{ url('teacher-management/' . $teacher->id) }}" method="post"
                                        class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    {{-- Edit teacher Modal --}}
                                    <div class="modal fade" id="teacherEditModal{{ $teacher->id }}" tabindex="-1"
                                        style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit teacher</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <form class="row g-3"
                                                        action="{{ route('teacher-management.update', $teacher->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="col-md-6">
                                                            <label for="input25" class="form-label">First Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="First Name" name="first_name" required
                                                                    value="{{ $teacher->first_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="last_name" class="form-label">Last Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Last Name" name="last_name" required
                                                                    value="{{ $teacher->last_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="email" class="form-label">Email</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-envelope"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Email" name="email" required
                                                                    value="{{ $teacher->email }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-phone"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Phone" name="phone"
                                                                    value="{{ $teacher->phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="dob" class="form-label">Date of Birth</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-calendar"></i></span>
                                                                <input type="date" class="form-control"
                                                                    placeholder="Date of Birth" name="dob"
                                                                    value="{{ $teacher->dob }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="address" class="form-label">Address</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-map"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Address" name="address"
                                                                    value="{{ $teacher->address }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="image" class="form-label">New Image</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-image"></i></span>
                                                                <input type="file" class="form-control"
                                                                    placeholder="Image" name="image">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="old_image" class="form-label">Old Image</label>
                                                            <div class="input-group">
                                                                @if ($teacher->image != null && file_exists(public_path() . '/uploads/' . $teacher->image))
                                                                    <img src="{{ asset('uploads') }}/{{ $teacher->image ?? 'default.png' }}"
                                                                        alt="user image" class="rounded-circle"
                                                                        width="60px" height="60px">
                                                                @else
                                                                    <img src="{{ asset('uploads/default.png') }}"
                                                                        alt="user image" class="rounded-circle"
                                                                        width="60px" height="60px">
                                                                @endif
                                                                <input type="hidden" name="old_image"
                                                                    value="{{ $teacher->image }}">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Add New Teacher Modal --}}
        <div class="modal fade" id="teacherAddModal"
         tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New teacher</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('teacher-management.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="input25" class="form-label">First Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" placeholder="First Name"
                                        name="first_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" class="form-control" placeholder="Email" name="email"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-phone"></i></span>
                                    <input type="text" class="form-control" placeholder="Phone" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="input28" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                                    <input type="password" class="form-control" id="input28" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                                    <input type="date" class="form-control" placeholder="Date of Birth"
                                        name="dob">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-map"></i></span>
                                    <input type="text" class="form-control" placeholder="Address" name="address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label">Image</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-image"></i></span>
                                    <input type="file" class="form-control" placeholder="Image" name="image">
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
