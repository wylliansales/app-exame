@extends('.layouts.app')<br>
@include('error._check')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">Médicos</div>
            </div>
            <div class="col-md-5">
                <button class="btn btn-primary btn-sm " data-toggle="modal" data-target="#model-store-doctor">Novo Médico</button>
            </div>
            <form name="" action="{{action('DoctorController@show')}}">
                {{csrf_field()}}
                <div class="col-md-1 pull-right">
                    <button class="btn btn-success btn-sm company-buscar">Buscar</button>
                </div>
                <div class="col-md-4 pull-right">
                    <input type="text" class="form-control input-sm" name="name" placeholder="Nome">
                </div>
            </form>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="panel panel-default">
                <div class="panel-body">
                 @if(isset($doctors))
                  @include('doctor.doctors')
                 @else
                  @include('doctor.search')
                 @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="model-store-doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Dados do Médico</h4>
                </div>
                <form name="doctor" action="{{action('DoctorController@store')}}" method="post">
                <div class="modal-body">
                    <div class="row">

                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="doctor-name" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" id="doctor-name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="doctor-crm" class="control-label">CRM:</label>
                                    <input type="text" class="form-control" id="doctor-crm" name="crm" required>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

        <div class="modal fade" id="model-edit-doctor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Dados do Médico</h4>
                    </div>
                    <form name="doctorEdit" action="{{action('DoctorController@update')}}" method="post">
                    <div class="modal-body">
                        <div class="row">

                                {{ csrf_field() }}
                                <input type="hidden" class="form-control" id="doctor-name" name="id">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="doctor-name" class="control-label">Nome:</label>
                                        <input type="text" class="form-control" id="doctor-name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="doctor-crm" class="control-label">CRM:</label>
                                        <input type="text" class="form-control" id="doctor-crm" name="crm" required>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
@endsection