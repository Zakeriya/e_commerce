<!DOCTYPE html>
<html lang="en">

   @include('users.parts.head')

    <body>

        @include('users.parts.spinner')


        @include('users.parts.navbar')

        @yield('content')


        @include('users.parts.footer')

        @include('users.parts.copyrights')



        @include('users.parts.backToTop')

        @include('users.parts.scripts')
    </body>

</html>
