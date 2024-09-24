<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8" />
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="fontawesome-5.5/css/all.min.css" />
  <link rel="stylesheet" href="slick/slick.css">
  <link rel="stylesheet" href="slick/slick-theme.css">
  <link rel="stylesheet" href="magnific-popup/magnific-popup.css">
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/tooplate-infinite-loop.css" />
  <!--
Tooplate 2117 Infinite Loop
https://www.tooplate.com/view/2117-infinite-loop
-->

</head>

<body>
  <!-- Hero section -->
  <section id="infinite" class="text-white tm-font-big tm-parallax">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-md tm-navbar" id="tmNav">
      <div class="container">
        <div class="tm-next">
          <a href="#infinite" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars navbar-toggler-icon"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link tm-nav-link" href="#infinite">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link tm-nav-link" href="#whatwedo">¿Quiénes somos?</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link tm-nav-link" href="#testimonials">Nos recomiendan</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link tm-nav-link" href="#gallery">Galería</a>
            </li>
            <li class="nav-item">
              <a class="nav-link tm-nav-link" href="#contact">Contactanos</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
    <div class="text-center tm-hero-text-container">
      <div class="tm-hero-text-container-inner">
        <h2 class="tm-hero-title">Cantabria Eventos</h2>
        <p class="tm-hero-subtitle">
          Siente la magia.
        </p>
      </div>
    </div>

    <div class="tm-next tm-intro-next">
      <a href="#whatwedo" class="text-center tm-down-arrow-link">
        <i class="fas fa-2x fa-arrow-down tm-down-arrow"></i>
      </a>
    </div>
  </section>

  <section id="whatwedo" class="tm-section-pad-top">

    <div class="container">

      <div class="row tm-content-box">
        <!-- first row -->
        <div class="col-lg-12 col-xl-12">
          <div class="tm-intro-text-container">
            <h2 class="tm-text-primary mb-4 tm-section-title">¿Quiénes somos?</h2>
            <p class="mb-4 tm-intro-text">
              Somo más que un salón de eventos, es algo mágico. Ya que nuestro objetivo es que sea una experiencia
              inolvidable, es por eso que nos enfocamos en la calidad y comodidad para todos. </p>
          </div>
        </div>

      </div><!-- first row -->

      <div class="row tm-content-box">
        <!-- second row -->
        <div class="col-lg-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-center tm-icon" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div class="col-lg-5">
          <div class="tm-intro-text-container">
            <h2 class="tm-text-primary mb-4">Calidad de servicio</h2>
            <p class="mb-4 tm-intro-text">
              Nuestro personal esta en constante capacitación para que tu evento sea lo mas agradable para ti y tus
              invitados.</p>
          </div>
        </div>

        <div class="col-lg-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-center tm-icon" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" strokeWidth={2}>
            <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
            <path strokeLinecap="round" strokeLinejoin="round"
              d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
          </svg>
        </div>
        <div class="col-lg-5">
          <div class="tm-intro-text-container">
            <h2 class="tm-text-primary mb-4">Estacionamiento</h2>
            <p class="mb-4 tm-intro-text">
              Contamos con estacionamiento dentro del establecimiento, por lo que no se preocuparas de algun
              inconveniente de sus vehículos.</p>
          </div>
        </div>

      </div><!-- second row -->

      <div class="row tm-content-box">
        <!-- third row -->
        <div class="col-lg-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-center tm-icon" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
          </svg>
        </div>
        <div class="col-lg-5">
          <div class="tm-intro-text-container">
            <h2 class="tm-text-primary mb-4">Elegancia</h2>
            <p class="mb-4 tm-intro-text">
              Te podemos garantizar que nuestros <strong>productos y moviliarios</strong> mas reciente en el mercado,
              por lo que puedes estar tranquilo que tu evento será de la mejor calidad.
            </p>
          </div>
        </div>

        <div class="col-lg-1">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-center tm-icon" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
          </svg>
        </div>
        <div class="col-lg-5">
          <div class="tm-intro-text-container">
            <h2 class="tm-text-primary mb-4">Esto y mucho más</h2>
            <p class="mb-4 tm-intro-text">
              Tenemos todo para tu evento para que tú solo te preocupes por disfrutarlo,te garantizamos que contamos con
              nuestro sello de satisfacción total.
            </p>
          </div>
        </div>

      </div><!-- third row -->

    </div>

  </section>

