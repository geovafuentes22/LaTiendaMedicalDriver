<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Bienvenido');
?>
<div class="container">
    <div class="row">
        <h4 class="center-align blue-text" id="greeting">hola</h4>
    </div>
   <br>
    <h4>Cantidad de productos por categoria</h4>
    <div class="row">
        <canvas id='grafico1'></canvas>
    </div>
    <br>
    <h4>Cantidad de productos por garantia</h4>
    <div class="row">
        <canvas id='grafico2'></canvas>
    </div>
    <br>
    <h4>Tipos de garantias</h4>
    <div class="row">
        <canvas id='grafico3'></canvas>
    </div>
    <br>
    <h4>cantidad de productos activos e inactivos</h4>
    <div class="row">
        <canvas id='grafico4'></canvas>
    </div>
    <br>
    <h4>Productos del más caro al más barato</h4>
    <div class="row">
        <canvas id='grafico5'></canvas>
    </div>
</div>
<script src='../../resources/js/chart.js'></script>
<?php
Dashboard::footerTemplate('main.js');
?>