@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Activity</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item active">Activity</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection

@section('main-content')
    <div class="row">
        <div class="col-12">
            <div class="invoice p-3 mb-3">
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped" id="logTables">
                            <thead>
                                <tr>
                                    <th>Operation</th>
                                    <th>Utilisateur</th>
                                    <th>Technicien</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notifications as $log)
                              
                                @php
                                    $technom = $log->data['data']['Technom'] ?? 'en cours';
                                    $techprenom = $log->data['data']['Techprenom'] ?? '';
                                @endphp
                                <tr>
                                    <td>{{ $log->type }}</td>
                                    <td>
                                        {{ $log->data['data']['user']['First_name'] }} {{ $log->data['data']['user']['Last_name'] }}
                                    </td>
                                    <td>{{ $technom }} {{ $techprenom }}</td>
                                    <td>{{ $log->created_at }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('activitylog_script')
<script>
    $(document).ready(function() {
        $('#logTables').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "responsive": true,
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
            },
            "dom": 'Bfrtip',
            "buttons": [
                {
                    extend: 'pdfHtml5',
                    text: 'Exporter en PDF',
                },
                {
                    extend: 'print',
                    text: 'Imprimer'
                }
            ]
        });
    });
</script>
@endsection
