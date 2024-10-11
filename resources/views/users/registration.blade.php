<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #43cea2, #185a9d); /* Added gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
            position: relative;
            transition: 0.3s ease-in-out;
        }
        .container:hover {
            transform: translateY(-10px); /* Subtle hover effect */
        }
        .logo {
            margin-bottom: 25px;
        }
        .logo img {
            width: 100px;
            height: auto;
            border-radius: 50%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            font-size: 1.5rem;
            color: #333;
        }
        label {
            font-weight: bold;
            font-size: 0.9rem;
            color: #555;
            display: block;
            text-align: left;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 0.9rem;
            transition: 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #43cea2;
            box-shadow: 0 0 8px rgba(67, 206, 162, 0.2);
            outline: none;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        #sub {
            background-color: #43cea2;
            color: white;
            width: 100%;
            padding: 15px;
            border: none;
            cursor: pointer;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: bold;
            transition: 0.3s ease;
        }
        #sub:hover {
            background-color: #3a8e75;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .error-msg {
            color: red;
            margin-bottom: 15px;
            text-align: left;
        }
        .login-link {
            color: #185a9d;
            margin-top: 20px;
            font-weight: bold;
            display: inline-block;
            transition: 0.3s;
            text-decoration: none;
        }
        .login-link:hover {
            color: #43cea2;
        }

     
    </style>
</head>
<body>

<div class="container">
    <div class="logo">
        <img src="{{ asset('image/philippines_doh-logo.png')}}" alt="DOH Logo">
        <h3>DOH-CVCHD IRTS</h3>
    </div>

    <div class="error-msg">
        @if ($errors->has('email'))
            {{ $errors->first('email') }}
        @endif
        
    </div>

    <form action="{{route ('users.store') }}" method="POST">
        @csrf
       
        <h2>Registration Form</h2>

        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Enter your Name"/>

        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Enter your Email"/>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your Password"/>

        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm your Password"/>

        <label for="role">Select Role</label>
        <select name="role_user" class="form-control"id="role">
            <option value="1">Admin</option>
            <option value="0">Staff</option>
        </select>

        <label for="acceptTerms">
            <input type="checkbox" id="acceptTerms" name="acceptTerms" value="yes"> Accept Terms and Conditions
        </label>

        <input type="submit" id="sub">
    </form>
    <a href="" class="{{route('users.login')}}">Back to Login Form</a>
</div>

</body>
</html>
