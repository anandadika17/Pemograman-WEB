<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom Styles */
        body {
            background-image: url('https://source.unsplash.com/1920x1080/?news');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .btn-custom {
            margin-top: 20px;
        }
        .title {
            text-align: center;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="title">Selamat Datang di Aplikasi Berita</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <a href="formkategori.php" class="btn btn-primary btn-lg btn-block btn-custom">Kelola Kategori Berita</a>
                <a href="formberita.php" class="btn btn-success btn-lg btn-block btn-custom">Kelola Berita</a>
            </div>
        </div>
    </div>
</body>
</html>
