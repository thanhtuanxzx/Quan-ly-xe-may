<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
</head>
<body>
    <h1>Hello, {{ $ho_ten }}!</h1> <!-- Chào người dùng -->
    <p>We received a request to reset your password. If you did not request a password reset, please ignore this email.</p>
    <p>Click the link below to reset your password:</p>
    <a href="{{ $resetLink }}">Reset Password</a> <!-- Hiển thị link reset -->
    <p>If you encounter any issues, feel free to contact our support team.</p>

    <p>Best regards, <br> Your Company Name</p>
</body>
</html>