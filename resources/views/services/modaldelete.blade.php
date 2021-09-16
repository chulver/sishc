<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modaldelete">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
                <h4 class="modal-title">Eliminar Servicio</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
			</div>

            <form id="deleteform">
            @csrf
            <input type="hidden" name="id" id="iddelete">
			<div class="modal-body">
                <div class="modal-body">
                    <p>Confirme si desea Eliminar el Servicio</p>
                </div>
			</div>
			<div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" id="deletebtn">Confirmar</button>
			</div>
            </form>

		</div>
	</div>
</div>
