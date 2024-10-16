@extends('layouts.app')

@section('content')
<div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
        <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Espacios de Publicidad</h1>
            <!--<ol class="breadcrumb justify-content-center text-white mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li class="breadcrumb-item"><a href="index.html" class="text-white">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li>
                    <li class="breadcrumb-item active text-secondary">Espacios de Publicidad</li>
                </ol>-->
    </div>
</div>
<!-- Header End -->

<!-- Services Start -->
<div class="container-fluid service overflow-hidden py-5">


    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="row d-flex  justify-content-center mb-2">

                <div class="col-xl-12 ">
                    <h1 class="display-5 mb-4 text-center">Cancha N° 1 - Baby</h1>
                    <hr>
                </div>
            </div>
            <div class="row d-flex  justify-content-center mb-2 wow fadeInRight" data-wow-delay="0.3s">
                <div class="col-sm-12 col-md-5 d-flex flex-column align-items-center ">
                    <h2 class="text-center">Ubicación de Espacios </h2>

                    <img src="img/cancha-baby.png" class="cancha-publicidad img-fluid d-block d-sm-none" alt="Image" width="400">
                    <img src="img/cancha-baby.png" class="cancha-publicidad img-fluid d-none d-sm-block" alt="Image" width="600">

                </div>
                <div class="col-sm-12 col-md-2 d-flex flex-column align-items-center py-4 mt-5">
                    <h4 class="text-center">Dejá tu marca en la cancha </h4>
                    <p class="text-center">¡No te quedes sin un espacio para publicitar tu negocio! Tenemos opciones acordes a tu necesidad y presupuesto.</p>
                    <button onclick="abrirWhatsAppPublicidad()" class="btn btn-primary btn-xl-square flash">
                        Me interesa
                    </button>


                </div>
                <div class="col-sm-12 col-md-5 d-flex flex-column align-items-center mx-0 px-0" style="font-size: 12px;">
                    <h2 class="text-center">Información de los Espacios</h2>
                    <div class="d-flex justify-content-center" style="width: 100%;height: 450px; overflow-y: scroll;">
                        <table class="table table-striped" style="width: auto; ">
                            <thead style="width: 324px;">
                                <tr>
                                    <th>Espacio</th>
                                    <th>Medida</th>
                                    <th>Precio</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody id="table-body" style=" ">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="row d-flex  justify-content-center mb-2" >

                        <div class="col-xl-12 ">
                            <h1 class="display-5 mb-4 text-center"></h1>
                            <hr>
                        </div>
                    </div>
                    <div class="row d-flex  justify-content-center mb-2  wow fadeInRight" data-wow-delay="0.3s" >
                        <div class="col-sm-12 col-md-5 d-flex flex-column align-items-center">
                            <h2 class="text-center">Cancha N° 2 - Futsal  </h2>


                            <img src="img/cancha-futsal.png" class="cancha-publicidad img-fluid d-block d-sm-none" alt="Image" width="400">
                            <img src="img/cancha-futsal.png" class="cancha-publicidad img-fluid d-none d-sm-block" alt="Image" width="600">

                        </div>
                        <div class="col-sm-12 col-md-2 d-flex flex-column align-items-center py-4 mt-5">
                            <h4 class="text-center">Dejá tu marca en la cancha </h4>
                            <p class="text-center">¡No te quedes sin un espacio para publicitar tu negocio! Tenemos opciones acordes a tu necesidad y presupuesto.</p>
                            <button onclick="abrirWhatsAppPublicidad()" class="btn btn-primary btn-xl-square flash">
                                Me interesa
                            </button>


                        </div>

                        <div class="col-sm-12 col-md-5 d-flex flex-column align-items-center" style="font-size: 12px;">
                            <h2 class="text-center">Información de los Espacios</h2>
                            <div class="d-flex justify-content-center" style="width: 100%;height: 450px; overflow-y: scroll;">
                                <table class="table table-striped" style="width: 324px; ">
                                    <thead style="width: 324px;">
                                        <tr>
                                            <th>Espacio</th>
                                            <th>Medida</th>
                                            <th>Precio</th>
                                            <th>Estado</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-body-futsal" style="">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        -->


    <div class="row py-2">
        <div class="col-md-10 mx-auto">
            <hr>
            <small>
                <b>CONDICIONES DE PUBLICACIÓN:</b><br>

                1. Se mantiene la posición del cartel todo 2025.<br>
                2. Se renueva en noviembre 2025.<br>
                3. El costo del cartel y colocación queda a cargo del club.<br>
                4. Se puede entregar factura electrónica o nota agradecimiento membretada y sellada.<br>
                5. Se solicita permiso al sponsor para también incluirlo en redes sociales del club.<br>
                6. El sponsor tiene que facilitar logo en buena calidad (pdf,png,coredraw,jpg) + los datos que quiera incluir (dirección,teléfono,redes).<br>
            </small>
        </div>
    </div>
