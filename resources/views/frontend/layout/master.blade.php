<!DOCTYPE html>
<html lang="en">
    @include('frontend.layout.partials._head')
    <body style="background-color: #27313a">
        @include('frontend.layout.partials._header')
        
        @yield('content')
        
        @include('frontend.layout.partials._footer')

        @include('frontend.layout.partials._scripts')
        @stack('js')
        @yield('js')
    </body>
</html>
