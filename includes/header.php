<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/images/logo.png" type="image/x-icon">
    li
    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: Arial, sans-serif;
        }
        .btn-dark {
            background-color: #000;
            border-color: #000;
        }
        .btn-dark:hover {
            background-color: #333;
        }
        .card {
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        .navbar {
            background-color: #000;
          
            
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
            min-height: 70px;
        }
     
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar fixed-top px-3">
        <a class="navbar-brand" href="index.php">Browse Latest Photos</a>
        <a class="navbar-brand">A Simple Photo Gallery Application </a>
        <a class="btn btn-light" href="upload.php">Upload</a>
    </nav>
    <!-- Container Start -->
    <div class="container mt-4">
