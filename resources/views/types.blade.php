@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Types</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('types') }}">Configuration</a></li>
                        <li class="breadcrumb-item active">Types</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('main-content')
    <!-- Small boxes (Stat box) -->
    <!-- Small boxes (Stat box) -->

    <div class="row">
        <!-- /.modal -->
        <!-- /.modal -->
        @if (session('errorOrdi') ||
                session('errorSouri') ||
                session('errorMoni') ||
                session('errorMoni') ||
                session('errorClavi') ||
                session('errorRouter') ||
                session('errorSwitch') ||
                session('errorCamera') ||
                session('errorImpri') ||
                session('errorAccess'))
            <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title text-white" id="paymentSuccessModalLabel"><span
                                    class="warning-icon">⚠</span> Attention !! </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if (session('errorOrdi'))
                                {{ session('errorOrdi') }}
                            @elseif (session('errorSouri'))
                                {{ session('errorSouri') }}
                            @elseif (session('errorMoni'))
                                {{ session('errorMoni') }}
                            @elseif (session('errorClavi'))
                                {{ session('errorClavi') }}
                            @elseif (session('errorRouter'))
                                {{ session('errorRouter') }}
                            @elseif (session('errorSwitch'))
                                {{ session('errorSwitch') }}
                            @elseif (session('errorCamera'))
                                {{ session('errorCamera') }}
                            @elseif (session('errorImpri'))
                                {{ session('errorImpri') }}
                            @else
                                {{ session('errorAccess') }}
                            @endif
                        </div>
                        <div class="modal-footer">
                            <a href="/" class="btn btn-secondary">Annulez</a>
                            <a href="/Types" class="btn btn-danger">Continuez</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- /.modal for  delete Type-->
        <div class="modal fade" id="modal-DeleteType">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Suprrimez Type</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Voulez vous vraiment supprimé cet Type ?</p>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Annulez</button>
                        <button type="button" class="btn btn-danger" id="confirmSupTypes">Confirmez la suppression</button>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- /.modal for  mofify Type-->
        {{-- <div class="modal fade" id="modal-ModifyType">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <span>Type</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="FormulaireModifieTypes">
                        @csrf
                        <div class="modal-body">


                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label>Id type</label>
                                        <input type="text" class="form-control" id="id_type_modfi" name="id_type_modfi"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12">

                                    <div class="form-group">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" id="nom_type_modfi" name="nom_type_modfi"
                                            placeholder="Nom">

                                    </div>
                                </div>

                            </div>



                        </div>
                        <div class="modal-footer bg-light">
                            <button type="submit" class="btn btn-primary">Modifie</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div> --}}


        <div class="col-6">

            <div class="card card-outline card-blue">
                <div class="card-header bg-light">
                    <h5 class="card-title">
                        <div class="ribbon ribbon-bookmark ribbon-top ribbon-start bg-blue">
                            <i class="fas fa-cube fa-lg"></i>
                        </div>
                        <span class="pl-5">Ajouter Types</span>

                    </h5>

                </div>
                <form action="" method="post" id="FormulaireAjouteType">
                    @csrf
                    <div class="modal-body">



                        <div class="row">

                            <div class="col-sm-8">

                                <div class="form-group">

                                    {{-- <input type="text" class="form-control" id="nom_type" name="nom_type"
                                        placeholder="Nom de Type"> --}}
                                    <select class="form-control" id="nom_type" name="nom_type">
                                        <option value="" selected disabled>Sélectionner un type</option>

                                        <option value="ordinateur">Ordinateur</option>
                                        <option value="routeur">Routeur</option>
                                        <option value="commutateur">Commutateur</option>
                                        <option value="caméra">Caméra</option>
                                        <option value="imprimante">Imprimante</option>
                                        <option value="Points d'accès">Points d'accès</option>
                                        <option value="moniteur">Moniteur</option>
                                        <option value="clavier">Clavier</option>
                                        <option value="souris">Souris</option>
                                    </select>
                                    <span id="nom_type-error" class="error invalid-feedback"></span>

                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary">Ajouter</button>
                                </div>
                            </div>
                        </div>





                    </div>
                </form>
            </div>

        </div>



        <div class="col-6">
            <div class="card card-outline card-blue">
                <div class="card-header">
                    <h3 class="card-title">Types liste</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-hover" id="typestable">
                        <thead>
                            <tr>

                                <th>Id</th>
                                <th>Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center py-0 align-middle">
                            @foreach ($Types as $type)
                                <tr>
                                    <td>{{ $type->id }}</td>
                                    <td>{{ $type->name }}</td>

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
@section('types_scripts')
    <script>
        $(document).ready(function() {
            $('#errorModal').modal('show');
            var TypesTable = $("#typestable").DataTable({
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
                    // <a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-ModifyType" id="modifietype"><i class="fas fa-edit"></i></a>
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#modal-DeleteType"  id="deletetype"><i class="fas fa-trash"></i></a></div>'
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

            $("#FormulaireAjouteType").submit(function(e) {
                e.preventDefault();
                // Clear previous errors
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');
                var formData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "/StoreTypes",
                    data: formData,
                    success: function(response) {
                        // console.log(response);
                        TypesTable.row.add([
                            response.id,
                            response.name,
                        ]).draw(false);



                        Toast.fire({
                            icon: 'success',
                            title: "Type ajouté avec succès"
                        });
                        $("#FormulaireAjouteType")[0].reset();

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

                        // $('#modal-ModifyType').modal('hide');

                        // Toast.fire({
                        //     icon: 'error',
                        //     title: ' Type aleardy exists '
                        // })
                        // $("#FormulaireAjouteType")[0].reset();

                    }
                });

            });

            // $(document).on('click', '#modifietype', function() {
            //     const row = $(this).closest('tr');
            //     const rowData = TypesTable.row(row).data();
            //     //console.log(rowData[0]); 
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': '{{ csrf_token() }}'
            //         },
            //         url: "/UpdateTypes",
            //         type: 'POST',
            //         data: {
            //             id: rowData[0]
            //         },
            //         success: function(response) {
            //             // console.log(response);
            //             $("#nom_type_modfi").val(response.name);
            //             $("#id_type_modfi").val(response.id);

            //         },
            //         error: function(xhr, status, error) {
            //             // Handle errors during fetching establishment details
            //             console.error(xhr.responseText);

            //         }
            //     });


            //     $("#FormulaireModifieTypes").one('submit', function(e) {
            //         e.preventDefault();

            //         var formData = $(this).serializeArray(); // Get form data as an array
            //         //console.log(formData);

            //         $.ajax({
            //             url: '/UpdateStoreTypes',
            //             type: 'POST',
            //             data: formData,
            //             success: function(response) {

            //                 const TypeData = [response.id, response.name];

            //                 TypesTable.row(row).data(TypeData).draw(false);

            //                 $('#modal-ModifyType').modal('hide');

            //                 Toast.fire({
            //                     icon: 'success',
            //                     title: "Type modifié avec succès" // Success message in French
            //                 });
            //             },
            //             error: function(xhr, status, error) {
            //                 // Handle errors during modification
            //                 console.error(xhr.responseText);
            //                 $('#modal-ModifyType').modal('hide');

            //                 Toast.fire({
            //                     icon: 'error',
            //                     title: ' Type aleardy exists '
            //                 })
            //             }
            //         });
            //     });

            // });


            // Delete Ajax
            $(document).on('click', '#deletetype', function() {
                const row = $(this).closest('tr');
                const rowData = TypesTable.row(row).data();
                //   console.log(rowData); //id
                var datta = rowData[0];

                $('#confirmSupTypes').one('click', function() {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: '/DeleteTypes',
                        type: 'POST',
                        data: {
                            id: datta
                        },
                        // success: function(response) {

                        //     TypesTable.row(row).remove().draw(false);
                        //     $('#modal-DeleteType').modal('hide');
                        //     var Toast = Swal.mixin({
                        //             toast: true,
                        //             position: 'top-end',
                        //             showConfirmButton: false,
                        //             timer: 2000
                        //         });
                        //     Toast.fire({
                        //         icon: 'success',
                        //         title: "Etablisement supprimé avec success"
                        //     });

                        // },


                        success: function(response) {
                            console.log(response);
                            if (response.code === "200") {

                                TypesTable.row(row).remove().draw(false);
                                $('#modal-DeleteType').modal('hide');
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
                                $('#modal-DeleteType').modal('hide');
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
                                $('#modal-DeleteType').modal('hide');

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
