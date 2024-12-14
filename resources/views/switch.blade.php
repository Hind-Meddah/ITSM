@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Commutateur</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="#">Parc</a></li>
                        <li class="breadcrumb-item active">Commutateur</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('main-content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- /.modal -->
        <!-- /.modal -->
        <div class="modal fade" id="modal-DetailSwitch">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">Commutateur Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-outline card-light">
                            {{-- <div class="card-header" data-card-widget="collapse">
                      <h3 class="card-title">router Information</h3>
                      <div class="card-tools">
                        <!-- Add card tools here, if needed -->
                      </div>
                    </div> --}}
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive mb15">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Property</th>
                                                        <th>Value</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><strong>Id </strong></td>
                                                        <td id="switch-id" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>libellé</strong></td>
                                                        <td id="switch-label" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Establishment</strong></td>
                                                        <td id="switch-Establishment" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Class</strong></td>
                                                        <td id="switch-Class" class="bg-light"></td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td><strong>Label</strong></td>
                                                        <td id="router-Label" class="bg-light"></td>
                                                    </tr> --}}
                                                    <tr>
                                                        <td><strong>Serial Number</strong></td>
                                                        <td id="switch-Serial" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Status</strong></td>
                                                        <td id="switch-Status" class="bg-light"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Inventory Number</strong></td>
                                                        <td id="switch-Inventory" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Marque</strong></td>
                                                        <td id="switch-Manufacturer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Model</strong></td>
                                                        <td id="switch-Model" class="bg-light"></td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal for  delete etablissement-->
        <div class="modal fade" id="modal-DeleteSwitch">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Suprrimer Commutateur</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Voulez vous vraiment supprimé cet Commutateur ?</p>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" id="btncnfdeleteswitch">Confirmer la
                            suppression</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /.modal for  mofify etablissement-->
        <div class="modal fade" id="modal-ModifySwitch">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <span>Modifier Router</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="modifyfrm">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" class="form-control" name="id_switch_modif"
                                            id="id_switch_modif" readonly />

                                    </div>

                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Etablissement</label>
                                        <select class="form-control" id="etabliSelect_modif" name="etabliSelect_modif">
                                            <option selected disabled>Selectioné un établissement</option>
                                            @foreach ($etablissements as $etablissement)
                                                <option value="{{ $etablissement->id }}">{{ $etablissement->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select class="form-control" id="classeSelect_modif" name="classeSelect_modif">

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Libellé</label>
                                        <input type="text" class="form-control" placeholder="Libellé"
                                            id="label_modif" name="label_modif">
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Numéro de série</label>
                                        <input type="text" class="form-control" placeholder="Numéro de série"
                                            id="num_serie_modif" name="num_serie_modif">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Numéro d'inventaire</label>
                                        <input type="text" class="form-control" placeholder="Numéro d'inventaire"
                                            id="num_inventaire_modif" name="num_inventaire_modif">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Fabricant</label>
                                        <select class="form-control" id="marque_id_modif" name="marque_id_modif">
                                            @foreach ($marques as $marque)
                                                <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                                            @endforeach


                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Modèle</label>
                                        <select class="form-control" id="model_select_modif" name="model_select_modif">


                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status_modif" id="status_modif">
                                            <option selected disabled>Choissez le Status </option>
                                            <option value="0">Active</option>
                                            <option value="1">En panne</option>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>RAM</label>
                                        <input type="number" class="form-control" placeholder="RAM">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Stockage</label>
                                        <input type="number" class="form-control" placeholder="Stockage">
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>CPU</label>
                                        <select class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control">
                                            <option>option 1</option>
                                            <option>option 2</option>
                                            <option>option 3</option>
                                            <option>option 4</option>
                                            <option>option 5</option>
                                        </select>
                                    </div>
                                </div>

                            </div> --}}

                        </div>
                        <div class="modal-footer bg-light">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="modal-AddSwitch">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <div class="ribbon ribbon-bookmark ribbon-top ribbon-start bg-blue">
                                <i class="fas fa-network-wired fa-lg"></i>
                            </div>
                            <span class="pl-5">Ajouter switch</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="frm_addSwitch">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Etablissement</label>
                                        <select class="form-control" id="etabliSelect" name="etabliSelect">
                                            <option selected disabled>Selectioné un établissement</option>
                                            @foreach ($etablissements as $etablissement)
                                                <option value="{{ $etablissement->id }}">{{ $etablissement->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                        <span id="etabliSelect-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select class="form-control" id="classeSelect" name="classeSelect">

                                        </select>
                                        <span id="classeSelect-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option selected disabled>Choissez le Status </option>
                                            <option value="0">Active</option>
                                            <option value="1">En panne</option>

                                        </select>
                                        <span id="status-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>libellé</label>
                                        <input type="text" id="libellé" name="libellé" class="form-control"
                                            placeholder="libellé">
                                        <span id="libellé-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Numéro de série</label>
                                        <input type="text" id="num_serie" name="num_serie" class="form-control"
                                            placeholder="Numéro de série">
                                        <span id="num_serie-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Numéro d'inventaire</label>
                                        <input type="text" id="num_inventaire" name="num_inventaire"
                                            class="form-control" placeholder="Numéro d'inventaire">
                                        <span id="num_inventaire-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Fabricant</label>
                                        <select class="form-control" id="marque_id" name="marque_id">
                                            <option selected disabled>Choissez la marque </option>
                                            @foreach ($marques as $marque)
                                                <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                                            @endforeach


                                        </select>
                                        <span id="marque_id-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Modèle</label>
                                        <select class="form-control" id="model_select" name="model_select">

                                        </select>
                                        <span id="model_select-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>

                            </div>


                        </div>
                        <div class="modal-footer bg-light">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        {{-- <div class="col-12">
            <div class="card card-outline card-navy">
                <div class="card-header">
                    <h3 class="card-title">Filtres</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" style="display: block;">
                    all filter fieald here
                </div>
            </div>
        </div> --}}
        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Commutateurs liste</h3>
                </div>

                <div class="card-body">
                    @if (Auth::check() && Auth::user()->Role != 'USER')
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                            data-target="#modal-AddSwitch">
                            Ajouter Commutateur
                        </button>
                    @endif

                    <table class="table table-bordered table-hover" id="switchtable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Libellé</th>
                                <th>Marque</th>
                                <th>Modéle</th>
                                <th>Établissement</th>
                                <th>Salle</th>
                                <th>État</th>
                                {{-- @if (Auth::check() && Auth::user()->Role != 'USER') --}}

                                <th>Actions</th>
                                {{-- @endif --}}

                            </tr>
                        </thead>
                        <tbody class="text-center py-0 align-middle">

                            @foreach ($Switchs as $Switch)
                                <tr>
                                    <td>{{ $Switch->id }}</td>
                                    <td>{{ $Switch->label }}</td>
                                    <td>{{ $Switch->marque->name }}</td>
                                    <td>{{ $Switch->model->name }}</td>
                                    <td>{{ $Switch->classe->establishement->name }}</td>
                                    <td>{{ $Switch->classe->name }}</td>
                                    <td> <span
                                            class="badge {{ $Switch->status === 1 ? 'badge-danger' : 'badge-success' }}">
                                            {{ $Switch->status === 1 ? 'En panne' : 'Active' }}
                                        </span></td>
                                    {{-- @if (Auth::check() && Auth::user()->Role != 'USER') --}}

                                    <td class="text-center py-0 align-middle">
                                        <!-- Actions go here -->
                                    </td>
                                    {{-- @endif --}}

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('switch_scripts')
    <?php
    $A = (Auth::check() && Auth::user()->Role == 'ADMIN') || (Auth::check() && Auth::user()->Role == 'TECH');
    ?>
    <script>
        $(document).ready(function() {
            var SwitchTable = $('#switchtable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "pagingType": 'simple',
                "columnDefs": [{
                        "targets": [0],
                        "visible": false
                    },

                    {
                        "targets": -1,
                        "data": null,
                        "defaultContent": "<div class=\"btn-group btn-group-sm\">" +
                            "<?php if ($A): ?>" +
                            "<a href=\"#\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-ModifySwitch\" id=\"modifiyswitchbtn\"><i class=\"fas fa-edit\"></i></a>" +
                            "<a href=\"#\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modal-DeleteSwitch\" id=\"deleteswitchbtn\"><i class=\"fas fa-trash\"></i></a>" +
                            "<?php endif; ?>" +
                            "<a href=\"#\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#modal-DetailSwitch\" id=\"Viewswitchbtn\"><i class=\"fas fa-eye\"></i></a>" +
                            "</div>"
                    }


                ],

                "language": {
                    "emptyTable": "Pas de données disponibles.",
                    "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                    "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                    "infoFiltered": "(filtré de _MAX_ entrées au total)",
                    "search": "Rechercher :",
                    "paginate": {
                        "next": "Suivant",
                        "previous": "Précédent"
                    }
                }
            });
            //Declaration varaible Toast global
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });


            $("#etabliSelect, #etabliSelect_modif").on("change", function() {
                var selectedEtablissentId = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/GetSalle',
                    method: 'POST',
                    data: {
                        etablissementId: selectedEtablissentId
                    },
                    success: function(response) {
                        console.log(response);
                        $('#classeSelect, #classeSelect_modif').empty();

                        $.each(response, function(index, salle) {
                            // $('#classeSelect').append($('<option></option>').val(salle.id).text(salle.name));
                            $('#classeSelect, #classeSelect_modif').append(new Option(
                                salle.name, salle.id));

                        });
                    },
                    error: function(xhr, status, error) {

                        console.error(error);
                    }
                });
            });

            $('#marque_id, #marque_id_modif').on("change", function() {
                var selectedMarqueId = $(this).val();
                console.log("modele changed");

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/GetModel',
                    method: 'POST',
                    data: {
                        marqueId: selectedMarqueId
                    },
                    success: function(response) {
                        console.log(response);
                        $('#model_select, #model_select_modif').empty();

                        $.each(response, function(index, modele) {
                            // $('#classeSelect').append($('<option></option>').val(salle.id).text(salle.name));
                            $('#model_select, #model_select_modif').append(new Option(
                                modele.name, modele.id));

                        });
                    },
                    error: function(xhr, status, error) {

                        console.error(error);
                    }
                });
            });

            $("#frm_addSwitch").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serializeArray();
                // Clear previous errors
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');

                $.ajax({
                    type: "POST",
                    url: '/StoreSwitch',
                    data: formData,

                    success: function(response) {
                        console.log(response);
                        const etat = response.status == 1 ? 'En panne' : 'Active';
                        const etatColor = response.status == 1 ? 'badge-danger' :
                            'badge-success';
                        SwitchTable.row.add([
                            response.id,
                            response.label,
                            response.marque.name,
                            response.model.name,
                            response.classe.establishement.name,
                            response.classe.name,
                            `<span class="badge ${etatColor}">${etat}</span>`
                        ]).draw(false);

                        $('#modal-AddSwitch').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: "Le Switch a bien été ajouté"
                        });

                        $("#frm_addSwitch")[0].reset();

                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        console.error(xhr.responseText);
                        let errors = xhr.responseJSON.errors;
                        for (let field in errors) {
                            let input = $(`#${field}`);
                            let errorSpan = $(`#${field}-error`);

                            input.addClass('is-invalid');
                            errorSpan.text(errors[field][0]);
                        }

                    }
                });

            });

            // AJAX MODIFY 
            $(document).on('click', '#modifiyswitchbtn', function() {
                const row = $(this).closest('tr');
                const rowData = SwitchTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/UpdateSwitch',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        $("#id_switch_modif").val(response.Switch.id);
                        $("#num_serie_modif").val(response.Switch.n_série);
                        $("#label_modif").val(response.Switch.label);
                        $("#num_inventaire_modif").val(response.Switch.n_inventaire);
                        $("#marque_id_modif").val(response.Switch.marque_id);
                        $("#status_modif").val(response.Switch.status);
                        $("#etabliSelect_modif").val(response.Switch.classe.establishement_id);
                        $("#classeSelect_modif").empty();
                        response.Switch.classe.establishement.classes.forEach((classObj) => {
                            $("#classeSelect_modif").append(new Option(classObj.name,
                                classObj.id));
                        });
                        $("#classeSelect_modif").val(response.Switch.classe_id);
                        $("#model_select_modif").empty();
                        response.ModelsOfMarque.forEach(function(mdl) {
                            $('#model_select_modif').append(new Option(mdl.name, mdl
                                .id));
                        });
                        $("#model_select_modif").val(response.Router.model_id);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });


                $("#modifyfrm").one('submit', function(e) {
                    e.preventDefault();
                    var formData = $(this).serializeArray();
                    console.log(formData);


                    $.ajax({
                        url: '/UpdateStoreSwitch',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            const etat = response.status == 1 ? 'En panne' : 'Active';
                            const etatColor = response.status == 1 ? 'badge-danger' :
                                'badge-success';

                            const switchData = [
                                response.id,
                                response.label,
                                response.marque.name,
                                response.model.name,
                                response.classe.establishement.name,
                                response.classe.name,
                                `<span class="badge ${etatColor}">${etat}</span>`
                            ];

                            SwitchTable.row(row).data(switchData).draw(false);
                            $('#modal-ModifySwitch').modal('hide');
                            Toast.fire({
                                icon: 'success',
                                title: " modifié avec succès"
                            });
                        },
                        error: function(xhr, status, error) {

                            console.error(xhr.responseText);
                        }
                    });
                });

            });


            $(document).on('click', '#deleteswitchbtn', function() {
                const row = $(this).closest('tr');
                const rowData = SwitchTable.row(row).data();
                //   console.log(rowData); //id
                var datta = rowData[0];
                // Confirmation prompt and AJAX request logic (unchanged)
                $('#btncnfdeleteswitch').one('click', function() {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: '/DeleteSwitch',
                        type: 'POST',
                        data: {
                            id: datta
                        },
                        success: function(response) {

                            if (response.code === "200") {

                                SwitchTable.row(row).remove().draw(false);
                                $('#modal-DeleteSwitch').modal('hide');
                                var Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                Toast.fire({
                                    icon: 'success',
                                    title: response.message
                                });
                            } else if (response.code === "500") {
                                $('#modal-DeleteSwitch').modal('hide');
                                var Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                                Toast.fire({
                                    icon: 'error',
                                    title: response.message
                                });
                            } else {
                                $('#modal-DeleteSwitch').modal('hide');

                                var Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 2000
                                });

                                Toast.fire({
                                    icon: 'error',
                                    title: 'erreur de supression'
                                });
                            }

                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                        }


                    });
                })

            });

            $(document).on('click', '#Viewswitchbtn', function() {
                const row = $(this).closest('tr');
                const rowData = SwitchTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/DetailsSwitch',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        // Assuming the response object is stored in a variable called `response`

                        // Set the value of the "Id" cell
                        document.getElementById("switch-id").textContent = response.id;
                        document.getElementById("switch-label").textContent = response.label;


                        // Set the value of the "Establishment" cell
                        document.getElementById("switch-Establishment").textContent = response
                            .classe.establishement.name;

                        // Set the value of the "Class" cell
                        document.getElementById("switch-Class").textContent = response.classe
                            .name;

                        // Set the value of the "Label" cell
                        // document.getElementById("router-Label").textContent = response.label;

                        // Set the value of the "Serial Number" cell
                        document.getElementById("switch-Serial").textContent = response.n_série;

                        // Set the value of the "Status" cell
                        const statusCell = document.getElementById("switch-Status");
                        if (response.status === 0) {
                            statusCell.textContent = "Active";
                        } else {
                            statusCell.textContent = "En panne";
                        }


                        // Set the value of the "Inventory Number" cell
                        document.getElementById("switch-Inventory").textContent = response
                            .n_inventaire;

                        // Set the value of the "Marque" cell
                        document.getElementById("switch-Manufacturer").textContent = response
                            .marque.name;

                        // Set the value of the "Model" cell
                        document.getElementById("switch-Model").textContent = response.model
                            .name;


                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });
            });
        })
    </script>
@endsection
