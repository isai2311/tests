@extends('layouts.layout')

@section('content')
<div id="dashboard" class="container">
    <div class="row justify-content-center">
        <template v-for="(permiso, index) in permisos">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">@{{ permiso.cItemMenu }}</div>
    
                    <div class="card-body">
                        <template v-if="permiso.cNomIcoMenu">
                            <span class="pull-left"><i :class="permiso.cNomIcoMenu +' fa-2x'" style="color:#357ca5"></i></span>
                        </template>
                        <template v-else>
                            <span class="pull-left"><i class="far fa-circle" style="color:#357ca5"></i></span>
                        </template>
                        <template v-if="!permiso.cChildMenu">
                            <div class="panel-body text-right" role="alert">
                                <strong><u><a :href="permiso.cUrlMenu">@{{permiso.cItemMenu}}</a></u></br></strong>
                            </div>
                        </template>
                        <template v-else>
                            <template v-for="(menu, index) in permiso.hijos">
                                <div class="panel-body text-right" role="alert">
                                    <u><a :href="menu.cUrlMenu">@{{menu.cItemMenu}}</a></u></br>
                                </div>
                            </template>
                        </template>
                    </div>
                </div>
            </div>
        </template>
    </div>
</div>
@endsection

@push('scripts')
<!-- Vuejs -->
<script src="vue/dashboard.js"></script>
@endpush
