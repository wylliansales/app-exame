@extends('.layouts.app')<br>
@include('error._check')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">Funcionários Cadastrados</div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary btn-sm " data-toggle="modal" data-target="#model-store-employee">Novo Funcionário</button>
            </div>
            <form action="{{action('EmployeeController@show')}}">
                {{csrf_field()}}
                <div class="col-md-1 pull-right">
                    <button class="btn btn-success btn-sm">Buscar</button>
                </div>

                <div class="col-md-3 pull-right">
                    <input type="text" class="form-control input-sm" name="name" placeholder="Nome">
                </div>
                <div class="col-md-3 pull-right">
                    <input type="text" class="form-control input-sm" name="company" placeholder="Empresa">
                </div>
            </form>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="panel panel-default">
                <div class="panel-body">
                @if(isset($employees))
                    @include('employee.employees')
                @else
                    @include('employee.search')
                @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="model-store-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Dados do Funcionário</h4>
                </div>
                <form name="employee" action="{{action('EmployeeController@store')}}" method="post">
                <div class="modal-body">
                    <div class="row">

                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="employee-name" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" id="employee-name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee-function" class="control-label">Função:</label>
                                    <input type="text" class="form-control" id="employee-function" name="function" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee-date" class="control-label">Data Nascimento:</label>
                                    <input type="date" class="form-control" id="employee-date" name="date_of_birth" required>
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

    <div class="modal fade" id="model-edit-employee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Dados da Empresa</h4>
                </div>
                <form name="employeeEdit" action="{{action('EmployeeController@update')}}" method="post">
                <div class="modal-body">
                    <div class="row">

                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" id="employee-id" name="id">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="company-name" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" id="company-name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee-function" class="control-label">Function:</label>
                                    <input type="text" class="form-control" id="employee-function" name="function" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="employee-date" class="control-label">Data Nascimento:</label>
                                    <input type="date" class="form-control" id="employee-date" name="date_of_birth" required>
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