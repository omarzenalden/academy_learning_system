<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body>
<h2>Welcome, {{ $user->username }}</h2>
<p>use this verification code to reset your password:</p>
<p style="background-color: #3490dc; color: cornsilk">
    {{$code}}</p>
</body>
</html>
