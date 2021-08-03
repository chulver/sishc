<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-registrar-{{$paciente->id}}">
    <div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Registrar Inyectable</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
			</div>

			<div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Paciente:</label>
                            <p class="col-sm-6 col-form-label">JUAN GABRIEL CHULVER CABRERA</p>
                            <label class="col-sm-2 col-form-label">Sexo:</label>
                            <p class="col-sm-2 col-form-label">MASCULINO</p>
                        </div>
                        <div class="row">
                            <label class="col-sm-2 col-form-label">Edad:</label>
                            <p class="col-sm-6 col-form-label"></p>
                            <label class="col-sm-2 col-form-label">Fecha:</label>
                            <p class="col-sm-2 col-form-label"></p>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="diagnostico" class="col-sm-2 col-form-label">Diagnostico:</label>
                            <div class="input-group col-sm-5">
                                <input type="text" class="form-control" name="diagnostico" id="diagnostico">
                            </div>
                            <label for="via" class="col-sm-1 col-form-label">Via:</label>
                            <div class="input-group col-sm-4">
                                <select name="via" class="form-control" data-live-search="true">
                                    <option></option>
                                    <option value="INYECCION INTRAMUSCULAR">INYECCION INTRAMUSCULAR</option>
                                    <option value="INYECCION INTRAVENOSA">INYECCION INTRAVENOSA</option>
                                    <option value="INYECCION SUBCUTÁNEA">INYECCION SUBCUTÁNEA</option>
                                    <option value="INYECCION INTRADÉRMICA">INYECCION INTRADÉRMICA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="medicamento" class="col-sm-2 col-form-label">Medicamento</label>
                            <div class="col-sm-5">
                                <select id="medicamento" class="selectpicker form-control" data-live-search="true">
                                    <option></option>
                                    <option value="1">DIPIRONA</option>
                                </select>
                            </div>
                            <div class="input-group col-sm-5">
                                <button type="button" id="btn_add" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>
                        <div class="row">
                            <table id="detalle" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>Medicamento</th>
                                    <th>Observaciones</th>
                                    <th>Opciones</th>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
</div>