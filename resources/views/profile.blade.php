<div class="main-content">
            <div class="header">
                <h1>Welcome, {{ Auth::user()->name }}</h1>
                  <div class="profile"> 
                    <img src="{{ Auth::user()->photo }}" alt="User Photo">
                  </div>
                <p>Web Developer</p>
            </div>
            <div class="profile">
                <div class="container">
                  <div>
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>Address: {{ Auth::user()->address }}</p>
                    <p>Phone: {{ Auth::user()->phone }}</p>
                  </div>
                </div>
              </div>
            <div class="logout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
        </div>