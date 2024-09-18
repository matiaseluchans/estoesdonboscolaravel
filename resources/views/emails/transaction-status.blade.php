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
             padding: 10px
         }

         .p-card {
             background-color: #e0e0e0;
             color: #000;
             border-radius: 4px;
             font-size: 14px;
             padding: 10px;
             line-height: 1.4;
             height: 200px
         }



         h3 {
             font-weight: 100;
         }

         small {
             font-size: 11px;
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
                         style="margin-top:10px">
                         <tbody>
                             <tr>
                                 <td bgcolor="#f3f3f3">

                                     <p
                                         style="color:#333333;font-size:16px;margin-left:15px;margin-right:30px;margin-bottom:20px">
                                         ¡Gracias <span class="text-color">{{ $data["email"] }}</span>&nbsp;por ser parte de este sueño!<br><br>
                                         Tu colaboración nos acerca un paso más a convertir
                                         nuestra cancha en un lugar donde los chicos puedan seguir disfrutando del fútbol,
                                         competir y generar amistades en un ambiente profesional. Gracias a tu aporte,
                                         estamos más cerca de transformar la vida de muchos jóvenes, brindándoles un espacio seguro y
                                         duradero donde puedan crear recuerdos inolvidables. <br><br>
                                         <b>¡Tu apoyo hace la diferencia y estamos profundamente agradecidos!</b>


                                     </p>

                                 </td>
                             </tr>


                         </tbody>
                     </table>


                     <table width="600" bgcolor="#f3f3f3" border="0" align="center" cellpadding="4"
                         cellspacing="0">
                         <tbody>
                             <tr style="vertical-align:text-top">
                                 <td bgcolor="#f3f3f3">&nbsp;</td>
                                 <td style="width:290px">
                                     <p class="title">Con estos números estas participando de fabulosos premios</p>
                                     <p class="bg-color title" style="">
                                         <b>{{ $data['descripcion']  }}</b>
                                     </p>
                                 </td>
                                 <td bgcolor="#f3f3f3">&nbsp;</td>
                             </tr>
                             <tr style="vertical-align:text-top;margin-top:-10px">
                                 <td bgcolor="#f3f3f3">&nbsp;</td>
                                 <td style="width:290px">


                                     <p class="p-card">

                                         Id de Metro:<b>{{ $data['id']  }}</b><br>

                                         Nombre:<b>{{ $data['nombre']}}</b><br>
                                         Apellido:<b>{{ $data['apellido'] }}</b><br>
                                         Email:<b>{{ $data['email'] }}</b><br>
                                         Teléfono:<b>{{ $data['telefono']}}</b><br>
                                         Estado del Pago:<b>{{ $data['status']}}</b><br>


                                     </p>
                                 </td>

                                 <td bgcolor="#f3f3f3">&nbsp;</td>
                             </tr>
                         </tbody>
                     </table>
                     <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
                         <tbody>
                             <tr>
                                 <td bgcolor="#f3f3f3">&nbsp;</td>
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