{{--   <section id="testimonials" class="tm-section-pad-top tm-parallax-2">
    <div class="container tm-testimonials-content">
      <div class="row">
        <div class="col-lg-12 tm-content-box">
          <h2 class="text-white text-center mb-4 tm-section-title">Nos recomiendan</h2>
          <p class="mx-auto tm-section-desc text-center">
            .
          </p>
          <div class="mx-auto tm-gallery-container tm-gallery-container-2">
            <div class="tm-testimonials-carousel">
              @foreach ($recommendations as $recommendation )
              <figure class="tm-testimonial-item">
                <img src="{{ asset($recommendation->url_image) }}" alt="Image" class="img-fluid mx-auto" width="100">
                <blockquote>{{$recommendation->comment}}</blockquote>
                <figcaption>{{$recommendation->name}}</figcaption>
              </figure>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tm-bg-overlay"></div>
  </section> --}}

  <section id="gallery" class="tm-section-pad-top">
    <div class="container tm-container-gallery">
      <div class="row">
        <div class="text-center col-12">
          <h2 class="tm-text-primary tm-section-title mb-4">Galeria</h2>
          <p class="mx-auto tm-section-desc">
            A continuación, te mostramos cada una de las áreas de nuestro salón.
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="mx-auto tm-gallery-container">
            <div class="grid tm-gallery">
              <a href="image/cantabria_2.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="image/cantabria_2.jpg" alt="Image 1" class="img-fluid">
                  <figcaption>
                    <h2><i>Centro de la pista</i></h2>
                  </figcaption>
                </figure>
              </a>
              <a href="image/cantabria_4.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="image/cantabria_4.jpg" alt="Image 2" class="img-fluid">
                  <figcaption>
                    <h2><i>Mesa <br><span>de los festejados</span></i></h2>
                  </figcaption>
                </figure>
              </a>
              <a href="image/cantabria_1.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="image/cantabria_1.jpg" alt="Image 4" class="img-fluid">
                  <figcaption>
                    <h2><i>Siempre <span>Elegante</span></i></h2>
                  </figcaption>
                </figure>
              </a>
              <a href="image/cantabria_6.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="image/cantabria_6.jpg" alt="Image 5" class="img-fluid">
                  <figcaption>
                    <h2><i><span>Mesa de<br> </span> Postres</i></h2>
                  </figcaption>
                </figure>
              </a>
              <a href="image/cantabria_8.jpg">
                <figure class="effect-honey tm-gallery-item">
                  <img src="image/cantabria_8.jpg" alt="Image 6" class="img-fluid">
                  <figcaption>
                    <h2><i>Centro de <br> <span>Mesa</span></i></h2>
                  </figcaption>
                </figure>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section id="contact" class="tm-section-pad-top tm-parallax-2">

    <div class="container tm-container-contact">

      <div class="row">

        <div class="text-center col-12">
          <h2 class="tm-section-title mb-4">Comunicate con nosotros</h2>
          <p class="mb-5">
            Nos interesa saber que piensas, es por eso que ponemos a tu disposición los canales de comunicación y
            nuestras redes sociales. Te agradecemos tu comentario.
          </p>
        </div>

        <div class="col-sm-12 col-md-6">
{{--           <form action="{{ route('interested.store')}}" method="POST" novalidate>
            @csrf
            <input id="name" name="name" type="text" placeholder="Tu nombre" class="tm-input" />
            @error('name')
            <div class="alert alert-danger mt-2" role="alert">
              {{$message}}
          </div>
            @enderror
            <input id="email" name="email" type="email" placeholder="Tu correo electrónico" class="tm-input" />
            @error('email')
            <div class="alert alert-danger mt-2" role="alert">
              {{$message}}
          </div>
            @enderror
            <textarea id="message" name="message" rows="8" placeholder="Mensaje" class="tm-input"></textarea>
            @error('message')
            <div class="alert alert-danger mt-2" role="alert">
              {{$message}}
          </div>
            @enderror
            {{-- <span>Ingresa el siguiente Captcha por seguridad</span>
            <div class="captcha mb-3">
              <span>{!! captcha_img()!!}</span>
              <a type="button" class="btn btn-danger" id="reload" >
                &#x21bb;
              </a>
            </div>
            <input type="text" id="captcha" name="captcha" class="tm-input" placeholder="Ingresa captcha">
            @error('captcha')
            <div class="alert alert-danger mt-2" role="alert">
              {{$message}}
          </div>
            @enderror --}}
            {{-- <button type="submit" class="btn tm-btn-submit">Enviar</button>
          </form> --}}
        </div>

        <div class="col-sm-12 col-md-6">

          <div class="contact-item">
            <a rel="nofollow" href="mailto:Yuliana.anaya@cantabriaeventos.com" class="item-link">
              <i class="far fa-2x fa-envelope mr-4"></i>
              <span class="mb-0">Yuliana.anaya@cantabriaeventos.com</span>
            </a>
          </div>

          <div class="contact-item">
            <a rel="nofollow" href="https://maps.app.goo.gl/7dVC98AmY87NGdM8A" class="item-link">
              <i class="fas fa-2x fa-map-marker-alt mr-4"></i>
              <span class="mb-0">Nuestra ubicación</span>
            </a>
          </div>

          <div class="contact-item">
            <a rel="nofollow" href="tel:614 385 3377" class="item-link">
              <i class="fas fa-2x fa-phone-square mr-4"></i>
              <span class="mb-0">(614) 385 3377</span>
            </a>
          </div>

          <div class="contact-item">
            <a class="item-link"
              href="https://wa.me/5216143853377?text=Estoy%20interesado%20en%20sus%20servicios,%20me%20puedes%20ayudar.">
              <i class="fab fa-whatsapp fa-2x mr-4 ml-2"></i>
              <span class="mb-0 pl-2">(614) 385 3377</span>
            </a>

          </div>

        </div>


      </div><!-- row ending -->

    </div>

    <footer class="text-center small tm-footer">
      <p class="mb-0">
        Copyright &copy; Cantabria Eventos 2024
      </p>
    </footer>

  </section>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="slick/slick.min.js"></script>
  <script src="magnific-popup/jquery.magnific-popup.min.js"></script>
  <script src="js/easing.min.js"></script>
  <script src="js/jquery.singlePageNav.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    function getOffSet(){
        var _offset = 450;
        var windowHeight = window.innerHeight;

        if(windowHeight > 500) {
          _offset = 400;
        }
        if(windowHeight > 680) {
          _offset = 300
        }
        if(windowHeight > 830) {
          _offset = 210;
        }

        return _offset;
      }

      function setParallaxPosition($doc, multiplier, $object){
        var offset = getOffSet();
        var from_top = $doc.scrollTop(),
          bg_css = 'center ' +(multiplier * from_top - offset) + 'px';
        $object.css({"background-position" : bg_css });
      }

      // Parallax function
      // Adapted based on https://codepen.io/roborich/pen/wpAsm
      var background_image_parallax = function($object, multiplier, forceSet){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        // $object.css({"background-attatchment" : "fixed"});

        if(forceSet) {
          setParallaxPosition($doc, multiplier, $object);
        } else {
          $(window).scroll(function(){
            setParallaxPosition($doc, multiplier, $object);
          });
        }
      };

      var background_image_parallax_2 = function($object, multiplier){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        $object.css({"background-attachment" : "fixed"});

        $(window).scroll(function(){
          if($(window).width() > 768) {
            var firstTop = $object.offset().top,
                pos = $(window).scrollTop(),
                yPos = Math.round((multiplier * (firstTop - pos)) - 186);

            var bg_css = 'center ' + yPos + 'px';

            $object.css({"background-position" : bg_css });
          } else {
            $object.css({"background-position" : "center" });
          }
        });
      };

      $(function(){
        // Hero Section - Background Parallax
        background_image_parallax($(".tm-parallax"), 0.30, false);
        background_image_parallax_2($("#contact"), 0.80);
        background_image_parallax_2($("#testimonials"), 0.80);

        // Handle window resize
        window.addEventListener('resize', function(){
          background_image_parallax($(".tm-parallax"), 0.30, true);
        }, true);

        // Detect window scroll and update navbar
        $(window).scroll(function(e){
          if($(document).scrollTop() > 120) {
            $('.tm-navbar').addClass("scroll");
          } else {
            $('.tm-navbar').removeClass("scroll");
          }
        });

        // Close mobile menu after click
        $('#tmNav a').on('click', function(){
          $('.navbar-collapse').removeClass('show');
        })

        // Scroll to corresponding section with animation
        $('#tmNav').singlePageNav({
          'easing': 'easeInOutExpo',
          'speed': 600
        });

        // Add smooth scrolling to all links
        // https://www.w3schools.com/howto/howto_css_smooth_scroll.asp
        $("a").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 600, 'easeInOutExpo', function(){
              window.location.hash = hash;
            });
          } // End if
        });

        // Pop up
        $('.tm-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          gallery: { enabled: true }
        });

        $('.tm-testimonials-carousel').slick({
          dots: true,
          prevArrow: false,
          nextArrow: false,
          infinite: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                  slidesToShow: 1
              }
            }
          ]
        });

        // Gallery
        $('.tm-gallery').slick({
          dots: true,
          infinite: false,
          slidesToShow: 5,
          slidesToScroll: 2,
          responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
        });
      });
  </script>
</body>

</html>
