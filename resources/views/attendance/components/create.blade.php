@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary mt-3">
                        <div class="card-header content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title">Mark Attendance</h3>
                                </div>
                                <!-- <div class="col-sm-6 text-black">
                                    <ol class="breadcrumb float-sm-right">
                                        <li>
                                            <button onclick="window.history.back();" class="btn btn-light back-btn">Go Back</button>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="/">Home</a>
                                        </li>
                                    </ol>
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @include('common.alerts')
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-sm-12 text-end mt-1">
                                <!-- @include('attendance.components.filters') -->
                                <!-- <a href="{{route('attendance.createui')}}">
                                    <button class="btn btn-dark mx-2" type="button">
                                        <i class="fa fa-edit"></i> create 
                                    </button>
                                </a> -->
                                <div>
                                    <select id="subjects" class="form-select" style="width: 160px;" onchange="enrolledStudentsLoad()">
                                        <option value="0" {{ $selectedSubject == 0 ? 'selected' : '' }}>Select a subject</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{ $selectedSubject == $subject->id ? 'selected' : '' }}>
                                                {{ $subject->code }} - {{ $subject->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table id="enrolledStudents" class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th style="width:10px" id="id">Id</th>
                                        <th id="registrationNo">Registration No</th>
                                        <th id="name">Name</th>
                                        <th id="status">Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                            <button id="saveStatusChanges" class="btn btn-primary mt-2" onclick="saveStudentStatuses()">Save Changes</button>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@endsection

@section('scripts')
<script>
    function enrolledStudentsLoad() {
        let subjectId = $('#subjects').val();

        if (subjectId == 0) {
            $('#enrolledStudents tbody').html('<tr><td colspan="4">Please select a subject.</td></tr>');
            return;
        }

        $.ajax({
            url: `/enrollement/get-students?selectedSubject=${subjectId}`,
            type: 'GET',
            success: function(data) {
                let rows = '';
                if (data.length > 0) {
                    data.forEach((student, index) => {
                        rows += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${student.first_name} ${student.last_name}</td>
                                <td>${student.email}</td>
                                <td>
                                    <input type="checkbox" class="form-check-input attendance-toggle" 
                                        data-id="${student.id}" checked>
                                    <label>Present</label>
                                </td>
                            </tr>`;
                    });
                } else {
                    rows = '<tr><td colspan="4">No students enrolled.</td></tr>';
                }

                $('#enrolledStudents tbody').html(rows);
            },
            error: function() {
                $('#enrolledStudents tbody').html('<tr><td colspan="4">Error loading data.</td></tr>');
            }
        });
    }

    function saveStudentStatuses() {
        let updatedStatuses = [];

        $('.status-toggle').each(function() {
            updatedStatuses.push({
                id: $(this).data('id'),
                status: $(this).is(':checked') ? 'Present' : 'Absent'
            });
        });

        $.ajax({
            url: `/attendance/create`,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                students: updatedStatuses
            },
            success: function(response) {
                alert('Attendance saved successfully!');
            },
            error: function() {
                alert('Something went wrong while saving.');
            }
        });
    }
</script>

@endsection