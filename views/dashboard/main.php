<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Bienvenido');
?>
<div class="container">
    <div class="row">
	    <h4 class="center-align blue-text" id="greeting">hola</h4>
    </div>
    <div class="row">
        <canvas id='grafico1'></canvas>
    </div>
</div>
<script src='../../resources/js/chart.js'></script>
<?php
Dashboard::footerTemplate('main.js');
?>
