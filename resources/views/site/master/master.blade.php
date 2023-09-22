<!--
My code is forged by a lot of sweat and study and constantly evolving!
I know very little yet, if you find a hole in the code, the most honorable thing is to contribute with the knowledge!
Not everything is money in life, what matters most is knowledge!
Good journey!
@born September 12, 2023
@author Rodrigo Brito <contato@rodrigobrito.dev.br>
3R1t0 - Cyber warrior 438
-->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" itemscope itemtype="http://schema.org/WebPage">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="s" content="{{ $page->keywords }}" />
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" />
    <!--vendor css ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/vendor.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!--Bootstrap ================================================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Style Sheet ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/site/style.css') }}" />
    <!-- Google Fonts ================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,700;1,300&family=Roboto:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Federo&display=swap" rel="stylesheet">
    <title>{{ env('APP_NAME') }}</title>
    {!! $page->pixel_header !!}
</head>

<body>
    {!! $page->pixel_body !!}
    <nav class="navbar navbar-expand-lg bg-white navbar-light container-fluid py-3 position-fixed ">
        <div class="container">
            @if ($page->logo_header)
                <a class="navbar-brand" href="{{ route('site') }}"><img
                        src="{{ url('storage/page/' . $page->logo_header) }}" alt="{{ env('APP_NAME') }}"></a>
            @else
                <a class="navbar-brand" href="{{ route('site') }}"><img src="{{ asset('img/logo-header.png') }}"
                        alt="{{ env('APP_NAME') }}"></a>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav align-items-center justify-content-end flex-grow-1 pe-3">
                        @if ($page->benefits_text)
                            <li class="nav-item">
                                <a class="nav-link text-uppercase  px-3" href="#benefits">Benefícios</a>
                            </li>
                        @endif
                        @if ($page->tour)
                            <li class="nav-item">
                                <a class="nav-link text-uppercase  px-3" href="#tour">Tour</a>
                            </li>
                        @endif
                        @if ($page->map)
                            <li class="nav-item">
                                <a class="nav-link text-uppercase  px-3" href="#map">Localização</a>
                            </li>
                        @endif
                        @if ($page->conditions)
                            <li class="nav-item">
                                <a class="nav-link text-uppercase  px-3" href="#conditions">Condições</a>
                            </li>
                        @endif
                        @if ($page->progress)
                            <li class="nav-item">
                                <a class="nav-link text-uppercase  px-3" href="#services">Obra</a>
                            </li>
                        @endif
                    </ul>

                    <div class="d-flex mt-5 mt-lg-0 ps-lg-3 align-items-center justify-content-center ">
                        <ul class="navbar-nav justify-content-end align-items-center">
                            <li class="nav-item">
                                @if ($page->phone)
                                    <a class="nav-link px-3 phone-no" title="Telefone"
                                        href="tel:{{ explode('|', $page->phone)[0] }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M18.3274 22.5001C17.4124 22.5001 16.1271 22.1691 14.2024 21.0938C11.862 19.7813 10.0516 18.5696 7.72383 16.2479C5.47946 14.0049 4.38727 12.5527 2.85868 9.77115C1.1318 6.63052 1.42618 4.98427 1.75524 4.28068C2.14712 3.43974 2.72555 2.93677 3.47321 2.43755C3.89787 2.15932 4.34727 1.92081 4.81571 1.72505C4.86258 1.7049 4.90618 1.68568 4.94508 1.66833C5.17712 1.5638 5.52868 1.40583 5.97399 1.57458C6.27118 1.68615 6.53649 1.91443 6.9518 2.32458C7.80352 3.16458 8.96743 5.03537 9.3968 5.95412C9.68508 6.57333 9.87587 6.98208 9.87633 7.44052C9.87633 7.97724 9.60633 8.39115 9.27868 8.83787C9.21727 8.92177 9.15633 9.00193 9.09727 9.07974C8.74055 9.54849 8.66227 9.68396 8.71383 9.92583C8.81837 10.4119 9.5979 11.859 10.879 13.1372C12.1601 14.4155 13.5654 15.1458 14.0534 15.2499C14.3056 15.3038 14.4438 15.2222 14.9276 14.8529C14.997 14.7999 15.0682 14.7451 15.1427 14.6902C15.6424 14.3185 16.0371 14.0555 16.5612 14.0555H16.564C17.0201 14.0555 17.4106 14.2533 18.0574 14.5796C18.9012 15.0052 20.8282 16.1541 21.6734 17.0068C22.0845 17.4211 22.3137 17.6855 22.4257 17.9822C22.5945 18.429 22.4356 18.7791 22.332 19.0135C22.3146 19.0524 22.2954 19.0951 22.2752 19.1424C22.0779 19.61 21.838 20.0585 21.5585 20.4821C21.0602 21.2274 20.5554 21.8044 19.7126 22.1968C19.2798 22.4015 18.8062 22.5052 18.3274 22.5001Z"
                                                fill="#313131" />
                                        </svg>
                                        {{ explode('|', $page->phone)[0] }}
                                    </a>
                                @endif
                            </li>
                        </ul>
                        <a type="button" class="btn btn-primary btn-header ms-md-3" href="#hero">Fale com o
                            Consultor</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <section id="footer">
        <div class="container footer-container pt-3">
            <footer
                class="row row-cols-1 row-cols-sm-2 row-cols-md-5 my-5 py-5 d-flex flex-wrap justify-content-between ">

                <div class=" col-md-4 mt-5 mt-md-0 ">
                    @if ($page->logo_footer)
                        <img src="{{ url('storage/page/' . $page->logo_footer) }}" alt="{{ env('APP_NAME') }}"
                            class="my-3">
                    @else
                        <img src="{{ asset('img/logo-footer.png') }}" alt="{{ env('APP_NAME') }}" class="my-3">
                    @endif
                    <div class="d-flex align-items-center ">
                        @if ($page->facebook)
                            <a href="{{ $page->facebook }}" target="_blank"
                                title="{{ env('APP_NAME') }} no Facebook"><iconify-icon
                                    class="social-link-icon active pe-4" icon="mdi:facebook"></iconify-icon></a>
                        @endif
                        @if ($page->twitter)
                            <a href="{{ $page->twitter }}" target="_blank"
                                title="{{ env('APP_NAME') }} no Twitter"><iconify-icon class="social-link-icon pe-4"
                                    icon="mdi:twitter"></iconify-icon></a>
                        @endif
                        @if ($page->instagram)
                            <a href="{{ $page->instagram }}" target="_blank"
                                title="{{ env('APP_NAME') }} no Instagram"><iconify-icon
                                    class="social-link-icon pe-4" icon="mdi:instagram"></iconify-icon></a>
                        @endif
                        @if ($page->youtube)
                            <a href="{{ $page->youtube }}" target="_blank"
                                title="{{ env('APP_NAME') }} no Youtube"><iconify-icon class="social-link-icon pe-4"
                                    icon="mdi:youtube"></iconify-icon></a>
                        @endif
                    </div>

                </div>


                <div class="col-md-3 float-right">
                    <h5 class="py-3">Contato</h5>
                    <ul class="nav">
                        @if ($page->address)
                            <li class="nav-item d-flex mb-3">
                                <iconify-icon class="contact-icon pe-3" icon="ion:location"></iconify-icon>
                                <a href="#" class="nav-link p-0 ">{{ $page->address }}</a>
                            </li>
                        @endif
                        @if ($page->phone)
                            <li class="nav-item d-flex mb-3">
                                <iconify-icon class="contact-icon pe-3" icon="ion:call"></iconify-icon><a
                                    href="#" class="nav-link p-0 ">{{ $page->phone }}</a>
                            </li>
                        @endif
                        @if ($page->email)
                            <li class="nav-item d-flex mb-3">
                                <iconify-icon class="contact-icon pe-3" icon="ion:mail"></iconify-icon><a
                                    href="#" class="nav-link p-0 ">{{ $page->email }}</a>
                            </li>
                        @endif
                    </ul>
                </div>



            </footer>
        </div>


        <footer class="d-flex flex-wrap justify-content-between align-items-center border-top"></footer>

        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 pt-4">
                <div class="col-md-6 d-flex align-items-center">
                    <p>© 2023 {{ env('APP_NAME') }} - Todos os direitos reservados</p>
                </div>
            </footer>
        </div>
    </section>


    <script src="{{ asset('js/site/modernizr.js') }}"></script>
    <script src="{{ asset('js/site/jquery.min.js') }}"></script>
    <script src="{{ asset('js/site/plugin.js') }}"></script>
    <script src="{{ asset('js/site/script.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('js/phone.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
    @yield('custom_js')
</body>

</html>
