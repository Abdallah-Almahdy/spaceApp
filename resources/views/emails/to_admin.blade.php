<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New User Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
            padding: 30px;
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        p {
            color: #555555;
            font-size: 15px;
            line-height: 1.6;
        }
        .details {
            background: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 15px;
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #28a745;
            color: #ffffff !important;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            margin-top: 20px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>New User Registered 🚀</h2>

        <p>Hello Admin,</p>
        <p>A new user has just registered in the system. Please review and confirm their registration:</p>

        <div class="details">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
        </div>

        <a href="{{ url('/api/admin/users/'.$user->id.'/confirm') }}" class="btn">
            Confirm User
        </a>

        <div class="footer">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
