@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Établissements</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('establishment') }}">Gestion</a></li>
                        <li class="breadcrumb-item active">Établissements</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('main-content')
    <!-- Main content -->
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Établissements</h3>

            </div>
            <div class="card-body">
                <!-- /.modal for  add etablissement-->
                <div class="modal fade" id="modal-AddEtablisement">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Ajouter Établissement</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="storeEst">
                                    @csrf

                                    <div class="form-group">
                                        <label for="nameEstablishement">Nom d'Établissement</label>
                                        <input type="text" class="form-control " id="nameEstablishement"
                                            placeholder="Nom d'etablissement" name="nameEstablishement">
                                        <span id="nameEstablishement-error" class="error invalid-feedback "></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="villeEstablishement">Ville d'Établissement</label>
                                        <input type="text" class="form-control" id="villeEstablishement"
                                            placeholder="Ville d'etablissement" name="villeEstablishement">
                                        <span id="villeEstablishement-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="float-right btn btn-primary">Ajouter</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- /.modal for  mofify etablissement-->
                <div class="modal fade" id="modal-ModifyEtablisement">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Modifier Établissement</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="modifyEst" novalidate>
                                    @csrf
                                    <div class="form-group">
                                        <label for="IdEstablishement">Id d'Établissement</label>
                                        <input type="text" class="form-control " id="IdEstablishement"
                                            name="IdEstablishement" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameEstablishementUp">Nom d'Établissement</label>
                                        <input type="text" class="form-control Up" id="nameEstablishementUp"
                                            placeholder="Nom d'établissement" name="nameEstablishementUp">
                                        <span id="nameEstablishementUp-error" class="error invalid-feedback Up"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="villeEstablishementUp">Ville d'Établissement</label>
                                        <input type="text" class="form-control Up" id="villeEstablishementUp"
                                            placeholder="Ville d'établissement" name="villeEstablishementUp">
                                        <span id="villeEstablishementUp-error" class="error invalid-feedback Up"></span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="float-right btn btn-primary">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

                <!-- /.modal -->
                <!-- /.modal for  delete etablissement-->
                <div class="modal fade" id="modal-DeleteEtablisement">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Supprimer Établissement</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <p>Voulez-vous vraiment supprimer cet établissement ?</p>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-danger" id="deleteEst">Confirmer la suppression
                                </button>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                    data-target="#modal-AddEtablisement">
                    <i class="fas fa-plus"></i> Ajouter un nouvel établissement
                </button>
                <table class="table table-bordered table-hover" id="establishements">
                    <thead>
                        <tr>
                            <th>ID d'Établissement</th>
                            <th>Nom d'Établissement</th>
                            <th>Ville d'Établissement</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center py-0 align-middle">
                        @foreach ($establishements as $es)
                            <tr>
                                <td>{{ $es->id }}</td>
                                <td>{{ $es->name }}</td>
                                <td>{{ $es->ville }}</td>
                                <td class="text-center py-0 align-middle">
                                    {{-- <div class="btn-group btn-group-sm">
                                        <a href="" class="btn btn-info" data-toggle="modal"
                                            data-target="#modal-ModifyEtablisement"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#modal-DeleteEtablisement" data-id="{{ $es->id }}"
                                            id="deleteEstablisement"><i class="fas fa-trash"></i></a>
                                    </div> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('establishement_script')
    <script>
        $(document).ready(function() {
            var establishementTtable = $('#establishements').DataTable({
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
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-ModifyEtablisement" id="modifierEstablisement"><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#modal-DeleteEtablisement"  id="deleteEstablisement"><i class="fas fa-trash"></i></a></div>'
                }],

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

            // Attach submit event handler to the form
            $("#storeEst").submit(function(e) {
                e.preventDefault();

                // Clear previous errors
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');

                var formData = $(this).serializeArray();
                $.ajax({
                    type: "POST", // or "GET" depending on your server-side handling
                    url: '/addEstablishment', // Specify the URL to which you want to send the data
                    data: formData, // Form data to be sent
                    success: function(response) {
                        establishementTtable.row.add([

                            response.id,
                            response.name,
                            response.ville,
                            // optionColumn

                        ]).draw(false);
                        $('#modal-AddEtablisement').modal('toggle');

                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        Toast.fire({
                            icon: 'success',
                            title: "Établissement ajouté avec succès"
                        });

                        $('#storeEst')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        // console.error(xhr.responseText);

                        // console.log(xhr.responseJSON);

                        // let errors = xhr.responseJSON.errors;

                        // for (let field in errors) {
                        //     let input = $(`#${field}`);
                        //     let errorSpan = $(`#${field}-error`);

                        //     input.addClass('is-invalid');
                        //     errorSpan.text(errors[field][0]);
                        // }
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



            // Delete Ajax
            $(document).on('click', '#deleteEstablisement', function() {
                const row = $(this).closest('tr');
                const rowData = establishementTtable.row(row).data();
                //   console.log(rowData); //id
                var datta = rowData[0];
                // Confirmation prompt and AJAX request logic (unchanged)
                $('#deleteEst').one('click', function() {

                    $.ajax({
                        url: '/deleteEstablishment', // URL to your Laravel controller
                        type: 'POST', // Or 'DELETE' depending on your route
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for Laravel
                            id: datta // Data you want to send to the controller
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.code === "200") {
                                establishementTtable.row(row).remove().draw(false);
                                $('#modal-DeleteEtablisement').modal('hide');

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
                                $('#modal-DeleteEtablisement').modal('hide');

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
                                $('#modal-DeleteEtablisement').modal('hide');

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


            // AJAX MODIFY 
            $(document).on('click', '#modifierEstablisement', function() {
                const row = $(this).closest('tr');
                const rowData = establishementTtable.row(row).data();

                $.ajax({
                    url: '/modifyEstablishment',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: rowData[0]
                    },
                    success: function(response) {
                        $("#modifyEst #IdEstablishement").val(response.id);
                        $("#modifyEst #nameEstablishementUp").val(response.name);
                        $("#modifyEst #villeEstablishementUp").val(response.ville);
                    }
                });
                $("#modifyEst").off('submit').on('submit', function(e) {
                    e.preventDefault();
                    $('.form-control.Up').removeClass('is-invalid');
                    $('.error.invalid-feedback.Up').text('');

                    var formData = $(this).serializeArray();

                    $.ajax({
                        url: '/modifyEstablishmentedt',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            const establishmentsData = [response.id, response.name,
                                response.ville
                            ];
                            establishementTtable.row(row).data(establishmentsData).draw(
                                false);
                            $('#modal-ModifyEtablisement').modal('hide');

                            Swal.fire({
                                icon: 'success',
                                title: "Établissement modifié avec succès",
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2000
                            });
                        },
                        error: function(xhr, status, error) {
                            if (xhr.status === 409) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Échec de la modification',
                                    text: xhr.responseJSON.error
                                });
                            } else if (xhr.status === 400) {
                                $('#modal-ModifyEtablisement').modal('hide');
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



        });

        // $("#modifyEst").submit(function(e) {
        //     e.preventDefault();

        // var formData = $(this).serializeArray();

        // $.ajax({


        //     url: '/modifyEstablishment/' + rowData[0], // Specify the URL to which you want to send the data
        //     type: 'POST', // Or 'DELETE' depending on your route
        //     data: formData,

        //     success: function(response) {
        //         // console.log(response);
        //         const establishmentsData = [response.id, response.name,
        //             response.ville
        //         ];
        //         // Add more objects for additional establishments;
        //         establishementTtable.row(row).data(establishmentsData)
        //         .draw();
        //         $('#modal-ModifyEtablisement').modal('hide');

        //         var Toast = Swal.mixin({
        //             toast: true,
        //             position: 'top-end',
        //             showConfirmButton: false,
        //             timer: 2000
        //         });

        //         Toast.fire({
        //             icon: 'success',
        //             title: "Etablisement supprimé avec success"
        //         });

        //     },
        //     error: function(xhr, status, error) {
        //         // Handle errors
        //         console.error(xhr.responseText);
        //     }
        // })

        // });
    </script>
@endsection
