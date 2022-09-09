@extends('layouts.layout')
@push('styles')
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
  <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('content')
<div id="dashboard" class="container">

    <!-- Datatables CSS CDN -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->

    <!-- jQuery CDN -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <!-- Datatables JS CDN -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->
    <div class="row justify-content-center">
      <table class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>No</th>
                <th>folio</th>
                <th>Nombre</th>
                <th>ApPaterno</th>
                <th>ApMaterno</th>
                <th>erDescripcion</th>
                <th>RFC</th>
                <th>CURP</th>
                <th>FechaNac</th>
                <th>EstadoId</th>
                <th>Descripcion</th>
                <th>EdoNvo</th>
                <th>FechaAlta</th>
                <th>Descripcion</th>
                <th>Nacional</th>
                <th>Calle</th>
                <th>NumExterior</th>
                <th>NumInterior</th>
                <th>Colonia</th>
                <th>CodigoPostal</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Pais</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>deDescripcion</th>
                <th>NumIdentificacion</th>
                <th>VigenciaIdentificacion</th>
                <th>CopiaIdentificacion</th>
                <th>CiudadId</th>
                <th>CopiaComprobanteDom</th>
                <th>CiudadSepoMex</th>
                <th>ieDescripcion</th>
                <th>InconsistenciaExpediente</th>
                <th>Observacion</th>
                <th>Ocupacion</th>
                <th>NombreTrabajo</th>
                <th>TelefonoTrabajo</th>
                <th>PersonaNotificada</th>
                <th>ListaNegra</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {

    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('clientes.lista') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token() }}'
            },
        },
        columns: [
            {data:'DT_RowIndex', name: 'DT_RowIndex'},
            {data:'cCliFolio', name: 'folio'},
            {data:'cCliNombre',name: 'Nombre'},
            {data:'cCliApPaterno',name: 'ApPaterno'},
            {data:'cCliApMaterno',name: 'ApMaterno'},
            {data:'cCliRFC',name: 'RFC'},
            {data:'cCliCURP',name: 'CURP'},
            {data:'cCliFechaNac',name: 'FechaNac'},
            {data:'cCliEstadoId',name: 'EstadoId'},
            {data:'cCliEdoNvo',name: 'EdoNvo'},
            {data:'cCliFechaAlta',name: 'FechaAlta'},
            {data:'cCliNacional',name: 'Nacional'},
            {data:'cCliCalle',name: 'Calle'},
            {data:'cCliNumExterior',name: 'NumExterior'},
            {data:'cCliNumInterior',name: 'NumInterior'},
            {data:'cCliColonia',name: 'Colonia'},
            {data:'cCliCodigoPostal',name: 'CodigoPostal'},
            {data:'cCliCiudad',name: 'Ciudad'},
            {data:'cCliEstado',name: 'Estado'},
            {data:'cCliPais',name: 'Pais'},
            {data:'cCliTelefono',name: 'Telefono'},
            {data:'cCliEmail',name: 'Email'},
            {data:'cCliNumIdentificacion',name: 'NumIdentificacion'},
            {data:'cCliVigenciaIdentificacion',name: 'VigenciaIdentificacion'},
            {data:'cCliCopiaIdentificacion',name: 'CopiaIdentificacion'},
            {data:'cCliCiudadId',name: 'CiudadId'},
            {data:'cCliCopiaComprobanteDom',name: 'CopiaComprobanteDom'},
            {data:'cCliCiudadSepoMex',name: 'CiudadSepoMex'},
            {data:'cCliInconsistenciaExpediente',name: 'InconsistenciaExpediente'},
            {data:'cCliObservacion',name: 'Observacion'},
            {data:'cCliOcupacion',name: 'Ocupacion'},
            {data:'cCliNombreTrabajo',name: 'NombreTrabajo'},
            {data:'cCliTelefonoTrabajo',name: 'TelefonoTrabajo'},
            {data:'cCliPersonaNotificada',name: 'PersonaNotificada'},
            {data:'cCliListaNegra',name: 'ListaNegra'},
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });

  });
</script>
@endpush
