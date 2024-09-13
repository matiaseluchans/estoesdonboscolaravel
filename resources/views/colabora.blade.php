@extends('layouts.app')

@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Colaborá</h1>

    </div>
</div>

<div class="container-fluid service overflow-hidden py-1">



    <div class="row">
        <div class="container py-5">
            <div class="row">

                <div class="col-md-12">
                    <div class="container-fluid py-2">
                        <div class="container ">
                            <div class="row">
                                <!--<div class="col-xl-4 wow fadeInLeft  d-flex flex-column justify-content-center" data-wow-delay="0.1s">
                                            <div class="rounded ">
                                                <img src="img/donbosco.png" class=" text-center mx-auto" style=";" alt="Image">

                                            </div>
                                        </div>-->
                                <div class="col-xl-12" style="height: 300px;">

                                    <div class="row mx-auto text-center">
                                        <p class="text-center">¿Cuánto podes colaborar?</p>
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <button class="btn btn-success btn-lg col-xs-10 col-md-6 my-2 mx-auto flash" onclick="link1000()" type="button"> $1.000</button>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <button class="btn btn-primary btn-lg  col-xs-10 col-md-6 my-2 mx-auto flash" onclick="link3000()" type="button"> $3.000</button>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <button class="btn btn-primary btn-lg  col-xs-10 col-md-6 my-2 mx-auto flash" onclick="link5000()" type="button"> $5.000</button>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <button class="btn btn-warning btn-lg  col-xs-10 col-md-6 my-2 mx-auto flash" onclick="link10000()" type="button"> $10.000</button>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <button class="btn btn-warning btn-lg  col-xs-10 col-md-6 my-2 mx-auto flash" onclick="link25000()" type="button"> $25.000</button>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection