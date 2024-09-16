<!DOCTYPE html>
<html lang="en">
    <head>
        @include('WebSite.frontend.layouts.header_links')
    </head>
    <body>
        {{-- Include NavBar --}}
        @include('WebSite.frontend.layouts.header')
        @section('seconlist')
        @endsection
        {{-- Include Landing --}}
        @include('WebSite.frontend.layouts.landing')
        {{-- Here The Main Content Of The WebSite --}}
        @section('main-content')
        @show
        {{-- here The Contnet Contactus --}}
        @include('WebSite.frontend.layouts.contactus')
        {{-- here The Footer --}}
        @include('WebSite.frontend.layouts.footer')
        @include('WebSite.frontend.layouts.js_links')
    </body>
</html>
