@extends('layouts.web.main')
@section('title', 'StudioVimana | Inicio')

@section('styles')
    {{-- Slider --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/swiper-slider/swiper.min.css') }}">
@endsection

@section('content')
    {{-- Facebook Plugin --}}
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8&appId=240698342801213";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script> 
    {{-- /Facebook Plugin --}}
    <div id="ActualSection" data-section="home"></div> {{-- JS Anchor --}}
    {{-- Home Section Desktop --}}
    <div  class="main-home" data-parallax="scroll">
        <div class="main-info wow animated fadeIn" data-wow-delay="0s" data-wow-duration="1s">
            <img src="{{ asset('webimages/logos/main-logo.png') }}">
            <h1>Desarrollo Web y Diseño Gráfico</h1>
            <div class="actions">
                <a href="{{ route('web.portfolio') }}"><button class="button btnHollowGreyTrans">Nuestro Portfolio</button></a>
                <a href="{{ url('/#contact') }}"><button class="button btnHollowGreen">Contactanos</button></a>
            </div>
        </div>
    </div>
    {{-- First Info --}}
    <div class="container-fluid section-container home-section-2">
        <div class="container">
            <article class="row">
                <div class="col-md-6 big-text">
                    <span class="wow animated fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">DISEÑO</span> <br>
                    <span class="wow animated fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">INNOVACIÓN</span> <br> 
                    <span class="wow animated fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">CREATIVIDAD</span>
                </div>
                <div class="col-md-6 small-text wow animated fadeIn">
                    <p>
                        Somos un equipo de trabajo dedicado a crear soluciones visuales.
                        Nos especializamos en el área del <b>diseño web</b>, <b>la programación</b>,
                        el <b>diseño gráfico</b> y la <b>ilustración.</b> <br>
                        Generamos contenido propio y personalizado para que cada
                        cliente obtenga un producto único y original. <br>
                    </p>
                </div>     
                <div class="icons horizontal-list power-icons">
                    <ul>
                        <li class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src=" {{ asset('webimages/gral/home/icons/icon2.png') }} "></li>
                        <li class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <img src=" {{ asset('webimages/gral/home/icons/icon1.png') }} "></li>
                        <li class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <img src=" {{ asset('webimages/gral/home/icons/icon4.png') }} "></li>
                        <li class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src=" {{ asset('webimages/gral/home/icons/icon3.png') }} "></li>
                        <li class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                        <img src=" {{ asset('webimages/gral/home/icons/icon5.png') }} "></li>
                    </ul>
                </div>
            </article>
            <div class="row bottom-text wow animated fadeIn">
                <span>Atendemos Empresas, Pymes, Proyectos y Particulares.</span> 
            </div>
        </div>
    </div>
    <div class="home-section-3 wow animated fadeIn">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('webimages/gral/home/pro1.png') }}" alt="">
                    <h3>Concepto</h3>
                    <img class="divisor" src="{{ asset('webimages/gral/home/divisor.png') }}" alt="">
                    <div class="text">
                        <p>
                            Analizamos el perfil del cliente para detectar las cualidades a destacar.
                            El objetivo es que en el primer vistazo sea valorado positivamente.
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('webimages/gral/home/pro2.png') }}" alt="">
                    <h3>Planificación</h3>
                    <img class="divisor" src="{{ asset('webimages/gral/home/divisor.png') }}" alt="">
                    <div class="text">
                        <p>
                            Desarrollamos y presentamos ideas. Aportamos nuestro punto de vista y nuestra experiencia con otros clientes.
                        </p>    
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('webimages/gral/home/pro3.png') }}" alt="">
                    <h3>Aprobación</h3>
                    <img class="divisor" src="{{ asset('webimages/gral/home/divisor.png') }}" alt="">
                    <div class="text">
                        <p>
                            Trabajamos con la aprobación del cliente. Vamos avanzando según las etapas sean resueltas con una devolución positiva.
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('webimages/gral/home/pro4.png') }}" alt="">
                    <h3>Soporte</h3>
                    <img class="divisor" src="{{ asset('webimages/gral/home/divisor.png') }}" alt="">
                    <div class="text">
                        <p>
                            Una vez en marcha le damos al proyecto el retoque necesario para encausarlo a la dirección correcta.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Slider --}}
   {{--  <div class="container home-mid-slider">
        <div class="row">
            <div class="col-md-6">

                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="{{ asset('webimages/gral/home/slider/homeimg2.jpg') }}" alt=""></div>
                        <div class="swiper-slide"><img src="{{ asset('webimages/gral/home/slider/homeimg3.jpg') }}" alt=""></div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>



            </div>
            <div class="col-md-6 inner-text">
                - Sitios 100% responsivos<br>
                - Diseños Creativos<br>
                - Asesoramiento en estética<br>
                - Asesoramiento de buenas prácticas<br>
                - Administración y mantenimiento
            </div>
        </div>
    </div>
    --}}
    {{-- Our Services --}}
    <section>
        <div id="services" class="container">
            <div class="container swiper-container1">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="col-md-3">
                            <img src="{{ asset('webimages/gral/home/servicio1.png') }}">    
                        </div>
                        <div class="col-md-9">
                            <h1>Diseño y Desarrollo Web</h1> 
                            <p>
                                Desarrollamos sitios personalizados. Creados desde cero y con las últimas tecnologías web.
                                <b>Son visibles en todo tipo de dispositivo.</b>
                                Entregamos un código limpio y optimizado para luego incluírlo en buscadores cumpliendo con sus exigencias. <br><br>
                                <i class="ion-record"></i> <b>Adaptables</b> | Celulares | Tablets | Notebooks | Pc <br>
                                <i class="ion-record"></i> <b>Sitios Institucionales</b> | Económicos | Rápido Desarrollo <br>
                                <i class="ion-record"></i> <b>Diseño gráfico</b> | Creamos las piezas necesarias para el sitio<br>
                                <i class="ion-record"></i> <b>Relacionado con Redes Sociales</b> | Aumenta el posicionamiento<br>
                                <i class="ion-record"></i> <b>Exposición</b> | GoogleAdwords | Facebook | Buscadores | *Opcional<br>
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="col-md-3">
                            <img src="{{ asset('webimages/gral/home/servicio2.png') }}">    
                        </div>
                        <div class="col-md-9">
                            <h1>Progamación y Desarrollo de Apps</h1> 
                            <p>
                                Creamos sistemas hechos a medida según las necesidades presentadas.<br>
                                Desarrollamos: <br>
                                <i class="ion-record"></i> <b>Gestores de Contenido</b><br>
                                <i class="ion-record"></i> <b>Carros de Compras</b><br>
                                <i class="ion-record"></i> <b>Portfolios</b><br>
                                <i class="ion-record"></i> <b>Catálogos</b><br>
                                <i class="ion-record"></i> <b>Blogs</b> <br>
                                <b>* Son Autoadministrables !</b>
                            </p>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="col-md-3">
                            <img src="{{ asset('webimages/gral/home/servicio3.png') }}">    
                        </div>
                        <div class="col-md-9">
                            <h1>Diseño Gráfico</h1> 
                            <p>
                                Desarrollamos piezas personalizadas.  <br>
                                Estudiamos el perfil de cliente para  <br>
                                entregar un producto acorde a la imágen buscada <br><br>

                                <i class="ion-record"></i> <b>Identidad Corporativa</b> | Marca | Logos <br>
                                <i class="ion-record"></i> <b>Papelería industrial</b> | Tarjetas | Flyiers <br>
                                <i class="ion-record"></i> <b>Publicidad</b> | Redes sociales | Plantillas | Posts <br>
                                <i class="ion-record"></i> <b>Editorial</b> | Libros | Catálogos | Manuales | Folletos <br>
                                <i class="ion-record"></i> <b>Packagin</b> | Etiquetas | Bolsas | Cajas <br>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <div id="services" class="container-fluid section-container our-services">
        <div class="container">
            <div class="row row-flex row-flex-wrap service-item">
                <div class="col-md-4 col-sm-12 col-xs-12 inner wow animated fadeIn" data-wow-delay="0.3s">
                    <img src="{{ asset('webimages/gral/home/servicio1.png') }}">
                </div>
                <article class="col-md-8 col-sm-12 col-xs-12 inner wow animated fadeInRight">
                    <div class="text-big">
                        <h1>Diseño y Desarrollo Web</h1> 
                        <img src="{{ asset('webimages/gral/home/divisor2.png') }}">    
                    </div>
                    <p>
                        Desarrollamos sitios personalizados. Creados desde cero y con las últimas tecnologías web.
                        <b>Son visibles en todo tipo de dispositivo.</b>
                        Entregamos un código limpio y optimizado para luego incluírlo en buscadores cumpliendo con sus exigencias. <br><br>
                        <i class="ion-record"></i> <b>Adaptables</b> | Celulares | Tablets | Notebooks | Pc <br>
                        <i class="ion-record"></i> <b>Sitios Institucionales</b> | Económicos | Rápido Desarrollo <br>
                        <i class="ion-record"></i> <b>Diseño gráfico</b> | Creamos las piezas necesarias para el sitio<br>
                        <i class="ion-record"></i> <b>Relacionado con Redes Sociales</b> | Aumenta el posicionamiento<br>
                        <i class="ion-record"></i> <b>Exposición</b> | GoogleAdwords | Facebook | Buscadores | *Opcional<br>
                    </p>
                </article>
            </div>

            

            <div class="row row-flex row-flex-wrap service-item">
                <div class="col-md-4 col-sm-12 col-xs-12 inner wow animated fadeIn" data-wow-delay="0.3s">
                    <img src="{{ asset('webimages/gral/home/servicio2.png') }}">       
                </div>
                <article class="col-md-8 col-sm-12 col-xs-12 inner wow animated fadeInRight">
                    <div class="text-big">
                        <h1>Progamación y Desarrollo de Apps</h1> 
                        <img src="{{ asset('webimages/gral/home/divisor2.png') }}">      
                    </div>
                    <p>
                        Creamos sistemas hechos a medida según las necesidades presentadas.<br>
                        Desarrollamos: <br>
                        <i class="ion-record"></i> <b>Gestores de Contenido</b><br>
                        <i class="ion-record"></i> <b>Carros de Compras</b><br>
                        <i class="ion-record"></i> <b>Portfolios</b><br>
                        <i class="ion-record"></i> <b>Catálogos</b><br>
                        <i class="ion-record"></i> <b>Blogs</b> <br>
                        <b>* Son Autoadministrables !</b>
                        
                    </p>
                </article>
            </div>
            <div class="row row-flex row-flex-wrap service-item">
                <div class="col-md-4 col-sm-12 col-xs-12 inner wow animated fadeIn" data-wow-delay="0.3s">
                    <img src="{{ asset('webimages/gral/home/servicio3.png') }}">        
                </div>
                <article class="col-md-8 col-sm-12 col-xs-12 inner wow animated fadeInRight">
                    <div class="text-big">
                        <h1>Diseño Gráfico</h1> 
                        <img src="{{ asset('webimages/gral/home/divisor2.png') }}">    
                    </div>
                    <p>
                        Desarrollamos piezas personalizadas.  <br>
                        Estudiamos el perfil de cliente para  <br>
                        entregar un producto acorde a la imágen buscada <br><br>

                        <i class="ion-record"></i> <b>Identidad Corporativa</b> | Marca | Logos <br>
                        <i class="ion-record"></i> <b>Papelería industrial</b> | Tarjetas | Flyiers <br>
                        <i class="ion-record"></i> <b>Publicidad</b> | Redes sociales | Plantillas | Posts <br>
                        <i class="ion-record"></i> <b>Editorial</b> | Libros | Catálogos | Manuales | Folletos <br>
                        <i class="ion-record"></i> <b>Packagin</b> | Etiquetas | Bolsas | Cajas <br>
                    </p>
                </article>
            </div>
        </div>
    </div>
    {{-- Our Works | Portfolio --}}
    <div class="container-fluid our-works">
        <div class="container wow animated fadeIn">
            <div class="row">
             
                {{-- Mobile --}} 
                <div class="col-xs-12 col-sm-6 col-md-4 inner inner-mobile">
                    <h1>NUESTRO<br>PORTFOLIO</h1>
                    <p class="first">
                        Una imágen vale más que un slogan.
                    </p>
                    <p class="second">
                        Visitá nuestro portfolio y mirá como trabajamos.
                    </p>
                    <a href="{{ route('web.portfolio') }}"><button class="button btnHollowGreyTransBlack">Nuestro Portfolio</button></a>
                </div>
                {{-- Desk --}} 
                <div class="col-xs-12 col-sm-6 col-md-4 inner inner-desk">
                    <h1>NUESTRO<br>PORTFOLIO</h1>
                    <p class="first">
                        Una imágen vale más <br>que un slogan.
                    </p>
                    <p class="second">
                        Visitá nuestro portfolio <br> y mirá como trabajamos.
                    </p>
                    <a href="{{ route('web.portfolio') }}"><button class="button btnHollowGreyTransBlack">Nuestro Portfolio</button></a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-8 inner">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="{{ asset('webimages/gral/home/portfolioslider/port1.jpg') }}" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('webimages/gral/home/portfolioslider/port2.jpg') }}" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('webimages/gral/home/portfolioslider/port3.jpg') }}" alt=""></div>
                            <div class="swiper-slide"><img src="{{ asset('webimages/gral/home/portfolioslider/port4.jpg') }}" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.web.partials.contact-tab')
    @include('layouts.web.partials.contact')
    @include('layouts.web.partials.foot')
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('plugins/parallax/parallax.min.js') }}"></script>
    {{-- Slider --}}
    <script type="text/javascript" src="{{ asset('plugins/swiper-slider/swiper.jquery.min.js') }}"></script>
