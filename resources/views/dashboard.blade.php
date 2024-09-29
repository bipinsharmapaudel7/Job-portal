<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('NewWorld') }}
        </h2>
    </x-slot>

    @if(session('message'))
        {{ session('message') }}
    @endif
<style>
    
</style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(Auth::user()->role == 2)
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <a href="{{ route('add_job_form') }}"> Post a new job! </a>
                </div>
                @endif
        <div class="main-content">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1>Welcome, {{ Auth::user()->name }}</h1>
                  <!-- <div class="profile"> 
                    <img src="{{ Auth::user()->photo }}" alt="User Photo">
                  </div> -->
                <p>{{ Auth::user()->role == 1 ? 'Normal User' : (Auth::user()->role == 2 ? 'Company User' : 'Super Admin') }}</p>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <div>
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                    <p>Address: {{ Auth::user()->address }}</p>
                    <p>Phone: {{ Auth::user()->phone }}</p>
                  </div>
                </div>
              </div>
            
        </div>
        <a href="profile" class="p-6 text-gray-900 dark:text-gray-100">Edit</a>
            </div>
        </div>
    </div>
</x-app-layout>


