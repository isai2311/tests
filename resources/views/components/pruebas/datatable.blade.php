<template v-if="!cargando">
    <div class="table-responsive">
        <table class="table table-striped custom-table" width="100%" cellspacing="0">
            <thead>
                <tr class="text-center">
                    @if ($acciones)
                        <th>
                            <input type="text" class="form-control" placeholder="Acciones" disabled>
                        </th>
                    @endif
                    <th>
                        <input type="number" class="form-control" v-model="busqueda.id" placeholder="ID"
                            v-on:change="getPruebas()">
                    </th>
                    <th>
                        <input type="text" class="form-control" v-model="busqueda.Descripcion" placeholder="Descripcion"
                            v-on:change="getPruebas()">
                    </th>
                    <th>
                        <select class="form-control" v-model="busqueda.Resultados" v-on:change="getPruebas()">
                            <option value="">Mostrar todos</option>
                            <option value="1">Mostrar resultados</option>
                            <option value="0">No mostrar resultados</option>
                        </select>
                    </th>
                </tr>
            </thead>
            <tbody>
                <template v-if="pruebas && pruebas.data.length > 0">
                    <template v-for="(prueba, index) in pruebas.data">
                        <tr class="text-center">
                            @if ($acciones)
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Editar" v-on:click="editar(prueba)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Borrar" v-on:click="showDelete(prueba)">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                        <button type="file" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Excel" v-on:click="importar(prueba)">
                                            <i class="fas fa-file-excel"></i>
                                        </button>
                                    </div>
                                </td>
                            @endif
                            <td>@{{ prueba.id }}</td>
                            <td>@{{ prueba.Descripcion }}</td>
                            <td>
                                <span class="badge"
                                    :class="prueba.Resultados ? 'badge-success' : 'badge-danger'"
                                    style="width: 100px;">@{{ prueba.Resultados ? 'Si' : 'No' }}
                                </span>
                            </td>
                        </tr>
                    </template>
                </template>
                <template v-else>
                    <tr>
                        <td colspan="40" class="text-center">No hay pruebas registradas</td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>
<template v-else>
    <div class="overlay"> <br />
        <p class="text-center">
            <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
        </p>
    </div>
</template>
