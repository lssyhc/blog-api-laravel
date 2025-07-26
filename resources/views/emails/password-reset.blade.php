<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Hello,</h2>
        <p>You receive this email because we receive a Reset Password request for your account.</p>
        <p>Please click the button below to reset your password:</p>
        <p style="text-align: center;">
            <a href="{{ $resetUrl }}" class="button">Reset Password</a>
        </p>
        <p>This password reset link will expire in 60 minutes.</p>
        <p>If you don't feel like asking for a password reset, just ignore this email.</p>
        <br>
        <p>Thank You,</p>
        <p>Tim {{ config('app.name') }}</p>
    </div>
</body>

</html>
