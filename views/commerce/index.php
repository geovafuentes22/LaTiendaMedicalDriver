<?php
require_once('../../core/helpers/commerce.php');
Commerce::headerTemplate('Inicio');
?>
<!-- Slider con indicadores y altura de 400px -->
<div class="slider" id="slider">
    <ul class="slides">
        <li>
            <img src="../../resources/img/slider/silla.jpg" alt="Foto01">
            <div class="caption center-align">
                <h2>Bienvenido...</h2>
                <h4 class="white-text">Esperamos que encuentres lo que necesitas</h4>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/domi.jpg" alt="Foto02">
            <div class="caption left-align">
                <h2>Entrega a domicilio</h2>
                <h4>El producto llega hasta la puerta de tu casa</h4>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/camion.jpg" alt="Foto03">
            <div class="caption right-align">
                <h2>Excelnet calidad</h2>
                <h4 class="white-text">Todos nuestros productos son exportados y de una buena calidad</h4>
            </div>
        </li>
        <li>
            <img src="../../resources/img/slider/pedi.jpg" alt="Foto04">
            <div class="caption center-align">
                <h2></h2>
                <h4 class="white-text"></h4>
            </div>
        </li>
    </ul>
</div>
<!-- Contenido principal: categorías, productos por categoría y detalles del producto -->
<div class="container">
    <h4 class="center blue-text" id="title"></h4>
    <div class="row" id="catalogo"></div>
</div>
<?php
Commerce::footerTemplate('catalogo.js');
?>
