@extends('auth.layout')

@section('title', 'Forgot your password?')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Forgot your password?
      </h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        Don't worry, it has also happened to someone of us :)
      </p>
    </div>

    @error('email')          
      <div class="bg-red-100 p-3 border rounded border-red-200">
        <span class="text-sm">{{ $message }}</span>
      </div>
    @enderror

    @if (session('status'))
      <div class="bg-blue-200 p-3 border rounded border-blue-300">
        <span class="text-sm">{{ session('status')}}</span>
      </div>
    @endif

    <form class="mt-8 space-y-6" action="{{ route('password.request')}}" method="POST">
      @csrf
      <div class="rounded-md shadow-sm -space-y-px">
        <div>
          <label for="email-address" class="sr-only">Email registered</label>
          <input id="email-address" name="email" type="email" value="{{ old('email') }}" required class="appearance-none rounded relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email registered">
        </div>
      </div>

      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            <!-- Heroicon name: lock-closed -->
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
            </svg>
          </span>
          Send me instructions
        </button>
      </div>
      
      <div class="text-sm text-center">
          <a href="{{ route('login')}}" class="text-gray-600 hover:text-indigo-500">
            Sign in
          </a>
      </div>

    </form>
  </div>
</div>
@endsection