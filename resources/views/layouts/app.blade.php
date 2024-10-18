<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manajemen Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .sidebar {
            min-height: 100vh;
            background: linear-gradient(45deg, #007bff, #6610f2);
            padding: 30px 10px;
        }

        .nav-item .nav-link {
            color: #ffffff;
            font-weight: 500;
            font-size: 18px;
            transition: background 0.3s, color 0.3s;
            padding: 12px 20px;
        }

        .nav-item .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }

        .bg-info {
            background-color: #6610f2 !important;
        }

        .nav-link i {
            margin-right: 10px;
        }

        .sidebar .active {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 10px;
        }

        .navbar {
            background: linear-gradient(45deg, #6610f2, #007bff);
            color: #ffffff;
        }

        .dropdown-menu {
            background-color: #ffffff;
            border-radius: 8px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        h2 {
            color: #6610f2;
            font-weight: 700;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .sidebar {
                padding-top: 15px;
                padding-bottom: 15px;
            }

            .nav-link {
                font-size: 16px;
                padding: 10px;
            }
        }
    </style>

    @stack('styles')

    @section('title', 'Home')
</head>

<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column g-4">
                        <li class="nav-item pb-2 text-center">
                            <a class="nav-link active border-bottom text-center" href="{{ route('home') }}">
                                <h3>
                                    <i class="fas fa-graduation-cap"></i> Studata
                                </h3>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">
                                <p><i class="fas fa-home"></i> Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('siswa.index') }}">
                                <p><i class="fas fa-user-graduate me-3"></i> Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rombel.data-rombel') }}">
                                <p><i class="fas fa-users me-2"></i> Data Rombel</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>
                        @yield('title')
                    </h2>

                    <!-- User information navbar -->
                    <nav class="navbar navbar-expand-lg rounded">
                        <div class="container-fluid">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user-circle"></i>Pengguna: {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>
                                            Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>
                                            Settings</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>

    @stack('script')
</body>

</html>