@endsection

@section('custom_js')
<script>    
    // Home Parallax
    var image = "{{ asset('webimages/gral/home/home-back.jpg') }}";
    $('.main-home').parallax({ imageSrc: image });

    // Home Slider    
    // var swiper = new Swiper('.swiper-container');
    var mySwiper = new Swiper('.swiper-container', {
        // autoplay:true,
        pagination: true,
        // speed: 10000,
        spaceBetween: 100
    }); 

    var mySwiper2 = new Swiper('.swiper-container1', {
        // autoplay:true,
        pagination: true,
        // speed: 10000,
        spaceBetween: 100
    }); 

    $(document).on('submit','#MainContactForm',function(e){
        e.preventDefault();

        var data   = $(this).serialize();
        var route  = "{{ url('mail_sender') }}";
        // var route  = "{{ url('test_sender') }}";
        var loader = '<img src="{{ asset("images/loaders/loader-sm.svg") }}"/>' + '<div style="color: #fff; margin-left: 15px">Enviando...</div>';

        $.ajax({
            type: "POST",
            url: route,
            dataType: 'json',
            data: data,
            beforeSend: function(){
                var loader = "<img src='{{ asset('images/loaders/loader-sm.svg') }}'>";
                $('#ContactBtn').html('Enviando ' + loader);
            },
            success: function(data) {
                $('#MainContactForm').hide();
                $('#FormSuccess').removeClass('Hidden');
                $('#FormResponse').hide();
                console.log(data);
            },
            error: function(data) {
                $('#FormResponse').hide();
                $('#MainContactForm').hide();
                $('#ContactBtn').html('ENVIAR');
                $('#FormError').removeClass('Hidden');
                console.log(data);
            }
        });
    });
</script>
@endsection