<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify your email address | ManagApp</title>

    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
          <div>
            <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
              Just one step more!
            </h2>
            @if (session('status'))
              <div class="my-2 bg-blue-200 p-3 border rounded border-blue-300 text-center">
                <span class="text-sm text-center">We just sent you another email. Please check your inbox.</span>
              </div>
            @endif
            <p class="mt-2 text-center text-sm text-gray-600">
              We send you an email to confirm your email address. <br> 
              Have troubles?
              <button class="font-medium text-indigo-600 hover:text-indigo-500" onclick="document.getElementById('send-verification-form').submit();">send the confirm email again</button>
              <form id="send-verification-form" method="POST" action="{{ route('verification.send')}}">@csrf</form>
            </p>
          </div>

          <div class="text-sm text-center">
            <a href="{{ route('logout')}}" class="font-medium text-gray-600 hover:text-indigo-500">
              Sign out
            </a>
          </div>

        </div>
      </div>
</body>
</html>