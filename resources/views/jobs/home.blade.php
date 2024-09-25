<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
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
    </style>
</head>
<body style="background-color: lightblue;">
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
        <li><a href="{{ route('jobs.home') }}">Home</a></li>
        <li><a href="{{ route('job.index_job_order') }}">JO Form</a></li>
        <li><a href="{{ route('releases.index_regular') }}">Regular Form</a></li>
        <li><a href="#about">Log out</a></li>
    </ul>
</body>
</html>