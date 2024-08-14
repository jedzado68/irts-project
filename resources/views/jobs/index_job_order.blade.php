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
        .btn.btn-primary {
            background-color: #339966;
            border-color: #2c6e49;
            font-size: 16px;
            position: relative;
            right: 742px;
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
    </style>
</head>
<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="header">
        <h5 style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);font-weight: bold;color:blue;">Section: Information Communication Technology Unit (RD/ARD)</h5>
    </div>
    <div class="shoulder">
        <img src="{{ asset('image/philippines_doh-logo.png') }}" alt="image 2" style="width: 140px; height: auto;">
        <h6 style="color: whitesmoke; text-align: center; font-size: 12px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">
            Republic of the Philippines<br>
            CENTRAL VISAYAS CENTER for HEALTH DEVELOPMENT<br>
            <strong style="font-size: 30px;">Department of Health</strong><br>
            <strong style="font-size: 22px; font-family: Arial, sans-serif; color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">ID Release Tracking System (IRTS)</strong>
        </h6>
        <img src="{{ asset('image/Bagong_Pilipinas.png') }}" alt="image 1" style="width: 113px; height: auto;">
    </div>
    <!-- navbar -->
    <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="#news">News</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#about">About</a></li>
    </ul>
    <center>
        <br><br><br><br>
    <!-- Trigger button for modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Add new Release
    </button>
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
                <th>Action X</th>
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
                          <!-- Edit Button -->
                   <button type="button" class="btn-primary edit-btn" data-toggle="modal" data-target="#editModal"
                   data-id="{{ $job->id }}"
                   data-firstname="{{ $job->firstname }}"
                   data-middlename="{{ $job->middlename }}"
                   data-lastname="{{ $job->lastname }}"
                   data-designation="{{ $job->designation }}"
                   data-section="{{ $job->section }}"
                   data-division="{{ $job->division }}"
                   data-employee-status="{{ $job->employee_status }}"
                   data-gender="{{ $job->gender }}"
                   data-user-id="{{ $job->user_id }}"
                   data-date="{{ $job->date }}">
                   <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                  </button>

                                
                             <button type="button" class="btn-danger" style="position: relative; left: 9px;php">
                            <i class="fas fa-trash-alt"></i>
                            </button>

                        </div> <!-- Closing button-container -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel" style="color:green;">Job Order Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Error Handling -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form Start -->
                    <form action="" method="POST" id="infoForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name:</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="middlename">Middle Name:</label>
                                <input type="text" class="form-control" id="middlename" name="middlename" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name:</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="designation">Designation:</label>
                                <input type="text" class="form-control" id="designation" name="designation" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="section">Section:</label>
                                <input type="text" class="form-control" id="section" name="section" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="division">Division:</label>
                                <input type="text" class="form-control" id="division" name="division" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="employee_status">Employee Status:</label>
                                <input type="text" class="form-control" id="employee_status" name="employee_status" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender">Gender:</label>
                                <select id="gender" name="gender" class="form-control select">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="user_id">User ID:</label>
                                <input type="text" class="form-control" id="user_id" name="user_id" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <button type="submit" class=" btn-primary"><i class="fa fa-paper-plane" aria-hidden="true" style="width:25px;"></i>Submit</button>
                                <button type="button" class="btn-dark" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true" style="width:23px;"></i>Close</button>
                            </div>
                        </div>
                        
                   
               
                    </form>
                </div>
               
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel"style="color:green;">Update Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Error Handling -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <!-- Form Start -->
                    <form id="editForm" action="" method="POST">
    @csrf
    @method('PUT')
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="edit_firstname">First Name:</label>
            <input type="text" class="form-control" id="edit_firstname" name="firstname" value="{{ old('firstname', $job->firstname) }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="edit_middlename">Middle Name:</label>
            <input type="text" class="form-control" id="edit_middlename" name="middlename" value="{{ old('middlename', $job->middlename) }}" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="edit_lastname">Last Name:</label>
            <input type="text" class="form-control" id="edit_lastname" name="lastname" value="{{ old('lastname', $job->lastname) }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="edit_designation">Designation:</label>
            <input type="text" class="form-control" id="edit_designation" name="designation" value="{{ old('designation', $job->designation) }}" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="edit_section">Section:</label>
            <input type="text" class="form-control" id="edit_section" name="section" value="{{ old('section', $job->section) }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="edit_division">Division:</label>
            <input type="text" class="form-control" id="edit_division" name="division" value="{{ old('division', $job->division) }}" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="edit_employee_status">Employee Status:</label>
            <input type="text" class="form-control" id="edit_employee_status" name="employee_status" value="{{ old('employee_status', $job->employee_status) }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="edit_gender">Gender:</label>
            <select id="edit_gender" name="gender" class="form-control select">
                <option value="Male" {{ old('gender', $job->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', $job->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="edit_user_id">User ID:</label>
            <input type="text" class="form-control" id="edit_user_id" name="user_id" value="{{ old('user_id', $job->user_id) }}" required>
        </div>
        <div class="form-group col-md-6">
            <label for="edit_date">Date:</label>
            <input type="date" class="form-control" id="edit_date" name="date" value="{{ old('date', $job->date) }}" required>
        </div>
    </div>
    
    <div class="form-row">
        <div class="form-group col-md-12">
            <button type="submit" class="btn-primary">
                <i class="fa fa-upload" aria-hidden="true" style="width: 23px;"></i>Update
            </button>
            <button type="button" class="btn-secondary" data-dismiss="modal">
                <i class="fa fa-times" aria-hidden="true" style="width: 22px;"></i>Close
            </button>
        </div>
    </div>
</form>

                </div>
              
            </div>
        </div>
    </div>
    </center>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    $(document).on('click', '.edit-btn', function() {
        var button = $(this);
        var jobId = button.data('id');
        
        // Update the form action URL dynamically
        var formAction = '{{ route("jobs.update", ":id") }}'.replace(':id', jobId);
        $('#editForm').attr('action', formAction);
        
        // Populate form fields with the data attributes
        $('#edit_firstname').val(button.data('firstname'));
        $('#edit_middlename').val(button.data('middlename'));
        $('#edit_lastname').val(button.data('lastname'));
        $('#edit_designation').val(button.data('designation'));
        $('#edit_section').val(button.data('section'));
        $('#edit_division').val(button.data('division'));
        $('#edit_employee_status').val(button.data('employee-status'));
        $('#edit_gender').val(button.data('gender'));
        $('#edit_user_id').val(button.data('user-id'));
        $('#edit_date').val(button.data('date'));
    });
</script>



</body>
</html>
