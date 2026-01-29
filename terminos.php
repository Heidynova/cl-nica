<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/terminos.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clinica DR.Melo</title>  
</head>
<body>

<div class="terminos-container">
  <div class="terminos-cuadro">
    <h3>Términos y Condiciones</h3>
    <div class="terminos-text">
      <p>
         Al utilizar los servicios de nuestra clínica cardiológica, usted reconoce y acepta las condiciones aquí establecidas.
         La información personal solicitada en el registro y durante la programación de citas será utilizada únicamente con
         fines médicos, administrativos y de contacto, garantizando la protección y confidencialidad de sus datos conforme a
          las leyes vigentes. El usuario se compromete a proporcionar datos verídicos y actualizados para garantizar la 
          correcta gestión de los servicios. Las citas médicas estarán sujetas a disponibilidad y podrán ser reprogramadas por
      </p>
      <p>
         causas de fuerza mayor o necesidades internas de la clínica, siempre procurando notificar con antelación. Asimismo, 
         el paciente se compromete a presentarse puntualmente a la cita agendada o, en caso de no poder asistir, cancelarla 
         con al menos 24 horas de anticipación, a fin de permitir la organización adecuada de la atención.
      </p>
      <p>
         La información ofrecida a través de la plataforma digital tiene únicamente carácter informativo y de apoyo, y no sustituye
         la consulta presencial ni la valoración directa del especialista. La clínica se reserva el derecho de modificar o actualizar
         los presentes términos y condiciones en cualquier momento, informando oportunamente a los usuarios de dichos cambios.
      </p>
    </div>

    <div class="acepto-container">
      <input type="checkbox" id="acepto" name="acepto">
      <label for="acepto">He leído y acepto los Términos</label>
      <button type="button" class="btn-acepto" onclick="aceptarTerminos()">Acepto</button>
    </div>
  </div>
</div>

<script>
function aceptarTerminos() {
  const checkbox = document.getElementById('acepto');
  if (checkbox.checked) {
    // Redirige al formulario con permiso
    window.location.href = 'registro.php?aceptado=1';
  } else {
    alert('Debes aceptar los Términos y Condiciones antes de continuar.');
  }
}
</script>

</body>
</html>
