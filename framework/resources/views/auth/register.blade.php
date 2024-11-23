<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <style>
        body {
            background-color: #2148C0;
            font-family: 'Arial', sans-serif;
        }
        .background-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://placehold.co/1920x1080/2148C0/2148C0') no-repeat center center;
            background-size: cover;
            z-index: -1;
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen">
    <div class="background-pattern"></div>
    <div class="text-center max-w-md mx-auto  p-8 rounded shadow-lg">
        <!-- Icon -->
        <div class="mb-6">
            <span class="iconify " data-icon="hugeicons:corn" style="font-size: 100px; color: white; margin-left: 70px"></span>
        </div>
        

        <!-- Form -->
        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            
            <!-- Name -->
            <div class="relative">
                <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input id="name" name="name" type="text" required autofocus autocomplete="name" 
                    class="w-full pl-10 pr-4 py-2 border rounded bg-gray-100 text-gray-800 placeholder-gray-500 focus:outline-none" 
                    placeholder="Name" value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="relative">
                <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input id="email" name="email" type="email" required autocomplete="username" 
                    class="w-full pl-10 pr-4 py-2 border rounded bg-gray-100 text-gray-800 placeholder-gray-500 focus:outline-none" 
                    placeholder="Email" value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input id="password" name="password" type="password" required autocomplete="new-password" 
                    class="w-full pl-10 pr-4 py-2 border rounded bg-gray-100 text-gray-800 placeholder-gray-500 focus:outline-none" 
                    placeholder="Password">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password" 
                    class="w-full pl-10 pr-4 py-2 border rounded bg-gray-100 text-gray-800 placeholder-gray-500 focus:outline-none" 
                    placeholder="Confirm Password">
                @error('password_confirmation')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full py-2 bg-white text-blue-900 font-bold rounded hover:bg-blue-700">Register</button>
        </form>

        <!-- Already Registered -->
        <p class="mt-4 text-white">
            Already registered? 
            <a href="{{ route('login') }}" class="text-white font-bold hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
