<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #333;
        }

        .container {
            background-color: #ffffff;
            padding: 50px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 350px;
            width: 100%;
            text-align: center;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            width: 100px;
            height: auto;
        }

        h3 {
            margin: 20px 0;
            font-size: 1.8rem;
            color: #333;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 8px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 50px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #6c63ff;
            outline: none;
        }

        input[type="submit"] {
            background-color: #6c63ff;
            color: #fff;
            width: 100%;
            padding: 15px;
            border: none;
            cursor: pointer;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #5751d0;
        }

        .alert {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }

        .registration-link {
            display: inline-block;
            margin-top: 20px;
            color: #6c63ff;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .registration-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="logo">
            <img src="{{ asset('image/philippines_doh-logo.png') }}" alt="DOH Logo">
        </div>
        <h3>IRTS/CCTV LOGS</h3>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" 
                       placeholder="Enter your Email" 
                       value="{{ old('email') }}" required />
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" 
                       placeholder="Enter your Password" required />
            </div>

            <div class="form-group">
                <input type="submit" value="Login">
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a href="{{ route('users.registration') }}" class="registration-link">Go to Registration Form</a>
        </form>
    </div>

</body>
</html>
