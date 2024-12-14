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
            {{-- Details ticket confirmed --}}
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
                                                            <td id="Ticket-id-details-confirmed" class="bg-light"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Type Ticket</strong></td>
                                                            <td id="Type-Ticket-details-confirmed" class="bg-light">

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Urgence</strong></td>
                                                            <td id="urgence-details-confirmed" class="bg-light">

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Demandeur</strong></td>
                                                            <td id="Demandeur-details-confirmed" class="bg-light"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Etablissement</strong></td>
                                                            <td id="Etablissement-details-confirmed" class="bg-light"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Salle</strong></td>
                                                            <td id="Salle-details-confirmed" class="bg-light"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Type Machine</strong></td>
                                                            <td id="Type-Device-details-confirmed" class="bg-light"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Machine</strong></td>
                                                            <td id="Device-details-confirmed" class="bg-light">

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Desctiption Ticket</strong></td>
                                                            <td id="Desctiption-Ticket-details-confirmed" class="bg-light">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Date Ticket</strong></td>
                                                            <td id="Date-Ticket-details-confirmed" class="bg-light"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Technicien</strong></td>
                                                            <td id="Technicien-Ticket-details-confirmed" class="bg-light">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Date Acceptation</strong></td>
                                                            <td id="DateAcceptation-Ticket-details-confirmed"
                                                                class="bg-light"></td>
                                                        </tr>
                                                     
                                                        <tr>
                                                            <td><strong>Date Confirmation</strong></td>
                                                            <td id="DateConfirmation-Ticket-details-confirmed"
                                                                class="bg-light"></td>
                                                        </tr>

                                                        <tr>
                                                            <td><strong>Etat</strong></td>
                                                            <td id="Etat-details-confirmedd" class="bg-light"></td>
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
            {{-- Details ticket Terminer
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
                                                            <td><strong>Description terminer</strong></td>
                                                            <td id="description-Tech-details-terminer" class="bg-light">
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
            </div> --}}
            {{-- Details ticket accepted --}}
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
                                                            <td id="DateAcceptation-Ticket-details-accepted"
                                                                class="bg-light"></td>
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
            <div class="modal fade" id="modal-refusTicket">
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
            {{-- Details ticket Terminer --}}
            <div class="modal fade" id="modal-terminerTicket">
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
                                                            <td id="DateAccepter-Ticket-details-terminer"
                                                                class="bg-light"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Date Confirmation</strong></td>
                                                            <td id="DateConfirmer-Ticket-details-terminer"
                                                                class="bg-light"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Date Terminer</strong></td>
                                                            <td id="DateTerminer-Ticket-details-terminer"
                                                                class="bg-light"></td>
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
                {{-- <a href="{{ route('newticket') }}" class="btn btn-primary btn-block mb-3">Créer une Ticket</a> --}}

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
                                        class="badge bg-warning float-right">{{ $nbrticketstatus0 }}</span></a>

                                {{-- <a href="#" class="nav-link">
                                    <i class="fas fa-clock text-primary"></i>
                                    En attente
                                    <span class="badge bg-primary float-right">65</span>
                                </a> --}}
                            </li>
                            <li class="nav-item">

                                <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill"
                                    href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                                    aria-selected="false"><i class="fas fa-check-circle  text-success"></i> Accepté <span
                                        class="badge bg-success float-right">{{ $nbrticketstatus1 }}</span></a>

                                {{-- <a href="#" class="nav-link">
                                    <i class="fas fa-ban text-danger"></i>
                                    Réfusé
                                    
                                </a> --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="vert-tabs-conf-tab" data-toggle="pill" href="#vert-tabs-conf"
                                    role="tab" aria-controls="vert-tabs-conf" aria-selected="true"><i
                                        class="fas fa-clock text-info"></i> Confirmé <span
                                        class="badge bg-info float-right"
                                        id="spanConfirmed">{{ $nbrticketstatus3 }}</span></a>

                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                    href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                    aria-selected="false"><i class="fas fa-times-circle text-danger"></i> Refusé <span
                                        class="badge bg-danger float-right">{{ $nbrticketstatus2 }}</span></a>

                                {{-- <a href="#" class="nav-link">
                                    <i class="fas fa-history text-warning"></i> Encours
                                    <span class="badge bg-warning float-right">5</span>
                                </a> --}}
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
                                    href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                    aria-selected="false"><i class="fas fa-check-circle text-primary"></i> Terminé <span
                                        class="badge bg-primary float-right">{{ $nbrticketstatus4 }}</span></a>
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
                                            <th>Technicien</th>
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
                                                <td>{{ $ticketsstatus->Technom . ' ' . $ticketsstatus->Techprenom }}</td>

                                                <td> <span class="badge badge-success">Acceptée</span></td>

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
                                            <th>Technicien</th>
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
                                                <td>{{ $ticketsstatus->Technom . ' ' . $ticketsstatus->Techprenom }}</td>

                                                <td> <span class="badge badge-info">Confirmée</span></td>

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
                                            <th>Technicien</th>
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
                                                <td>{{ $ticketsstatus->Technom . ' ' . $ticketsstatus->Techprenom }}</td>

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
                                            <th>Technicien</th>
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
                                                <td>{{ $ticketsstatus->Technom . ' ' . $ticketsstatus->Techprenom }}</td>

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
@section('ticket_script')

    <script>
        $(document).ready(function() {
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
                        "defaultContent": '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-attentTicket" id="attentTicket"><i class="fas fa-eye" title="Details" aria-label="Details"></i></a></div>'
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
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
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
                "columnDefs": [ //{
                    //         "targets": [0],
                    //         "visible": false
                    //     },
                    {
                        "targets": -1,
                        "data": null,
                        "defaultContent": '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-acceptedTicket" id="acceptedTicket"><i class="fas fa-eye" title="Details" aria-label="Details"></i></a></div>'
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

            var confirmedTable = $('#confirmertable').DataTable({
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
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-confirmedTicket" id="confirmedTicket"><i class="fas fa-eye" title="Details" aria-label="Details"></i></div>'
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
                "ordering": false,
                "info": false,
                "autoWidth": false,
                "responsive": true,
                "pagingType": 'simple',
                "columnDefs": [{
                    "targets": -1, // Actions
                    "data": null,
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-refusTicket" id="refusTicket"><i class="fas fa-eye" title="Details" aria-label="Details"></i></a></div>'
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
                    "defaultContent": '<div class="btn-group btn-group-sm"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-terminerTicket" id="terminerTicket"><i class="fas fa-eye" title="Details" aria-label="Details"></i></a></div>'
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
            // details En attent 

            $(document).on('click', '#attentTicket', function() {
                const row = $(this).closest('tr');
                const rowData = attentTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/DetailsAdminTicket',
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
            // details Accepted

            $(document).on('click', '#acceptedTicket', function() {
                const row = $(this).closest('tr');
                const rowData = AcceptedTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/DetailsAdminTicket',
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

            // details refus

            $(document).on('click', '#refusTicket', function() {
                const row = $(this).closest('tr');
                const rowData = refusTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/DetailsAdminTicket',
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
                            .status == 2 ? "Refusée " : "";

                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });
            });

            // details refus

            $(document).on('click', '#terminerTicket', function() {
                const row = $(this).closest('tr');
                const rowData = TerminerTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/DetailsAdminTicket',
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

                        // document.getElementById("Date-Ticket-details-refus").textContent = response.created_at;
                        document.getElementById("Technicien-Ticket-details-terminer")
                            .textContent = response.Technom + " " + response.Techprenom;
                            document.getElementById("DateAccepter-Ticket-details-terminer")
                            .textContent = response.date_accept_or_refus;
                            document.getElementById("DateConfirmer-Ticket-details-terminer")
                            .textContent = response.date_confirmation;
                        document.getElementById("DateTerminer-Ticket-details-terminer")
                            .textContent = response
                            .date_Terminer;

                        // const dateObj = new Date(response.date_accept_or_refus);
                        // const year = dateObj.getFullYear();
                        // const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        // const day = String(dateObj.getDate()).padStart(2, '0');

                        // document.getElementById("DateAcceptation-Ticket-details-refus").textContent =
                        //     `${year}-${month}-${day}`;

                        document.getElementById("description-Tech-details-terminer")
                            .textContent = response
                            .description_solution;
                        //     // Set the value of the "RAM" cell
                        document.getElementById("Etat-details-terminer").textContent = response
                            .status == 4 ? "Terminée " : "";

                    },
                    error: function(xhr, status, error) {
                        // Handle errors during fetching establishment details
                        console.error(xhr.responseText);
                    }
                });
            });
            $(document).on('click', '#confirmedTicket', function() {
                const row = $(this).closest('tr');
                const rowData = confirmedTable.row(row).data();
                console.log(rowData[0]);

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/DetailsUserTicket',
                    type: 'POST',
                    data: {
                        id: rowData[0]
                    },
                    success: function(response) {
                        console.log(response);
                        // Assuming the response object is stored in a variable called `response`

                        // Set the value of the "Id" cell
                        document.getElementById("Ticket-id-details-confirmed").textContent =
                            response.id;

                        //     // Set the value of the "Establishment" cell
                        document.getElementById("Type-Ticket-details-confirmed").textContent =
                            response.type_Anci_Dmd == 0 ? 'Demande' : 'Ancident';

                        //     // Set the value of the "Class" cell
                        var urgc = document.getElementById("urgence-details-confirmed");
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
                        document.getElementById("Demandeur-details-confirmed").textContent =
                            response.user.Last_name + " " + response.user.First_name;

                        //     // Set the value of the "Serial Number" cell
                        document.getElementById("Etablissement-details-confirmed").textContent =
                            response.classe.establishement.name;

                        //     // Set the value of the "Status" cell
                        document.getElementById("Salle-details-confirmed").textContent =
                            response
                            .classe.name;

                        //     // Set the value of the "Processor" cell
                        document.getElementById("Type-Device-details-confirmed").textContent =
                            response.device !== null ? response.device.type.name : response
                            .accessoire.type.name;

                        //     // Set the value of the "Inventory Number" cell
                        document.getElementById("Device-details-confirmed").textContent =
                            response.device !== null ? response.device.label : response
                            .accessoire.label;

                        //     // Set the value of the "Marque" cell
                        document.getElementById("Desctiption-Ticket-details-confirmed")
                            .textContent = response
                            .description_issue;

                        //     // Set the value of the "Model" cell
                        const dateObj = new Date(response.created_at);
                        const year = dateObj.getFullYear();
                        const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        const day = String(dateObj.getDate()).padStart(2, '0');

                        document.getElementById("Date-Ticket-details-confirmed").textContent =
                            `${year}-${month}-${day}`;

                        // document.getElementById("Date-Ticket-details-confirmed").textContent = response.created_at;
                        document.getElementById("Technicien-Ticket-details-confirmed")
                            .textContent = response.Technom + " " + response.Techprenom;
                        document.getElementById("DateAcceptation-Ticket-details-confirmed")
                            .textContent = response
                            .date_accept_or_refus;
                         
                           
                        document.getElementById("DateConfirmation-Ticket-details-confirmed")
                            .textContent = response.date_confirmation;

                        // const dateObj = new Date(response.date_accept_or_refus);
                        // const year = dateObj.getFullYear();
                        // const month = String(dateObj.getMonth() + 1).padStart(2, '0');
                        // const day = String(dateObj.getDate()).padStart(2, '0');

                        // document.getElementById("DateAcceptation-Ticket-details-confirmed").textContent =
                        //     `${year}-${month}-${day}`;



                        document.getElementById("Etat-details-confirmedd").textContent =
                            "Confirmée";

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
