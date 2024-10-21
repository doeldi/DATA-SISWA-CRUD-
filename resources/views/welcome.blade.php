<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Data Management</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #6610f2 !important;
            color: #1a202c;
        }

        .container {
            text-align: center;
            padding: 20px;
        }

        .title {
            font-size: 4rem;
            font-weight: bold;
            color: white;
        }

        .subtitle {
            font-size: 1.5rem;
            color: whitesmoke;
        }

        .button {
            margin-top: 2rem;
            padding: 0.75rem 2rem;
            font-size: 1.25rem;
            background-color: #3182ce;
            color: white;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #2b6cb0;
        }

        .auth-buttons {
            margin-top: 3rem;
            display: flex;
            justify-content: center;
            gap: 1.5rem;
        }

        .auth-buttons .button {
            width: 150px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-top: 2rem;
        }

        .grid-item {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
        }

        .grid-item:hover {
            background-color: #f0f4f8;
        }

        .icon {
            margin-bottom: 1rem;
            color: #718096;
        }

        .icon svg {
            width: 3rem;
            height: 3rem;
        }

        .footer {
            margin-top: 4rem;
            color: #718096;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="title">Studata</h1>
        <h2 class="subtitle">Student Data Management</h2>
        <p class="subtitle">Easily manage and organize student data with our system. Sign up or log in to get started!
        </p>

        <div class="auth-buttons">
            <a href="{{ route('login') }}" class="button">Login</a>
            <a href="{{ route('register') }}" class="button">Sign Up</a>
        </div>

        <div class="grid">
            <div class="grid-item">
                <div class="icon">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8">
                        <path
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <h2 class="text-lg font-semibold">Manage Students</h2>
                <p class="mt-2 text-gray-600">Keep track of student profiles, their grades, and attendance.</p>
            </div>
            <div class="grid-item">
                <div class="icon">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8">
                        <path
                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                        </path>
                        <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h2 class="text-lg font-semibold">Student Profiles</h2>
                <p class="mt-2 text-gray-600">Store detailed profiles of each student, including personal information
                    and academic records.</p>
            </div>
        </div>
    </div>
</body>

</html>
