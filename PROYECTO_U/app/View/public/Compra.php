<style>
   /* Estilos del modal */
.modal {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
  background-color: white;
  width: 80%;
  max-width: 600px;
  margin: 20px auto;
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
}

.close-btn {
  float: right;
  font-size: 24px;
  font-weight: bold;
  cursor: pointer;
}

#ticket-detalle {
  margin-bottom: 20px;
}

#btn-imprimir {
  display: block;
  margin: 0 auto;
}

</style>
<!-- ticket.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Compra</title>
    <!-- Enlaza el archivo de estilos CSS -->
    <link rel="stylesheet" href="ruta/del/estilo.css">
</head>
<body>
    <!-- Modal -->
<div id="modal-ticket" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <h2>Ticket de Compra</h2>
    <div id="ticket-detalle">
      <!-- Aquí se mostrará el contenido del ticket -->
    </div>
    <button id="btn-imprimir">Imprimir Ticket</button>
  </div>
</div>
    <div class="container">
        <h2>Ticket de Compra</h2>
        <div id="ticket-detalle">
            <!-- Aquí se mostrará el contenido del ticket -->
        </div>
    </div>
    <!-- Enlaza el archivo JavaScript que contiene la lógica para imprimir el ticket -->
    <script src="app/Pagina/Compra/java.js"></script>
</body>
</html>
