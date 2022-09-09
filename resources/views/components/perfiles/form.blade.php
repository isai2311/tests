<template v-show="perfil">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="">Descripcion</label>
                <input type="text" class="form-control" v-model="perfil.cPerDescripcion" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Administrador</label>
                <select class="form-control" name="estatus" id="estatus" v-model="perfil.cPerAdmin">
                    <option value=1>Si</option>
                    <option value=0>No</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Notificaciones</label>
                <select class="form-control" name="estatus" id="estatus" v-model="perfil.cPerNotificaciones">
                    <option value=1>Si</option>
                    <option value=0>No</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Activo</label>
                <select class="form-control" name="estatus" id="estatus" v-model="perfil.cPerEstatus">
                    <option value=1>Si</option>
                    <option value=0>No</option>
                </select>
            </div>
        </div>
    </div>
</template>
