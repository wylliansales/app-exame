@extends('.layouts.app')<br>
@include('error._check')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">Empresas Cadastradas</div>
            </div>
            <div class="col-md-5">
                <button class="btn btn-primary btn-sm " data-toggle="modal" data-target="#model-store-company">Nova Empresa</button>
            </div>
            <form name="" action="{{action('CompanyController@show')}}">
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
                 @if(isset($companies))
                  @include('company.companies')
                 @else
                  @include('company.search')
                 @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="model-store-company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Dados da Empresa</h4>
                </div>
                <form name="company" action="{{action('CompanyController@store')}}" method="post">
                <div class="modal-body">
                    <div class="row">

                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="company-name" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" id="company-name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company-cnpj" class="control-label">Cnpj:</label>
                                    <input type="text" class="form-control" id="company-cnpj" name="cnpj"
                                    onblur="ValidarCNPJ(company.cnpj)" maxlength="18" onkeypress="MascaraCNPJ(company.cnpj)" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company-phone" class="control-label">Telefone:</label>
                                    <input type="text" class="form-control" id="company-phone" name="phone"
                                    onkeypress="MascaraTelefone(company.phone)"maxlength="15">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="company-address" class="control-label">Endereço:</label>
                                    <textarea class="form-control" id="company-address" name="address"></textarea>
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

        <div class="modal fade" id="model-edit-company" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Dados da Empresa</h4>
                    </div>
                    <form name="companyEdit" action="{{action('CompanyController@update')}}" method="post">
                    <div class="modal-body">
                        <div class="row">

                                {{ csrf_field() }}
                                <input type="hidden" class="form-control" id="company-name" name="id">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company-name" class="control-label">Nome:</label>
                                        <input type="text" class="form-control" id="company-name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company-cnpj" class="control-label">Cnpj:</label>
                                        <input type="text" class="form-control" id="company-cnpj" name="cnpj"
                                               onblur="ValidarCNPJ(companyEdit.cnpj)" maxlength="18" onkeypress="MascaraCNPJ(companyEdit.cnpj)" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company-phone" class="control-label">Telefone:</label>
                                        <input type="text" class="form-control" id="company-phone" name="phone"
                                               onkeypress="MascaraTelefone(companyEdit.phone)"maxlength="15">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="company-address" class="control-label">Endereço:</label>
                                        <textarea class="form-control" id="company-address" name="address"></textarea>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary button-edit-company">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
@endsection