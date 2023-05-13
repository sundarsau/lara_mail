@include('layouts.header')
<body>
        <div class="container">
            
            @yield('main-content')
        </div>
    @include('layouts.footer')
    @stack('js')
</body>

</html>
