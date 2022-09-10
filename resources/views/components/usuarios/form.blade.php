<template v-show="usuario">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="">Nombre</label>
                <input type="text" class="form-control" v-model="usuario.name" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="">Correo electronico</label>
                <input type="email" class="form-control" v-model="usuario.email" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="">Contraseña</label>
                <input type="password" class="form-control" v-model="usuario.password" required>
            </div>
        </div>
    </div>
</template>
