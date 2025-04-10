@extends('layout.master')
@section('container')
<main id="barba-wrapper">
    <div class="barba-container" data-namespace="top">
      <div class="fullpage" id="js-fullpage">
        <div class="section">
          <div class="fullpage__slide">
            <div class="title title--top">
              <h1 class="title__name js-letter">{{ $personals->name }}</h1>
              <div class="border js-letter"><span></span><span class="js-letter"></span></div>
              <p class="title__lead js-letter">{{ $personals->nim }}<br>{{ $personals->major }}<br>{{ $personals->faculty }}</p>
            </div>
            <div class="moon">
              <div class="moon__img js-parallax-moon">
                <div class="moon__front layer" data-depth="0.2">
                  <div class="moon__text-wrap">
                    <p class="moon__text js-moon" data-depth="0.5">PORTFOLIO</p>
                  </div>
                </div>
                <div class="moon__front layer" data-depth="0.8">
                  <div class="cloud cloud--front1 js-moon"><img src="assets/img/cloud1.svg" alt="cloud"></div>
                </div>
                <div class="moon__back layer" data-depth="0.4">
                  <div class="cloud cloud--back2 js-moon"><img src="assets/img/b_cloud02.svg" alt="cloud"></div>
                </div>
                <div class="moon__back layer" data-depth="0.5"><img class="js-moon" src="assets/img/hole.svg" alt="moon"></div>
                <div class="moon__front layer" data-depth="0.7">
                  <div class="cloud cloud--front3 js-moon"><img src="assets/img/cloud3.svg" alt="cloud"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="section">
          <div class="fullpage__slide">
            <div class="title">
              <h2 class="title__text js-letter">About Me</h2>
              <div class="border js-letter"><span></span><span class="js-letter"></span></div>
              <p class="title__lead js-letter">{{ $personals->slogan }}</p>
              <div class="btn-wrap js-letter"><a class='btn' href='{{route ('about') }}'>Show me more</a></div>
            </div><a class='image image--about' href='{{ route('about') }}'>
              <div class="image__over">
                <div class="image__cover"></div>
                <div class="image__cover"></div>
              </div>
              <div class="page-num">
                <p>01</p>
              </div></a>
          </div>
        </div>
        <div class="section">
          <div class="fullpage__slide">
            <div class="title">
              <h2 class="title__text js-letter">Project</h2>
              <div class="border js-letter"><span></span><span class="js-letter"></span></div>
              <p class="title__lead js-letter">a collection of projects that<br>I have.</p>
              <div class="btn-wrap js-letter"><a class='btn' href='{{route ('show_project') }}'>Show me more</a></div>
            </div><a class='image image--project' href='{{ route('show_project') }}'>
              <div class="image__over">
                <div class="image__cover"></div>
                <div class="image__cover"></div>
              </div>
              <div class="page-num">
                <p>02</p>
              </div></a>
          </div>
        </div>
        <div class="section">
          <div class="fullpage__slide">
            <div class="title">
              <h2 class="title__text js-letter">Certificate</h2>
              <div class="border js-letter"><span></span><span class="js-letter"></span></div>
              <p class="title__lead js-letter">a collection of certificates that I have.</p>
              <div class="btn-wrap js-letter"><a class='btn' href='{{route ('certificate') }}'>Show me more</a></div>
            </div><a class='image image--certificate' href='{{ route('certificate') }}'>
              <div class="image__over">
                <div class="image__cover"></div>
                <div class="image__cover"></div>
              </div>
              <div class="page-num">
                <p>03</p>
              </div></a>
          </div>
        </div>
        <div class="section">
          <div class="fullpage__slide">
            <div class="title">
              <h2 class="title__text js-letter">Get In Touch</h2>
              <div class="border js-letter"><span></span><span class="js-letter"></span></div>
              <ul>
                <li class="js-letter"><a href="mailto:devanadindra.p@gmail.com">devanadindra.p@gmail.com</a></li>
                <li class="js-letter"><a href="https://www.instagram.com/devanadindra_?igsh=bzNsa3Ayc2ozNDVu&utm_source=qr" target="_blank">devanadindra_</a></li>
                <li class="js-letter"><a href="https://twitter.com/Goldi69s" target="_blank"><i class="fab fa-twitter"></i></a><a href="https://dribbble.com/kuon_yagi" target="_blank"><i class="fab fa-dribbble"></i></a></li>
              </ul>
            </div>
            <div class="image image--contact">
              <div class="image__over">
                <div class="image__cover"></div>
                <div class="image__cover"></div>
              </div>
              <div class="page-num">
                <p>04</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p class="scrollDown">SCROLLDOWN</p>
      <div class="moon-background">
        <div class="moonlight">
          <div class="moonlight__wrap js-parallax-moonlight">
            <div class="layer moonlight__img" data-depth="0.2"></div>
          </div>
        </div>
      </div>
      <div class="star js-parallax-star">
        <div class="layer" data-depth="0.1">
          <div class="star__img"><img src="assets/img/star.svg"></div>
        </div>
      </div>
      <div class="sky-color"></div>
    </div>
  </main>
  @stop