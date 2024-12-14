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
        <div class="col-md-12">

            <div class="timeline h-100 overflow-auto">

                <div class="time-label">
                    <span class="bg-red">10 Feb. 2014</span>
                </div>

                @foreach ($logs as $log)

                @if ($log->event == "created")
                <div>
                    <i class="fas fa-plus bg-green"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> {{$log->created_at->diffForHumans()}}</span>
                        <h3 class="timeline-header no-border">Nouveau {{$log->subject_type}} a été créé par {{$log->causer->First_name}} {{$log->causer->Last_name}}
                        </h3>
                    </div>
                </div>
                @elseif ($log->event == "updated")
                <div>
                    <i class="fas fa-pen bg-warning"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> {{$log->created_at->diffForHumans()}}</span>
                        <h3 class="timeline-header no-border">{{$log->subject_type}} est modifier par {{$log->causer->First_name}} {{$log->causer->Last_name}}
                        </h3>
                    </div>
                </div>
                @elseif ($log->event == "deleted")
                <div>
                    <i class="fas fa-trash bg-danger"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> {{$log->created_at->diffForHumans()}}</span>
                        <h3 class="timeline-header no-border">{{$log->subject_type}} supprimer par {{$log->causer->First_name}} {{$log->causer->Last_name}}
                        </h3>
                    </div>
                </div>
                @endif

                @endforeach



                {{-- <div>
                    <i class="fas fa-comments bg-yellow"></i>
                    <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>
                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                        <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                        </div>
                        <div class="timeline-footer">
                            <a class="btn btn-warning btn-sm">View comment</a>
                        </div>
                    </div>
                </div> --}}


                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>
            </div>
        </div>

    </div>
@endsection
