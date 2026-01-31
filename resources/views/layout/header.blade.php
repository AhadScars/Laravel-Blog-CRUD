<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Blogger Application</title>

    <style>
        body {
            background-color: #f5f5f5;
            color: #222;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e5e5e5;
        }

        .navbar-brand,
        .nav-link {
            color: #222 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #555 !important;
        }

        .table {
            background-color: #ffffff;
        }

        .table thead {
            border-bottom: 1px solid #e5e5e5;
        }

        .table th,
        .table td {
            padding: 14px;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #fafafa;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #e5e5e5;
            border-radius: 6px;
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #dcdcdc;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #999;
        }

        .btn-primary {
            background-color: #222;
            border: none;
            padding: 6px 16px;
        }

        .btn-primary:hover {
            background-color: #000;
        }

        img {
            border-radius: 4px;
        }
    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Blogger Application</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>
                @endauth

                @guest
                <li class="nav-item">
                    <a class="nav-link" href="/auth/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/auth/register">Register</a>
                </li>
                @endguest

                @auth
                <li class="nav-item">
                <form method="POST" action="/logout" style="display: inline;">
                    @csrf
                   <button type="submit" class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>

                @endauth
                
            </ul>

            <form class="d-flex" method="GET"  action="{{ url('/') }}">
                <input class="form-control me-2" type="search" placeholder="Search" name="search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
           
        </div>
    </div>
</nav>
