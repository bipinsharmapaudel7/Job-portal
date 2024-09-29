@include('navbar.header')
<link rel="stylesheet" type="text/css" href="{{ asset('CSS/register.css') }}">
<body style="background-image: url('../photos/register.jpg'); background-size: cover;">

<div class="register-container">
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" class="input-field" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            @error('name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" class="input-field" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" />
            @error('email')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" class="input-field" type="password" name="password" required autocomplete="new-password" />
            @error('password')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" class="input-field" type="password" name="password_confirmation" required autocomplete="new-password" />
            @error('password_confirmation')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input id="phone" class="input-field" type="text" name="phone" value="{{ old('phone') }}" required autocomplete="phone" />
            @error('phone')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input id="address" class="input-field" type="text" name="address" value="{{ old('address') }}" required autocomplete="address" />
            @error('address')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div><br>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn-primary ms-4">{{ __('Register') }}</button>
        </div>
    </form>
</div>

@include('navbar.footer')
</body>
