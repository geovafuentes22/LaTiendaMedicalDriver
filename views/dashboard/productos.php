<?php
require_once('../../core/helpers/dashboard.php');
Dashboard::headerTemplate('Productos');
?>
<div class="row">
    <!-- Formulario de búsqueda -->
    <form method="post" id="form-search">
        <div class="input-field col s6 m4">
            <i class="material-icons prefix">search</i>
            <input id="search" type="text" name="search"/>
            <label for="search">Buscador</label>
        </div>
        <div class="input-field col s6 m4">
            <button type="submit" class="btn waves-effect brown tooltipped" data-tooltip="Buscar"><i class="material-icons">sync</i></button>
        </div>
    </form>
    <!-- Botón para abrir ventana de nuevo registro -->
    <div class="input-field center-align col s12 m4">
        <a href="#" onclick="modalCreate()" class="btn waves-effect  deep-orange tooltipped" data-tooltip="Agregar"><i class="material-icons">more_vert</i></a>
        <a href='../../libraries/reportes/reporteproducto.php' class='btn waves-effect indigo tooltipped fantasmazul' data-tooltip='Reporte de Producto'><i class='material-icons'>assignment</i></a>
    </div>

</div>
<!-- Tabla para mostrar los registros existentes -->
<table class="highlight">
    <thead>
        <tr>
            <th>IMAGEN</th>
			<th>NOMBRE</th>
			<th>CODIGO</th>
			<th>(US$) PRECIO </th>
			<th>CANTIDAD</th>
			<th>GARANTÍA</th>
			<th>CATEGORÍA</th>
			<th>ESTADO</th>
			<th>ACCIONES</th>
        </tr>
    </thead>
    <tbody id="tbody-read">
    </tbody>
</table>
<!-- Ventana para crear un nuevo Producto -->
<div id="modal-create" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Nuevo Producto</h4>
        <form method="post" id="form-create" enctype="multipart/form-data">
            <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">note_add</i>
                  	<input id="create_nombre" type="text" name="create_nombre" class="validate" required/>
                  	<label for="create_nombre">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">shopping_cart</i>
                  	<input id="create_codigo" type="text" name="create_codigo"  class="validate"  maxlength="6" required />
                  	<label for="create_codigo">Codigo</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">shopping_cart</i>
                  	<input id="create_precio" type="number" name="create_precio" class="validate" min="0.01" max="999.99" step="any" required/>
                  	<label for="create_precio">Precio ($)</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">description</i>
                  	<input id="create_cantidad" type="number" name="create_cantidad" class="validate"   required/>
                  	<label for="create_cantidad">Cantidad</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">description</i>
                  	<input id="create_descripcion" type="text" name="create_descripcion" class="validate" required/>
                  	<label for="create_descripcion">Descripción</label>
                </div>
                <div class="input-field col s12 m6">
                <select id="create_categoria" name="create_categoria">

                    </select>
                    <label>Categoría</label>
                </div>
                <div class="input-field col s12 m6">
                <select id="create_garantia" name="create_garantia">

                    <option></option>
                    </select>
                    <label>Garantía</label>
                </div>
              	<div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect">
                        <span><i class="material-icons">image</i></span>
                        <input id="create_archivo" type="file" name="create_archivo"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Imagen valida 500x500"/>
                    </div>
                </div>
                <div class="col s12 m6">
                    <p>
                        <div class="switch">
                            <span>Estado:</span>
                            <label>
                                <i class="material-icons">visibility_off</i>
                                <input id="create_estado" type="checkbox" name="create_estado"/>
                                <span class="lever"></span>
                                <i class="material-icons">visibility</i>
                            </label>
                        </div>
                    </p>
                </div>
            </div>
            </div>
            <div class="row center-align">
                <a href="#" data-tooltip="Cancelar">Cancela</a>
                <button type="submit" data-tooltip="Crear">Guardar</button>
            </div>
        </form>
    </div>
</div>
<!-- Ventana para modificar un registro existente -->
<div id="modal-update" class="modal">
    <div class="modal-content">
        <h4 class="center-align">Modificar producto</h4>
        <form method="post" id="form-update" enctype="multipart/form-data">
            <input type="hidden" id="id_producto" name="id_producto"/>
            <input type="hidden" id="imagen_producto" name="imagen_producto"/>
            <div class="row">
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">note_add</i>
                  	<input id="update_nombre" type="text" name="update_nombre" class="validate" required/>
                  	<label for="update_nombre">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">shopping_cart</i>
                  	<input id="update_codigo" type="text" name="update_codigo"  class="validate"  maxlength="6" required validate/>
                  	<label for="update_precio">Codigo</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">shopping_cart</i>
                  	<input id="update_precio" type="number" name="update_precio" class="validate" min="0.01" max="999.99" step="any" required/>
                  	<label for="update_precio">Precio ($)</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">description</i>
                  	<input id="update_cantidad" type="number" name="update_cantidad" class="validate"   required/>
                  	<label for="update_cantidad">Cantidad</label>
                </div>
                <div class="input-field col s12 m6">
                  	<i class="material-icons prefix">description</i>
                  	<input id="update_descripcion" type="text" name="update_descripcion" class="validate" required/>
                  	<label for="update_descripcion">Descripción</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="update_categoria" name="update_categoria">
                    </select>
                    <label>Categoría</label>
                </div>
                <div class="input-field col s12 m6">
                    <select id="update_garantia" name="update_garantia">
                    </select>
                    <label>Garantía</label>
                </div>
              	<div class="file-field input-field col s12 m6">
                    <div class="btn waves-effect">
                        <span><i class="material-icons">image</i></span>
                        <input id="update_archivo" type="file" name="update_archivo"/>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Imagen valida 500x500"/>
                    </div>
                </div>
                <div class="col s12 m6">
                    <p>
                        <div class="switch">
                            <span>Estado:</span>
                            <label>
                                <i class="material-icons">visibility_off</i>
                                <input id="update_estado" type="checkbox" name="update_estado"/>
                                <span class="lever"></span>
                                <i class="material-icons">visibility</i>
                            </label>
                        </div>
                    </p>
                </div>
            </div>
            <div class="row center-align">
                <a href="#" class="btn waves-effect grey tooltipped modal-close" data-tooltip="Cancelar"><i class="material-icons">cancel</i></a>
                <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Modificar"><i class="material-icons">save</i></button>
            </div>
        </form>
    </div>
</div>
<?php
Dashboard::footerTemplate('productos.js');
?>
