<form method="PUT" v-on:submit.prevent="resetPassword()">
    @csrf
    <div class="modal fade" id="modal-reiniciar" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Reiniciar contraseña</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <template v-show="usuario">
                        <p>¿Esta seguro que desea reiniciar la contraseña del usuario?</p>
                        <p>La contraseña por defecto es <b>temporal</b></p>
                    </template>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
</form>
