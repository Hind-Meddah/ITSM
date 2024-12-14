@extends('layouts.application')
@section("breadcrumb")

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Information personelles</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                <li class="breadcrumb-item active">Information personelles</li>
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
        <div class="col-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Identite</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                </div>
                
                </div>
                
                <div class="card-body" style="display: block;">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>Nom : </td>
                                <td class="bg-light">{{Auth::user()->Last_name}}</td>
                            </tr>
                            <tr>
                                <td>Prénom :</td>
                                <td class="bg-light">{{Auth::user()->First_name}}</td>
                            </tr>
                            <tr>
                                <td>Télephone :</td>
                                <td class="bg-light ">{{Auth::user()->phone}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                </div>

        </div>
        <div class="col-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                <h3 class="card-title">Donnée de connexion</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                </div>
                
                </div>
                
                <div class="card-body" style="display: block;">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td>ID : </td>
                                <td class="bg-light">{{Auth::user()->id}}</td>
                            </tr>
                            <tr>
                                <td>Email : </td>
                                <td class="bg-light">{{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <td>Mot de passe :</td>
                                <td class="bg-light">********</td>
                                <td><a href="{{route('mdp.change')}}" class="btn btn-light btn-sm">Changez le mot de passe</a></td>
                            </tr>
             
                        </tbody>
                    </table>
                </div>
                
                </div>
        </div>
    </div>
    <!-- /.row -->
@endsection