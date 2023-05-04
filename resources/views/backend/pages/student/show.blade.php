@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">Student Details</h4>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('student-management.index') }}" class="btn btn-sm btn-success">All Student</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                @if ($student->image != null && file_exists(public_path() . '/uploads/' . $student->image))
                                    <img src="{{ asset('uploads/' . $student->image) }}" alt="user"
                                        class="rounded-circle" width="170" height="170">
                                @else
                                    <img src="{{ asset('uploads/default.png') }}" alt="user" class="rounded-circle"
                                        width="170" height="170">
                                @endif

                                <h4 class="card-title mt-10">{{ $student->first_name . ' ' . $student->last_name }}</h4>
                                <h6 class="card-text">{{ $student->user_name }}</h6>
                                {{-- status & message --}}
                                <button class="btn btn-sm btn-primary mt-10"> {{ $student->user_type }}</button>

                            </div>
                        </div>
                        <div>
                            <hr>
                        </div>
                        <div class="card-body">
                            <small class="text-muted d-block pt-10">Email address </small>
                            <h6>{{ $student->email }}</h6>
                            <small class="text-muted d-block pt-10">Phone</small>
                            <h6>{{ $student->phone }}</h6>
                            <small class="text-muted d-block pt-10">Address</small>
                            <h6>{{ $student->address }}</h6>
                            <small class="text-muted d-block pt-10">Social Profile</small>
                            <br>
                            {{-- facebook icon  --}}
                            <a href="#" class="font-22 text-primary"><i class="lni lni-facebook-original"></i></a>
                            {{-- twitter icon  --}}
                            <a href="#" class="font-22 text-info"><i class="lni lni-twitter-original"></i></a>
                            {{-- instagram icon  --}}
                            <a href="#" class="font-22 text-danger"><i class="lni lni-instagram-original"></i></a>
                            {{-- youtube icon --}}
                            <a href="#" class="font-22 text-danger"><i class="lni lni-youtube"></i></a>
                            {{-- whatsapp icon --}}
                            <a href="#" class="font-22 text-success"><i class="lni lni-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h4 class="card-title">User Information</h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $student->first_name . ' ' . $student->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Roll</td>
                                            <td>{{ $student->roll_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Registration</td>
                                            <td>{{ $student->registration_no }}</td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td>{{ $student->department }}</td>
                                        </tr>
                                        <tr>
                                            <td></i> Email </td>
                                            <td>{{ $student->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $student->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $student->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>{{ $student->dob }}</td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>{{ $student->user_type }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
