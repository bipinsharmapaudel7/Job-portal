@include('navbar.header')
<link rel="stylesheet" type="text/css" href="CSS/login.css">
<body style="background-image: url('../photos/login.jpg'); background-size: cover;">

    <div class="login-container">
        <!-- Session Status -->
        <!-- <x-auth-session-status class="mb-4" :status="session('status')" /> -->

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>
                <input id="email" class="input-field" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                @if($errors->has('email'))
                    <span class="error-message">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password">Password</label>
                <input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
                @if($errors->has('password'))
                    <span class="error-message">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <!-- Remember Me -->
            <div class="mt-4">
                <label for="remember_me" class="remember-label">
                    <input id="remember_me" type="checkbox" name="remember">
                    Remember me
                </label>
            </div>

            <div class="mt-4">
                <a href="{{ route('password.request') }}">Forgot your password?</a>
                <button type="submit" class="login-button">Log in</button>
            </div>
        </form>
    </div>
</body>
@include('navbar.footer')

