@extends('layouts.application')
@section('main-content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ticket</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="#">Assistances</a></li>
                        <li class="breadcrumb-item active">Nouveau Ticket</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="col-12">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Nouveau Ticket</h3>
            </div>
            <div class="card-body">
                <form method="post" id="addmedicament" action="{{ route('storeticket') }}">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Demandeur</label>
                                    <input type="text" id="demendeur" name="demendeur" readonly class="form-control"
                                        placeholder="Enter ..." value="{{ old('demendeur', $user->First_name . ' ' . $user->Last_name) }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Etablissement</label>
                                    <select class="form-control" id="etabliSelect" name="etabliSelect">
                                        <option selected disabled>Selectioné un établissement</option>
                                        @foreach ($etablissements as $etablissement)
                                            <option value="{{ $etablissement->id }}" {{ old('etabliSelect') == $etablissement->id ? 'selected' : '' }}>{{ $etablissement->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('etabliSelect')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Classe</label>
                                    <select class="form-control" id="classeSelect" name="classeSelect">
                                        <option value="" selected disabled>selectioner class</option>
                                    </select>
                                    @error('classeSelect')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Type declaration</label>
                                    <select class="form-control" id="typedemande" name="typedemande">
                                        <option value="" selected disabled>selectioner Type declaration</option>
                                        <option value="1" {{ old('typedemande') == 1 ? 'selected' : '' }}>Ancident</option>
                                        <option value="0" {{ old('typedemande') == 0 ? 'selected' : '' }}>Demande</option>
                                    </select>
                                    @error('typedemande')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Type device</label>
                                    <select class="form-control" id="typedevice" name="typedevice">
                                        <option selected value="" disabled>Selectioné type de device</option>
                                        @foreach ($deviceTypes as $deviceType)
                                            <option value="{{ $deviceType->id }}" {{ old('typedevice') == $deviceType->id ? 'selected' : '' }}>{{ $deviceType->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('typedevice')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Device</label>
                                    <select class="form-control" id="device" name="device"></select>
                                    @error('device')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" id="dateT" name="dateT" class="form-control" readonly
                                         value="{{ old('dateT', $currentDateTimeFormat) }}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Urgence</label>
                                    <select class="form-control" id="urgence" name="urgence">
                                        <option value="5" {{ old('urgence') == 5 ? 'selected' : '' }}>Trés Haute</option>
                                        <option value="4" {{ old('urgence') == 4 ? 'selected' : '' }}>Haute</option>
                                        <option value="3" {{ old('urgence') == 3 ? 'selected' : '' }}>Moyenne</option>
                                        <option value="2" {{ old('urgence') == 2 ? 'selected' : '' }}>Base</option>
                                        <option value="1" {{ old('urgence') == 1 ? 'selected' : '' }}>Trés Base</option>
                                    </select>
                                    @error('urgence')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." style="height: 97px;" id="desc_issue" name="desc_issue">{{ old('desc_issue') }}</textarea>
                                    @error('desc_issue')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Créer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('newticket_script')

    <script>
        $(document).ready(function() {
            $("#etabliSelect").on("change", function() {
                var selectedEtablissentId = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/GetSalle',
                    method: 'POST',
                    data: {
                        etablissementId: selectedEtablissentId
                    },
                    success: function(response) {
                        console.log(response);
                        $('#classeSelect, #classeSelect_modif').empty();
                        $('#classeSelect, #classeSelect_modif').append(
                            '<option value="" selected disabled>selectioner class</option>');

                        $.each(response, function(index, salle) {
                            $('#classeSelect, #classeSelect_modif').append(new Option(
                                salle.name, salle.id));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });

            $("#classeSelect").on("change", function() {
                $('#typedevice').val("");
            });
            
            $('#typedevice').on("change", function() {
                var selectedtypedeviceId = $(this).val();
                var salle = $('#classeSelect').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    url: '/Getdevice',
                    method: 'POST',
                    data: {
                        dtypeId: selectedtypedeviceId,
                        salleId: salle
                    },
                    success: function(response) {
                        console.log(response);
                        $('#device').empty();
                        $.each(response, function(index, dv) {
                            $('#device').append(new Option(
                                dv.label, dv.id));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
@endsection
