@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ticket
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="#">Assistances</a></li>
                        <li class="breadcrumb-item active">Ticket
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            {{-- accepter ticket  en attent --}}
            <div class="modal fade" id="modal-AccepterTicket">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Accepter Ticket</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <p>Voulez vous vraiment Accepter cet Ticket ?</p>
                            <form action="" method="post" id="Acceptform">
                                @csrf

                                <div class="form-group">

                                    <input type="text" class="form-control" id="id_ticketA" name="id_ticketA" hidden />
                                </div>
                                <div class="form-group">
                                    <label for="Nom">Nom</label>
                                    <input type="text" class="form-control" id="Nom" placeholder="Enter nom" name="nom">
                                </div>
                                <div class="form-group">
                                    <label for="Prenom">Prenom</label>
                                    <input type="text" class="form-control" id="Prenom" placeholder="Enter prenom" name="prenom">
                                </div>


                       

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-success" id="btnaccepter">Accepter </button>
                        </div>
                    </div>
                        </form>

                    </div>


                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        

        {{-- modal refuser ticket en attent  --}}
        <div class="modal fade" id="modal-RefusTicket">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pourquoi ?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="refusform">
                            @csrf
                            <div class="form-group">
                                    <label for="Nom">Nom</label>
                                    <input type="text" class="form-control" id="Nom" placeholder="Enter nom" name="nom">
                                </div>
                                <div class="form-group">
                                    <label for="Prenom">Prenom</label>
                                    <input type="text" class="form-control" id="Prenom" placeholder="Enter prenom" name="prenom">
                                </div>

                            <div class="form-group">

                                <input type="text" class="form-control" id="id_ticket" name="id_ticket" hidden />
                            </div>
                            <div class="form-group">
                                <label for="Descriptionrefus">Description Refus </label>
                                <textarea name="Description_refus" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Confirmer le refus</button>
                        </div>
                    </div>
                    </form>





                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        {{-- Details ticket en attent --}}
        <div class="modal fade" id="modal-attentTicket">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">Ticket Detail</h5>
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
                                                        <td><strong>Id Ticket</strong></td>
                                                        <td id="Ticket-id-details-attent" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Ticket</strong></td>
                                                        <td id="Type-Ticket-details-attent" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Urgence</strong></td>
                                                        <td id="urgence-details-attent" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Demandeur</strong></td>
                                                        <td id="Demandeur-details-attent" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Etablissement</strong></td>
                                                        <td id="Etablissement-details-attent" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Salle</strong></td>
                                                        <td id="Salle-details-attent" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Machine</strong></td>
                                                        <td id="Type-Device-details-attent" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Machine</strong></td>
                                                        <td id="Device-details-attent" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Desctiption Ticket</strong></td>
                                                        <td id="Desctiption-Ticket-details-attent" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Ticket</strong></td>
                                                        <td id="Date-Ticket-details-attent" class="bg-light"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Etat</strong></td>
                                                        <td id="Etat-details-attent" class="bg-light"></td>
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

        {{-- Details ticket Refus --}}
        <div class="modal fade" id="modal-refuséTicket">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">Ticket Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-outline card-light">

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
                                                        <td><strong>Id Ticket</strong></td>
                                                        <td id="Ticket-id-details-refus" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Ticket</strong></td>
                                                        <td id="Type-Ticket-details-refus" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Urgence</strong></td>
                                                        <td id="urgence-details-refus" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Demandeur</strong></td>
                                                        <td id="Demandeur-details-refus" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Etablissement</strong></td>
                                                        <td id="Etablissement-details-refus" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Salle</strong></td>
                                                        <td id="Salle-details-refus" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Machine</strong></td>
                                                        <td id="Type-Device-details-refus" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Machine</strong></td>
                                                        <td id="Device-details-refus" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Desctiption Ticket</strong></td>
                                                        <td id="Desctiption-Ticket-details-refus" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Ticket</strong></td>
                                                        <td id="Date-Ticket-details-refus" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Technicien</strong></td>
                                                        <td id="Technicien-Ticket-details-refus" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Description Refus</strong></td>
                                                        <td id="description-Tech-details-refus" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Refus</strong></td>
                                                        <td id="refus-Ticket-details-refus" class="bg-light"></td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Etat</strong></td>
                                                        <td id="Etat-details-refus" class="bg-light"></td>
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

        {{-- details ticket accpeted --}}
        <div class="modal fade" id="modal-acceptedTicket">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">Ticket Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-outline card-light">

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
                                                        <td><strong>Id Ticket</strong></td>
                                                        <td id="Ticket-id-details-accepted" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Ticket</strong></td>
                                                        <td id="Type-Ticket-details-accepted" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Urgence</strong></td>
                                                        <td id="urgence-details-accepted" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Demandeur</strong></td>
                                                        <td id="Demandeur-details-accepted" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Etablissement</strong></td>
                                                        <td id="Etablissement-details-accepted" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Salle</strong></td>
                                                        <td id="Salle-details-accepted" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Machine</strong></td>
                                                        <td id="Type-Device-details-accepted" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Machine</strong></td>
                                                        <td id="Device-details-accepted" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Desctiption Ticket</strong></td>
                                                        <td id="Desctiption-Ticket-details-accepted" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Ticket</strong></td>
                                                        <td id="Date-Ticket-details-accepted" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Technicien</strong></td>
                                                        <td id="Technicien-Ticket-details-accepted" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Acceptation</strong></td>
                                                        <td id="DateAcceptation-Ticket-details-accepted" class="bg-light">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Etat</strong></td>
                                                        <td id="Etat-details-accepted" class="bg-light"></td>
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

        {{-- Details ticket confirmer --}}
        <div class="modal fade" id="modal-confirmedTicket">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">Ticket Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-outline card-light">

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
                                                        <td><strong>Id Ticket</strong></td>
                                                        <td id="Ticket-id-details-confirmer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Ticket</strong></td>
                                                        <td id="Type-Ticket-details-confirmer" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Urgence</strong></td>
                                                        <td id="urgence-details-confirmer" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Demandeur</strong></td>
                                                        <td id="Demandeur-details-confirmer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Etablissement</strong></td>
                                                        <td id="Etablissement-details-confirmer" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Salle</strong></td>
                                                        <td id="Salle-details-confirmer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Machine</strong></td>
                                                        <td id="Type-Device-details-confirmer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Machine</strong></td>
                                                        <td id="Device-details-confirmer" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Desctiption Ticket</strong></td>
                                                        <td id="Desctiption-Ticket-details-confirmer" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Ticket</strong></td>
                                                        <td id="Date-Ticket-details-confirmer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Technicien</strong></td>
                                                        <td id="Technicien-Ticket-details-confirmer" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Acceptation</strong></td>
                                                        <td id="DateAcceptation-Ticket-details-confirmer"
                                                            class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Confirmation</strong></td>
                                                        <td id="Dateconfi-Ticket-details-confirmer" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Etat</strong></td>
                                                        <td id="Etat-details-confirmer" class="bg-light"></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        {{-- <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-primary" id="btnterminer">Terminer
                                                </button>
                                            </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal terminer ticket confirmed  --}}
        <div class="modal fade" id="modal-cnf-ter">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pourquoi ?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="terminerform">
                            @csrf
                        

                            <div class="form-group">

                                <input type="text" class="form-control" id="id_ticket1" name="id_ticket1" hidden />
                            </div>
                            <div class="form-group">
                                <label for="Descriptionaccept">Description Solution </label>
                                <textarea name="Description_ACCEPT" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-danger">Terminer</button>
                        </div>
                    </div>
                    </form>





                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- Details ticket Terminer --}}
        <div class="modal fade" id="modal-terminerTicketdetails">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h5 class="modal-title">Ticket Detail</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-outline card-light">

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
                                                        <td><strong>Id Ticket</strong></td>
                                                        <td id="Ticket-id-details-terminer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Ticket</strong></td>
                                                        <td id="Type-Ticket-details-terminer" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Urgence</strong></td>
                                                        <td id="urgence-details-terminer" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Demandeur</strong></td>
                                                        <td id="Demandeur-details-terminer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Etablissement</strong></td>
                                                        <td id="Etablissement-details-terminer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Salle</strong></td>
                                                        <td id="Salle-details-terminer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Type Machine</strong></td>
                                                        <td id="Type-Device-details-terminer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Machine</strong></td>
                                                        <td id="Device-details-terminer" class="bg-light">

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Desctiption Ticket</strong></td>
                                                        <td id="Desctiption-Ticket-details-terminer" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Ticket</strong></td>
                                                        <td id="Date-Ticket-details-terminer" class="bg-light"></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Technicien</strong></td>
                                                        <td id="Technicien-Ticket-details-terminer" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Description Solution</strong></td>
                                                        <td id="description-Tech-details-terminer" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Acceptation</strong></td>
                                                        <td id="DateAccepter-Ticket-details-terminer" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date Confirmation</strong></td>
                                                        <td id="DateConfirmer-Ticket-details-terminer" class="bg-light">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong>Date terminer</strong></td>
                                                        <td id="terminer-Ticket-details-terminer" class="bg-light">
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td><strong>Etat</strong></td>
                                                        <td id="Etat-details-terminer" class="bg-light"></td>
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
        <div class="col-md-3">

            <!-- /.card -->
            <div class="card">
                <div class="card-header card-primary card-outline">
                    <h3 class="card-title">Filtre Tickets</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="nav custom-nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link " id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home"
                                role="tab" aria-controls="vert-tabs-home" aria-selected="true"><i
                                    class="fas fa-clock text-warning"></i> En attente <span
                                    class="badge bg-warning float-right"
                                    id="EnattentSpan">{{ $nbrticketstatus0 }}</span></a>

                            {{-- <a href="#" class="nav-link">
                                    <i class="fas fa-clock text-primary"></i>
                                    En attente
                                    <span class="badge bg-primary float-right">65</span>
                                </a> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="vert-tabs-conf-tab" data-toggle="pill" href="#vert-tabs-conf"
                                role="tab" aria-controls="vert-tabs-conf" aria-selected="true"><i
                                    class="fas fa-clock text-info"></i> Confirmé <span class="badge bg-info float-right"
                                    id="spanConfirmed">{{ $nbrticketstatus3 }}</span></a>

                        </li>
                        <li class="nav-item">

                            <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile"
                                role="tab" aria-controls="vert-tabs-profile" aria-selected="false"><i
                                    class="fas fa-check-circle  text-success"></i> Acceptée <span
                                    class="badge bg-success float-right"
                                    id="AcceptedSpan">{{ $nbrticketstatus1 }}</span></a>

                            {{-- <a href="#" class="nav-link">
                                    <i class="fas fa-ban text-danger"></i>
                                    Réfusé
                                    
                                </a> --}}
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                aria-selected="false"><i class="fas fa-times-circle text-danger"></i> Refusée <span
                                    class="badge bg-danger float-right" id="RefuséSpan">{{ $nbrticketstatus2 }}</span></a>

                            {{-- <a href="#" class="nav-link">
                                    <i class="fas fa-history text-warning"></i> Encours
                                    <span class="badge bg-warning float-right">5</span>
                                </a> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
                                href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                aria-selected="false"><i class="fas fa-check-circle text-primary"></i> Terminé <span
                                    class="badge bg-primary float-right"
                                    id="spanTermine">{{ $nbrticketstatus4 }}</span></a>
                            {{-- <a href="#" class="nav-link">
                                    <i class="far fa-check-circle text-success"></i>
                                    Terminé
                                    <span class="badge bg-success float-right">7</span>
                                </a> --}}
                        </li>
                    </ul>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Tickets</h3>
                </div>
                <div class="card-body ">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        {{-- En attent --}}
                        <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel"
                            aria-labelledby="vert-tabs-home-tab">
                            <table class="table table-bordered table-hover" id="En_attent_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Type Declaration </th>
                                        <th>Etablissement</th>
                                        <th>Salle</th>
                                        <th>Demandeur</th>
                                        <th>Type Machine</th>
                                        {{-- <th>Machine</th> --}}
                                        {{-- <th>Description Ticket</th> --}}
                                        <th>Date Ticket</th>

                                        <th>Etat</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody class="text-center py-0 align-middle">
                                    @foreach ($ticketsstatus0 as $ticketsstatus)
                                        <tr>
                                            <td>{{ $ticketsstatus->id }}</td>
                                            <td>
                                                @if ($ticketsstatus->type_Anci_Dmd === 0)
                                                    <span class="badge bg-info">Demande</span>
                                                @else
                                                    <span class="badge bg-info">Ancident</span>
                                                @endif
                                            </td>
                                            <td>{{ $ticketsstatus->classe->establishement->name }}</td>
                                            <td>{{ $ticketsstatus->classe->name }}</td>

                                            <td>{{ $ticketsstatus->user->First_name . ' ' . $ticketsstatus->user->Last_name }}
                                            </td>
                                            <td>
                                                @if ($ticketsstatus->device !== null)
                                                    {{ $ticketsstatus->device->type->name }}
                                                @else
                                                    {{ $ticketsstatus->accessoire->type->name }}
                                                @endif
                                                {{-- <td>
                                                 @if ($ticketsstatus->device !== null)
                                                        {{$ticketsstatus->device->label}}                                                    
                                                @else
                                                {{$ticketsstatus->accessoires->label}}                                                    
                                                    
                                                @endif </td> --}}

                                                {{-- <td>{{ $ticketsstatus->description_issue }}</td> --}}
                                            <td>{{ $ticketsstatus->created_at->format('Y-m-d') }}</td>
                                            <td> <span class="badge badge-warning">En attente</span></td>

                                            <td class="text-center py-0 align-middle">
                                                <!-- Actions go here -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Confirmer --}}
                        <div class="tab-pane fade " id="vert-tabs-conf" role="tabpanel"
                            aria-labelledby="vert-tabs-home-conf">
                            <table class="table table-bordered table-hover" id="confirmertable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Type Declaration </th>
                                        <th>Etablissement</th>
                                        <th>Salle</th>
                                        <th>Demandeur</th>
                                        <th>Type Machine</th>
                                        {{-- <th>Machine</th> --}}
                                        {{-- <th>Description Ticket</th> --}}
                                        <th>Date Ticket</th>

                                        <th>Etat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center py-0 align-middle">
                                    @foreach ($ticketsstatus3 as $ticketsstatus)
                                        <tr>
                                            <td>{{ $ticketsstatus->id }}</td>
                                            <td>
                                                @if ($ticketsstatus->type_Anci_Dmd === 0)
                                                    <span class="badge bg-info">Demande</span>
                                                @else
                                                    <span class="badge bg-info">Ancident</span>
                                                @endif
                                            </td>
                                            <td>{{ $ticketsstatus->classe->establishement->name }}</td>
                                            <td>{{ $ticketsstatus->classe->name }}</td>

                                            <td>{{ $ticketsstatus->user->First_name . ' ' . $ticketsstatus->user->Last_name }}
                                            </td>
                                            <td>
                                                @if ($ticketsstatus->device !== null)
                                                    {{ $ticketsstatus->device->type->name }}
                                                @else
                                                    {{ $ticketsstatus->accessoire->type->name }}
                                                @endif
                                                {{-- <td>
                                             @if ($ticketsstatus->device !== null)
                                                    {{$ticketsstatus->device->label}}                                                    
                                            @else
                                            {{$ticketsstatus->accessoires->label}}                                                    
                                                
                                            @endif </td> --}}

                                                {{-- <td>{{ $ticketsstatus->description_issue }}</td> --}}
                                            <td>{{ $ticketsstatus->created_at->format('Y-m-d') }}</td>
                                            <td> <span class="badge badge-info">Confirmée</span></td>

                                            <td class="text-center py-0 align-middle">
                                                <!-- Actions go here -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Accepter --}}
                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                            aria-labelledby="vert-tabs-profile-tab">
                            <table class="table table-bordered table-hover" id="Accepted_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Type Declaration </th>
                                        <th>Etablissement</th>
                                        <th>Salle</th>
                                        <th>Demandeur</th>
                                        <th>Type Machine</th>
                                        {{-- <th>Machine</th> --}}
                                        {{-- <th>Description Ticket</th> --}}
                                        <th>Date Ticket</th>

                                        <th>Etat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center py-0 align-middle">
                                    @foreach ($ticketsstatus1 as $ticketsstatus)
                                        <tr>
                                            <td>{{ $ticketsstatus->id }}</td>
                                            <td>
                                                @if ($ticketsstatus->type_Anci_Dmd === 0)
                                                    <span class="badge bg-info">Demande</span>
                                                @else
                                                    <span class="badge bg-info">Ancident</span>
                                                @endif
                                            </td>
                                            <td>{{ $ticketsstatus->classe->establishement->name }}</td>
                                            <td>{{ $ticketsstatus->classe->name }}</td>

                                            <td>{{ $ticketsstatus->user->First_name . ' ' . $ticketsstatus->user->Last_name }}
                                            </td>
                                            <td>
                                                @if ($ticketsstatus->device !== null)
                                                    {{ $ticketsstatus->device->type->name }}
                                                @else
                                                    {{ $ticketsstatus->accessoire->type->name }}
                                                @endif
                                                {{-- <td>
                                                 @if ($ticketsstatus->device !== null)
                                                        {{$ticketsstatus->device->label}}                                                    
                                                @else
                                                {{$ticketsstatus->accessoires->label}}                                                    
                                                    
                                                @endif </td> --}}

                                                {{-- <td>{{ $ticketsstatus->description_issue }}</td> --}}
                                            <td>{{ $ticketsstatus->created_at->format('Y-m-d') }}</td>
                                            <td> <span class="badge badge-success">Acceptée</span></td>

                                            <td class="text-center py-0 align-middle">
                                                <!-- Actions go here -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Refuser --}}
                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                            aria-labelledby="vert-tabs-messages-tab">
                            <table class="table table-bordered table-hover" id="refus_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Type Declaration </th>
                                        <th>Etablissement</th>
                                        <th>Salle</th>
                                        <th>Demandeur</th>
                                        <th>Type Machine</th>
                                        {{-- <th>Machine</th> --}}
                                        {{-- <th>Description Ticket</th> --}}
                                        <th>Date Ticket</th>

                                        <th>Etat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center py-0 align-middle">
                                    @foreach ($ticketsstatus2 as $ticketsstatus)
                                        <tr>
                                            <td>{{ $ticketsstatus->id }}</td>
                                            <td>
                                                @if ($ticketsstatus->type_Anci_Dmd === 0)
                                                    <span class="badge bg-info">Demande</span>
                                                @else
                                                    <span class="badge bg-info">Ancident</span>
                                                @endif
                                            </td>
                                            <td>{{ $ticketsstatus->classe->establishement->name }}</td>
                                            <td>{{ $ticketsstatus->classe->name }}</td>

                                            <td>{{ $ticketsstatus->user->First_name . ' ' . $ticketsstatus->user->Last_name }}
                                            </td>
                                            <td>
                                                @if ($ticketsstatus->device !== null)
                                                    {{ $ticketsstatus->device->type->name }}
                                                @else
                                                    {{ $ticketsstatus->accessoire->type->name }}
                                                @endif
                                                {{-- <td>
                                                 @if ($ticketsstatus->device !== null)
                                                        {{$ticketsstatus->device->label}}                                                    
                                                @else
                                                {{$ticketsstatus->accessoires->label}}                                                    
                                                    
                                                @endif </td> --}}

                                                {{-- <td>{{ $ticketsstatus->description_issue }}</td> --}}
                                            <td>{{ $ticketsstatus->created_at->format('Y-m-d') }}</td>
                                            <td> <span class="badge badge-danger">Refusée</span></td>

                                            <td class="text-center py-0 align-middle">
                                                <!-- Actions go here -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Terminer --}}
                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                            aria-labelledby="vert-tabs-settings-tab">
                            <table class="table table-bordered table-hover" id="Terminer_table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Type Declaration </th>
                                        <th>Etablissement</th>
                                        <th>Salle</th>
                                        <th>Demandeur</th>
                                        <th>Type Machine</th>
                                        {{-- <th>Machine</th> --}}
                                        {{-- <th>Description Ticket</th> --}}
                                        <th>Date Ticket</th>

                                        <th>Etat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center py-0 align-middle">
                                    @foreach ($ticketsstatus4 as $ticketsstatus)
                                        <tr>
                                            <td>{{ $ticketsstatus->id }}</td>
                                            <td>
                                                @if ($ticketsstatus->type_Anci_Dmd === 0)
                                                    <span class="badge bg-info">Demande</span>
                                                @else
                                                    <span class="badge bg-info">Ancident</span>
                                                @endif
                                            </td>
                                            <td>{{ $ticketsstatus->classe->establishement->name }}</td>
                                            <td>{{ $ticketsstatus->classe->name }}</td>

                                            <td>{{ $ticketsstatus->user->First_name . ' ' . $ticketsstatus->user->Last_name }}
                                            </td>
                                            <td>
                                                @if ($ticketsstatus->device !== null)
                                                    {{ $ticketsstatus->device->type->name }}
                                                @else
                                                    {{ $ticketsstatus->accessoire->type->name }}
                                                @endif
                                                {{-- <td>
                                              @if ($ticketsstatus->device !== null)
                                                     {{$ticketsstatus->device->label}}                                                    
                                             @else
                                             {{$ticketsstatus->accessoires->label}}                                                    
                                                 
                                             @endif </td> --}}

                                                {{-- <td>{{ $ticketsstatus->description_issue }}</td> --}}
                                            <td>{{ $ticketsstatus->created_at->format('Y-m-d') }}</td>
                                            <td> <span class="badge badge-primary">Terminer</span></td>

                                            <td class="text-center py-0 align-middle">
                                                <!-- Actions go here -->
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.col -->
        </div>
        </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
