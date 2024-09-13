<h1>Estado de la Transacción</h1>

<p>Hola, se ha registrado una nueva transacción.</p>

<p>El estado de la transacción es: {{ $data['status'] }}.</p>

<p><strong>Detalles del pago:</strong></p>
<ul>
    <li>ID del pago: {{ $data['payment_id'] }}</li>
    <li>Id de Metro: {{ $data['id'] }}</li>
    <li>Nombre: {{ $data['nombre'] }}</li>
    <li>Apellido: {{ $data['apellido'] }}</li>
    <li>Email: {{ $data['email'] }}</li>
    <li>Teléfono: {{ $data['telefono'] }}</li>
</ul>

<p>Gracias por tu compra.</p>