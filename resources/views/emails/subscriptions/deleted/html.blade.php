<!DOCTYPE html>
<html lang="en">
<head>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <p>
        Failed too many times payment for user <a href="https://admin.kanka.io/users/{{ $user->id }}">{{ $user->name }}</a> (#{{ $user->id }}) <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>.
    </p>
    <p>
        <strong>Subscribed since:</strong><br />
        {{ $user->subscription('kanka')->created_at->isoFormat('MMMM D, Y') }}
    </p>
</body>
</html>
