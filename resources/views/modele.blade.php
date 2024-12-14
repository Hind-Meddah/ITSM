@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Model</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('modele') }}">Configuration</a></li>
                        <li class="breadcrumb-item active">Model</li>
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
        <!-- /.modal for  delete etablissement-->
        <div class="modal fade" id="modal-DeleteModele">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Suprrimer Modele</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Voulez vous vraiment supprimé cet Modele ?</p>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" id="confirmSupModel">Confirmer la suppression</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /.modal for  mofify etablissement-->
        <div class="modal fade" id="modal-ModifyModele">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <span>Modele</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="formmodifymodels">
                        @csrf
                        <div class="modal-body">


                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="IdModele">Id de modele</label>
                                        <input type="text" class="form-control" id="IdModele" name="IdModele" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <select class="form-control" name="type_id_modif" @readonly(true)>
                                            <option selected id="type_id_modif"></option>
                                            {{-- @foreach ($types as $type)
                                               <option value="{{ $type->id }}">{{ $type->name }}</option>
                                           @endforeach --}}

                                        </select>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Marque</label>
                                        <select class="form-control" name="marquemodify" @readonly(true)>


                                            <option id="marquemodify" selected></option>



                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" placeholder="Nom" name="old_nom_model"
                                            id="old_nom_model">
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
        <div class="modal fade" id="modal-AddModele">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <div class="ribbon ribbon-bookmark ribbon-top ribbon-start bg-blue">
                                <i class="fas fa-cube fa-lg"></i>
                            </div>
                            <span class="pl-5">Ajouter Modeles</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="FormulaireAjouteModeles">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Types</label>
                                        <select class="form-control" name="typeSelect" id="typeSelect">
                                            <option selected disabled> Selectioner le type </option>
                                            @foreach ($types as $type)
                                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach

                                        </select>
                                        <span id="typeSelect-error" class="error invalid-feedback"></span>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Marques</label>
                                        <select class="form-control" name="marqueSelect" id="marqueSelect">
                                            <option selected  disabled> Selectioner la marque </option>
                                            @foreach ($marques as $marque)
                                                <option value="{{ $marque->id }}">{{ $marque->name }}</option>
                                            @endforeach

                                        </select>
                                        <span id="marqueSelect-error" class="error invalid-feedback"></span>
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" placeholder="Nom" id="nom_modele"
                                            name="nom_modele" />
                                        <span id="nom_modele-error" class="error invalid-feedback"></span>
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
                    <h3 class="card-title">Modeles liste</h3>
                </div>

                <div class="card-body">
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal" id="ajouterPro"
                        data-target="#modal-AddModele">
                        Ajouter Modele
                    </button>
                    <table class="table table-bordered table-hover" id="modeleTable">
                        <thead>
                            <tr>

                                <th>id</th>
                                <th>Type</th>
                                <th>Marque</th>
                                <th>Model</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center py-0 align-middle">
                            @foreach ($modeles as $model)
                                <tr>
                                    <td>{{ $model->id }}</td>
                                    <td>{{ $model->marque->type->name }}</td>
                                    <td>{{ $model->marque->name }}</td>
                                    <td>{{ $model->name }}</td>
                                    <td class="text-center py-0 align-middle">

                                    </td>

                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modele_script')
    <script>
        $(document).ready(function() {
            var ModelTable = $("#modeleTable").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "pagingType": 'simple',
                "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-ModifyModele" id="modifierModele"><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#modal-DeleteModele"  id="deleteModele"><i class="fas fa-trash"></i></a></div>'
                }],

                "language": {
                    "emptyTable": "Pas de données disponibles.",
                    "info": "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
                    "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
                    "infoFiltered": "(filtré de _MAX_ entrées au total)",
                    "search": "Recherche :",
                    "paginate": {
                        "next": "Suivant",
                        "previous": "Précédent"
                    }
                },

            });


            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            });




            $("#typeSelect, #typeSelectmodify").on("click", function() {
                var selectedtype = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/GetMarque',
                    method: 'POST',
                    data: {
                        typeId: selectedtype
                    },
                    success: function(response) {
                        console.log(response);
                        $('#marqueSelect, #marquemodify').empty();

                        $.each(response, function(index, marque) {
                            // $('#classeSelect').append($('<option></option>').val(salle.id).text(salle.name));
                            $('#marqueSelect, #marquemodify').append(new Option(marque
                                .name, marque.id));

                        });

                    },
                    error: function(xhr, status, error) {

                        console.error(error);

                    }
                });
            });



            $(document).on('click', '#ajouterPro', function() {
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');
            });


            $("#FormulaireAjouteModeles").submit(function(e) {
                e.preventDefault();
                // Clear previous errors
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');
                var formData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "/StoreModele",
                    data: formData,
                    success: function(response) {
                        console.log(response);

                        ModelTable.row.add([
                            response.OS.id,
                            response.type,
                            response.marque,
                            response.OS.name,

                        ]).draw(false);

                        $('#modal-AddModele').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: "modèle ajouté avec success"
                        });
                            // Reset the form
                        $("#FormulaireAjouteModeles")[0].reset();


                    },
                    error: function(xhr, status, error) {

                        if (xhr.status === 409) {
                            // Specific handling for conflict error (establishment already exists)
                            Swal.fire({
                                icon: 'error',
                                title: 'Échec de l\'ajout',
                                text: xhr.responseJSON
                                    .error // Display specific error message
                            });
                        } else {
                            // Handle other errors (validation errors, server errors, etc.)
                            console.log(xhr.responseJSON);

                            let errors = xhr.responseJSON.errors;

                            for (let field in errors) {
                                let input = $(`#${field}`);
                                let errorSpan = $(`#${field}-error`);

                                input.addClass('is-invalid');
                                errorSpan.text(errors[field][0]);
                            }
                        }

                    }
                });

            });

            $(document).on('click', '#modifierModele', function() {
                const row = $(this).closest('tr');
                const rowData = ModelTable.row(row).data();
                //console.log(rowData[0]); 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: "/UpdateModele",
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        // console.log(response);
                        $("#old_nom_model").val(response.model.name);
                        $("#IdModele").val(response.model.id);
                        // $("#marquemodify").val(response.marque.name);

                        // $('#marquemodify').empty();
                        // response.marques_of_type.forEach(function(marque) {
                        //     $('#marquemodify').append(new Option(marque.name, marque
                        //         .id));
                        // }); // Set the selected option to the current marque
                        $("#marquemodify").val(response.model.marque_id);
                        $("#marquemodify").html(response.model.marque.name);

                        $("#typeSelectmodify").val(response.model.marque.type_id);
                        $('#type_id_modif').html(response.model.marque.type.name);

                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });
                $("#formmodifymodels").off('submit').on('submit', function(e){

                    e.preventDefault();

                    var formData = $(this).serializeArray(); // Get form data as an array
                    //console.log(formData);

                    $.ajax({
                        url: '/UpdateStoreModele',
                        type: 'POST',
                        data: formData,
                        success: function(response) {

                            const ModeleData = [response.id, response.marque.type.name,
                                response.marque.name, response.name
                            ];

                            ModelTable.row(row).data(ModeleData).draw(false);

                            $('#modal-ModifyModele').modal('hide');

                            Toast.fire({
                                icon: 'success',
                                title: "modèle modifié avec succès" // Success message in French
                            });
                            $("#formmodifymodels")[0].reset();

                        },
                        error: function(xhr, status, error) {
                            if (xhr.status === 409) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Échec de la modification',
                                    text: xhr.responseJSON.error
                                });
                            } else if (xhr.status === 400) {
                                $('#modal-ModifyModele').modal('hide');
                                Swal.fire({
                                    icon: 'info',
                                    title: xhr.responseJSON.error,
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            } else if (xhr.status === 422) {
                                let errors = xhr.responseJSON.errors;
                                for (let field in errors) {
                                    let input = $(`#${field}`);
                                    let errorSpan = $(`#${field}-error`);
                                    input.addClass('is-invalid');
                                    errorSpan.text(errors[field][0]);
                                }
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Erreur interne du serveur',
                                    text: 'Veuillez réessayer plus tard.'
                                });
                            }
                        }
                    });
                });

            });


            // Delete Ajax
            $(document).on('click', '#deleteModele', function() {
                const row = $(this).closest('tr');
                const rowData = ModelTable.row(row).data();
                //   console.log(rowData); //id
                var datta = rowData[0];

                $('#confirmSupModel').one("click", function() {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: '/DeleteModele',
                        type: 'POST',
                        data: {
                            id: datta
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.code === "200") {

                                ModelTable.row(row).remove().draw(false);
                                $('#modal-DeleteModele').modal('hide');
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
                                $('#modal-DeleteModele').modal('hide');
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
                                $('#modal-DeleteModele').modal('hide');

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



        });
    </script>
@endsection
