@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Processeur</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">

                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('processor') }}">Configuration</a></li>
                        <li class="breadcrumb-item active">Processeur</li>
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
        <div class="modal fade" id="modal-DeleteProcessors">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Suprrimer Processors</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <p>Voulez vous vraiment supprimé cet Processors ?</p>

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
        <div class="modal fade" id="modal-ModifyProcessors">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <span>Processors</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="FrmCpuModify">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Id</label>
                                            <input type="text" id="ID_cpu_modif" name="ID_cpu_modif" class="form-control"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" id="name_modif" name="name_modif" class="form-control"
                                                placeholder="Nom">
                                            <span id="name_modif-error" class="error invalid-feedback "></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Fréquence (GHz)</label>
                                        <input type="number" step="any" name="frequency_modif" id="frequency_modif"
                                            class="form-control" placeholder="Fréquence (MHz)">
                                        <span id="frequency_modif-error" class="error invalid-feedback"></span>

                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre de cœurs</label>
                                        <input type="number" name="nbcores_modif" id="nbcores_modif" class="form-control"
                                            placeholder="Nombre de threads">
                                        <span id="nbcores_modif-error" class="error invalid-feedback"></span>

                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>manufacturer</label>
                                        <input type="text" id="manufacturer_modif" name="manufacturer_modif"
                                            class="form-control" placeholder="Fréquence (MHz)">
                                        <span id="manufacturer_modif-error" class="error invalid-feedback"></span>

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
        <div class="modal fade" id="modal-AddProcessors">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">
                            <div class="ribbon ribbon-bookmark ribbon-top ribbon-start bg-blue">
                                <i class="fas fa-cube fa-lg"></i>
                            </div>
                            <span class="pl-5">Ajouter Processorss</span>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="FormulaireAjouteProcessorss">
                        @csrf
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                placeholder="Nom">
                                            <span id="name-error" class="error invalid-feedback "></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fréquence (GHz)</label>
                                        <input type="number" step="any" name="frequency" id="frequency"
                                            class="form-control" placeholder="Fréquence (MHz)">
                                        <span id="frequency-error" class="error invalid-feedback "></span>

                                    </div>
                                </div>

                            </div>
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nombre de cœurs</label>
                                        <input type="number" name="nbcores" id="nbcores" class="form-control"
                                            placeholder="Nombre de threads">
                                        <span id="nbcores-error" class="error invalid-feedback "></span>
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>Fabriquant</label>
                                        <input type="text" id="manufacturer" name="manufacturer" class="form-control"
                                            placeholder="Fabriquant">
                                        <span id="manufacturer-error" class="error invalid-feedback "></span>
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
                    <h3 class="card-title">Processorss liste</h3>
                </div>

                <div class="card-body">
                    <button type="button" class="btn btn-success mb-3" data-toggle="modal"
                        data-target="#modal-AddProcessors" id="ajouterPro">
                        Ajouter Processors
                    </button>
                    <table class="table table-bordered table-hover" id="CpuTable">
                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Nom</th>
                                <th>Fréquence (MHz)</th>
                                <th>Nombre de cœurs</th>
                                <th>Fabricant</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center py-0 align-middle">
                            @foreach ($processors as $processor)
                                <tr>

                                    <td>{{ $processor->id }}</td>
                                    <td>{{ $processor->name }}</td>
                                    <td>{{ $processor->frequency }}</td>
                                    <td>{{ $processor->nbcores }}</td>
                                    <td>{{ $processor->manufacturer }}</td>
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
@section('cpu_script')
    <script>
        $(document).ready(function() {
            var CpuTable = $("#CpuTable").DataTable({
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
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="" class="btn btn-info" data-toggle="modal" data-target="#modal-ModifyProcessors" id="modifierProcessors"><i class="fas fa-edit"></i></a><a href="#" class="btn btn-danger" data-toggle="modal"  data-target="#modal-DeleteProcessors"  id="deleteProcessors"><i class="fas fa-trash"></i></a></div>'
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
            $(document).on('click', '#ajouterPro', function(){
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');
            });

            $("#FormulaireAjouteProcessorss").submit(function(e) {
                e.preventDefault();
                // Clear previous errors
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');
                var formData = $(this).serializeArray();
                $.ajax({
                    type: "POST",
                    url: "/StoreProcessors",
                    data: formData,
                    success: function(response) {
                        // console.log(response);
                        CpuTable.row.add([

                            response.id,
                            response.name,
                            response.frequency,
                            response.nbcores,
                            response.manufacturer

                        ]).draw(false);

                        $('#modal-AddProcessors').modal('hide');

                        Toast.fire({
                            icon: 'success',
                            title: "processeur ajouté avec succès"
                        });
                        $("#FormulaireAjouteProcessorss")[0].reset();

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

            $(document).on('click', '#modifierProcessors', function() {
                $('.form-control').removeClass('is-invalid');
                $('.error.invalid-feedback').text('');
                const row = $(this).closest('tr');
                const rowData = CpuTable.row(row).data();
                //console.log(rowData[0]); 
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: "/UpdateProcessors",
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        $("#ID_cpu_modif").val(response.id);
                        $("#name_modif").val(response.name);
                        $("#frequency_modif").val(response.frequency);
                        $("#nbcores_modif").val(response.nbcores);
                        $("#manufacturer_modif").val(response.manufacturer);
                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });

                $("#FrmCpuModify").off('submit').on('submit', function(e)
                {
                    e.preventDefault();

                    var formData = $(this).serializeArray(); // Get form data as an array
                    //console.log(formData);

                    $.ajax({
                        url: '/UpdateStoreProcessors',
                        type: 'POST',
                        data: formData,
                        success: function(response) {

                            const ProcessorsData = [
                                response.id,
                                response.name,
                                response.frequency,
                                response.nbcores,
                                response.manufacturer
                            ];

                            CpuTable.row(row).data(ProcessorsData).draw(false);

                            $('#modal-ModifyProcessors').modal('hide');

                            Toast.fire({
                                icon: 'success',
                                title: "Processeur modifié avec succès" // Success message in French
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
                                $('#modal-ModifyProcessors').modal('hide');
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
            $(document).on('click', '#deleteProcessors', function() {
                const row = $(this).closest('tr');
                const rowData = CpuTable.row(row).data();
                //   console.log(rowData); //id
                var datta = rowData[0];

                $('#confirmSupModel').one('click', function() {

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: '/DeleteProcessors',
                        type: 'POST',
                        data: {
                            id: datta
                        },
                        success: function(response) {
                            if (response.code === "200") {

                                CpuTable.row(row).remove().draw(false);
                                $('#modal-DeleteProcessors').modal('hide');
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
                                $('#modal-DeleteProcessors').modal('hide');
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
                                $('#modal-DeleteProcessors').modal('hide');

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
