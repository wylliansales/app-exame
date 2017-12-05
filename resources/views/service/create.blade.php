<br>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">Cadastro do serviço</div>
        </div>
        @include('error._check')
            <div class="panel panel-default">
                 <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li role="presentation" class="{{isset($exams)?'': 'active'}}">
                            <a  data-toggle="tab" href="#information" role="tab">Informações</a>
                        </li>
                        <li role="presentation" class="{{isset($exams)?'active': ''}}">
                            <a data-toggle="tab" href="#exams" role="tab">Exames</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                            <div class="tab-pane {{isset($exams)?'': 'active'}}" id="information" role="tabpanel">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form id="form-service"  action="{{action('ServiceController@store')}}" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-horizontal">
                                            <input type="hidden" name="service_id" value="{{isset($service)?$service->id:''}}">
                                            <div class="form-group">
                                                 <label for="employee-name-input" class="col-sm-2 control-label">Funcionário</label>
                                                 <div class="col-sm-5">
                                                     <div class="input-group">
                                                         <input type="hidden" name="employee_id" value="{{isset($service)?$service->employee->id: ''}}" required>
                                                         <input type="text" class="form-control" id="employee-name-input" placeholder="Nome do Funcionário" name="employee_name" value="{{isset($service)? $service->employee->name: ''}}" required>
                                                         <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                                     </div>
                                                 </div>
                                            </div>
                                                <div class="form-group">
                                                    <label for="company-name-input" class="col-sm-2 control-label">Empresa</label>
                                                    <div class="col-sm-5">
                                                        <div class="input-group">
                                                            <input type="hidden" id="company_id" name="company_id" value="{{isset($service)?$service->company->id: ''}}" required>
                                                            <input type="text" class="form-control " id="company-name-input" placeholder="Nome da Empresa" name="company_name" value="{{isset($service)? $service->company->name: ''}}" required>
                                                            <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="form-group">
                                                  <label for="doctor-name-input" class="col-sm-2 control-label">Médico</label>
                                                 <div class="col-sm-5">
                                                     <div class="input-group">
                                                         <input type="hidden" id="doctor_id" name="doctor_id" value="{{isset($service)?$service->doctor->id: ''}}" required>
                                                         <input type="text" class="form-control " id="doctor-name-input" placeholder="Nome do Médico" name="doctor_name" value="{{isset($service)? $service->doctor->name: ''}}" required>
                                                         <div class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></div>
                                                     </div>
                                                 </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exam_date" class="col-sm-2 control-label">Data</label>
                                                <div class="col-sm-3">
                                                    <input type="date" class="form-control" id="exam_date" placeholder="Data" name="exam_date" value="{{isset($service)? $service->exam_date: ''}}" required>
                                                </div>
                                            </div>
                                                <input type="hidden" id="exam_id" name="exam_id">
                                            {{--<button type="button" class="btn btn-primary pull-right button-store-service">Salvar</button>--}}
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane {{isset($exams)?'active': ''}}" id="exams" role="tabpanel">
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <div class="col-md-3">

                                            <input type="text" id="exam-name-input" class="form-control input-sm" name="name" placeholder="Nome do exame">
                                        </div>

                                        <div class="col-md-1">
                                            <button class="btn btn-success btn-sm button-store-service">Salvar</button>
                                        </div>
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>Valor</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $cont = 1;
                                                    $valorTotal = 0;
                                                ?>
                                                @if(isset($service))
                                                    @foreach($service->services_has_exams as $exam)
                                                    <tr>
                                                        <input type="hidden" name="exam_id{{$cont}}" value="{{$exam->id}}">
                                                        <td>{{$exam->exam->name}}</td>
                                                        <td>{{$exam->exam->price}}</td>
                                                        <td>
                                                            <a href="{{action('ServiceController@destroyExam', ['id' => $exam->id])}}"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        $cont++;
                                                        $valorTotal += $exam->exam->price;
                                                    ?>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>

                                        <p class="text-right">Total: {{$valorTotal}}</p>
                                    </div>
                                    <button type="button" class="btn btn-primary pull-right button-store-service" style="margin-top: 10px">Concluir</button>
                                </div>
                            </div>
                    </div>
                 </div>
            </div>

    </div>
</div>
@endsection
