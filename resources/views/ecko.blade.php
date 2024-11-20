@extends('layouts.app')

@section('content')
<div class="container-fluid service overflow-hidden py-1">



    <div class="row">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="rounded text-center mx-auto">
                        <!--
                                <img src="img/ecko.jpeg" class="" style="border-radius:20px;margin-bottom: -7px;height:550px;" alt="Image">
                                -->
                        <img src="img/ecko-hd.jpg" class="cancha-publicidad img-fluid d-block d-sm-none" style="border-radius:20px;" alt="Image" width="400">
                        <img src="img/ecko-hd.jpg" class="cancha-publicidad img-fluid d-none d-sm-block" style="border-radius:20px;" alt="Image" width="600">

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="py-0 mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="">Nuestro Padrino
                                    <a href="#" style="width:180px;" class=""
                                        onclick="abrirSpotify()">
                                        <img src="img/spotify.png" class="img-fluid" alt="" width="24">

                                        <small style="text-decoration: underline;">Sumate a la Playlist </small>
                                    </a>
                                </h5>
                            </div>


                        </div>


                        <h1 class="display-24 mb-4">Ecko: de la cancha al escenario del Club</h1>
                        <p class="mb-4">Ecko, el aclamado cantante que ha hecho vibrar a sus seguidores con sus ritmos urbanos y su potente voz, tiene una profunda conexión con nuestra comunidad. Antes de convertirse en un nombre conocido en la música, Ecko, junto a su hermano, jugó en nuestra cancha, viviendo sus primeras experiencias futbolísticas en el club.
                            <br><br>
                            Desde sus humildes comienzos en el barrio, Ecko ha escalado a la fama en tiempo record, consolidándose como uno de los artistas más destacados del género urbano. Su carrera ha estado marcada por una serie de hits que han resonado en todo el mundo, pero nunca ha olvidado sus raíces.
                            <br><br>
                            Hoy, en un emotivo regreso a sus orígenes, Ecko ha decidido convertirse en el padrino de nuestra cancha de 11 de pasto sintético. Su apoyo a este proyecto es un testimonio de su amor por el barrio y su compromiso con el desarrollo social y deportivo de nuevas generaciones.
                            <br><br>
                            Para celebrar y apoyar esta renovación, Ecko ofrecerá un espectacular show en nuestra cancha. Será una noche para disfrutar de su música y unirnos en torno a la revitalización de nuestro espacio deportivo.
                            <br><br>
                            Te invitamos a colaborar con el proyecto y hacer posible este cambio. Puedes contribuir con $1.000, $3.000, $5.000 o $10.000 para ayudar a construir una cancha de primer nivel que beneficiará a todos. Tu apoyo es fundamental para hacer realidad este sueño.
                            <b>¡Hacé tu aporte hoy y sé parte de esta transformación!</b>

                        </p>

                        <!--pantalla grande-->
                        <div class="col-xl-12 botonesDePago  d-none d-sm-block" style="height: 100px;">
                            <div class="row mx-auto text-center">
                                <div class="col-xs-12">
                                    <div class="row  mx-auto text-center d-none d-sm-block">
                                        <button class="btn btn-success btn-lg col-md-2 my-2 mx-1" type="button" onclick="link1000()"> $1.000</button>
                                        <button class="btn btn-success btn-lg col-md-2 my-2 mx-1" type="button" onclick="link3000()"> $3.000</button>
                                        <button class="btn btn-primary btn-lg col-md-2 my-2 mx-1" type="button" onclick="link5000()"> $5.000</button>
                                        <button class="btn btn-warning btn-lg col-md-2 my-2 mx-1" type="button" onclick="link10000()"> $10.000</button>
                                        <button class="btn btn-warning btn-lg col-md-2 my-2 mx-1" type="button" onclick="link25000()"> $25.000</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--pantalla pequena-->
                        <div class="col-xl-12 botonesDePago d-block d-sm-none" style="height: 350px;">
                            <div class="row mx-auto text-center">
                                <div class="col-xs-12">
                                    <div class="row  mx-auto text-center d-block d-sm-none">
                                        <button class="btn btn-success btn-lg col-xs-10 my-2 mx-1" type="button" onclick="link1000()"> $1.000</button>
                                        <button class="btn btn-success btn-lg col-xs-10 my-2 mx-1" type="button" onclick="link3000()"> $3.000</button>
                                        <button class="btn btn-primary btn-lg col-xs-10 my-2 mx-1" type="button" onclick="link5000()"> $5.000</button>
                                        <button class="btn btn-warning btn-lg col-xs-10 my-2 mx-1" type="button" onclick="link10000()"> $10.000</button>
                                        <button class="btn btn-warning btn-lg col-xs-10 my-2 mx-1" type="button" onclick="link25000()"> $25.000</button>
                                    </div>
                                </div>



                            </div>



                        </div>
                    </div>

                </div>
            </div>
            <!--pantalla grande-->
            <div class="row  mx-auto  d-none d-sm-block">
                <div class="col-md-8 offset-2" style="background-color: #d0fed73d;
                    border-radius: 15px;
                    padding: 20px;">
                    <div class="col-md-12" style="text-align: left;">
                        <h2>🎉 ¡Ecko vuelve al barrio en el Festival <span style="font-weight: 600">#11deSINTÉTICO!</span> 🎉<br></h2>


                        Vení a disfrutar una noche única el domingo 8 de diciembre desde las 19:00 hs en el club junto a Ecko, padrino de nuestro proyecto, y DJ's invitados.<br>
                        <br>
                        🎶 Música en vivo<br>
                        🥓 Parrilla<br>
                        🍔 Food trucks<br>
                        🍺 Barra<br>
                        💸 Precios accesibles<br>
                        👨‍👩‍👦‍👦 Ambiente familiar<br>
                        🫰 Valor de la entrada anticipada y en puerta: <span style="font-weight: 600">$8.500</span<br>

                            <br><br>Comprá tu entrada 👉 <a href="https://tickets.todoticket.ar/tickets/es/entradas-entradas-evento-11desintetico" target="_blank" rel="noopener noreferrer"><u>Acá</u></a>
                    </div>
                </div>
            </div>
            <!--pantalla pequena-->
            <div class="row  mx-auto text-center d-block d-sm-none">
                <div class="col-md-12" style="background-color: #d0fed73d;
                    border-radius: 15px;
                    padding: 20px;">
                    <div style="text-align: left;">
                        <h2>🎉 ¡Ecko vuelve al barrio en el Festival <span style="font-weight: 600">#11deSINTÉTICO!</span> 🎉<br></h2>

                        <div class="col-xs-12" style="text-align: left;">
                            Vení a disfrutar una noche única el domingo 8 de diciembre desde las 19:00 hs en el club junto a Ecko, padrino de nuestro proyecto, y DJ's invitados.<br>
                            <br>
                            🎶 Música en vivo<br>
                            🥓 Parrilla<br>
                            🍔 Food trucks<br>
                            🍺 Barra<br>
                            💸 Precios accesibles<br>
                            👨‍👩‍👦‍👦 Ambiente familiar<br>
                            🫰 Valor de la entrada anticipada<br> y en puerta: <span style="font-weight: 600">$8.500</span<br>
                        </div>
                        <br>Comprá tu entrada 👉 <a href="https://tickets.todoticket.ar/tickets/es/entradas-entradas-evento-11desintetico" target="_blank" rel="noopener noreferrer"><u>Acá</u></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @endsection