<!DOCTYPE html>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CCTV Logs</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        #signaturePad {
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            height: 200px;
            cursor: crosshair;
        }

        table {
            width: 85%;
            margin: 30px auto;
            border-collapse: collapse;
            text-align: center;
            background-color: white;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: lightblue;
        }

        .modal-dialog {
            max-width: 400px;
            margin: 30px auto;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }
        }

        .pagination {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    @Include('jobs.home')
    <!-- Header Section -->
    <h1 style="background-color: lightgray; padding: 10px; font-weight: bold;"> 
        <span style="color:red;">C</span>
        <span style="color:orange;">C</span>
        <span style="color:yellow;">T</span>
        <span style="color:green;">V</span>
        <span style="color:blue;"> </span>
        <span style="color:indigo;">L</span>
        <span style="color:violet;">o</span>
        <span style="color:purple;">g</span>
        <span style="color:pink;">s</span>
    </h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Button to Open the Modal -->
    <div class="text-center">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#logModal">
            Create Log Entry
        </button>
    </div>

    <!-- Log Modal -->
    <div class="modal" id="logModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create Log Entry</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form action="{{ route('logs.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input type="date" id="date" name="date" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose:</label>
                            <select id="purpose" name="purpose" required class="form-control">
                                <option value=""></option>
                                <option value="login">DTR Login</option>
                                <option value="logout">DTR Logout</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="location">Location:</label>
                            <select id="location" name="location" required class="form-control">
                                <option value=""></option>
                                <option value="MSD Building">MSD Building</option>
                                <option value="Information Desk">Information Desk</option>
                                <option value="Exit gate">Exit Gate</option>
                                <option value="Main Entrance">Main Entrance</option>
                                <option value="Narra Hallway">Narra-HR</option>
                                <option value="Library Hallway">Library Hallway</option>
                                <option value="Library Pdoh">Library Pdoh</option>
                                <option value="Transport">Transport</option>

                                <option value="MSD Building">ICTU-BASE1</option>
                                <option value="Information Desk">ICTU-BASE2</option>
                                <option value="Exit gate">FHS Hallway</option>
                                <option value="Main Entrance">Behind Chapel</option>
                                <option value="Narra Hallway">MAIPP Hallway</option>
                                <option value="Library Hallway">RESU</option>
                                <option value="Library Pdoh">HEMS</option>
                                <option value="Transport">Female Dormitory</option>
                                <option value="Library Pdoh">Library Hallway</option>
                                <option value="Transport">Trash Area</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="complete_name">Complete Name:</label>
                            <input type="text" id="complete_name" name="complete_name" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="signature">Signature:</label>
                            <canvas id="signaturePad"></canvas>
                            <input type="hidden" id="signature" name="signature">
                            <button type="button" id="clearSignature" class="btn btn-secondary mt-2">Clear Signature</button>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Log Entries Section -->
    <h2>Log Entries</h2>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Purpose</th>
                <th>Location</th>
                <th>Complete Name</th>
                <th>Signature</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($logs as $log)
                <tr>
                    <td>{{ $log->date }}</td>
                    <td>{{ $log->purpose }}</td>
                    <td>{{ $log->location }}</td>
                    <td>{{ $log->complete_name }}</td>
                    <td><img src="{{ asset('signatures/' . $log->signature) }}" alt="Signature" style="width: 100px; height: auto;"></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Controls -->
    <div class="pagination">
        {{ $logs->links() }}
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const canvas = document.getElementById('signaturePad');
        const context = canvas.getContext('2d');
        const signatureInput = document.getElementById('signature');

        let drawing = false;

        $('#logModal').on('shown.bs.modal', function () {
            canvas.width = canvas.clientWidth;
            canvas.height = canvas.clientHeight;
        });

        canvas.addEventListener('mousedown', (e) => {
            drawing = true;
            context.beginPath();
            context.moveTo(e.offsetX, e.offsetY);
        });

        canvas.addEventListener('mousemove', (e) => {
            if (drawing) {
                context.lineTo(e.offsetX, e.offsetY);
                context.stroke();
            }
        });

        canvas.addEventListener('mouseup', () => {
            drawing = false;
            signatureInput.value = canvas.toDataURL();
        });

        canvas.addEventListener('mouseleave', () => {
            drawing = false;
        });

        document.getElementById('clearSignature').addEventListener('click', () => {
            context.clearRect(0, 0, canvas.width, canvas.height);
            signatureInput.value = '';
        });
    </script>
</body>
</html>
