@extends('layouts.app')<br>

@section('content')
<div class="container">
    <div class="row">
        <div style="margin-top: 25px">
            @include('service.menu')
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Busca Avançada
                        </a>
                    </h4>
                </div>
               <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="{{action('ServiceController@seach')}}" method="get">
                                    <div class="form-inline">
                                        <input type="date" class="form-control" name="start_date">
                                        à
                                        <input type="date" class="form-control" name="stop_date">                                        &nbsp;
                                        &nbsp;
                                        <input type="text" id="company-name-search" class="form-control" name="company" placeholder="Empresa">                                        &nbsp;
                                        &nbsp;
                                        <input type="text" id="employee-name-search" class="form-control" name="employee" placeholder="Funcionário">
                                        &nbsp;
                                        <button type="submit" class="btn btn-success">Buscar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default panel-menu">
                <!-- Default panel contents -->
                {{--<div class="panel-heading">Exames</div>--}}
                @if(isset($services))
                    @include('service.services')
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
