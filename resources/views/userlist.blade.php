@extends('layouts.application')
@section("breadcrumb")
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Utilisateurs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ route('utilisateur') }}">Gestion</a></li>
                <li class="breadcrumb-item active">Liste utilisateurs</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
@endsection
@section('main-content')
<div class="modal fade" id="modal-DeleteComputer">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Supprimer utilisateur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Voulez-vous vraiment supprimer cet utilisateur ?</p>

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
    <!-- Main content -->
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">utilisateurs</h3>

            </div>
            <div class="card-body">

                <a href="{{ route('register') }}" type="button" class="btn btn-success mb-3">
                    <i class="fas fa-plus"></i>Ajouter un nouvel utilisateur
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="table1">
                        <thead>
                            <tr>

                                <th>Nom </th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Users as $user)
                                <tr>
                                    <td>{{ $user->First_name." ".$user->Last_name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        @if ($user->Role == "ADMIN")
                                        <span class="badge badge-danger">Administrateur</span>
                                        @elseif ($user->Role == "TECH")
                                            <span class="badge badge-success">Technicien</span>
                                        @elseif ($user->Role == "USER")
                                            <span class="badge badge-primary">Utilisateur</span>
                                        @endif
                                    </td>
                                    <td>
                            
                                        <button type="button" data-uid="{{ $user->id }}" class="btn btn-danger btn-sm deleteBtn"data-toggle="modal" data-target="#modal-DeleteComputer">supprimer compte</button>
                                        <button type="button" data-uid="{{ $user->id }}" class="btn btn-warning btn-sm resetBtn">Réinitialiser le mot de passe</button>

                                    
                                    </td>



                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('utilisateur_script')
<!-- Add this inside the <script> tag in your Blade file -->
    <script>
        $(document).ready(function () {
            $(".deleteBtn").on("click", function () {

var userId = $(this).data("uid");
                $('#btncnfdeleteuc').click(function() {

                    $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/delete-user/' + userId,
                    type: 'DELETE',
                    success: function (data) {
                        location.reload();
                        
                        if (data.success) {
                            var Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                            Toast.fire({
                                icon: 'success',
                                title: "User with ID " + userId + " deleted successfully."
                            })

                        }
                        // You can update the UI or take other actions as needed
                        	
                       
                    },
                    error: function (xhr, status, error) {
                        console.error("Error deleting user with ID " + userId + ": " + error);
                    }
                });
                })

            });
            
         
            // Add other scripts if needed
        });
    </script>
    <!-- Add this inside the <script> tag in your Blade file -->
<script>
    $(document).ready(function () {
        // Your existing code...

        $(".resetBtn").on("click", function () {
            var userId = $(this).data("uid");

            // Make an AJAX request to reset the password
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: '/reset-password/' + userId,
                type: 'POST',
                success: function (data) {
               
                    if (data.success) {
    
                        $(document).Toasts('create', {
                            body: "Le mot de passe réinitialisé avec succès <br>Nouveau mot de passe:  " + "<strong>" +  data.newPassword + "</strong>",
                            title: 'Mot de passe réinitialisé',
                            class: 'bg-info',
                            subtitle: 'ID'+ userId ,
                            icon: 'fas fa-user-lock fa-md',
                        })

                    } else {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });

                        Toast.fire({
                            icon: 'error',
                            title: "Failed to reset password for user with ID " + userId + ". " + data.message
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error resetting password for user with ID " + userId + ": " + error);
                }
            });
        });
    });
</script>


@endsection

