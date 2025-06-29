<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body>
<h2>Welcome, {{ $user->name }}</h2>
<p>Click the button below to verify your email address:</p>
<a href="{{ $verificationUrl }}" style="background-color: #3490dc; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px;">Verify Email</a>
<p>If you did not register, no further action is required.</p>
</body>
</html>