@section('techticket_script')
    <script>
        window.onload = function() {
            // Get the input field
            var input = document.getElementById("Date-Refus");

            // Get the current date and time
            var now = new Date();
            var year = now.getFullYear();
            var month = now.getMonth() + 1;
            var day = now.getDate();
            var hour = now.getHours();
            var minute = now.getMinutes();
            var second = now.getSeconds();

            // Format the date and time as "YYYY-MM-DD HH:MM:SS"
            var dateTimeString = year + "-" +
                (month < 10 ? "0" + month : month) + "-" +
                (day < 10 ? "0" + day : day) + " " +
                (hour < 10 ? "0" + hour : hour) + ":" +
                (minute < 10 ? "0" + minute : minute) + ":" +
                (second < 10 ? "0" + second : second);

            // Set the current date and time as the default value
            input.value = dateTimeString;

            // Make the input read-only
            input.readOnly = true;
        }
        $(document).ready(function() {
            // Get the input field
            // Get the input field


            // Make the input read-only
            // En attent __ delete action 
            var attentTable = $('#En_attent_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "pagingType": 'simple',
                "columnDefs": [ //{
                    //         "targets": [0],
                    //         "visible": false
                    //     },
                    {
                        "targets": -1,
                        "data": null,
                        "defaultContent": '<div class="btn-group btn-group-sm "><button data-toggle="modal" data-target="#modal-AccepterTicket" id="accepterbtn"><span class="badge badge-success mr-1">Accepter</span></button><button data-toggle="modal" data-target="#modal-RefusTicket" id="refusticketbtn"><span class="badge badge-danger  ml-1">Refuser</span></button><button data-toggle="modal" data-target="#modal-attentTicket" id="attentTicket"><span class="badge badge-secondary  ml-1">Détails</span></button></div>'
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
            var confirmerTable = $('#confirmertable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "pagingType": 'simple',
                "columnDefs": [ //{
                    //         "targets": [0],
                    //         "visible": false
                    //     },
                    {
                        "targets": -1,
                        "data": null,
                        "defaultContent": '<div class="btn-group btn-group-sm "><button data-toggle="modal" data-target="#modal-cnf-ter" id="cnf-ter"><span class="badge badge-primary mr-1">Terminer</span></button><button data-toggle="modal" data-target="#modal-confirmedTicket" id="confirmedTicket"><span class="badge badge-secondary  ml-1">Détails</span></button></div>'
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

            // En attent __ confirmation action 
            var AcceptedTable = $('#Accepted_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "pagingType": 'simple',
                "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-acceptedTicket" id="acceptedTicket"><i class="fas fa-eye" title="Details" aria-label="Details"></i></div>'
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


            // En attent __ confirmation action 
            var refusTable = $('#refus_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "pagingType": 'simple',
                "columnDefs": [{
                        "targets": [5],
                        "visible": false
                    },
                    {
                        "targets": [3],
                        "visible": false
                    },
                    {
                        "targets": -1, // Actions
                        "data": null,
                        "defaultContent": '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-refuséTicket" id="refusTicket"><i class="fas fa-eye" title="Details" aria-label="Details"></i></a></div>'
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

            // En attent __ confirmation action 
            var TerminerTable = $('#Terminer_table').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "pagingType": 'simple',
                "columnDefs": [{
                    "targets": -1, // Actions
                    "data": null,
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-terminerTicketdetails" id="terminerTicket"><i class="fas fa-eye" title="Details" aria-label="Details"></i></a></div>'
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
                timer: 2000,
                timerProgressBar: true,
            });
            // details En attent 

            $(document).on('click', '#attentTicket', function() {
                const row = $(this).closest('tr');
                const rowData = attentTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/GetTechTicket',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        // Assuming the response object is stored in a variable called `response`

                        // Set the value of the "Id" cell
                        document.getElementById("Ticket-id-details-attent").textContent =
                            response.id;

                        //     // Set the value of the "Establishment" cell
                        document.getElementById("Type-Ticket-details-attent").textContent =
                            response.type_Anci_Dmd == 0 ? 'Demande' : 'Ancident';

                        //     // Set the value of the "Class" cell
                        var urgc = document.getElementById("urgence-details-attent");
                        switch (response.urgence) {
                            case 5:
                                urgc.textContent = "Trés Haute";
                                break;
                            case 4:
                                urgc.textContent = "Haute";
                                break;
                            case 3:
                                urgc.textContent = "Moyenne";
                                break;
                            case 2:
                                urgc.textContent = "Base";
                                break;
                            case 1:
                                urgc.textContent = "Trés Base";
                                break;
                            default:
                                urgc.textContent =
                                    'null'; // Set the value to an empty string if response.urgence is not between 1 and 5
                        };

                        //     // Set the value of the "Label" cell
                        document.getElementById("Demandeur-details-attent").textContent =
                            response.user.First_name + " " + response.user.Last_name;

                        //     // Set the value of the "Serial Number" cell
                        document.getElementById("Etablissement-details-attent").textContent =
                            response.classe.establishement.name;

                        //     // Set the value of the "Status" cell
                        document.getElementById("Salle-details-attent").textContent = response
                            .classe.name;

                        //     // Set the value of the "Processor" cell
                        document.getElementById("Type-Device-details-attent").textContent =
                            response.device !==
                            null ? response.device.type.name : response.accessoire.type.name;

                        //     // Set the value of the "Inventory Number" cell
                        document.getElementById("Device-details-attent").textContent = response
                            .device !== null ? response.device.label : response.accessoire
                            .label;

                        //     // Set the value of the "Marque" cell
                        document.getElementById("Desctiption-Ticket-details-attent")
                            .textContent = response.description_issue;

                        //     // Set the value of the "Model" cell
                        // document.getElementById("Date-Ticket-details-attent").textContent = response.created_at;
                        // const dateObj = new Date(response.created_at);

                        const dateObj = new Date(response.created_at);
                        const year = dateObj.getFullYear();
                        const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        const day = String(dateObj.getDate()).padStart(2, '0');

                        document.getElementById("Date-Ticket-details-attent").textContent =
                            `${year}-${month}-${day}`;

                        // document.getElementById("Date-Ticket-details-attent").textContent =response
                        // .created_at;
                        //     // Set the value of the "RAM" cell
                        document.getElementById("Etat-details-attent").textContent = response
                            .status == 0 ? "En attente " : "";

                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });
            });
            // accepter ticket  
            $(document).on('click', '#accepterbtn', function() {
                const row = $(this).closest('tr');
                const rowData = attentTable.row(row).data();
                $("#id_ticketA").val(rowData[0]);
                 
                   
                    $('#Acceptform').one("submit", function(e){
                        e.preventDefault();
                    var formData = $(this).serializeArray();
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        url: '/AccepterTicket',
                        type: 'POST',
                        data: formData,

                        success: function(response) {
                            document.getElementById("EnattentSpan").textContent =
                                parseInt(document.getElementById("EnattentSpan")
                                    .textContent) - 1;
                            document.getElementById("AcceptedSpan").textContent =
                                parseInt(document.getElementById("AcceptedSpan")
                                    .textContent) + 1;
                            attentTable.row(row).remove().draw(false);

                            // Define etatColor and etat variables
                            const etatColor = 'success';
                            const etat = 'Acceptée';



                            // Add new row to confirmedTable
                            AcceptedTable.row.add([
                                rowData[0],
                                rowData[1],
                                rowData[2],
                                rowData[3],
                                rowData[4],
                                rowData[5],
                                rowData[6],
                                `<span class="badge  badge-${etatColor}">${etat}</span>`
                            ]).draw(false);

                            $('#modal-AccepterTicket').modal('hide');

                            Toast.fire({
                                icon: 'success',
                                title: "Ticket Accepter avec success"
                            });
                            $("#Acceptform")[0].reset();


                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                            $("#Acceptform")[0].reset();

                        }

                    });
                })
            });
            // refuser ticket
            $(document).on('click', '#refusticketbtn', function() {
                const row = $(this).closest('tr');
                const rowData = attentTable.row(row).data();
                $("#id_ticket").val(rowData[0]);

                $('#refusform').one("submit", function(e) {
                    e.preventDefault();
                    var formData = $(this).serializeArray();
                    console.log(formData);
                    $.ajax({
                        url: '/RefuserTicket',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            document.getElementById("EnattentSpan").textContent =
                                parseInt(document.getElementById("EnattentSpan")
                                    .textContent) - 1;
                            document.getElementById("RefuséSpan").textContent =
                                parseInt(document.getElementById("RefuséSpan")
                                    .textContent) + 1;
                            attentTable.row(row).remove().draw(false);

                            // Define etatColor and etat variables
                            const etatColor = 'danger';
                            const etat = 'Refusée';



                            // Add new row to confirmedTable
                            refusTable.row.add([
                                rowData[0],
                                rowData[1],
                                rowData[2],
                                rowData[3],
                                rowData[4],
                                rowData[5],
                                rowData[6],
                                `<span class="badge  badge-${etatColor}">${etat}</span>`
                            ]).draw(false);

                            $('#modal-RefusTicket').modal('hide');

                            Toast.fire({
                                icon: 'success',
                                title: "Ticket Accepter avec success"
                            });
                            $("#refusform")[0].reset();

                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                            $("#refusform")[0].reset()                        }

                    });
                })
            });

            // details refus
            $(document).on('click', '#refusTicket', function() {
                const row = $(this).closest('tr');
                const rowData = refusTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/GetTechTicket',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        // Assuming the response object is stored in a variable called `response`

                        // Set the value of the "Id" cell
                        document.getElementById("Ticket-id-details-refus").textContent =
                            response.id;

                        //     // Set the value of the "Establishment" cell
                        document.getElementById("Type-Ticket-details-refus").textContent =
                            response.type_Anci_Dmd == 0 ? 'Demande' : 'Ancident';

                        //     // Set the value of the "Class" cell
                        var urgc = document.getElementById("urgence-details-refus");
                        switch (response.urgence) {
                            case 5:
                                urgc.textContent = "Trés Haute";
                                break;
                            case 4:
                                urgc.textContent = "Haute";
                                break;
                            case 3:
                                urgc.textContent = "Moyenne";
                                break;
                            case 2:
                                urgc.textContent = "Base";
                                break;
                            case 1:
                                urgc.textContent = "Trés Base";
                                break;
                            default:
                                urgc.textContent =
                                    'null'; // Set the value to an empty string if response.urgence is not between 1 and 5
                        };

                        //     // Set the value of the "Label" cell
                        document.getElementById("Demandeur-details-refus").textContent =
                            response.user.Last_name + " " + response.user.First_name;

                        //     // Set the value of the "Serial Number" cell
                        document.getElementById("Etablissement-details-refus").textContent =
                            response.classe.establishement.name;

                        //     // Set the value of the "Status" cell
                        document.getElementById("Salle-details-refus").textContent = response
                            .classe.name;

                        //     // Set the value of the "Processor" cell
                        document.getElementById("Type-Device-details-refus").textContent =
                            response.device !== null ? response.device.type.name : response
                            .accessoire.type.name;

                        //     // Set the value of the "Inventory Number" cell
                        document.getElementById("Device-details-refus").textContent =
                            response.device !== null ? response.device.label : response
                            .accessoire.label;

                        //     // Set the value of the "Marque" cell
                        document.getElementById("Desctiption-Ticket-details-refus")
                            .textContent = response
                            .description_issue;

                        //     // Set the value of the "Model" cell
                        const dateObj = new Date(response.created_at);
                        const year = dateObj.getFullYear();
                        const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        const day = String(dateObj.getDate()).padStart(2, '0');

                        document.getElementById("Date-Ticket-details-refus").textContent =
                            `${year}-${month}-${day}`;

                        // document.getElementById("Date-Ticket-details-refus").textContent = response.created_at;
                        document.getElementById("Technicien-Ticket-details-refus")
                            .textContent = response.Technom + " " + response.Techprenom;
                        document.getElementById("refus-Ticket-details-refus")
                            .textContent = response
                            .date_accept_or_refus;

                        // const dateObj = new Date(response.date_accept_or_refus);
                        // const year = dateObj.getFullYear();
                        // const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        // const day = String(dateObj.getDate()).padStart(2, '0');

                        // document.getElementById("DateAcceptation-Ticket-details-refus").textContent =
                        //     `${year}-${month}-${day}`;

                        document.getElementById("description-Tech-details-refus")
                            .textContent = response
                            .description_solution;
                        //     // Set the value of the "RAM" cell
                        document.getElementById("Etat-details-refus").textContent = response
                            .status == 2 ? "Refusée par le technicien" : "";

                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });
            });


            // details Accepted
            $(document).on('click', '#acceptedTicket', function() {
                const row = $(this).closest('tr');
                const rowData = AcceptedTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/GetTechTicket',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        // Assuming the response object is stored in a variable called `response`

                        // Set the value of the "Id" cell
                        document.getElementById("Ticket-id-details-accepted").textContent =
                            response.id;

                        //     // Set the value of the "Establishment" cell
                        document.getElementById("Type-Ticket-details-accepted").textContent =
                            response.type_Anci_Dmd == 0 ? 'Demande' : 'Ancident';

                        //     // Set the value of the "Class" cell
                        var urgc = document.getElementById("urgence-details-accepted");
                        switch (response.urgence) {
                            case 5:
                                urgc.textContent = "Trés Haute";
                                break;
                            case 4:
                                urgc.textContent = "Haute";
                                break;
                            case 3:
                                urgc.textContent = "Moyenne";
                                break;
                            case 2:
                                urgc.textContent = "Base";
                                break;
                            case 1:
                                urgc.textContent = "Trés Base";
                                break;
                            default:
                                urgc.textContent =
                                    'null'; // Set the value to an empty string if response.urgence is not between 1 and 5
                        };

                        //     // Set the value of the "Label" cell
                        document.getElementById("Demandeur-details-accepted").textContent =
                            response.user.Last_name + " " + response.user.First_name;

                        //     // Set the value of the "Serial Number" cell
                        document.getElementById("Etablissement-details-accepted").textContent =
                            response.classe.establishement.name;

                        //     // Set the value of the "Status" cell
                        document.getElementById("Salle-details-accepted").textContent = response
                            .classe.name;

                        //     // Set the value of the "Processor" cell
                        document.getElementById("Type-Device-details-accepted").textContent =
                            response.device !== null ? response.device.type.name : response
                            .accessoire.type.name;

                        //     // Set the value of the "Inventory Number" cell
                        document.getElementById("Device-details-accepted").textContent =
                            response.device !== null ? response.device.label : response
                            .accessoire.label;

                        //     // Set the value of the "Marque" cell
                        document.getElementById("Desctiption-Ticket-details-accepted")
                            .textContent = response
                            .description_issue;

                        //     // Set the value of the "Model" cell
                        const dateObj = new Date(response.created_at);
                        const year = dateObj.getFullYear();
                        const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        const day = String(dateObj.getDate()).padStart(2, '0');

                        document.getElementById("Date-Ticket-details-accepted").textContent =
                            `${year}-${month}-${day}`;

                        // document.getElementById("Date-Ticket-details-accepted").textContent = response.created_at;
                        document.getElementById("Technicien-Ticket-details-accepted")
                            .textContent = response.Technom + " " + response.Techprenom;
                        document.getElementById("DateAcceptation-Ticket-details-accepted")
                            .textContent = response
                            .date_accept_or_refus;

                        // const dateObj = new Date(response.date_accept_or_refus);
                        // const year = dateObj.getFullYear();
                        // const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        // const day = String(dateObj.getDate()).padStart(2, '0');

                        // document.getElementById("DateAcceptation-Ticket-details-accepted").textContent =
                        //     `${year}-${month}-${day}`;


                        //     // Set the value of the "RAM" cell
                        document.getElementById("Etat-details-accepted").textContent = response
                            .status == 1 ? "Acceptée par le technicien" : "";

                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });
            });
            // confirmerbtn

            $(document).on('click', '#confirmedTicket', function() {
                const row = $(this).closest('tr');
                const rowData = confirmerTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/GetTechTicket',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        // Assuming the response object is stored in a variable called `response`

                        // Set the value of the "Id" cell
                        document.getElementById("Ticket-id-details-confirmer").textContent =
                            response.id;

                        //     // Set the value of the "Establishment" cell
                        document.getElementById("Type-Ticket-details-confirmer").textContent =
                            response.type_Anci_Dmd == 0 ? 'Demande' : 'Ancident';

                        //     // Set the value of the "Class" cell
                        var urgc = document.getElementById("urgence-details-confirmer");
                        switch (response.urgence) {
                            case 5:
                                urgc.textContent = "Trés Haute";
                                break;
                            case 4:
                                urgc.textContent = "Haute";
                                break;
                            case 3:
                                urgc.textContent = "Moyenne";
                                break;
                            case 2:
                                urgc.textContent = "Base";
                                break;
                            case 1:
                                urgc.textContent = "Trés Base";
                                break;
                            default:
                                urgc.textContent =
                                    'null'; // Set the value to an empty string if response.urgence is not between 1 and 5
                        };

                        //     // Set the value of the "Label" cell
                        document.getElementById("Demandeur-details-confirmer").textContent =
                            response.user.Last_name + " " + response.user.First_name;

                        //     // Set the value of the "Serial Number" cell
                        document.getElementById("Etablissement-details-confirmer").textContent =
                            response.classe.establishement.name;

                        //     // Set the value of the "Status" cell
                        document.getElementById("Salle-details-confirmer").textContent =
                            response
                            .classe.name;

                        //     // Set the value of the "Processor" cell
                        document.getElementById("Type-Device-details-confirmer").textContent =
                            response.device !== null ? response.device.type.name : response
                            .accessoire.type.name;

                        //     // Set the value of the "Inventory Number" cell
                        document.getElementById("Device-details-confirmer").textContent =
                            response.device !== null ? response.device.label : response
                            .accessoire.label;

                        //     // Set the value of the "Marque" cell
                        document.getElementById("Desctiption-Ticket-details-confirmer")
                            .textContent = response
                            .description_issue;

                        //     // Set the value of the "Model" cell
                        const dateObj = new Date(response.created_at);
                        const year = dateObj.getFullYear();
                        const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        const day = String(dateObj.getDate()).padStart(2, '0');

                        document.getElementById("Date-Ticket-details-confirmer").textContent =
                            `${year}-${month}-${day}`;

                        // document.getElementById("Date-Ticket-details-confirmer").textContent = response.created_at;
                        document.getElementById("Technicien-Ticket-details-confirmer")
                            .textContent = response.Technom + " " + response.Techprenom;
                        document.getElementById("DateAcceptation-Ticket-details-confirmer")
                            .textContent = response
                            .date_accept_or_refus;
                        document.getElementById("Dateconfi-Ticket-details-confirmer")
                            .textContent = response
                            .date_confirmation;

                        // const dateObj = new Date(response.date_accept_or_refus);
                        // const year = dateObj.getFullYear();
                        // const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        // const day = String(dateObj.getDate()).padStart(2, '0');

                        // document.getElementById("DateAcceptation-Ticket-details-confirmer").textContent =
                        //     `${year}-${month}-${day}`;


                        //     // Set the value of the "RAM" cell
                        document.getElementById("Etat-details-confirmer").textContent = response
                            .status == 3 ? "Confirmer par le demandeur" : "";

                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });



            });
            // details terminer
            // // details terminer
            $(document).on('click', '#terminerTicket', function() {
                const row = $(this).closest('tr');
                const rowData = TerminerTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/GetTechTicket',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        // Assuming the response object is stored in a variable called `response`

                        // Set the value of the "Id" cell
                        document.getElementById("Ticket-id-details-terminer").textContent =
                            response.id;

                        //     // Set the value of the "Establishment" cell
                        document.getElementById("Type-Ticket-details-terminer").textContent =
                            response.type_Anci_Dmd == 0 ? 'Demande' : 'Ancident';

                        //     // Set the value of the "Class" cell
                        var urgc = document.getElementById("urgence-details-terminer");
                        switch (response.urgence) {
                            case 5:
                                urgc.textContent = "Trés Haute";
                                break;
                            case 4:
                                urgc.textContent = "Haute";
                                break;
                            case 3:
                                urgc.textContent = "Moyenne";
                                break;
                            case 2:
                                urgc.textContent = "Base";
                                break;
                            case 1:
                                urgc.textContent = "Trés Base";
                                break;
                            default:
                                urgc.textContent =
                                    'null'; // Set the value to an empty string if response.urgence is not between 1 and 5
                        };

                        //     // Set the value of the "Label" cell
                        document.getElementById("Demandeur-details-terminer").textContent =
                            response.user.Last_name + " " + response.user.First_name;

                        //     // Set the value of the "Serial Number" cell
                        document.getElementById("Etablissement-details-terminer").textContent =
                            response.classe.establishement.name;

                        //     // Set the value of the "Status" cell
                        document.getElementById("Salle-details-terminer").textContent = response
                            .classe.name;

                        //     // Set the value of the "Processor" cell
                        document.getElementById("Type-Device-details-terminer").textContent =
                            response.device !== null ? response.device.type.name : response
                            .accessoire.type.name;

                        //     // Set the value of the "Inventory Number" cell
                        document.getElementById("Device-details-terminer").textContent =
                            response.device !== null ? response.device.label : response
                            .accessoire.label;

                        //     // Set the value of the "Marque" cell
                        document.getElementById("Desctiption-Ticket-details-terminer")
                            .textContent = response
                            .description_issue;

                        //     // Set the value of the "Model" cell
                        const dateObj = new Date(response.created_at);
                        const year = dateObj.getFullYear();
                        const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        const day = String(dateObj.getDate()).padStart(2, '0');

                        document.getElementById("Date-Ticket-details-terminer").textContent =
                            `${year}-${month}-${day}`;

                        // document.getElementById("Date-Ticket-details-terminer").textContent = response.created_at;
                        document.getElementById("Technicien-Ticket-details-terminer")
                            .textContent = response.Technom + " " + response.Techprenom;
                        document.getElementById("DateAccepter-Ticket-details-terminer")
                            .textContent = response.date_accept_or_refus;
                        document.getElementById("DateConfirmer-Ticket-details-terminer")
                            .textContent = response.date_confirmation;
                        document.getElementById("terminer-Ticket-details-terminer")
                            .textContent = response
                            .date_Terminer;

                        // const dateObj = new Date(response.date_accept_or_refus);
                        // const year = dateObj.getFullYear();
                        // const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        // const day = String(dateObj.getDate()).padStart(2, '0');

                        // document.getElementById("DateAcceptation-Ticket-details-terminer").textContent =
                        //     `${year}-${month}-${day}`;

                        document.getElementById("description-Tech-details-terminer")
                            .textContent = response
                            .description_solution;
                        //     // Set the value of the "RAM" cell
                        document.getElementById("Etat-details-terminer").textContent = response
                            .status == 4 ? "Terminer " : "";

                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });
            });
            $(document).on('click', '#cnf-ter', function() {
                const row = $(this).closest('tr');
                const rowData = confirmerTable.row(row).data();
                console.log(rowData[0]);
                $("#id_ticket1").val(rowData[0]);

                $('#terminerform').one("submit", function(e) {
                    e.preventDefault();
                    var formData = $(this).serializeArray();
                    console.log(formData);
                    $.ajax({
                        url: '/TerminerTicket',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            document.getElementById("spanConfirmed").textContent =
                                parseInt(document.getElementById("spanConfirmed")
                                    .textContent) - 1;
                            document.getElementById("spanTermine").textContent =
                                parseInt(document.getElementById("spanTermine")
                                    .textContent) + 1;
                            confirmerTable.row(row).remove().draw(false);

                            // Define etatColor and etat variables
                            const etatColor = 'primary';
                            const etat = 'Terminée';



                            // Add new row to confirmedTable
                            TerminerTable.row.add([
                                rowData[0],
                                rowData[1],
                                rowData[2],
                                rowData[3],
                                rowData[4],
                                rowData[5],
                                rowData[6],
                                `<span class="badge  badge-${etatColor}">${etat}</span>`
                            ]).draw(false);

                            $('#modal-cnf-ter').modal('hide');

                            Toast.fire({
                                icon: 'success',
                                title: "Ticket Terminée avec success"
                            });
                            $('#terminerform')[0].reset();
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                            $('#terminerform')[0].reset();
                        }
                        
                    });
                })
            });
        })
    </script>
@endsection
