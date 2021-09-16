<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modaledit">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Editar Servicio</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
			</div>

            <form id="editform">
            @csrf
            <input type="hidden" name="id" id="id">
			<div class="modal-body">
                <div class="form-group row">
                    <label for="servicio" class="col-sm-2 col-form-label">Servicio:</label>
                    <div class="col-sm-10">
                        <input type="text" name="servicio" class="form-control" id="servicio">
                        <small class="text-danger" id="messageservicioe"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="precio" class="col-sm-2 col-form-label">Precio:</label>
                    <div class="col-sm-5">
                        <input type="number" name="precio" class="form-control" id="precio">
                        <small class="text-danger" id="messageprecioe"></small>
                    </div>
                </div>
			</div>

			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="updatebtn">Actualizar</button>
			</div>
            </form>

		</div>
	</div>
</div>
