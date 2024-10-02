<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .profile-container {
            background-color: grey;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px;
        }

        .profile-container img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .profile-container p {
            margin: 10px 0;
            padding: 10px;
            background-color: #e0e0e0;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <img src="/img/Profile icon.png" alt="Profile Image">
        <p>Nama : {{ $nama }}</p>
        <p>NPM : {{ $npm }}</p>
        <p>Kelas : {{ $kelas ?? 'Kelas tidak ditemukan'}}</p>
    </div>
</body>
</html>
