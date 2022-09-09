<template v-show="prueba">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="form-group">
                <label class="form-label" for="">Descripción</label>
                <input type="text" class="form-control" v-model="prueba.Descripcion" required>
            </div>
            <div class="form-group">
                <label class="form-label" for="Usuario">Usuarios</label>
                <vue-multiselect v-model="prueba.usuarios" :options="usuarios" :multiple="true"
                    select-label="seleccionar" selected-label="seleccionado"
                    deselect-label="remover" placeholder="Buscador" label="name" track-by="name"
                    track-by="folio">
                </vue-multiselect>
            </div>
            <div class="form-group">
                <input class="form-check-input" type="checkbox" v-model="prueba.Resultados">
                <label class="form-check-label" for="">
                    Mostrar resultados
                </label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="tipo">Pregunta</label>
                    <input type="text" class="form-control" v-model="pregunta.Descripcion">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="Indicador">Tipo</label>
                    <select class="form-control" v-model="pregunta.Tipo">

                        <option value=1 selected>Opción múltiple</option>{{--
                        <option value=0>Abierta</option>
                        <option value=2>Opción múltiple con respuesta única</option> --}}
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="form-label" for="">&nbsp;</label><br />
                    <button v-on:click.prevent="agregarPregunta()" class="btn btn-success">
                        <span><i class="fas fa-plus"></i></span>
                        Agregar
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <template v-if="prueba.preguntas && prueba.preguntas.length > 0">
                    <template v-for="(pregunta, index) in prueba.preguntas">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="">@{{ index + 1 }}.- @{{ pregunta.Descripcion }}</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <template v-if="pregunta.Tipo == 0">
                                        <label class="form-label" for="">Respuesta</label>
                                        <input type="text" class="form-control" v-model="pregunta.Respuesta">
                                    </template>
                                    <template v-if="pregunta.Tipo == 1">
                                        <div class="form-group">
                                            <template v-for="(opcion, index2) in pregunta.opciones">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="">
                                                        @{{ index2 + 1 }}.- @{{ opcion.Pregunta }}
                                                    </label>
                                                    <br>
                                                    <input class="form-check-input" type="checkbox" v-model="opcion.Correcta">
                                                    <label class="form-check-label" for="correcta">
                                                        Correcta
                                                    </label>
                                                </div>
                                                <button v-on:click.prevent="eliminarOpcion(index, index2)" class="btn btn-danger btn-sm">
                                                    <span><i class="fas fa-trash"></i></span>
                                            </template>
                                        </div>
                                        <input type="text" class="form-control" v-model="pregunta.opcion.Pregunta">
                                        <button v-on:click.prevent="agregarOpcion(index)" class="btn btn-success">
                                            <span><i class="fas fa-plus"></i></span>
                                            Agregar opción
                                        </button>
                                    </template>
                                    <button v-on:click.prevent="eliminarPregunta(index)" class="btn btn-danger">
                                        <span><i class="fas fa-trash-alt"></i></span>
                                        Eliminar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </template>
                </template>
            </div>
        </div>
    </div>
</template>
