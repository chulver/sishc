<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modaledit">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Editar Venta</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
			</div>

            <form id="editform">
            @csrf
            <input type="hidden" name="id" id="id">
			<div class="modal-body">
                <div class="form-group row">
                    <label for="paciente" class="col-sm-2 col-form-label">Paciente:</label>
                    <div class="col-sm-10">
                        <select name="paciente" id="pacientes_edit" class="form-control">
                            <option></option>
                        </select>
                        <small class="text-danger" id="messageservicio"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="serviciomedico" class="col-sm-2 col-form-label">Servicio:</label>
                    <div class="col-sm-10">
                        <select name="serviciomedico" id="servicios_edit" class="form-control">
                            <option></option>
                        </select>
                        <small class="text-danger" id="messageservicio"></small>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="precio" value="0.0">
                </div>
                <div class="form-group row">
                    <label for="medico" class="col-sm-2 col-form-label">Medico:</label>
                    <div class="col-sm-10">
                        <select name="medico" id="medicos_edit" class="form-control">
                            <option></option>
                        </select>
                        <small class="text-danger" id="messageservicio"></small>
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
