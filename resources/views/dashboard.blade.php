@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tableau de bord</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item active">Tableau de bord</li>
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
        <div class="col-sm-2 ml-auto">
            <div class="form-group ">

                <select class="form-control " id="etabliSelect" name="etabliSelect">
                    @foreach ($etablissements as $etablissement)
                        <option value="{{ $etablissement->id }}">{{ $etablissement->name }}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-md-3 col-sm-6 col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-info" style="background-color: rgb(0, 143, 251);">
                    <i class="fas fa-building"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Nombre d'établissements</span>
                    <span class="info-box-number">{{ $nbrEtablisment }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-lg-4">
            <div class="info-box">
                <span class="info-box-icon" style="background-color: #ffde20">
                    <i class="fas fa-school nav-icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Nombre de salles</span>
                    <span class="info-box-number" id="nbrsalles">{{ $salles }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-lg-4">
            <div class="info-box">
                <span class="info-box-icon" style="background-color: rgb(0, 227, 150);">
                    <i class="fa fa-users nav-icon"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Nombre d'utilisateurs</span>
                    <span class="info-box-number" id="nbrusers">{{ $nbrusers }}</span>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-lightblue color:#000000">
                <div class="inner">
                    <h3 id="nbrComputer">{{ $nbrComputer }}</h3>

                    <p>Ordinateurs</p>
                </div>
                <div class="icon">
                    <i class="fa fa-laptop"></i>
                </div>
                <a href="/Computer" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:rgb(0, 212, 141); color:#000000">
                <div class="inner">
                    <h3 id="nbrMoniteur">{{ $nbrMoniteur }}</h3>

                    <p>Moniteurs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-desktop"></i>
                </div>
                <a href="/Moniteur" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#FF0000">
                <div class="inner">
                    <h3 id="nbrClaviers">{{ $nbrClavier }}</h3>

                    <p>Claviers</p>
                </div>
                <div class="icon">
                    <i class="fas fa-keyboard"></i>
                </div>
                <a href="/Clavier" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#ffde20">
                <div class="inner">
                    <h3 id="nbrSouris">{{ $nbrSouris }}</h3>
                    <p>Souris</p>
                </div>
                <div class="icon">
                    <i class="fa fa-mouse"></i>
                </div>
                <a href="/Souris" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #49a8ec">
                <div class="inner">
                    <h3 id="nbrRouteur">{{ $nbrRouteur }}</h3>
                    <p>Routeurs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-network-wired"></i>
                </div>
                <a href="/Router" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #7EA1FF; color:#000000">
                <div class="inner">
                    <h3 id="nbrSwitch">{{ $nbrSwitch }}</h3>
                    <p>Commutateurs</p>
                </div>
                <div class="icon">
                    <i class="fas fa-server"></i>
                </div>
                <a href="/Switch" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color:#FF70AB; color:#000000">
                <div class="inner">
                    <h3 id="nbrCamera">{{ $nbrCamera }}</h3>
                    <p>Caméras</p>
                </div>
                <div class="icon">
                    <i class="fas fa-camera"></i>
                </div>
                <a href="/Camera" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #0dcaf0; color:#000000">
                <div class="inner">
                    <h3 id="nbrPrinter">{{ $nbrPrinter }}</h3>
                    <p>Imprimantes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-print"></i>
                </div>
                <a href="/Imprimante" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box" style="background-color: #FF8F00; color:#000000">
                <div class="inner">
                    <h3 id="nbrpointdaccès">{{ $nbrpointdaccès }}</h3>
                    <p>Points d'accès</p>
                </div>
                <div class="icon">
                    <i class="fas fa-wifi"></i>
                </div>
                <a href="/Access-Point" class="small-box-footer">Plus d'info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">

        <div class="col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">La répartition des marques</div>
                <div class="card-body">
                    <div id="chart-marque"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">L'état des machines</div>
                <div class="card-body">
                    <div id="chartdonut" style="height: 252px; display: flex; justify-content: center;"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">Les tickets d'aujourd'hui</div>
                <div class="card-body">
                    <div id="chartTicket" style="height: 252px; display: flex; justify-content: center;"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-12">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Dernières machines ajoutées</h3>
                </div>
                <!-- /.card-header -->

                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>Libellé</th>
                                    <th>Type</th>
                                    <th>État</th>
                                    <th>Date et Heure</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @if (count($sortedCollection) != 0)
                                    @foreach ($sortedCollection as $item)
                                        <tr>
                                            <td id="labelitem">{{ $item->label }}</td>
                                            <td id="typeitem">{{ $item->type->name }}</td>
                                            <td id="statusitem"><span
                                                    class="badge {{ $item->status === 1 ? 'badge-danger' : 'badge-success' }}">
                                                    {{ $item->status === 1 ? 'En panne' : 'Actif' }}
                                                </span></td>
                                            <td id="created_atitem">
                                                {{ $item->created_at }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" style="text-align: center;"> Pas de données disponibles </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>

@endsection
@section('dashboard_script')
    <script>
        $(document).ready(function() {


            // Replace these with your actual data variables
            var nbrDeclarationEnattent = {{ $nbrDeclarationEnattent }};
            var nbrDeclarationTerminer = {{ $nbrDeclarationTerminer }};
            var nbrDeclarationRefuse = {{ $nbrDeclarationRefuse }};

            // Check if all data values are zero
            if (nbrDeclarationEnattent === 0 && nbrDeclarationTerminer === 0 && nbrDeclarationRefuse === 0) {
                document.querySelector("#chartTicket").innerHTML = "Pas de données disponibles";
            } else {
                var options = {
                    series: [nbrDeclarationEnattent, nbrDeclarationTerminer, nbrDeclarationRefuse],
                    chart: {
                        width: 400,
                        type: 'pie'
                    },
                    labels: ['Tickets en attente', 'Tickets confirmés', 'Tickets refusés'],
                    colors: ["#ffde20", 'rgb(0, 143, 251)', '#FF0000'], // red, green, yellow

                    responsive: [{
                        breakpoint: 480,
                        options: {
                            chart: {
                                width: 200,
                                height: 255
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }
                    }],
                };

                var chart = new ApexCharts(document.querySelector("#chartTicket"), options);
                chart.render();
            }




// Replace these with your actual data variables
var nbrActiveTtl = {{ $nbrActiveTtl }};
var nbrEnpanneTtl = {{ $nbrEnpanneTtl }};

// Check if all data values are zero
if (nbrActiveTtl === 0 && nbrEnpanneTtl === 0) {
    document.querySelector("#chartdonut").innerHTML = "Pas de données disponibles";
} else {
    var options = {
        series: [nbrActiveTtl, nbrEnpanneTtl],
        chart: {
            type: 'donut',
            width: 438,
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '60%',
                    width: 438
                }
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200,
                },
                legend: {
                    position: 'bottom',
                }
            }
        }],
        labels: ['Nombre actif', 'Nombre en panne'],
    };

    var chartdonut = new ApexCharts(document.querySelector("#chartdonut"), options);
    chartdonut.render();
}



            var categories = <?php echo json_encode(array_column($marques, 'name')); ?>;
            var options = {
                series: [{
                    name: 'Nombre d\'appareils',
                    data: {{ json_encode(array_column($marques, 'count')) }}
                }],
                chart: {
                    type: 'bar',
                    height: 237
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        borderRadiusApplication: 'end',
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    categories: categories
                },
                noData: {
                    text: "Pas de données disponibles",
                    align: 'center',
                    verticalAlign: 'middle',
                    offsetX: 0,
                    offsetY: 0,
                    style: {
                        color: undefined,
                        fontSize: '14px',
                        fontFamily: undefined
                    }
                }
            };

            var chart = new ApexCharts(document.querySelector("#chart-marque"), options);
            chart.render();





            $("#etabliSelect").on("change", function() {
                var selectedEtablissentId = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/IndexDashboardEtab',
                    method: 'POST',
                    data: {
                        etablissementId: selectedEtablissentId
                    },
                    success: function(response) {
                        console.log(response);
                        $("#nbrComputer").text(response.nbrComputer);
                        $("#nbrMoniteur").text(response.nbrMoniteur);
                        $("#nbrPrinter").text(response.nbrPrinter);
                        $("#nbrSwitch").text(response.nbrSwitch);
                        $("#nbrClaviers").text(response.nbrClavier);
                        $("#nbrSouris").text(response.nbrSouris);
                        $("#nbrRouteur").text(response.nbrRouteur);
                        $("#nbrCamera").text(response.nbrCamera);
                        $("#nbrpointdaccès").text(response.nbrpointdaccès);
                        $("#nbrsalles").text(response.salles);
                        $("#nbrusers").text(response.nbrusers);
                        $('#tableBody').empty();
                        $.each(response.sortedCollection, function(index, item) {
                            var row = '<tr>';
                            row += '<td>' + item.label + '</td>';
                            row += '<td>' + item.type.name + '</td>';
                            row += '<td><span class="badge ' + (item.status === 1 ?
                                    'badge-danger' : 'badge-success') + '">' + (item
                                    .status === 1 ? 'En panne' : 'Active') +
                                '</span></td>';
                            row += '<td>' + item.created_at.split('T')[0] + ' ' + item
                                .created_at.split('T')[1].split('.')[0] + '</td>';
                            $('#tableBody').append(row);
                        });


                        $("#chartdonut").empty();
                        var options = {
                            series: [response.nbrActiveTtl, response.nbrEnpanneTtl],
                            chart: {
                                type: 'donut',
                                width: 438,

                            },

                            plotOptions: {
                                pie: {
                                    donut: {
                                        size: '60%',
                                        width: 438
                                    }
                                }
                            },


                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: 200,
                                    },
                                    legend: {
                                        position: 'bottom',
                                    }
                                }
                            }],
                            labels: ['Nombre actif', 'Nombre en panne'],



                        };

                        var chartdonut = new ApexCharts(document.querySelector("#chartdonut"),
                            options);
                        chartdonut.render();

                        $("#chartTicket").empty();

                        var options = {
                            series: [response.nbrDeclarationEnattent,
                                response.nbrDeclarationTerminer,
                                response.nbrDeclarationRefuse
                            ],
                            chart: {
                                width: 400,
                                type: 'pie'
                            },
                            labels: ['Tickets en attente', 'Tickets confirmés',
                                'Tickets refusés'
                            ],

                            colors: ["#ffde20", 'rgb(0, 143, 251)',
                                '#FF0000'
                            ], // red, green, yellow

                            responsive: [{
                                breakpoint: 480,
                                options: {
                                    chart: {
                                        width: 200,
                                        height: 255
                                    },
                                    legend: {
                                        position: 'bottom'
                                    }
                                }
                            }],
                        };

                        var chart = new ApexCharts(document.querySelector("#chartTicket"),
                            options);
                        chart.render();


                    },
                    error: function(xhr, status, error) {

                        console.error(error);

                    }
                });
            });
        });
    </script>
@endsection
