@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">systéme d'exploitation</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('OS') }}">Configuration</a></li>
                        <li class="breadcrumb-item active">systéme d'exploitation</li>
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
        <div class="modal fade" id="modal-DeleteOS">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Suprrimer Systeme d'exploitation</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Voulez vous vraiment supprimé cet Systeme d'exploitation ?</p>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" id="confirmSupMarque">Confirmer la
                            suppression</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /.modal for  mofify etablissement-->
        <div class="modal fade" id="modal-ModifyOs">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <span>Modifier Le système d'exploitation</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="FrmModifyOS">
                        @csrf
                        <div class="modal-body">


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="ID_OS">Id de Marque</label>
                                        <input type="text" class="form-control" id="ID_OS" name="ID_OS" readonly>

                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" placeholder="Nom" id="Nom_OS_OLD"
                                            name="Nom_OS_OLD" />
                                        <span id="Nom_OS_OLD-error" class="error invalid-feedback Up"></span>

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


        <div class="col-6">

            <div class="card card-primary card-outline">
                <div class="card-header bg-light">
                    <h5 class="card-title">
                        <div class="ribbon ribbon-bookmark ribbon-top ribbon-start bg-blue">
                            <i class="fas fa-cube fa-lg"></i>
                        </div>
                        <span class="pl-5">Ajouter Systeme d'exploitation</span>

                    </h5>

                </div>
                <form action="" method="post" id="FormulaireAjouteOS">
                    @csrf
                    <div class="modal-body">



                        <div class="row">

                            <div class="col-sm-12">

                                <div class="form-group">
                                    <label>Nom Systeme d'exploitation : </label>
                                    <input type="text" class="form-control" id="nameOS" name="nameOS"
                                        placeholder="Nom de system">
                                    <span id="nameOS-error" class="error invalid-feedback"></span>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <button type="submit" class=" float-right btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                        </div>





                    </div>
                </form>
            </div>

        </div>



        <div class="col-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Systeme d'exploitation liste</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover" id="OsTable">
                        <thead>
                            <tr>

                                <th>Id</th>
                                <th>Nom</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center py-0 align-middle">
                            @foreach ($OSs as $os)
                                <tr>
                                    <td>{{ $os->id }}</td>
                                    <td>{{ $os->name }}</td>

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
@section('marques_scripts')
    <script>
        $(document).ready(function() {
            var OsTable = $("#OsTable").DataTable({
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
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-ModifyOs" id="modifyOsBtn"><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#modal-DeleteOS"  id="DeleteOS"><i class="fas fa-trash"></i></a></div>'
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


            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            });

            $("#FormulaireAjouteOS").submit(function(e) {
                e.preventDefault();
                // Clear previous errors
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');
                var formData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "/StoreOS",
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        OsTable.row.add([
                            response.id,
                            response.name,
                        ]).draw(false);



                        Toast.fire({
                            icon: 'success',
                            title: "Systeme d'exploitation ajouté avec succès"
                        });
                        $("#FormulaireAjouteOS")[0].reset();

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

            $(document).on('click', '#modifyOsBtn', function() {
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback.Up').text('');
                const row = $(this).closest('tr');
                const rowData = OsTable.row(row).data();
                //console.log(rowData[0]); 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: "/UpdateOS",
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        // console.log(response);
                        $("#Nom_OS_OLD").val(response.name);
                        $("#ID_OS").val(response.id);

                    },
                    // error: function(xhr, status, error) {
                    //     // Handle errors during fetching establishment details
                    //     console.error(xhr.responseText);
                    //     $('#FormulaireAjouteOS').modal('hide');

                    //     Toast.fire({
                    //         icon: 'error',
                    //         title: ' OS aleardy exists '
                    //     })
                })

                $("#FrmModifyOS").off('submit').on('submit', function(e) {
                    e.preventDefault();


                    var formData = $(this).serializeArray(); // Get form data as an array
                    //console.log(formData);

                    $.ajax({
                        url: '/UpdateStoreOS',
                        type: 'POST',
                        data: formData,
                        success: function(response) {

                            const MarqueData = [response.id, response.name];

                            OsTable.row(row).data(MarqueData).draw(false);

                            $('#modal-ModifyOs').modal('hide');

                            Toast.fire({
                                icon: 'success',
                                title: "Systeme d'exploitation modifié avec succès" // Success message in French
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
                                $('#modal-ModifyOs').modal('hide');
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
            $(document).on('click', '#DeleteOS', function() {
                const row = $(this).closest('tr');
                const rowData = OsTable.row(row).data();
                //   console.log(rowData); //id
                var datta = rowData[0];

                $('#confirmSupMarque').one('click', function() {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: '/DeleteOS',
                        type: 'POST',
                        data: {
                            id: datta
                        },
                        success: function(response) {

                            if (response.code === "200") {

                                OsTable.row(row).remove().draw(false);
                                $('#modal-DeleteOS').modal('hide');
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
                                $('#modal-DeleteOS').modal('hide');
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
                                $('#modal-DeleteOS').modal('hide');

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
