@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Salles</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('class') }}">Gestion</a></li>
                        <li class="breadcrumb-item active">Salles</li>
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
                <h3 class="card-title">Salles</h3>

            </div>
            <div class="card-body">
                <!-- /.modal for  add Class-->
                <div class="modal fade" id="modal-AddClass">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Ajouter Salle</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="storeClass">
                                    @csrf

                                    <div class="form-group">
                                        <label>Choisissez un établissement</label>
                                        <select class="form-control select2" style="width: 100%;" id="nameEtablissement"
                                            name="IdEtablissement">

                                            @foreach ($establishements as $es)
                                                <option value={{ $es->id }}>{{ $es->name }}</option>
                                            @endforeach
                                        </select>
                                        <span id="IdEtablissement-error" class="error invalid-feedback"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameClass">Nom de la salle </label>
                                        <input type="text" class="form-control" id="nameClass"
                                            placeholder="Nom de la salle" name="nameClass">
                                        <span id="nameClass-error" class="error invalid-feedback"></span>
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
                <!-- /.modal for  mofify class-->
                <div class="modal fade" id="modal-ModifyClass">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Modifier Salle</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" id="modifycls">
                                    @csrf
                                    <div class="form-group">
                                        <label for="nameClasse">Id Salle</label>
                                        <input type="text" class="form-control" id="IdClasse" name="IdClasse" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Choisissez un établissement</label>
                                        <select class="form-control select2" style="width: 100%;" id="IdEst"
                                            name="IdEst">

                                            @foreach ($establishements as $es)
                                                <option value={{ $es->id }}>{{ $es->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nameClass">Nom de la salle</label>
                                        <input type="text" class="form-control Up" id="nameClassUp"
                                            placeholder="Nom de la salle" name="nameClassUp">
                                            <span id="nameClassUp-error" class="error invalid-feedback Up"></span>
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
                <div class="modal fade" id="modal-DeleteClass">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Supprimer Salle</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <p>Voulez-vous vraiment supprimer cette salle ?</p>

                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                <button type="button" class="btn btn-danger" id="deleteCls">Confirmer la suppression</button>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#modal-AddClass">
                    <i class="fas fa-plus"></i>  Ajouter Salle
                </button>
                <table class="table table-bordered table-hover" id="Classs">
                    <thead>
                        <tr>
                            <th>ID de Salle</th>
                            <th>Nom de la salle</th>
                            <th>Nom d'Établissement</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-center py-0 align-middle">

                        @foreach ($classes as $cs)
                            <tr>
                                <td>{{ $cs->id }}</td>
                                <td>{{ $cs->name }}</td>
                                <td>
                                    @foreach ($establishements as $es)
                                        @if ($es->id == $cs->establishement_id)
                                            {{ $es->name }}
                                        @endif
                                    @endforeach
                                </td>
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
@section('classe_script')
    <script>
        $(document).ready(function() {
            var classsTtable = $('#Classs').DataTable({
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
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-ModifyClass" id="modifierClass"><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#modal-DeleteClass"  id="deleteClass"><i class="fas fa-trash"></i></a></div>'
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

            //Declaration varaible Toast global
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });

            // ADD AJAX
            $("#storeClass").submit(function(e) {
                e.preventDefault();

                // Clear previous errors
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');
                var formData = $(this).serializeArray();
                console.log(formData)
                $.ajax({
                    type: "POST", // or "GET" depending on your server-side handling
                    url: '/addClass', // Specify the URL to which you want to send the data
                    data: formData, // Form data to be sent

                    success: function(response) {

                        classsTtable.row.add([

                            response.classe.id,
                            response.classe.name,
                            response.nameEtablissement,
                            // optionColumn

                        ]).draw(false);
                        $('#modal-AddClass').modal('toggle');

                        Toast.fire({
                            icon: 'success',
                            title: "Classe ajouté avec success"
                        });

                        $("#storeClass")[0].reset();

                    },
                    error: function(xhr, status, error) {
                        // Handle errors
                        if (xhr.status === 409) {
                            // Specific handling for conflict error (establishment already exists)
                            Swal.fire({
                                icon: 'error',
                                title: 'Échec de l\'ajout',
                                text: xhr.responseJSON
                                    .error // Display specific error message
                            });
                        } else {
                        console.error(xhr.responseText);
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

            // AJAX MODIFY 
            $(document).on('click', '#modifierClass', function() {
                const row = $(this).closest('tr');
                const rowData = classsTtable.row(row).data();
                console.log(row); // This will log the establishment data including the ID

                $.ajax({
                    url: '/modifyClass', // Specify the URL to your Laravel controller for fetching establishment details
                    type: 'POST', // Use POST method for sending data
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token for Laravel
                        id: rowData[
                            0
                        ] // Send the establishment ID from the first element of rowData (assuming ID is at index 0)
                    },
                    success: function(response) {
                        $("#modifycls #IdClasse").val(response.id);
                        $("#modifycls #nameClassUp").val(response
                            .name
                        ); // Assuming 'name' is a property in the response for establishment name
                        $("#modifycls #IdEst").val(response.establishement
                            .id
                        ); // Assuming 'name' is a property in the response for establishment name

                        // Assuming 'ville' is a property in the response for establishment city



                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });

                // Attach submit event handler to the modification form

                $("#modifycls").off('submit').on('submit', function(e) {
                    e.preventDefault();
                    $('.form-control.Up').removeClass('is-invalid');
                    $('.error.invalid-feedback.Up').text('');

                    var formData = $(this).serializeArray(); // Get form data as an array
                    console.log(formData);


                    $.ajax({
                        url: '/modifyClassedt', // Specify the URL to your Laravel controller for modification
                        type: 'POST', // Use POST method for sending data
                        data: formData,
                        success: function(response) {

                            // Handle successful modification response (e.g., update table, show success message)
                            const classData = [response.id, response.name, response
                                .establishement.name
                            ];
                            classsTtable.row(row).data(classData).draw(false);
                            $('#modal-ModifyClass').modal('hide');

                            Toast.fire({
                                icon: 'success',
                                title: "Salle modifiée avec succès" // Success message in French
                            });
                        },
                        error: function(xhr, status, error) {
                            if (xhr.status === 409) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Échec de la modification.',
                                    text: xhr.responseJSON.error
                                });
                            } else if (xhr.status === 400) {
                                $('#modal-ModifyClass').modal('hide');
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
            $(document).on('click', '#deleteClass', function() {
                const row = $(this).closest('tr');
                const rowData = classsTtable.row(row).data();
                //   console.log(rowData); //id
                var datta = rowData[0];
                // Confirmation prompt and AJAX request logic (unchanged)
                $('#deleteCls').one('click', function() {

                    $.ajax({
                        url: '/deleteClass', // URL to your Laravel controller
                        type: 'POST', // Or 'DELETE' depending on your route
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token for Laravel
                            id: datta // Data you want to send to the controller
                        },
                        success: function(response) {
                            if (response.code === "200") {

                                classsTtable.row(row).remove().draw(false);
                                $('#modal-DeleteClass').modal('hide');
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
                                $('#modal-DeleteClass').modal('hide');
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
                                $('#modal-DeleteClass').modal('hide');

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
        })
    </script>
@endsection
