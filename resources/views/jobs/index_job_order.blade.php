<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .modal-content {
            padding: 30px;
        }
        .form-row {
            margin-bottom: 10px;
        }
        .header {
            background-color: lightblue;
            width: 100%;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .shoulder {
            background-color: #339966;
            width: 100%;
            height: 110px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .shoulder h6, .shoulder h3 {
            margin: 0;
            padding: 0;
        }
        .table {
            border-collapse: collapse;
            font-size: 12px;
            width: 85%;
        }
        th, td {
            padding: 5px;
            margin: 0;
        }
        .left-align {
            display: flex;
            justify-content: flex-start;
            position: absolute;
            left: 130px;
        }
        .Thead {
            background-color: lightgray;
            font-size: 14px;
        }
        .form-control {
            margin-bottom: 20px;
        }
        .dropdown-menu {
            max-height: 600px;
            overflow-y: auto;
        }
        .Thead {
            font-size: 18px;
            color: black;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }
        li {
            float: left;
        }
        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        li a:hover:not(.active) {
            background-color: #111;
        }
        .active {
            background-color: #04AA6D;
        }
        #infoForm {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-row {
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .form-control.select {
            padding: 10px;
        }
        .btn-primary {
            background-color: #339966;
            font-size: 15px;
            position: relative;
            right: 700px;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #5a6268;
            font-size: 16px;
        }
        .modal-footer {
            margin-top: 20px;
        }
        .button-container {
            display: flex;
            align-items: center;
        }
        .button-container .btn,
        .button-container form {
            margin-right: 5px;
        }
        .search {
            position: relative;
            right: 698px;
        }
        #s2 {
            position: relative;
            right: 700px;
        } 
        .btn-warning{
            position: relative; right: 700px;
        }
        .container{
            position: relative; left: 350px;
        }
    </style>
</head>
<body>
    @Include('jobs.home')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <br><br>

    <center>
    <div class="container">
        <div class="row">
            <div class="col-12 left-align">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jobModal">
    <i class="fa-solid fa-plus" style="color:white;"style="font-weight: bold; font-size: 10px;"> </i> Job Order Release
        </button>

     <form action="{{ route('release.search') }}" method="GET" style="display: flex; align-items: center;">
        <input type="text" name="query" placeholder="Search..." class="search" value="{{ request()->input('query') }}" style="background-color: lightgray; width: 560px; height: 40px; margin-right: 5px;">
        <button type="submit" id="s2" style="background-color: lightgreen; height: 40px; width: 90px;">
        <i class="fa-solid fa-magnifying-glass"></i> Search
        </button>
    </form>
    

          </div>
        </div>
    </div>

<br><br>


        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="Thead">
                    <tr>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Designation</th>
                        <th>Section</th>
                        <th>Division</th>
                        <th>Employee Status</th>
                        <th>Gender</th>
                        <th>User ID</th>
                        <th>Birth Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="infoTableBody">
                    @foreach($jobs as $job)
                    <tr>
                        <td style="font-weight: bold;">{{ $job->firstname }}</td>
                        <td style="font-weight: bold;">{{ $job->middlename }}</td>
                        <td style="font-weight: bold;">{{ $job->lastname }}</td>
                        <td style="font-weight: bold;">{{ $job->designation }}</td>
                        <td style="font-weight: bold;">{{ $job->section }}</td>
                        <td style="font-weight: bold;">{{ $job->division }}</td>
                        <td style="font-weight: bold;">{{ $job->employee_status }}</td>
                        <td style="font-weight: bold;">{{ $job->gender }}</td>
                        <td style="font-weight: bold;">{{ $job->user_id }}</td>
                        <td style="font-weight: bold;">{{ $job->date }}</td>
                        <td>
                            <div class="button-container">
                                <!-- Edit Button -->
                                <button type="button" class="btn-success edit-btn" data-toggle="modal" data-target="#updatejobModal" style="width: 30px;"
                        data-id="{{ $job->id }}"
                        data-firstname="{{ $job->firstname }}"
                        data-middlename="{{ $job->middlename }}"
                        data-lastname="{{ $job->lastname }}"
                        data-designation="{{ $job->designation }}"
                        data-section="{{ $job->section }}"
                        data-division="{{ $job->division }}"
                        data-status="{{ $job->employee_status }}"
                        data-gender="{{ $job->gender }}"
                        data-userid="{{ $job->user_id }}"
                        data-birthdate="{{ $job->date }}">
                        <i class="fa-regular fa-pen-to-square"></i>


                    </button>
                                <!-- Delete Form -->
                                <form action="" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-danger" style="position: relative; left: 23px;" onclick="return confirm('Are you sure you want to delete this job?');"><i class="fa-solid fa-trash-arrow-up"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </center>

    <!-- Add/Edit Job Modal -->
    <div class="modal fade" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="jobModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="jobModalLabel">JO Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="jobForm" action="{{ route('job.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="jobId" name="job_id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="middlename">Middle Name</label>
                                <input type="text" class="form-control" id="middlename" name="middlename">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="section">Section</label>
                                <input type="text" class="form-control" id="section" name="section" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="division">Division</label>
                                <input type="text" class="form-control" id="division" name="division" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="employee_status">Employee Status</label>
                               
                                <select id="gender" name="gender" class="form-control" style="width: 100%; min-width: 200px;" required>
                                <option value="" disabled selected></option>
                                <option value="Rergular ">Regular Employee</option>
                                <option value="job Order">Job Order</option>
                            </select>
                            </div>
                            <div class="form-group col-md-6">
    <label for="gender">Gender / Select Gender</label>
    <select id="gender" name="gender" class="form-control" style="width: 100%; min-width: 200px;" required>
        <option value="" disabled selected></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
</div>



                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_id">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Birth Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Release</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- form for update -->
    <div class="modal fade" id="updatejobModal" tabindex="-1" role="dialog" aria-labelledby="jobModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatejobModalLabel">JO Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="jobForm" action="{{ route('job.update', $job->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="jobId" name="job_id">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" value="$"required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="middlename">Middle Name</label>
                                <input type="text" class="form-control" id="middlename" name="middlename">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="designation">Designation</label>
                                <input type="text" class="form-control" id="designation" name="designation" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="section">Section</label>
                                <input type="text" class="form-control" id="section" name="section" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="division">Division</label>
                                <input type="text" class="form-control" id="division" name="division" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="employee_status">Employee Status</label>
                                <input type="text" class="form-control" id="employee_status" name="employee_status" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_id">User ID</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Birth Date</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save Release</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
       $('#jobModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var modal = $(this);
    var jobId = button.data('id');
    var gender = button.data('gender');
    
    // Adjust gender value to match case of options
    if (gender) {
        gender = gender.charAt(0).toUpperCase() + gender.slice(1).toLowerCase();
    }

    if (jobId) {
        modal.find('.modal-title').text('Edit Release');
        modal.find('#jobForm').attr('action', '/jobs/' + jobId + '/update');
        modal.find('#jobForm').append('<input type="hidden" name="_method" value="PUT">');
        modal.find('#jobId').val(jobId);
        modal.find('#firstname').val(button.data('firstname'));
        modal.find('#middlename').val(button.data('middlename'));
        modal.find('#lastname').val(button.data('lastname'));
        modal.find('#designation').val(button.data('designation'));
        modal.find('#section').val(button.data('section'));
        modal.find('#division').val(button.data('division'));
        modal.find('#employee_status').val(button.data('status'));
        modal.find('#gender').val(gender);  // Set the selected value
        modal.find('#user_id').val(button.data('userid'));
        modal.find('#date').val(button.data('birthdate'));
    } else {
        modal.find('.modal-title').text('JO Employee');
        modal.find('#jobForm').attr('action', '{{ route('job.store') }}');
        modal.find('#jobForm').find('input[name="_method"]').remove();
        modal.find('#jobId').val('');
        modal.find('#jobForm')[0].reset();
    }
});

    </script>
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$('#updatejobModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var modal = $(this);

    // Extract data attributes
    var jobId = button.data('id');
    var firstname = button.data('firstname');
    var middlename = button.data('middlename');
    var lastname = button.data('lastname');
    var designation = button.data('designation');
    var section = button.data('section');
    var division = button.data('division');
    var status = button.data('status');
    var gender = button.data('gender');
    var userid = button.data('userid');
    var birthdate = button.data('birthdate');

    // Populate modal fields
    modal.find('#jobId').val(jobId);
    modal.find('#firstname').val(firstname);
    modal.find('#middlename').val(middlename);
    modal.find('#lastname').val(lastname);
    modal.find('#designation').val(designation);
    modal.find('#section').val(section);
    modal.find('#division').val(division);
    modal.find('#employee_status').val(status);
    modal.find('#gender').val(gender);
    modal.find('#user_id').val(userid);
    modal.find('#date').val(birthdate);

    // Update the form action URL
    modal.find('form').attr('action', '/jobs/' + jobId);
});
</script>


</body>
</html>
