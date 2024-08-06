<div style=" background: #6e6e6e20; padding: 50px; font-size: 15px;">
  <table style="max-width: 600px; background: #FFF; border: 2px solid #545d86; margin: auto; padding: 20px;">
    <tr>
      <td style="border-bottom: 2px solid #545d86;">
        <img src="https://www.juansalasinmobiliaria.com/imagenes/contenido/logo_top.jpg" alt="Logo de Juan Salas" height="50" style="display:block; margin:auto; margin-bottom:10px">
      </td>
    </tr>
    <tr>

      <td style="padding: 10px 20px; padding-bottom: 20px;">
        <span style="color: #202020;">
          <b">
            <?php echo $this->data['nombre'] ?>
            </b>
            ha enviado un mensaje desde el formulario de contacto del inmueble código: <strong> <?php echo $this->data['ref'] ?></strong>
        </span>
      </td>
    </tr>

    <tr>
      <td style="padding: 3px 20px;">
        <span style="color: #6e6e6e;">
          <b>
            Correo electrónico:
          </b>
          <?php echo $this->data['correo'] ?>
        </span>
      </td>
    </tr>
    <tr>
      <td style="padding: 3px 20px;">
        <span style="color: #6e6e6e;">
          <b>
            Teléfono:
          </b>
          <?php echo $this->data['telefono'] ?>
        </span>
      </td>
    </tr>
   


    <tr>
      <td style="padding: 3px 20px; padding-bottom: 30px;">
        <span style="color: #6e6e6e;">
          <b>
            Mensaje:
          </b>
          <?php echo $this->data['message'] ?>
      </td>
    </tr>
  </table>
</div>