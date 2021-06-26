<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layout.head')
    </head>

    <body>
        <!-- navigation -->
        @include('layout.navbar')
        
        <!-- main area -->
        <section>
            @section('main')
                <h4>Main area</h4>
            @show
        </section>
        
        @include('layout.footer')
    </body>
</html>
