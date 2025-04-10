@extends('layout.master')
@section('container')
    <main id="barba-wrapper">
        <div class="barba-container" data-namespace="underlayer">
            <div class="page-top">
                <div class="page-top__inner">
                    <a class="back-arrow" href="{{ route('home') }}#project">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="34" viewBox="0 0 67 34">
                            <g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round" transform="translate(2 1)">
                                <path stroke-width="2" d="M0,15.5533333 L64,15.5533333" />
                                <polyline stroke-width="2" points="15.556 0 0 15.556 15.556 31.111" />
                            </g>
                        </svg>
                    </a>
                    <p class="scrollDown">SCROLLDOWN</p>
                    <div class="title">
                        <h2 class="title__text">Project</h2>
                        <div class="border js-toRight"><span></span><span></span></div>
                        <p class="title__lead">A collection of projects that<br>I have.</p>
                        <div class="btn-wrap">
                            <a class="btn" href="https://github.com/devanadindraa" target="_blank">Github</a>
                        </div>
                    </div>
                    <div class="image image__project"></div>
                </div>
            </div>
            
            <section class="wrapper">
                <div class="passion container">
                    <div class="text">
                        <p class="heading-num">01</p>
                        <div class="text__wrap content">
                            <h2 class="heading">MY PROJECT</h2>
                        </div>
                    </div>

                    <!-- LIST SEHARUSNYA DI LUAR FOREACH -->
                    <ul class="project__list">
                        @foreach ($projects as $project)
                            <li class="project__item">
                                <h3 class="project-title">{{ $project->project_name }}</h3>
                                <div class="swiper swiper-project">
                                    <div class="swiper-wrapper">
                                        @foreach ($project->images as $image)
                                            <div class="swiper-slide">
                                                <img src="{{ asset('storage/' . $image->img_url) }}"
                                                    alt="{{ $project->project_name }}"
                                                    style="width: 100%; border-radius: 10px;">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-project-pagination"></div>
                                </div>
                                <p class="project__text">{{ $project->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <footer class="footer">
                <a href="mailto:devanadindra.p@gmail.com">devanadindra.p@gmail.com</a>
                <a href="https://www.wantedly.com/users/48483598" target="_blank">devanadindra</a>
            </footer>
        </div>
    </main>
@stop