<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
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
            left: 130px; /
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

/* Style the form container */
#infoForm {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style form rows */
.form-row {
    margin-bottom: 15px;
}

/* Style form groups */
.form-group {
    margin-bottom: 15px;
}

/* Style form labels */
.form-group label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

/* Style form controls */
.form-control {
    border-radius: 4px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 16px;
    box-sizing: border-box;
}

/* Style the select dropdown */
.form-control.select {
    padding: 10px;
}

/* Style the submit button */
.btn btn-primary {
    background-color: #339966;
    border-color: #2c6e49;
   
    font-size: 16px;
}

/* Style the close button */
.btn-secondary {
    background-color: #6c757d;
    border-color: #5a6268;
    
    font-size: 16px;
}

/* Adjust the modal footer button styles */
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
.search{
    position: relative; right: 8px;
}
.btn-info{
    position: relative;
    right: 10px;
}
#s2{
    position: relative;
    right: 10px;
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
<!-- Search form -->
<center>

    
<!-- Form modal -->
    <h2 class="text-center mt-5"></h2>
   
    <div class="container">
        <div class="row">
            <div class="col-12 left-align">
      
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#formModal" >
            <i class="fa-solid fa-plus" style="color:white;"style="font-weight: bold; font-size: 10px;"></i> Regular Release 
                </button> 
                <form action="{{ route('release.search') }}" method="GET">
        <input type="text" name="query" placeholder="Search..." class="search" value="{{ request()->input('query') }}" style="background-color:lightgray;width:570px; height:40px;">
        <button type="submit" id="s2"style="background-color:lightgreen;height:40px;width:100px;"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
    </form>
            </div>
        </div>
    </div><br><br>

   <!-- Table Data Display -->
    <div class="table-responsive">
        <table class="table table-bordered" style="wi">
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
    @foreach($releases as $release)
        <tr>
            <td style="font-weight: bold;">{{ $release->firstname }}</td>
            <td style="font-weight: bold;">{{ $release->middlename }}</td>
            <td style="font-weight: bold;">{{ $release->lastname }}</td>
            <td style="font-weight: bold;">{{ $release->designation }}</td>
            <td style="font-weight: bold;">{{ $release->section }}</td>
            <td style="font-weight: bold;">{{ $release->division }}</td>
            <td style="font-weight: bold;">{{ $release->employee_status }}</td>
            <td style="font-weight: bold;">{{ $release->gender }}</td>
            <td style="font-weight: bold;">{{ $release->user_id }}</td>
            <td style="font-weight: bold;">{{ $release->date }}</td>
            <td>
            <div class="button-container">
    <!-- Edit Button -->
    <button type="button" class="btn btn-success edit-btn" data-toggle="modal" data-target="#updateFormModal"
        data-id="{{ $release->id }}"
        data-firstname="{{ $release->firstname }}"
        data-middlename="{{ $release->middlename }}"
        data-lastname="{{ $release->lastname }}"
        data-designation="{{ $release->designation }}"
        data-section="{{ $release->section }}"
        data-division="{{ $release->division }}"
        data-employee_status="{{ $release->employee_status }}"
        data-gender="{{ $release->gender }}"
        data-date="{{ $release->date }}"
        data-user_id="{{ $release->user_id }}">
        <i class="fa-solid fa-pencil"></i>
    </button>

    <!-- Delete Form -->
    <form action="{{ route('releases.destroy', $release->id) }}" method="POST" 
          onsubmit="return confirm('Are you sure you want to delete this item?');" 
          class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fa-solid fa-trash-can"></i>
        </button>
    </form>
</div>

                 
                </div>
            </td>
        </tr>
    @endforeach
</tbody>
</table>
<div class="d-flex justify-content-center">
            {{ $releases->links() }}
        </div>
</div>
     
</center>
        



           


