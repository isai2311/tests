<template v-show="usuario">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="">Usuario</label>
                <input type="text" class="form-control" v-model="usuario.email" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="">Nombre</label>
                <input type="text" class="form-control" v-model="usuario.cUsuNombre" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="">Apellido paterno</label>
                <input type="text" class="form-control" v-model="usuario.cUsuApellidoPat" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="">Apellido materno</label>
                <input type="text" class="form-control" v-model="usuario.cUsuApellidoMat" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="perfil">Perfil</label>
                <select class="form-control" name="perfil" id="perfil" v-model="usuario.cUsuPerfil" required>
                    <option value="">Seleccionar</option>
                    <template v-for="perfil in perfiles">
                        <option :value="perfil.cPerFolio">@{{ perfil.cPerDescripcion }}
                        </option>
                    </template>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="">Correo electronico</label>
                <input type="email" class="form-control" v-model="usuario.cUsuEmail" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Activo</label>
                <select class="form-control" name="estatus" id="estatus" v-model="usuario.cUsuEstado">
                    <option value=1>Si</option>
                    <option value=0>No</option>
                </select>
            </div>
        </div>
    </div>
</template>
