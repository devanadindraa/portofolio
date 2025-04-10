@extends('layout.master')
@section('container')
<main id="barba-wrapper">
    <div class="barba-container" data-namespace="underlayer">
      <div class="page-top">
        <div class="page-top__inner"><a class="back-arrow" href="{{ route('home', ['#about']) }}"><svg xmlns="http://www.w3.org/2000/svg" width="100%" height="34" viewBox="0 0 67 34"><g fill="none" fill-rule="evenodd" stroke="#FFF" stroke-linecap="round" transform="translate(2 1)"><path stroke-width="2" d="M0,15.5533333 L64,15.5533333"/><polyline stroke-width="2" points="15.556 0 0 15.556 15.556 31.111"/></g></svg></a>
          <p class="scrollDown">SCROLLDOWN</p>
          <div class="title">
            <h2 class="title__text">About Me</h2>
            <div class="border js-toRight"><span></span><span></span></div>
            <p class="title__lead">{{ $personals->slogan }}</p>
            <div class="btn-wrap"><a class="btn" href="" target="_balnk">Scout</a></div>
          </div>
          <div class="image image__about"></div>
        </div>
      </div>
      <section class="wrapper">
        <div class="who container">
          <div class="text text--top">
            <p class="heading-num">01</p>
            <div class="text__wrap text__wrap--top content">
              <h2 class="heading heading--top">WHO I AM</h2>
              <div class="who__wrap">
                <div class="who__name">
                  <p class="who__en">{{ $personals->name }}</p>
                </div>
                <p class="who__text">{{ $personals->biography }}</p>
                <div class="who__image"><img src="{{ asset('storage/' . $personals->img_url ) }}" alt="{{ $personals->name }}"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="passion container">
          <div class="text">
            <p class="heading-num">02</p>
            <div class="text__wrap content">
              <h2 class="heading">PASSION</h2>
            </div>
          </div>
          <div class="content content--mlarge">
            <ul class="passion__list">
              <li class="passion__item">
                <div class="passion__image"><img src="{{ asset('assets/img/programmer.svg') }}" alt="programmer"></div>
                <h3 class="sub-title">PROGRAMMER</h3>
                <p class="passion__text">We believe that programming is like a ‘magic wand’. If technology and software are the magic to solve problems, then the role of programming is as an intermediary that helps users utilize them easily. We strive every day to write code that serves as a precise and useful ‘magic wand’ for users.</p>
              </li>
              <li class="passion__item">
                <div class="passion__image"><img src="{{ asset('assets/img/tech.svg') }}" alt="TECHNOLOGY"></div>
                <h3 class="sub-title">TECHNOLOGY</h3>
                <p class="passion__text">“Technology has the power to change the world and individual lives, as the saying goes, “Well-developed technology is indistinguishable from magic.” As a programmer, I always try to keep up with the latest technology and adapt to changes. I believe that bringing innovation and solutions through technology is part of a programmer's mission to create a positive impact.</p>
              </li>
              <li class="passion__item">
                <div class="passion__image"><img src="{{ asset('assets/img/science.svg') }}" alt="STORY"></div>
                <h3 class="sub-title">SCIENCE</h3>
                <p class="passion__text">Computer Science is more than just writing code - it's about creating innovative solutions to solve real-world problems. From programming to artificial intelligence, technology gives us the power to shape a better future. With a relentless spirit of learning and innovation, every line of code written is a small step towards big change.</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="skill-set container">
          <div class="text">
            <p class="heading-num">03</p>
            <div class="text__wrap content">
              <h2 class="heading">SKILL SET</h2>
            </div>
          </div>
          <div class="content content--mlarge skill-set__flex">
            @foreach ($personals->skills as $skill)
            <ul class="skill-set__list">
              <li class="skill-set__item">
                <div class="skill-set__icon"><img src="{{ asset('storage/' . $skill->img_url ) }}" alt="{{ $skill->skill_name }}"></div>
                <div class="skill-set__detail">
                  <div class="skill-set__meta">
                    <div class="skill-set__name">
                      <h4 class="small-title small-title--skill">{{ $skill->skill_name }}</h4>
                      <p class="skill-set__year">{{ $skill->experience }}{{ $skill->period }}</p>
                    </div>
                    <p class="small-title small-title--skill skill-set__high">{{ $skill->skill_ratio }}<span class="skill-set__ratio">%</span></p>
                  </div>
                  <div class="skill-set__bar p{{ $skill->skill_ratio }} js-scroll"></div>
                </div>
              </li>
            </ul>
            @endforeach
          </div>
        </div>
      </section>
      <footer class="footer"><a href="mailto:devanadindra.p@gmail.com">devanadindra.p@gmail.com</a><a href="https://www.wantedly.com/users/48483598" target="_balnk">devanadindra</a></footer>
    </div>
</main>
@stop