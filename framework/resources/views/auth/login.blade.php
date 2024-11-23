<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
    <div class="text-center">
        <div class="mb-8 ml-12">
            <span class="iconify" data-icon="hugeicons:corn" style="font-size: 150px; color: white;"></span>
        </div>

        <!-- Notification Container -->
        @if($errors->any())
        <div id="notification" class="bg-red-500 text-white p-4 rounded mb-4">
            Invalid email or password!
        </div>
        @endif

        <form class="space-y-4" action="{{ route('login') }}" method="POST">
            @csrf
            
            <!-- Email Input -->
            <div class="relative">
                <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-black"></i>
                <input id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                    class="w-full pl-10 pr-4 py-2 border border-white rounded bg-transparent text-white placeholder-white focus:outline-none"
                    placeholder="EMAIL" type="email" />
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="relative">
                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-black"></i>
                <input id="password" name="password" required autocomplete="current-password"
                    class="w-full pl-10 pr-4 py-2 border border-white rounded bg-transparent text-white placeholder-white focus:outline-none"
                    placeholder="PASSWORD" type="password" />
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Login Button -->
            <button class="w-full py-2 bg-white text-blue-900 rounded" type="submit">LOGIN</button>
        </form>
        
        <!-- Register Link -->
        @if (Route::has('password.request'))
            <a class="block mt-4 text-white" href="{{ route('register') }}">Register</a>
        @endif
    </div>

    <!-- JavaScript for Notification -->
    <script>
        // Automatically hide notification after 5 seconds
        document.addEventListener('DOMContentLoaded', () => {
            const notification = document.getElementById('notification');
            if (notification) {
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 5000);
            }
        });
    </script>
</body>
</html>
