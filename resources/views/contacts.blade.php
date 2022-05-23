@extends('layouts.app')

@section('content')
<div class="container">

<section class="mb-4">

<h2 class="h1-responsive font-weight-bold text-center my-4">Susisiekite su mumis</h2>

<div class="row">


    <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="mail.php" method="POST">


            <div class="row">


                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <label for="name" class="">Jūsų vardas</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <label for="email" class="">Jūsų el.paštas</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                </div>
 

            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <label for="subject" class="">Tema</label>
                        <input type="text" id="subject" name="subject" class="form-control">
                    </div>
                </div>
            </div>


            <div class="row">


                <div class="col-md-12">

                    <div class="md-form">
                        <label for="message">Jūsų žinutė</label>
                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                    </div>

                </div>
            </div>


        </form>

        <div class="text-center text-md-left">
            <a class="btn btn-primary m-3" onclick="document.getElementById('contact-form').submit();">Siųsti</a>
        </div>
        <div class="status"></div>
    </div>


    <div class="col-md-3 text-center">
        <ul class="list-unstyled mb-0">
            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p>Laisvės al. 33, Kaunas 44311</p>
            </li>

            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                <p>+370 600 63 439</p>
            </li>

            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                <p>martynas.rugienius@stud.kitm.lt</p>
            </li>
        </ul>
    </div>

</div>

</section>
<footer class="py-3 my-4 fixed-bottom">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
    <p class="text-center text-muted">© 2022 Kauno Informacinių Technologijų Mokykla</p>
  </footer>
</div>
@endsection