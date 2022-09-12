@extends('layouts.layout')

@section('content')
    <div id="pruebas">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pruebas asignadas</h6>
                    </div>
                    <div class="card-body p-0">
                        <!-- Pruebas Data Table -->
                        @include('components.pruebas.datatable', [
                            'acciones' => false,
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
