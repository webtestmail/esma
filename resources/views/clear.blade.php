@extends('Layouts.MainLayouts')

@section('content')
    <style>
        /* Base Container Styling */
        .app-container {
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 70vh;
            /* Ensures it's centered in the available viewport height */
        }

        /* Card Styling */
        .success-card {
            max-width: 448px;
            /* max-w-md equivalent */
            margin: auto;
            background-color: #ffffff;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            /* shadow-2xl equivalent */
            border-radius: 0.75rem;
            /* rounded-xl equivalent */
            padding: 2.5rem;
            /* p-10 equivalent */
            text-align: center;
            border-top: 8px solid #10b981;
            /* border-t-8 border-green-500 equivalent */
        }

        /* Icon Styling */
        .success-icon-container {
            margin-bottom: 1.5rem;
        }

        .success-icon {
            width: 4rem;
            /* w-16 equivalent */
            height: 4rem;
            /* h-16 equivalent */
            color: #10b981;
            /* text-green-500 equivalent */
            margin-left: auto;
            margin-right: auto;
        }

        /* Header/Text Styling */
        .main-header {
            font-size: 1.875rem;
            /* text-3xl equivalent */
            font-weight: 800;
            /* font-extrabold equivalent */
            color: #1f2937;
            /* text-gray-800 equivalent */
            margin-bottom: 1rem;
        }

        .sub-text {
            font-size: 1.125rem;
            /* text-lg equivalent */
            color: #4b5563;
            /* text-gray-600 equivalent */
            margin-bottom: 2rem;
        }

        /* Button Styling */
        .home-button {
            display: inline-block;
            background-color: #2563eb;
            /* bg-blue-600 equivalent */
            color: #ffffff;
            font-weight: 600;
            /* font-semibold equivalent */
            padding: 0.5rem 1.5rem;
            /* py-2 px-6 equivalent */
            border-radius: 0.5rem;
            /* rounded-lg equivalent */
            text-decoration: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            /* shadow-md equivalent */
        }

        .home-button:hover {
            background-color: #1d4ed8;
            /* hover:bg-blue-700 equivalent */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            /* hover:shadow-lg equivalent */
        }
    </style>

    <div class="app-container">
        <div class="success-card">

            <!-- Success Icon -->
            <div class="success-icon-container">
                <svg class="success-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <!-- Confirmation Message -->
            <h1 class="main-header">
                Cache Cleared Successfully!
            </h1>

            <p class="sub-text">
                Thank you. The application cache, compiled views, and configuration files have all been reset.
            </p>

            <!-- Call to Action / Back Button -->
            <a href="{{ url('/') }}" class="home-button">
                Go to Homepage
            </a>
        </div>
    </div>
@endsection
