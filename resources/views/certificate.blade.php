@extends('layout.master')
@section('container')
    <main id="barba-wrapper">
        <div class="barba-container" data-namespace="underlayer">
            <div class="page-top">
                <div class="page-top__inner">
                    <a class="back-arrow" href="{{ route('home') }}#certificate">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="34" viewBox="0 0 67 34">
                            <g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round"
                                transform="translate(2 1)">
                                <path stroke-width="2" d="M0,15.5533333 L64,15.5533333" />
                                <polyline stroke-width="2" points="15.556 0 0 15.556 15.556 31.111" />
                            </g>
                        </svg>
                    </a>
                    <p class="scrollDown">SCROLLDOWN</p>
                    <div class="title">
                        <h2 class="title__text">Certificate</h2>
                        <div class="border js-toRight"><span></span><span></span></div>
                        <p class="title__lead">A collection of certificates that I have.</p>
                    </div>
                    <div class="image image__project"></div>
                </div>
            </div>

            <section class="wrapper">
                <div class="passion container">
                    <div class="text">
                        <p class="heading-num">01</p>
                        <div class="text__wrap content">
                            <h2 class="heading">MY CERTIFICATES</h2>
                        </div>
                    </div>
                    <div class="swiper-container swiper-certificate">
                        <div class="swiper-wrapper">
                            @foreach ($certificates as $certificate)
                                <div class="swiper-slide">
                                    <h3 class="certificate-title">{{ $certificate->certif_name }}</h3>
                                    @if ($certificate->certif_link)
                                        <a href="{{ $certificate->certif_link }}" target="_blank">
                                            <img src="{{ asset('storage/' . $certificate->img_url) }}"
                                                alt="{{ $certificate->certif_name }}" class="certificate-image">
                                        </a>
                                    @else
                                        <img src="{{ asset('storage/' . $certificate->img_url) }}"
                                            alt="{{ $certificate->certif_name }}" class="certificate-image">
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <!-- Navigasi Swiper -->
                        <div class="swiper-button-next swiper-certif-next"></div>
                        <div class="swiper-button-prev swiper-certif-prev"></div>
                        <div class="swiper-certif-pagination"></div>
                    </div>
                </div>
            </section>

            <footer class="footer">
                <a href="mailto:devanadindra.p@gmail.com">devanadindra.p@gmail.com</a>
                <a href="https://www.wantedly.com/users/48483598" target="_blank">devanadindra</a>
            </footer>
        </div>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var swiper = new Swiper(".swiper-certificate", {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    navigation: {
                        nextEl: ".swiper-certif-next",
                        prevEl: ".swiper-certif-prev",
                    },
                    pagination: {
                        el: ".swiper-certif-pagination",
                        clickable: true,
                    },
                });
            });
        </script>
    </main>
@stop
