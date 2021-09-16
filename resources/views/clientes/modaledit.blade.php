<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modaledit">
    <div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Editar Paciente</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
			</div>

            <form id="editform">
            @csrf
            <input type="hidden" name="id" id="id">
			<div class="modal-body">
                <div class="row">
                    <div class="col-sm-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" id="nombre">
                        <small class="text-danger" id="messagenombree"></small>
                    </div>
                    <div class="col-sm-6">
                        <label for="apaterno">Apellido paterno:</label>
                        <input type="text" name="apaterno" class="form-control" id="apaterno">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="amaterno" >Apellido materno:</label>
                        <input type="text" name="amaterno" class="form-control" id="amaterno">
                    </div>
                    <div class="col-sm-6">
                        <label for="ci">Cedula de Identidad:</label>
                        <input type="number" name="ci" class="form-control" id="ci">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="fechanacimiento">Fecha de nacimiento:</label>
                        <input type="date" name="fechanacimiento" class="form-control" id="fechanacimiento">
                        <small class="text-danger" id="messagefechanacimientoe"></small>
                    </div>
                    <div class="col-sm-6">
                        <label class="col-form-label col-sm-2 pt-0">Sexo</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="femenino" value="FEMENINO">
                            <label class="form-check-label" for="femenino">FEMENINO</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sexo" id="masculino" value="MASCULINO">
                            <label class="form-check-label" for="masculino">MASCULINO</label>
                        </div>
                    </div>
                    <small class="text-danger" id="messagesexoe"></small>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="fechanacimiento" class="col-sm-2 col-form-label">Domicilio:</label>
                        <textarea name="domicilio" class="form-control" id="domicilio"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="fechanacimiento" class="col-sm-3 col-form-label">Telefono celular:</label>
                    <div class="col-sm-3">
                        <input type="number" name="telefonocelular" class="form-control" id="telefonocelular">
                    </div>
                    <label for="fechanacimiento" class="col-sm-3 col-form-label">Telefono fijo:</label>
                    <div class="col-sm-3">
                        <input type="number" name="telefonodomicilio" class="form-control" id="telefonodomicilio">
                    </div>
                </div>
                <div class="row">
                    <label for="email" class="col-sm-3 col-form-label">Correo Electronico:</label>
                    <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" id="email">
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
