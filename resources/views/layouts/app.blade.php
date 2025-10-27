<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; }
        .sidebar {
            width: 220px;
            min-height: 100vh;
        }
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff;
            border-radius: 5px;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar bg-light p-3">
        <h4 class="mb-4">Library Management System</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('categories.index') }}" class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}">
                    Category
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('students.index') }}" class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
                    Students
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('books.index') }}" class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}">
                    Books
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('librarians.index') }}" class="nav-link {{ request()->routeIs('librarians.*') ? 'active' : '' }}">
                    Librarians
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('borrowings.index') }}" class="nav-link {{ request()->routeIs('borrowings.*') ? 'active' : '' }}">
                    Borrowings
                </a>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        @yield('content')
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
