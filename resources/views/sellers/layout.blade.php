<!DOCTYPE html>
<html lang="en">

   @include('sellers.parts.head')

    <body>

        @include('sellers.parts.spinner')


        @include('sellers.parts.navbar')

        <div class="my-5" style="margin-top: 1500px; margin-bottom:15%">
            @yield('content')
        </div>

        @include('sellers.parts.footer')

        @include('sellers.parts.copyrights')



        @include('sellers.parts.backToTop')

        @include('sellers.parts.scripts')
    </body>

</html>
