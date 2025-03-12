 <html>

 <head>
     <style>
         .font-style {
             font-family: 'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif;
         }

         .bg-color {
             background-color: #229547;
             color: #fff
         }

         .text-color {
             color: #229547;
             font-weight: 700;
         }

         .text-color-status {
             color: #f44336;
             font-weight: 700;
         }

         .title {
             text-align: center;
             vertical-align: top;
             border-radius: 4px;
             /* padding: 10px*/
         }

         .p-card {
             background-color: #e0e0e0;
             color: #000;
             border-radius: 0px;
             font-size: 14px;
             padding: 10px;
             line-height: 1.4;
             height: 160px
         }



         h3 {
             font-weight: 100;
         }

         small {
             font-size: 11px;
         }

         .display-24 {
             font-size: 24px;
             color: #229547;
             text-align: center;
             margin: auto;
         }

         .display-18 {
             font-size: 18px;
             color: #229547;
             text-align: center;
             margin: auto;
         }

         .display-24-white {
             font-size: 24px;
             color: #FFF;
             text-align: center;
             font-weight: 800;

             padding: 24px;
         }

         .text-center {
             text-align: center;
         }

         .margin-20 {
             margin-left: 20px;
             margin-right: 20px;
             margin-top: 0px;
             margin-bottom: 0px;

         }

         .btn-default {
             background-color: #ccc;
             border-radius: 8px;
             padding: 10px;

         }

         .text-start {
             text-align: left;
         }

         .text-end {
             text-align: end;
         }

         .weight {
             font-weight: 600;
         }
     </style>
 </head>

 <body>
     <table class="font-style" width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="">
         <tbody>
             <tr>
                 <td align="center" valign="top">
                     <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                         <tbody>
                             <tr height="100">
                                 <td style="background-color:#fff;text-align:center;"><img
                                         src="https://11desintetico.ar/img/donbosco.png" width="90"
                                         height="90" alt="header"></td>
                             </tr>
                         </tbody>
                     </table>
                     <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                         <tbody>
                             <tr height="50">
                                 <td class="bg-color" style="text-align:center;vertical-align:top; padding:15px"
                                     align="center">
                                     <center>
                                         <p style="font-size:36px;margin:0;margin-top:0;margin-bottom:0">Don Bosco -
                                             <strong style="font-weight:bold">11deSintético</strong>
                                         </p>
                                     </center>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                     <table width="600" border="0" align="center" cellpadding="0" cellspacing="0"
                         style="">
                         <tbody>
                             <tr>
                                 <td bgcolor="#f3f3f3">

                                     <p
                                         style="text-align:center;color:#333333;font-size:16px;margin-left:15px;margin-right:30px;margin-bottom:20px">
                                         ¡Gracias <span class="text-color">{{ $data["email"] }}</span>&nbsp;por ser parte de este sueño!<br><br>



                                     <h1 class="display-24">¡Colaborando participás de increíbles sorteos!</h1>



                                     </p>

                                 </td>
                             </tr>

                             <tr>
                                 <td bgcolor="#f3f3f3" style="text-align:center">
                                     <!--
                                     <img src="img/premios.png" class="text-center" style="border-radius:20px;" alt="Image" width="400">
        -->
                                     <img
                                         src="https://11desintetico.ar/img/premios.png" width="300"
                                         alt="header">
                                 </td>
                             </tr>

                             <tr>
                                 <td bgcolor="#f3f3f3">

                                     <!--<ul style="width:500px;text-align:center; margin:auto">
                                         <li><b>7 de diciembre 2024 - Sorteo de un televisor de última generación.</b></li>

                                         <li><b>28 de febrero 2025 - Sorteo de un juego de living completo.</b></li>
                                         <li><b>26 de marzo 2025 - Sorteo de una moto eléctrica.</b></li>
                                         <li><b>28 de mayo 2025 - Sorteo de una PlayStation 5.</b></li>
                                         <li><b>5 de julio 2025 - Sorteo de un auto 0 km.</b></li>
                                     </ul>-->
                                     <table class="table table-striped mx-auto" style="width:350px;margin:auto">
                                         <thead>
                                             <tr style="background:#229547">
                                                 <th width="120" class="text-center"> Fecha</th>
                                                 <th>Sorteo</th>

                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr style="background:#ddd">
                                                 <td style="height:13px" class="text-start">7 de diciembre 2024</td>
                                                 <td>Un televisor de última generación</td>
                                             </tr>

                                             <tr>
                                                 <td style="height:13px" class="text-start">28 de febrero 2025</td>
                                                 <td>Un juego de living completo</td>
                                             </tr>
                                             <tr style="background:#ddd">
                                                 <td style="height:13px" class="text-start">26 de marzo 2025</td>
                                                 <td>Una moto eléctrica</td>
                                             </tr>
                                             <tr>
                                                 <td style="height:13px" class="text-start">28 de mayo 2025</td>
                                                 <td>Una PlayStation 5</td>
                                             </tr>

                                             <tr style="background:#ddd">
                                                 <td style="height:13px" class="text-start">5 de julio 2025</td>
                                                 <td>Un auto 0 km</td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </td>
                             </tr>


                         </tbody>
                     </table>

                     <table style="padding-top:20px" width=" 600" bgcolor="#f3f3f3" border="0" align="center" cellpadding="0" cellspacing="0"
                         cellspacing="0">
                         <tbody>
                             <tr style="vertical-align:text-top" align="center">

                                 <td class="text-center" style="width:290px;">
                                     <p class="text-center display-18">Tu/s número/s para cada uno de los sorteos es/son:</p>
                                     <p class="bg-color title text-center display-24-white margin-20">
                                         {{ $data['descripcion']  }}
                                     </p>
                                 </td>

                             </tr>
                             <tr>
                                 <td class="text-center" style="height:20px"></td>
                             </tr>
                             <tr style="vertical-align:text-top;">

                                 <td class="text-center" style="width:290px;height:250px">



                                     <table class="table table-striped mx-auto" style="width:350px;margin:auto">
                                         <thead>
                                             <tr style="background:#229547">
                                                 <th width="120" class="text-center" colspan=2>Datos Personales</th>


                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td style="height:13px" width="50%" class="text-end weight">Id de Metro:</td>
                                                 <td class="text-start">{{ $data['id']  }}</td>
                                             </tr>

                                             <tr style="background:#ddd">
                                                 <td style="height:13px" width="50%" class="text-end  weight">Nombre:</td>
                                                 <td class="text-start">{{ $data['nombre']}}</td>
                                             </tr>
                                             <tr>
                                                 <td style="height:13px" width="50%" class="text-end  weight">Apellido:</td>
                                                 <td class="text-start">{{ $data['apellido'] }}</td>
                                             </tr>
                                             <tr style="background:#ddd">
                                                 <td style="height:13px" width="50%" class="text-end  weight">Email:</td>
                                                 <td class="text-start">{{ $data['email'] }}</td>
                                             </tr>
                                             <tr>
                                                 <td style="height:13px" width="50%" class="text-end  weight">Teléfono:</td>
                                                 <td class="text-start">{{ $data['telefono'] }}</td>
                                             </tr>

                                             <tr style="background:#ddd">
                                                 <td style="height:13px" class="text-end  weight">Estado del Pago:</td>
                                                 <td class="text-start">{{ $data['status']}}</td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </td>
                             </tr>
                             <tr style="">

                                 <td class="text-center">
                                     <p class="margin-20">

                                         <a href="https://11desintetico.ar/pdf/terminos.pdf" target="_blank" class="btn btn-default" style="color: blue; text-decoration: underline;">Ver términos y condiciones</a>
                                         <br>
                                         <br>
                                     </p>
                                 </td>
                             </tr>
                         </tbody>
                     </table>

                     <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                         <tbody>
                             <tr>
                                 <td bgcolor="#f3f3f3">
                                     <center>
                                         <small
                                             style="color:#cacaca;margin-left:15px;margin-right:30px;margin-bottom:20px">
                                             Ante cualquier consulta nos podés enviar un mail a <a
                                                 href="mailto:proyecto11desintetico@gmail.com"
                                                 target="_blank">proyecto11desintetico@gmail.com</a>


                                     </center>
                                 </td>
                             </tr>
                         </tbody>
                     </table>


                     <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                         <tbody>
                             <tr height="50">
                                 <td class="bg-color" style="text-align:center;vertical-align:top; padding:15px"
                                     align="center">
                                     <center>
                                         <p style="font-size:12px;margin:0;margin-top:0;margin-bottom:0">Gracias, el
                                             equipo
                                             de
                                             <strong style="font-weight:bold">11deSintético</strong>
                                         </p>
                                     </center>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </td>
             <tr>

             </tr>
             </tr>

         </tbody>
     </table>
 </body>

 </html>
