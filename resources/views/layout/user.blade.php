<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <title>Event Management System | UTI</title>
</head>
<body>
  @include('components.navbar')
  @include('sweetalert::alert')
<div class="flex flex-col h-screen">
  <div class="flex flex-1 overflow-hidden">
      <!--   start::Sidebar    -->
      @include('layout.sidebar')
      <!--   end::Sidebar    -->
      <!--   start::Main Content     -->
      <main class="flex flex-1 px-4 py-20 overflow-y-scroll">
          @yield('content')
      </main>
      <!--   end::Main Content     -->
  </div>
</div>

</body>
</html>