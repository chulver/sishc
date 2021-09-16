<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modalcreate">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Registrar Venta</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
			</div>

            <form id="createform">
            @csrf
			<div class="modal-body">
                <div class="form-group row">
                    <label for="numeroturno" class="col-sm-2 col-form-label">Turno:</label>
                    <p id="turno" class="col-sm-2 font-weight-bold col-form-label"></p>
                    <input type="hidden" name="numeroturno" id="numeroturno">
                </div>
                <div class="form-group row">
                    <label for="paciente" class="col-sm-2 col-form-label">Paciente:</label>
                    <div class="col-sm-10">
                        <select name="paciente" id="pacientes" class="form-control">
                            <option></option>
                        </select>
                        <small class="text-danger" id="messagepaciente"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="serviciomedico" class="col-sm-2 col-form-label">Servicio:</label>
                    <div class="col-sm-10">
                        <select name="serviciomedico" id="servicios" class="form-control">
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
                        <select name="medico" id="medicos" class="form-control">
                            <option></option>
                        </select>
                        <small class="text-danger" id="messagemedico"></small>
                    </div>
                </div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" id="storebtn">Guardar</button>
			</div>
            </form>

		</div>
	</div>
</div>
