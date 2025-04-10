<header><a class="name" href="{{ route('home') }}">{{ session('personal_name') }}</a>
    <div class="wrap">
      <div class="icons"><a href="https://twitter.com/Goldi69s" target="_blank"><i class="fab fa-twitter"></i></a><a href="https://dribbble.com/kuon_yagi" target="_blank"><i class="fab fa-dribbble"></i></a><a href="https://www.instagram.com/devanadindra_?igsh=bzNsa3Ayc2ozNDVu&utm_source=qr" target="_blank">devanadindra_</a></div>
      <div class="menuIcon js-menuBtn"></div>
    </div>
    <nav class="global-nav">
      <ul class="global-nav__list">
        <li><a href="{{ route('home') }}">HOME</a></li>
        <li><a href='{{ route('about') }}'>ABOUT ME</a></li>
        <li><a href='{{ route('show_project') }}'>PROJECTS</a></li>
        <li><a href='{{ route('certificate') }}'>CERTIFICATES</a></li>
     </ul>
    </nav>
    <div class="curtain"></div>
    <div class="loader"></div>
</header>