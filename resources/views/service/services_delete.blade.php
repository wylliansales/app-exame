@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">Serviços Excluídos</div>
            </div>
        </div>

        <div class="row" style="margin-top: 10px;">
            <div class="panel panel-default">

                <div class="panel-body"> <!-- Table -->
                    <div id="service-print">
                        <table id="table-service-recentes" class="table table-hover">
                            <thead>
                            <tr>
                                <th>Funcionário</th>
                                <th>Empresa</th>
                                <th>Médico</th>
                                <th>Obs</th>
                                <th>Data da exclusão</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(!empty($services))
                                @foreach($services as $service)
                                    <tr class="alert alert-danger">
                                        <td>{{$service->employee}}</td>
                                        <td>{{$service->company}}</td>
                                        <td>{{$service->doctor}}</td>
                                        <td>{{$service->description}}</td>
                                        <td>{{$service->created_at}}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
