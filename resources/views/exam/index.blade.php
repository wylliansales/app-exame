@extends('.layouts.app')<br>
@include('error._check')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">Médicos</div>
            </div>
            <div class="col-md-5">
                <button class="btn btn-primary btn-sm " data-toggle="modal" data-target="#model-store-exam">Novo Exame</button>
            </div>
            <form name="" action="{{action('ExamController@show')}}">
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
                 @if(isset($exams))
                  @include('exam.exams')
                 @else
                  @include('exam.search')
                 @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="model-store-exam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Dados do Exame</h4>
                </div>
                <form name="exam" action="{{action('ExamController@store')}}" method="post">
                <div class="modal-body">

                    <div class="row">

                            {{ csrf_field() }}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exam-name" class="control-label">Nome:</label>
                                    <input type="text" class="form-control" id="exam-name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exam-preco" class="control-label">Preço:</label>
                                    <input type="number" step="0.01" min="0" class="form-control" id="exam-preco" name="price" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="doctor-description" class="control-label">Descrição:</label>
                                    <textarea class="form-control" id="doctor-description" name="description"></textarea>
                                </div>
                            </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

        <div class="modal fade" id="model-edit-exam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Dados do Exame</h4>
                    </div>
                    <form name="examEdit" action="{{action('ExamController@update')}}" method="post">
                    <div class="modal-body">
                        <div class="row">


                                {{ csrf_field() }}
                                <input type="hidden" name="id">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exam-name" class="control-label">Nome:</label>
                                        <input type="text" class="form-control" id="exam-name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exam-preco" class="control-label">Preço:</label>
                                        <input type="number" class="form-control" id="exam-preco" name="price" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exam-description" class="control-label">Descrição:</label>
                                        <textarea class="form-control" id="exam-description" name="description"></textarea>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
@endsection