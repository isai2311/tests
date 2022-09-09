<template v-show="perfil">
    <div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Perfil transaccional</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Estadisticas</h6>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th></th>
                                                    <th>Compra</th>
                                                    <th>Venta</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-center">
                                                <tr>
                                                    <td>Minimo</td>
                                                    <td>@{{ formatPrice(perfil.compra.minimo) }}</td>
                                                    <td>@{{ formatPrice(perfil.venta.minimo) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Maximo</td>
                                                    <td>@{{ formatPrice(perfil.compra.maximo) }}</td>
                                                    <td>@{{ formatPrice(perfil.venta.maximo) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Promedio</td>
                                                    <td>@{{ formatPrice(perfil.compra.promedio) }}</td>
                                                    <td>@{{ formatPrice(perfil.venta.promedio) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td>
                                                    <td>@{{ formatPrice(perfil.compra.total) }}</td>
                                                    <td>@{{ formatPrice(perfil.venta.total) }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Listado de operaciones</h6>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-striped" width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Ticket</th>
                                                    <th>Sucursal</th>
                                                    <th>Caja</th>
                                                    <th>Cajero</th>
                                                    <th>Tipo</th>
                                                    <th>Fecha</th>
                                                    <th>T. C.</th>
                                                    <th>USD</th>
                                                    <th>MXN</th>
                                                    <th>Recibido</th>
                                                    <th>Cambio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="perfil.operaciones && perfil.operaciones.length > 0">
                                                    <template v-for="(operacion, index) in perfil.operaciones">
                                                        <tr class="text-center">
                                                            <td>@{{ operacion.cOpeSerie }} @{{ operacion.cOpeTicketNum }}</td>
                                                            <td>
                                                                <template v-if="operacion.sucursal">
                                                                    @{{ operacion.sucursal.cSucNombre }}
                                                                </template>
                                                            </td>
                                                            <td>@{{ operacion.cOpeCajaFolio }}</td>
                                                            <td>
                                                                <template v-if="operacion.usuario">
                                                                    @{{ operacion.usuario.email }}
                                                                </template>
                                                            </td>
                                                            <td>
                                                                <template v-if="operacion.tipo_operacion">
                                                                    @{{ operacion.tipo_operacion.cTiOpeDescripcion }}
                                                                </template>
                                                            </td>
                                                            <td>@{{ operacion.cOpeFecha }}</td>
                                                            <td>@{{ formatPrice(operacion.cOpeTipoCambio) }}</td>
                                                            <td>@{{ formatPrice(operacion.cOpeImporte) }}</td>
                                                            <td>@{{ formatPrice(operacion.cOpeEquivalente) }}</td>
                                                            <td>@{{ formatPrice(operacion.cOpeRecibido) }}</td>
                                                            <td>@{{ formatPrice(operacion.cOpeCambio) }}</td>
                                                        </tr>
                                                    </template>
                                                </template>
                                                <template v-else>
                                                    <tr>
                                                        <td colspan="12" class="text-center">No hay operaciones
                                                            registradas</td>
                                                    </tr>
                                                </template>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Cerrar</button>
                    {{-- <button class="btn btn-primary" type="submit">Guardar</button> --}}
                </div>
            </div>
        </div>
    </div>
</template>
