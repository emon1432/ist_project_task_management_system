@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">Student List</h4>
                </div>
                <div class="col-md-6 text-end">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#studentAddModal">
                        <i class="bx bx-plus"></i>
                        Add New Student
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Roll</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Registration</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $key => $student)
                            <tr class="text-center">
                                <td>{{ $student->roll_no }}</td>
                                <td>
                                    @if ($student->image != null && file_exists(public_path('uploads/' . $student->image)))
                                        <img src="{{ asset('uploads') }}/{{ $student->image }}" alt="user image"
                                            class="rounded-circle" width="60px" height="60px">
                                    @else
                                        <img src="{{ asset('uploads/default.png') }}" alt="user image"
                                            class="rounded-circle" width="60px" height="60px">
                                    @endif
                                </td>
                                <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                                <td>{{ $student->registration_no }}</td>
                                <td>{{ $student->department }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->address }}</td>
                                <td>
                                    <a href="{{ route('student-management.show', $student->id) }}"
                                        class="btn btn-info btn-sm">
                                        <i class="bx bx-user"></i>
                                    </a>

                                    <a class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#studentEditModal{{ $student->id }}">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <button onclick="deleteData({{ $student->id }})" type="button"
                                        class="btn btn-danger btn-sm {{ $student->id == auth()->user()->id ? 'disabled' : '' }}">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $student->id }}"
                                        action="{{ url('student-management/' . $student->id) }}" method="post"
                                        class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                    </form>

                                    {{-- Edit student Modal --}}
                                    <div class="modal fade" id="studentEditModal{{ $student->id }}" tabindex="-1"
                                        style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit student</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <form class="row g-3"
                                                        action="{{ route('student-management.update', $student->id) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="col-md-6">
                                                            <label for="first_name" class="form-label">First Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="First Name" name="first_name" required
                                                                    value="{{ $student->first_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="last_name" class="form-label">Last Name</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-user"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Last Name" name="last_name" required
                                                                    value="{{ $student->last_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="email" class="form-label">Email</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-envelope"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Email" name="email" required
                                                                    value="{{ $student->email }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-phone"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Phone" name="phone"
                                                                    value="{{ $student->phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="department" class="form-label">Department</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-building-house"></i></span>
                                                                <select class="form-select" name="department" required>
                                                                    <option selected disabled value="">Choose...
                                                                    </option>
                                                                    <option value="CSE"
                                                                        {{ $student->department == 'CSE' ? 'selected' : '' }}>
                                                                        CSE</option>
                                                                    <option value="EEE"
                                                                        {{ $student->department == 'EEE' ? 'selected' : '' }}>
                                                                        EEE</option>
                                                                    <option value="BBA"
                                                                        {{ $student->department == 'BBA' ? 'selected' : '' }}>
                                                                        BBA</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="roll_no" class="form-label">Roll</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-key"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Roll" name="roll_no"
                                                                    value="{{ $student->roll_no }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="registration_no"
                                                                class="form-label">Registration</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-key"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Registration" name="registration_no"
                                                                    value="{{ $student->registration_no }}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="dob" class="form-label">Date of Birth</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-calendar"></i></span>
                                                                <input type="date" class="form-control"
                                                                    placeholder="Date of Birth" name="dob"
                                                                    value="{{ $student->dob }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="address" class="form-label">Address</label>
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="bx bx-map"></i></span>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Address" name="address"
                                                                    value="{{ $student->address }}">
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
                                                                @if ($student->image != null && file_exists(public_path() . '/uploads/' . $student->image))
                                                                    <img src="{{ asset('uploads') }}/{{ $student->image ?? 'default.png' }}"
                                                                        alt="user image" class="rounded-circle"
                                                                        width="60px" height="60px">
                                                                @else
                                                                    <img src="{{ asset('uploads/default.png') }}"
                                                                        alt="user image" class="rounded-circle"
                                                                        width="60px" height="60px">
                                                                @endif
                                                                <input type="hidden" name="old_image"
                                                                    value="{{ $student->image }}">
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

        {{-- Add New Student Modal --}}
        <div class="modal fade" id="studentAddModal" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3" action="{{ route('student-management.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
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
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                                    <input type="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="department" class="form-label">Department</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-building-house"></i></span>
                                    <select class="form-select" name="department" required>
                                        <option value="CSE" selected>CSE</option>
                                        <option value="EEE">EEE</option>
                                        <option value="BBA">BBA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="roll_no" class="form-label">Roll</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-key"></i></span>
                                    <input type="text" class="form-control" placeholder="Roll" name="roll_no">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="registration_no" class="form-label">Registration</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-key"></i></span>
                                    <input type="text" class="form-control" placeholder="Registration"
                                        name="registration_no" required>
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
                                <label for="image" class="form-label">Image</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-image"></i></span>
                                    <input type="file" class="form-control" placeholder="Image" name="image">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="address" class="form-label">Address</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bx bx-map"></i></span>
                                    <input type="text" class="form-control" placeholder="Address" name="address">
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
