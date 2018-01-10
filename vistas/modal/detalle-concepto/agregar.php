<div class="modal fade" id="modal-agregar">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Agregar</h4>
			</div>
			<form role="form" method="POST" id="agregar">
			<div class="modal-body">
            
            <div class="row">
            
            <div class="col-md-4">
            <div class="form-group">
            <label>TIPO</label>
            <select name="tipo" id="idtipo" class="form-control" required>
            <option value="">[Seleccionar]</option>
            <option value="S">SOCIO</option>
            <option value="I">INQUILINO</option>
            </select>
            </div>
            </div>  

            <div id="idcomerciante"></div>        
  


            </div>			
 

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Agregar</button>
			</div>
			</form>
		</div>
	</div>
</div>