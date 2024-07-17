<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="dark">
    @include('includes.header')
    @include('includes.sidebar')
    <div id="smooth-wrapper">
        <div id="smooth-content">
            <main>
                @yield('content')
            </main>
            @if (!isset($hideFooter))
                @include('includes.footer')
            @endif
        </div>
    </div>

    <!-- Modal 1 -->
    <div class="modal__testimonial" id="modal_testimonial">
        <div class="modal__testimonial-content">
            <span class="modal__close" id="modal_close"><i class="fa-solid fa-xmark"></i></span>
            <iframe src="https://www.youtube.com/embed/vZgyWfmw_Kw" title="INI Company"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope;" allowfullscreen>
            </iframe>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal__testimonial" id="modal_testimonial2">
        <div class="modal__testimonial-content">
            <span class="modal__close" id="modal_close2"><i class="fa-solid fa-xmark"></i></span>
            <iframe src="https://www.youtube.com/embed/JulIeG1V8T4" allowfullscreen></iframe>
        </div>
    </div>

    <!-- Modal 3 -->
    <div class="modal__testimonial" id="modal_testimonial3">
        <div class="modal__testimonial-content">
            <span class="modal__close" id="modal_close3"><i class="fa-solid fa-xmark"></i></span>
            <iframe src="https://www.youtube.com/embed/7QkL-40FRfE" allowfullscreen></iframe>
        </div>
    </div>

    @include('includes.scripts')
</body>

</html>
