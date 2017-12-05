@extends('layouts.app')<br>

@section('content')
<div class="container">
    <div class="row">
        <div style="margin-top: 25px">
            @include('service.menu')
        </div>
        <div class="col-md-10">
            <div class="panel panel-default panel-menu">
                    <!-- Default panel contents -->
                    {{--<div class="panel-heading">  </div>--}}
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Detalhes do Exame: {{$service->id}}</h4>

                            </div>
                            <div class="col-md-6">
                                <div class="form-inline pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Mais <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{action('ServiceController@destroy',['id' => $service->id])}}"><i class="fa fa-trash-o fa-fw"></i>&nbsp;Excluir</a></li>
                                            <li><a href="#"><i class="fa fa-print fa-fw"></i>&nbsp;Imprimir</a></li>
                                            <li><a href="{{action('ServiceController@edit',['id'=> $service->id])}}"><i class="fa fa-pencil fa-fw"></i>&nbsp;Editar</a></li>
                                        </ul>
                                    </div>
                                    <a href="" class="btn btn-success">Finalizar</a>
                                    <a href="" class="btn btn-default"><i class="fa fa-ban fa-fw"></i>Cancelar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="panel panel-default" style="margin-top: 10px" >
                                <div class="panel-body">
                                    <p><strong>Nome:</strong> {{$service->employee->name}}</p>
                                    <p><strong>Empresa:</strong> {{$service->company->name}}</p>
                                    <p><strong>Médico:</strong> {{$service->doctor->name}}</p>
                                </div>
                                <div class="panel-footer">
                                    @if(!empty($service->services_has_exams) && count($service->services_has_exams) > 0)
                                   <table class="table table-bordered">
                                       <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Valor</th>
                                        </tr>
                                       </thead>

                                       <tbody>
                                           <?php $total=0; ?>
                                           @foreach($service->services_has_exams as $exam)
                                                <tr>
                                                    <td>{{$exam->exam->name}}</td>
                                                    <td>R$ {{$exam->exam->price}}</td>
                                                </tr>
                                               <?php $total +=  $exam->exam->price;?>
                                           @endforeach
                                       </tbody>
                                       <tfoot>
                                           <th><span class="pull-right">Total</span></th>
                                           <th>R$ {{$total}}</th>
                                       </tfoot>
                                   </table>
                                    @else
                                        <p class="text-center">Não há exame vinculado</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
