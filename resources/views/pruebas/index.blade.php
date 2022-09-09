@extends('layouts.layout')

@section('content')
    <div id="pruebas">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Listado de pruebas</h6>
                        <div>
                            <a v-on:click.prevent="agregar()" class="btn btn-sm btn-primary r-2">Nueva prueba</a>
                        </div>
                        <div>
                            <a v-on:click.prevent="downloadExcel()" class="btn btn-sm btn-success r-2">Template Excel</a>
                        </div>

                        <div class="col-md-6">
                            <div class="custom-file text-left">
                                <input type="file" name="file" class="custom-file-input" id="file"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    v-on:change="cambiarArchivo($event)" ref="miarchivo" placeholder="Cargar archivo">
                                <label class="custom-file-label" for="customFile">@{{ archivo }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <!-- Pruebas Data Table -->
                        @include('components.pruebas.datatable', [
                            'acciones' => true,
                        ])
                    </div>
                    <div class="card-footer">
                        <!-- Pagination -->
                        @include('components.pagination')
                    </div>
                </div>
            </div>
        </div>

        @include('pruebas.modal.agregar')
        @include('pruebas.modal.eliminar')
        @include('pruebas.modal.editar')
    </div>
@endsection

@push('scripts')
    <!-- Vuejs -->
    <script src="vue/pruebas.js"></script>
@endpush
