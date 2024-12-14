@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Souris</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="#">Parc</a></li>
                        <li class="breadcrumb-item"><a href="#">Accessoires</a></li>
                        <li class="breadcrumb-item active">Souris</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('main-content')
    <div class="row">
        <!-- /.modal -->
        <!-- /.modal -->
        <div class="modal fade" id="modal-DetailSouris">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">Computer Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-outline card-light">
                            {{-- <div class="card-header" data-card-widget="collapse">
                      <h3 class="card-title">Computer Information</h3>
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
                                                        <td id="souris-id" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Establishment</strong></td>
                                                        <td id="souris-Establishment" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Class</strong></td>
                                                        <td id="souris-Class" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Label</strong></td>
                                                        <td id="souris-Label" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Serial Number</strong></td>
                                                        <td id="souris-Serial" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Status</strong></td>
                                                        <td id="souris-Status" class="bg-light"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Inventory Number</strong></td>
                                                        <td id="souris-Inventory" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Marque</strong></td>
                                                        <td id="souris-Manufacturer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Model</strong></td>
                                                        <td id="souris-Model" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Parent UC</strong></td>
                                                        <td id="souris-Parent" class="bg-light"></td>
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
        <div class="modal fade" id="modal-DeleteSouris">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Suprrimer Souris</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Voulez vous vraiment supprimé cet souris ?</p>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" id="btncnfdeleteuc">Confirmer la suppression</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /.modal for  mofify etablissement-->
        <div class="modal fade" id="modal-ModifySouris">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <span>Modifier Unite central</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="modifyfrm">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" class="form-control" name="id_souris_modif"
                                            id="id_souris_modif" readonly />

                                    </div>


                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Etablissement</label>
                                        <select class="form-control" id="etabliSelect_modif" name="etabliSelect_modif">
                                            @foreach ($etablissements as $etablissement)
                                                <option value="{{ $etablissement->id }}">{{ $etablissement->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Classe</label>
                                        <select class="form-control" id="classeSelect_modif" name="classeSelect_modif">

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Étiquette</label>
                                        <input type="text" class="form-control" placeholder="Étiquette"
                                            id="libelleInput_modif" name="libelleInput_modif" />
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>UC parent</label>
                                        <select class="form-control" name="parentUc_modier" id="parentUc_modier">
                                            {{-- <option selected disabled>Selectioné un parent</option> --}}
                                            {{-- @foreach ($ordinatuerParents as $ordinatuerParent)
                                                <option value="{{ $ordinatuerParent->id }}">{{ $ordinatuerParent->label }}
                                                </option>
                                            @endforeach --}}


                                        </select>
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
                                            <option value="0">Active</option>
                                            <option value="1">En panne</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer bg-light">
                            <button type="submit" class="btn btn-primary">Modifié</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <div class="modal fade" id="modal-AddSouris">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <div class="ribbon ribbon-bookmark ribbon-top ribbon-start bg-blue">
                                <i class="fas fa-server fa-lg"></i>
                            </div>
                            <span class="pl-5">Ajouter Routeur</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="frm_addSouris">
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

                                            <option value="" selected disabled>selectioner class</option>

                                        </select>
                                        <span id="classeSelect-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>UC parent</label>
                                        <select class="form-control" name="parentUc" id="parentUc">
                                            {{-- <option selected disabled>Selectioné un parent</option>
                                            @foreach ($ordinatuerParents as $ordinatuerParent)
                                                <option value="{{ $ordinatuerParent->id }}">{{ $ordinatuerParent->label }}
                                                </option>
                                            @endforeach --}}


                                        </select>
                                        <span id="parentUc-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Numéro de série</label>
                                        <input type="text" class="form-control" placeholder="Numéro de série"
                                            id="num_serie" name="num_serie">
                                        <span id="num_serie-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Numéro d'inventaire</label>
                                        <input type="text" class="form-control" placeholder="Numéro d'inventaire"
                                            id="num_inventaire" name="num_inventaire">
                                        <span id="num_inventaire-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Étiquette</label>
                                        <input type="text" class="form-control" placeholder="Étiquette"
                                            id="libelleInput" name="libelleInput" />
                                        <span id="libelleInput-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">

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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Modèle</label>
                                        <select class="form-control" id="model_select" name="model_select">
                                            <option selected disabled>Choissez le Model </option>
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

        <div class="col-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Souriss liste</h3>
                </div>

                <div class="card-body">
                    @if (Auth::check() && Auth::user()->Role != 'USER')
                        <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                            data-target="#modal-AddSouris">
                            Ajouter Souris
                        </button>
                    @endif
                    <table class="table table-bordered table-hover" id="SourisTable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Libellé</th>
                                <th>Marque</th>
                                <th>Établissement</th>
                                <th>Salle</th>
                                <th>UC Père</th>
                                <th>État</th>
                                {{-- @if (Auth::check() && Auth::user()->Role != 'USER') --}}

                                <th>Actions</th>
                                {{-- @endif --}}
                            </tr>
                        </thead>
                        <tbody class="text-center py-0 align-middle">

                            @foreach ($souriss as $souris)
                                <tr>
                                    <td>{{ $souris->id }}</td>
                                    <td>{{ $souris->label }}</td>
                                    <td>{{ $souris->marque->name }}</td>
                                    <td>{{ $souris->classe->establishement->name }}</td>
                                    <td>{{ $souris->classe->name }}</td>
                                    @if (@isset($souris->device->label))
                                        <td>{{ $souris->device->label }}</td>
                                    @else
                                        <td> - </td>
                                    @endif
                                    <td> <span
                                            class="badge {{ $souris->status === 1 ? 'badge-danger' : 'badge-success' }}">
                                            {{ $souris->status === 1 ? 'En panne' : 'Active' }}
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
@section('souris_script')
    <?php
    // Vérifiez si l'utilisateur est authentifié et son rôle
    $A = (Auth::check() && Auth::user()->Role == 'ADMIN') || (Auth::check() && Auth::user()->Role == 'TECH');
    
    ?>
    <script>
        $(document).ready(function() {
            var SourisTable = $('#SourisTable').DataTable({
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
                            "<a href=\"#\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#modal-ModifySouris\" id=\"modifiysourisbtn\"><i class=\"fas fa-edit\"></i></a>" +
                            "<a href=\"#\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#modal-DeleteSouris\" id=\"deletesourisbtn\"><i class=\"fas fa-trash\"></i></a>" +
                            "<?php endif; ?>" +
                            "<a href=\"#\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#modal-DetailSouris\" id=\"Viewsourisbtn\"><i class=\"fas fa-eye\"></i></a>" +
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
                        $('#classeSelect, #classeSelect_modif').append(
                            '<option value="" selected disabled>selectioner class</option>');

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
            $('#classeSelect, #classeSelect_modif').on("change", function() {
                var selectedClassId = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/Getordi',
                    method: 'POST',
                    data: {
                        classId: selectedClassId
                    },
                    success: function(response) {
                        console.log(response);
                        $('#parentUc, #parentUc_modier').empty();

                        $.each(response, function(index, ordinatuerParents) {
                            // $('#classeSelect').append($('<option></option>').val(salle.id).text(salle.name));
                            $('#parentUc, #parentUc_modier').append(new Option(
                                ordinatuerParents.label, ordinatuerParents.id));

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
            // ajax add
            $("#frm_addSouris").submit(function(e) {
                e.preventDefault();

                // Clear previous errors
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');
                var formData = $(this).serializeArray();
                console.log(formData)
                $.ajax({
                    type: "POST",
                    url: '/StoreSouris',
                    data: formData,

                    success: function(response) {
                        const etat = response.status == 1 ? 'En panne' : 'Active';
                        const etatColor = response.status == 1 ? 'badge-danger' :
                            'badge-success';
                        SourisTable.row.add([
                            response.id,
                            response.label,
                            response.marque.name,
                            response.classe.establishement.name,
                            response.classe.name,
                            response.device.label,

                            `<span class="badge ${etatColor}">${etat}</span>`
                        ]).draw(false);

                        $('#modal-AddSouris').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: "Le souris a bien été ajouté"
                        });
                        $("#frm_addSouris")[0].reset();


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
            $(document).on('click', '#modifiysourisbtn', function() {
                const row = $(this).closest('tr');
                const rowData = SourisTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/UpdateSouris',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        $("#id_souris_modif").val(response.Souris.id);
                        $("#parentUc_modier").empty();
                        response.ordinatuerParents.forEach((classObj) => {
                            $("#parentUc_modier").append(new Option(classObj.label,
                                classObj.id));
                        });
                        $("#parentUc_modier").val(response.Souris.parent_ref);
                        $("#libelleInput_modif").val(response.Souris.label);
                        $("#num_serie_modif").val(response.Souris.n_série);
                        $("#num_inventaire_modif").val(response.Souris.n_inventaire);
                        $("#marque_id_modif").val(response.Souris.marque.id);
                        $("#status_modif").val(response.Souris.status);
                        $("#etabliSelect_modif").val(response.Souris.classe.establishement_id);
                        // Clear and populate the 'classeSelect_modif' dropdown
                        $("#classeSelect_modif").empty();
                        response.Souris.classe.establishement.classes.forEach((classObj) => {
                            $("#classeSelect_modif").append(new Option(classObj.name,
                                classObj.id));
                        });
                        $("#classeSelect_modif").val(response.Souris.classe_id);


                        $("#model_select_modif").empty();

                        response.ModelsOfMarque.forEach(function(mdl) {
                            $('#model_select_modif').append(new Option(mdl.name, mdl
                                .id));
                        }); // Set the selected option to the current marque
                        $("#model_select_modif").val(response.Souris.model_id);
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
                        url: '/UpdateStoreSouris',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            const etat = response.status == 1 ? 'En panne' : 'Active';
                            const etatColor = response.status == 1 ? 'badge-danger' :
                                'badge-success';

                            const SourisData = [
                                response.id,
                                response.label,
                                response.marque.name,
                                response.classe.establishement.name,
                                response.classe.name,
                                response.device.label,
                                `<span class="badge ${etatColor}">${etat}</span>`
                            ];

                            SourisTable.row(row).data(SourisData).draw(false);
                            $('#modal-ModifySouris').modal('hide');
                            Toast.fire({
                                icon: 'success',
                                title: " modifié avec succès"
                            });
                            $("#modifyfrm")[0].reset();
                        },
                        error: function(xhr, status, error) {

                            console.error(xhr.responseText);
                            $('#modal-ModifySouris').modal('hide');

                            Toast.fire({
                                icon: 'error',
                                title: "Le souris N'a pas  ajouter"
                            });

                        }
                    });
                });

            });
            // ajax delete 
            $(document).on('click', '#deletesourisbtn', function() {
                const row = $(this).closest('tr');
                const rowData = SourisTable.row(row).data();
                //   console.log(rowData); //id
                var datta = rowData[0];
                // Confirmation prompt and AJAX request logic (unchanged)
                $('#btncnfdeleteuc').one('click', function() {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: '/DeleteSouris',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: datta
                        },
                        success: function(response) {




                            if (response.code === "200") {

                                SourisTable.row(row).remove().draw(false);
                                $('#modal-DeleteSouris').modal('hide');
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
                                $('#modal-DeleteSouris').modal('hide');
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
                                $('#modal-DeleteSouris').modal('hide');

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
            // ajax details
            $(document).on('click', '#Viewsourisbtn', function() {
                const row = $(this).closest('tr');
                const rowData = SourisTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/DetailsSouris',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        // Assuming the response object is stored in a variable called `response`

                        // Set the value of the "Id" cell
                        document.getElementById("souris-id").textContent = response.id;

                        // Set the value of the "Establishment" cell
                        document.getElementById("souris-Establishment").textContent = response
                            .classe.establishement.name;

                        // Set the value of the "Class" cell
                        document.getElementById("souris-Class").textContent = response.classe
                            .name;

                        // Set the value of the "Label" cell
                        document.getElementById("souris-Label").textContent = response.label;

                        // Set the value of the "Serial Number" cell
                        document.getElementById("souris-Serial").textContent = response.n_série;

                        // Set the value of the "Status" cell
                        const statusCell = document.getElementById("souris-Status");
                        if (response.status === 0) {
                            statusCell.textContent = "Active";
                        } else {
                            statusCell.textContent = "En panne";
                        }
                        // Set the value of the "Processor" cell


                        // Set the value of the "Inventory Number" cell
                        document.getElementById("souris-Inventory").textContent = response
                            .n_inventaire;

                        // Set the value of the "Marque" cell
                        document.getElementById("souris-Manufacturer").textContent = response
                            .marque.name;

                        // Set the value of the "Model" cell
                        document.getElementById("souris-Model").textContent = response.model
                            .name;
                        document.getElementById("souris-Parent").textContent = response.device
                            .label;


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
