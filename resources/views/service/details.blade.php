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
                                    <a href="{{action('ServiceController@cancel', ['id'=>$service->id])}}" class="btn btn-success" data-toggle="modal" data-target="#modal-finished">Finalizar</a>
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
                                           <?php $total = 0; ?>
                                           @foreach($service->services_has_exams as $exam)
                                                <tr>
                                                    <td>{{$exam->exam->name}}</td>
                                                    <td>R$ {{$exam->price}}</td>
                                                </tr>
                                               <?php $total +=  $exam->price;?>
                                           @endforeach
                                       </tbody>
                                       <tfoot>
                                           <th><span class="pull-right">Total</span></th>
                                           <th>R$ {{number_format($total,2) }}</th>
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
<div class="modal fade" tabindex="-1" role="dialog" id="modal-finished">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Observações do Serviço</h4>
            </div>
            <form action="{{action('ServiceController@finished')}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$service->id}}">
            <div class="modal-body">
                <p>Campo não obrigatório&hellip;</p>
                <div class="form-group">

                    <textarea class="form-control" id="" cols="10" rows="5" name="observation"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