<!-- ID release record -->

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="#formModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-width" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel" style="color: #00ccff; font-weight: bold;">Regular Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    


            <div class="modal-body">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form id="infoForm" method="POST" action="{{ route('releases.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>First Name</label>
            <input type="text" class="form-control" name="firstname" placeholder="FirstName"  required>
        </div>
        <div class="form-group col-md-6">
            <label>Middle Name</label>
            <input type="text" class="form-control" name="middlename"  placeholder="MiddleName" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Last Name</label>
            <input type="text" class="form-control" name="lastname" placeholder="LastName" required>
        </div>
        <div class="form-group col-md-6">
            <label>Designation</label>
            <input type="text" class="form-control" name="designation" placeholder="Designation" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Section</label>
            <input type="text" class="form-control" name="section" placeholder="Section" required>
        </div>
        <div class="form-group col-md-6" id="dropdown-container">
            <label>Division</label>
            <select class="form-control" id="division" name="division" required>
                <option value="" disabled selected>Select Division</option>
                <option value="AR/ARD">RD/ARD</option>
                <option value="LHSD">LHSD</option>
                <option value="RLED">RLED</option>
                <option value="MSD">MSD</option>
            </select>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Employee Status</label>
            <input type="text" class="form-control" name="employee_status" placeholder="Employee Status" required>
        </div>
        <div class="form-group col-md-6">
            <label>Gender</label>
            <select class="form-control" id="gender" name="gender"  required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>

    <div class="form-row">
    <div class="form-group col-md-6">
        <label>Date</label>
        <input type="date" class="form-control" name="date" placeholder="Date"  required>
    </div>

    <div class="form-group col-md-6">
        <label>User ID</label>
        <input type="text" class="form-control" style="position-relative:flex"name="user_id" placeholder="User ID" required>
    </div>
    </div>

    <div class="form-row">
    <div class="col">
        <button type="submit" class="btn btn-primary" style="background-color: green; width: 150px; height: 40px;">Submit</button>
    </div>
    <div class="col text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 150px; height: 40px;">Close</button>
    </div>
</div>

   </form>

            </div>
        </div>
    </div>
</div>

<!-- Update Form -->
<div class="modal fade" id="updateFormModal" tabindex="-1" role="dialog" aria-labelledby="#formModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-width" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel" style="color:green;">Update Form </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="firstname" placeholder="FirstName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middlename" placeholder="MiddleName" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lastname" placeholder="LastName" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Designation</label>
                            <input type="text" class="form-control" name="designation" placeholder="Designation" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Section</label>
                            <input type="text" class="form-control" name="section" placeholder="Section" required>
                        </div>
                        <div class="form-group col-md-6" id="dropdown-container">
                            <label>Division</label>
                            <select class="form-control" id="division" name="division" required>
                                <option value="" disabled>Select Division</option>
                                <option value="AR/ARD">AR/ARD</option>
                                <option value="LHSD">LHSD</option>
                                <option value="RLED">RLED</option>
                                <option value="MSD">MSD</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Employee Status</label>
                            <input type="text" class="form-control" name="employee_status" placeholder="Employee Status" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="" disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Date</label>
                            <input type="date" class="form-control" name="date" placeholder="Date" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>User ID</label>
                            <input type="text" class="form-control" style="position-relative:flex" name="user_id" placeholder="User ID" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary" style="background-color:green; width: 150px; height: 40px;">Update</button>
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 150px; height: 40px;">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</form>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    $('#updateFormModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id = button.data('id');
        var firstname = button.data('firstname');
        var middlename = button.data('middlename');
        var lastname = button.data('lastname');
        var designation = button.data('designation');
        var section = button.data('section');
        var division = button.data('division');
        var employee_status = button.data('employee_status');
        var gender = button.data('gender');
        var date = button.data('date');
        var  user_id= button.data('user_id');
        var actionUrl = '/update/' + id;
        
        console.log('Action URL:', actionUrl);
        var modal = $(this);
        console.log(id);
        modal.find('form').attr('action', '/update/' + id); // Update the form action
        modal.find('input[name="firstname"]').val(firstname);
        modal.find('input[name="middlename"]').val(middlename);
        modal.find('input[name="lastname"]').val(lastname);
        modal.find('input[name="designation"]').val(designation);
        modal.find('input[name="section"]').val(section);
        modal.find('select[name="division"]').val(division);
        modal.find('input[name="employee_status"]').val(employee_status);
        modal.find('select[name="gender"]').val(gender);
        modal.find('input[name="date"]').val(date);
        modal.find('input[name="user_id"]').val(user_id);

       
    });
});
</script>

</body>
</html>
