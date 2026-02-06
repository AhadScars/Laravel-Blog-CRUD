<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Blogger Application</title>

    <style>
        body {
            background-color: #fafafa;
            color: #222;
            font-size: 15px;
        }

        /* Navbar */
        .navbar {
            background-color: #fafafa;
            border-bottom: 1px solid #eee;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 16px;
            color: #222 !important;
        }

        .nav-link {
            color: #555 !important;
            padding: 6px 12px;
            font-size: 14px;
        }

        .nav-link:hover {
            color: #000 !important;
        }

        /* Forms */
        .form-control {
            border: none;
            border-bottom: 1px solid #ddd;
            border-radius: 0;
            background: transparent;
            font-size: 14px;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #000;
        }

        /* Buttons */
        .btn-primary {
            background-color: #000;
            border: none;
            font-size: 14px;
            padding: 6px 18px;
        }

        .btn-primary:hover {
            background-color: #222;
        }

        .btn-outline-secondary {
            border-color: #ddd;
            color: #555;
            font-size: 14px;
        }

        .btn-outline-secondary:hover {
            background-color: #eee;
            color: #000;
        }

        /* Tables */
        .table {
            background-color: #fff;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table th {
            font-weight: 500;
            color: #666;
            border-bottom: 1px solid #eee;
        }

        .table td {
            border-bottom: 1px solid #f1f1f1;
        }

        .table tbody tr:hover {
            background-color: #fafafa;
        }

        /* Cards */
        .card {
            border: 1px solid #eee;
            border-radius: 4px;
        }

        img {
            border-radius: 4px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">Blogger</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto align-items-center">

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profile</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/auth/manage">Manage Blogs</a>
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
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link p-0">
                            Logout
                        </button>
                    </form>
                </li>
                

            </ul>
            <a href="/blog/create" class="btn btn-primary btn-sm me-4">
                + Write Blog
            </a>
                @endauth
            
        </div>

            <form class="d-flex" method="GET" action="{{ url('/') }}">
                <input
                    class="form-control me-3"
                    type="search"
                    placeholder="Search..."
                    name="search"
                >
            </form>
        </div>
    </div>
</nav>
