<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.header')
    </head>
    <body>
        <header>
            @include('partials.navbar')
        </header>
        <div class="container">
            @yield('content')
        </div>
        @include('partials.javascript')
    </body>
</html>

