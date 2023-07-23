
<body>
<link rel="stylesheet" href="app/Pagina/Inicio/Diseño.css">

    <section class="section">
        <h2>Bienvenido a nuestra página de productos</h2>
        <div class="carousel-container">
            <div class="carousel">
                <img src="app/Pagina/IMagen/Esencia_Ogareño.jpg" alt="Producto 1">
                <img src="app/Pagina/IMagen/Paquete_1.jpg" alt="Producto 2">
                <img src="app/Pagina/IMagen/3_esencias.jpg" alt="Producto 3">
                <img src="app/Pagina/IMagen/1_repelente.jpg" alt="Producto 4">
                <img src="app/Pagina/IMagen/2_repelente .jpg" alt="Producto 5">
                
            </div>
        </div>
    </section>
    
    <main >
        <section class="contenedor">
            <!-- Contenedor de elementos -->
            <div class="contenedor-items">
                <div class="item">
                    <span class="titulo-item">Repelente</span>
                    <img src="app/Pagina/IMagen/1_repelente.jpg" alt="" class="img-item">
                    <span class="precio-item">$100</span>
                   
                </div>
                <div class="item">
                    <span  class="titulo-item">Esencia 30</span>
                    <img src="app/Pagina/IMagen/Paquete_2.jpg" alt="" class="img-item">
                    <span class="precio-item">$40</span>
                    
                </div>
                <div class="item">
                    <span class="titulo-item">Esencia 3 </span>
                    <img src="app/Pagina/IMagen/Esencia_Ogareño.jpg" alt="" class="img-item">
                    <span class="precio-item">$799</span>
                   
                    
                </div>
                <div class="item">
                    <span class="titulo-item">3 Esencias</span>
                    <img src="app/Pagina/IMagen/3_esencias.jpg" alt="" class="img-item">
                    <span class="precio-item">$ 180</span>
                   
                </div>
                
            </div>
        </section>
    </main>

   

    <section>
        <h2>Conocenos</h2>
        <div class="about-us">            
            <div class="producto">
                <img src="app/Pagina/IMagen/Elixir.jpg" alt="">
                <h3>¿Quienes Somos?</h3>
                <p>ELIXIR es una empresa de origen Mexicana que nace como una solucion ante la problematica existente...</p>
                <a href="?C=ControllerPoliticas&M=index">Leer más >> </a>
            </div>
            
            <div class="producto">
                <img src="app/Pagina/IMagen/Elixir.jpg" alt="">
                <h3>Contactanos</h3>
                <p>Tienes alguna pregunta o quieres conocer mas acerca de nosotros ven y conoce nuestra familia...</p>
                <a href="?C=ControllerContacto&M=index">Leer más >> </a>
            </div>
        </div>
    </section>

    

    <footer>
        <p>Derechos de Autor &copy; 2023 | ELIXIR </p>
        <nav>
            <ul>
                <li><a href="#">Nosotros</a></li>
                <li><a href="#">Política de Privacidad</a></li>
                <li><a href="#">Contactanos</a></li>
            </ul>
        </nav>
    </footer>

    <script>
        var carousel = document.querySelector('.carousel');
        var carouselImages = document.querySelectorAll('.carousel img');
        var currentImageIndex = 0;
        var totalImages = carouselImages.length;
        var imageWidth = carouselImages[0].clientWidth;

        // Función para mostrar la imagen actual
        function showCurrentImage() {
            var translateValue = -currentImageIndex * imageWidth;
            carousel.style.transform = 'translateX(' + translateValue + 'px)';
        }

        // Función para avanzar a la siguiente imagen
        function nextImage() {
            currentImageIndex++;
            if (currentImageIndex >= totalImages) {
                currentImageIndex = 0;
            }
            showCurrentImage();
        }

        // Mostrar la primera imagen al cargar la página
        showCurrentImage();

        // Cambiar a la siguiente imagen cada 2 segundos
        setInterval(nextImage, 2000);
    </script>
</body>
</html>