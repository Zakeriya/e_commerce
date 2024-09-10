<!DOCTYPE html>
<html lang="en">

    @include('admins.parts.head')

<body class="g-sidenav-show  bg-gray-200">
  @include('admins.parts.sidebar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('admins.parts.navbar')
    <!-- End Navbar -->
    @yield('content')
  @include('admins.parts.scripts')
</body>

</html>