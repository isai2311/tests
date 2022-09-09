@extends('layouts.layout')

@section('content')
    <div id="usuarios">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de usuarios</h6>
                        <a v-on:click.prevent="agregar()" class="btn btn-sm btn-primary">Nuevo usuario</a>
                    </div>
                    <div class="card-body p-0">
                        <template v-if="!cargando">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th>
                                                <input type="text" class="form-control" placeholder="Acciones" readonly>
                                            </th>
                                            <th>
                                                <input type="text" class="form-control" v-model="busqueda.email"
                                                    v-on:change="getUsuarios()" placeholder="Usuario">
                                            </th>
                                            <th>
                                                <input type="text" class="form-control" v-model="busqueda.name"
                                                    v-on:change="getUsuarios()" placeholder="Nombre">
                                            </th>
                                            <th>
                                                <select class="form-control" v-model="busqueda.cUsuPerfil"
                                                    v-on:change="getUsuarios()">
                                                    <option value="">Perfil</option>
                                                    <template v-for="perfil in perfiles">
                                                        <option :value="perfil.cPerFolio">@{{ perfil.cPerDescripcion }}</option>
                                                    </template>
                                                </select>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="usuarios && usuarios.data.length > 0">
                                            <template v-for="(usuario, index) in usuarios.data">
                                                <tr class="text-center">
                                                    <td>
                                                        <button class="btn btn-sm btn-primary" v-on:click="editar(usuario)">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger"
                                                            v-on:click="reiniciar(usuario)">
                                                            <i class="fas fa-key"></i>
                                                        </button>
                                                    </td>
                                                    <td>@{{ usuario.email }}</td>
                                                    <td>@{{ usuario.name }}</td>
                                                    <td>
                                                        <template v-if="usuario.perfil">
                                                            @{{ usuario.perfil.cPerDescripcion }}
                                                        </template>
                                                    </td>
                                                </tr>
                                            </template>
                                        </template>
                                        <template v-else>
                                            <tr>
                                                <td colspan="6" class="text-center">No hay usuarios registrados</td>
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
                        <div class="card-footer">
                            <!-- Pagination -->
                            @include('components.pagination')
                        </div>
                    </div>
                </div>
            </div>
            @include('usuarios.modal.agregar')
            @include('usuarios.modal.editar')
            @include('usuarios.modal.reiniciar')
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .custom-table th,
        td {
            width: 100px !important;
        }
    </style>
@endpush

@push('scripts')
    <!-- Vuejs -->
    <script src="vue/usuarios.js"></script>
@endpush
