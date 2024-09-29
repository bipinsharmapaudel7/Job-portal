 <style>
/* Style for navigation links */
.navigation {
    background-color: #333; /* Background color of the navigation */
    padding: 10px 0; /* Padding space inside the navigation */
    text-align: center; /* Center-align the links */
}

.navigation a {
    color: #fff; /* Text color of the links */
    text-decoration: none; /* Remove default underline */
    padding: 10px 20px; /* Padding space around the links */
    margin: 0 5px; /* Margin between the links */
    border-radius: 5px; /* Rounded corners */
    transition: background-color 0.3s ease; /* Smooth transition for background color */
}

.navigation a:hover {
    background-color: #555; /* Darker background color on hover */
}

 </style>
 <nav class="navigation">
    @if (Route::has('login'))
        <a href="/">Home</a>
    @endif
    <a href="/jobs">Job List</a>
    <a href="/about">About Us</a>
    <a href="/profile">Profile</a>
    @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"> Dashboard</a></li>
                @else
                    <a href="{{ route('login') }}" >Log in</a></li> 

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a></li> 
                @endif
                @endauth
        @endif

    @if(Auth::check() && (Auth::user()->role == 2 || Auth::user()->role == 3))
    <a href="{{ route('applicants') }}">Applicants</a>
    @endif

    @if(Auth::check() && (Auth::user()->role == 3))
    <a href="{{ route('companies') }}">Companies</a>
    @endif

    <!-- @if(Auth::check() && (Auth::user()->role == 1 ))
    <a href="{{ route('apply_job') }}">Applicants</a>
    @endif -->
</nav>


