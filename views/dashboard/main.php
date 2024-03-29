<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Bienvenido');
?>
<div class="container">
    <div class="row">
        <h4 class="center-align blue-text" id="greeting"></h4>
        <h4 class="center-align blue-text" id="totaldays"></h4>
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
    <h4>Top 5 productos con mayor precio</h4>
    <div class="row">
        <canvas id='grafico5'></canvas>
    </div>
</div>
<script src='../../resources/js/chart.js'></script>
<?php
Dashboard::footerTemplate('main.js');
?>