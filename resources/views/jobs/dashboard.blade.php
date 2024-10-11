<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Alignment</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .user-view-card {
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 20px; /* Space below cards */
            margin-top: 80px;
        }
    </style>
</head>
<body>
   @Include('jobs.home')

    <div class="container">
        <div class="row"> <!-- Add a row to wrap the columns -->
            <div class="col-md-4">  
                <div class="user-view-card" style="background-color: lightyellow;">
                    <h3>Total Users Viewed CCTV Logs</h3>
                    <p id="userViewCount">5</p>
                </div>
            </div>
            <div class="col-md-4"> 
                <div class="user-view-card" style="background-color: lightgreen;">
                    <h3>Total Users Job Order Personnel</h3>
                    <p id="userViewCount">10</p>
                </div>
            </div>
            <div class="col-md-4"> 
                <div class="user-view-card" style="background-color: lightblue;">
                    <h3>Total Users Regular Personnel</h3>
                    <p id="userViewCount">15</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
