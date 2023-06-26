@extends('backend.layouts.master')
@section('content')
    <div class="card">
        <div class="card-header bg-dark">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="card-title text-light">Project Proposal</h4>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('project.proposal.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">
                    <label for="file" class="col-sm-2 col-form-label">Team Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="team_name" name="team_name"
                            placeholder="Enter Team Name" required readonly value="{{ $team->name }}">
                        <input type="hidden" name="team_id" value="{{ $team->id }}">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="file" class="col-sm-2 col-form-label">Member 1</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="member1" name="member1"
                            placeholder="Enter Member 1" required readonly
                            value="{{ $team->member1->first_name }} {{ $team->member1->last_name }} ({{ $team->member1->roll_no }})">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="file" class="col-sm-2 col-form-label">Member 2</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="member2" name="member2"
                            placeholder="Enter Member 2" required readonly
                            value="{{ $team->member2->first_name }} {{ $team->member2->last_name }} ({{ $team->member2->roll_no }})">
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="file" class="col-sm-2 col-form-label">Project Topics</label>
                    <div class="col-sm-10">
                        <select class="form-select mySelect2" name="project_topic_id" required>
                            <option selected disabled value="">Select Project Topic</option>
                            @foreach ($projectTopics as $projectTopic)
                                <option value="{{ $projectTopic->id }}">{{ $projectTopic->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="file" class="col-sm-2 col-form-label">Project Supervisor</label>
                    <div class="col-sm-10">
                        <select class="form-select mySelect2" name="supervisor_id" required>
                            <option value="" selected disabled>Select Project Supervisor</option>
                            @foreach ($supervisors as $supervisor)
                                <option value="{{ $supervisor->id }}">{{ $supervisor->first_name }}
                                    {{ $supervisor->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="title" class="col-sm-2 col-form-label">Project Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" placeholder="Enter Project Title"
                            required>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="description" class="col-sm-2 col-form-label">Project Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description" rows="3" placeholder="Enter Project Description" required></textarea>
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="file" class="col-sm-2 col-form-label">Attach File (Optional)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="attachment">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-end">Submit</button>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $('.mySelect2').select2({
                theme: 'bootstrap-5',
            });
        });
    </script>
@endpush