</div>
<script>
    // Ejemplo de datos JSON
    const jsonData = [{
            "espacio": "1",
            "medida": "2 x 2",
            "precio": "$ 700.000",
            "estado": "Disponible"
        },
        {
            "espacio": "2",
            "medida": "2 x 2",
            "precio": "$ 700.000",
            "estado": "Disponible"
        },
        {
            "espacio": "3",
            "medida": "2 x 2",
            "precio": "$ 700.000",
            "estado": "Disponible"
        },
        {
            "espacio": "4",
            "medida": "2 x 2",
            "precio": "$ 700.000",
            "estado": "Disponible"
        },
        {
            "espacio": "5",
            "medida": "2 x 2",
            "precio": "$ 700.000",
            "estado": "Disponible"
        },
        {
            "espacio": "6",
            "medida": "2 x 2",
            "precio": "$ 700.000",
            "estado": "Disponible"
        },
        {
            "espacio": "7",
            "medida": "2 x 2",
            "precio": "$ 700.000",
            "estado": "Disponible"
        },
        {
            "espacio": "8",
            "medida": "2 x 2",
            "precio": "$ 700.000",
            "estado": "Disponible"
        },
        {
            "espacio": "9",
            "medida": "3 x 1",
            "precio": "$ 600.000",
            "estado": "Vendido"
        },
        {
            "espacio": "10",
            "medida": "3 x 1",
            "precio": "$ 600.000",
            "estado": "Vendido"
        },

        {
            "espacio": "11",
            "medida": "3.5 x 1",
            "precio": "$ 500.000",
            "estado": "Disponible"
        },
        {
            "espacio": "12",
            "medida": "3.5 x 1.5",
            "precio": "$ 600.000",
            "estado": "Disponible"
        },
        {
            "espacio": "13",
            "medida": "3.5 x 1.5",
            "precio": "$ 600.000",
            "estado": "Disponible"
        },
        {
            "espacio": "14",
            "medida": "4 x 2",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "15",
            "medida": "3.5 x 1.5",
            "precio": "$ 600.000",
            "estado": "Disponible"
        },
        {
            "espacio": "16",
            "medida": "3.5 x 1.5",
            "precio": "$ 600.000",
            "estado": "Disponible"
        },

        {
            "espacio": "17",
            "medida": "3.5 x 1.5",
            "precio": "$ 600.000",
            "estado": "Disponible"
        },
        {
            "espacio": "18",
            "medida": "3 x 1",
            "precio": "$ 600.000",
            "estado": "Disponible"
        },
        {
            "espacio": "19",
            "medida": "3.5 x 1.5",
            "precio": "$ 500.000",
            "estado": "Disponible"
        },
        {
            "espacio": "20",
            "medida": "3.5 x 1.5",
            "precio": "$ 500.000",
            "estado": "Disponible"
        },
        {
            "espacio": "21",
            "medida": "3 x 1",
            "precio": "$ 600.000",
            "estado": "Disponible"
        },




    ]

    // Ejemplo de datos JSON
    const jsonDataFutsal = [{
            "espacio": "1",
            "medida": "200 x 240",
            "precio": "-",
            "estado": "No Disponible"
        },
        {
            "espacio": "2",
            "medida": "200 x 240",
            "precio": "-",
            "estado": "No Disponible"
        },
        {
            "espacio": "3",
            "medida": "200 x 240",
            "precio": "-",
            "estado": "No Disponible"
        },
        {
            "espacio": "4",
            "medida": "200 x 240",
            "precio": "-",
            "estado": "No Disponible"
        },
        {
            "espacio": "5",
            "medida": "200 x 240",
            "precio": "-",
            "estado": "No Disponible"
        },
        {
            "espacio": "6",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "7",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "8",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "9",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "10",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "11",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "12",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "13",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "14",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "15",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "16",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "17",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "18",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "19",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "20",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "21",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "22",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "23",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "24",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "25",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "26",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "27",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },
        {
            "espacio": "28",
            "medida": "200 x 240",
            "precio": "$ 1.000.000",
            "estado": "Disponible"
        },



    ]
    // Función para cargar datos en la tabla
    function loadTableData(data, id) {
        const tableBody = document.getElementById(id);
        tableBody.innerHTML = ''; // Limpiar el contenido existente

        data.forEach(item => {

            let clase = item.estado == "Disponible" ? "bg-success" : "bg-danger";
            const row = `<tr>
                                <td>${item.espacio}</td>
                                <td>${item.medida}</td>
                                <td>${item.precio}</td>
                                <td><span class="badge ` + clase + `">${item.estado}</span></td>

                            </tr>`;
            tableBody.innerHTML += row;
        });
    }

    // Cargar datos cuando la página esté lista
    document.addEventListener('DOMContentLoaded', function() {
        loadTableData(jsonData, "table-body");
        loadTableData(jsonDataFutsal, "table-body-futsal");
    });
</script>
@endsection