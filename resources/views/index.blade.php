@extends('layouts.app')

@section('content')
    <!-- <div class="container-fluid  w-100 h-50">

            <img style="width:100%; height:400px;" id="image"src="img/utensiliosCabecera.jpg">

        </div> -->
    {{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Pagina de Inicio') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Estas logueado!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <!-- Masthead-->
    <header class="masthead">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center justify-content-start text-white">
                        <!-- Page heading-->
                        <h2 class="">BIENVENIDO AL SALON DE BELLEZA</h2>
                        <h2 class="mt-3">PIDE TU CITA, RAPIDO Y SENCILLO</h2>


                        @if(Auth::check())
                        <a class="btn btn-primary btn-lg mt-5" href="{{ route('cita') }}">
                            {{ __('Pedir cita') }}
                        </a>
                        @else
                        <a class="btn btn-primary btn-lg mt-5" href="{{ route('login') }}">
                            {{ __('Loguin para pedir tu cita') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Icons Grid-->
    <section class="features-icons bg-light text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi bi-calendar-check m-auto text-primary"></i></div>
                        <h3>Pide tu cita 24 horas al día</h3>
                        <p class="lead mb-0">Estamos diponibles todo el día para que puedas pedir tu cita a traves de nuestra plataforma</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi bi-lightning m-auto text-primary"></i></div>
                        <h3>Proceso muy rapido y sencillo</h3>
                        <p class="lead mb-0">Con tan solo tres clicks tendras tu cita para visitarnos</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                        <div class="features-icons-icon d-flex"><i class="bi bi-phone m-auto text-primary"></i></div>
                        <h3>Desde cualquier dispositivo</h3>
                        <p class="lead mb-0">Hazlo también desde la comodidad de tu movil</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Showcases-->
    <section class="showcase">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('assets/img/bg-showcase-1.jpg')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Tratamientos personalizados</h2>
                    <p class="lead mb-0">Disponemos de los mejores tratamientos personalizados para usted, consultenos sin ningún tipo de compromiso</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/img/bg-showcase-2.jpg')">
                </div>
                <div class="col-lg-6 my-auto showcase-text">
                    <h2>Tenemos el mejor equipamientos</h2>
                    <p class="lead mb-0">Usamos las últimas tecnologías y las ultimas maquinas para ponerlas a tu entera disposición</p>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-lg-6 order-lg-2 text-white showcase-img"
                    style="background-image: url('assets/img/bg-showcase-3.jpg')"></div>
                <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                    <h2>Pide cita cuando y donde quieras</h2>
                    <p class="lead mb-0">A traves de nuestra plataforma podras reserva tu cita en cualquier momento no te lo pienses</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials-->
    <section class="testimonials text-center bg-light">
        <div class="container">
            <h2 class="mb-5">Nuestros clientes...</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-1.jpg" alt="..." />
                        <h5>Elisa S.</h5>
                        <p class="font-weight-light mb-0">"Increible la experiencia, muy aconsejable"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-2.jpg" alt="..." />
                        <h5>Manuel G.</h5>
                        <p class="font-weight-light mb-0">"El trato ha sido maravilloso, repetiré siempre que pueda"</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                        <img class="img-fluid rounded-circle mb-3" src="assets/img/testimonials-3.jpg" alt="..." />
                        <h5>Ana B.</h5>
                        <p class="font-weight-light mb-0">"Me encato poder reservar a traves de la web, super sencillo!"
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call to Action-->
    <section class="call-to-action text-white text-center" id="signup">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <h2 class="mb-4">Tienes dudas, contacta!</h2>
                    <!-- Signup form-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form class="form-subscribe" id="contactFormFooter" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row">
                            <div class="col">
                                <input class="form-control form-control-lg" id="emailAddressBelow" type="email"
                                    placeholder="Email" data-sb-validations="required,email" />
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:required">Email
                                    Address is required.</div>
                                <div class="invalid-feedback text-white" data-sb-feedback="emailAddressBelow:email">Email
                                    Address Email is not valid.</div>
                            </div>
                            <div class="col-auto"><button class="btn btn-primary btn-lg disabled" id="submitButton"
                                    type="submit">Submit</button></div>
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                <p>To activate this form, sign up at</p>
                                <a class="text-white"
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#!">Sobre nosotros</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Contacto</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Terminos de uso</a></li>
                        <li class="list-inline-item">⋅</li>
                        <li class="list-inline-item"><a href="#!">Privacidad</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">&copy; WEB CITAS 2022</p>
                </div>
                <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-facebook fs-3"></i></a>
                        </li>
                        <li class="list-inline-item me-4">
                            <a href="#!"><i class="bi-twitter fs-3"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!"><i class="bi-instagram fs-3"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
@endsection
