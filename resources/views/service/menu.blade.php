<div class="no-print">
    <div class="col-md-2">
        <div class="form-group">
            <a href="{{ action('ServiceController@create') }}" class="btn btn-danger btn-block"><i class="fa fa-plus"
                                                                                                   aria-hidden="true"></i>&nbsp;Novo
                Serviço</a>
        </div>
        <div class="list-menu-home">
            <a href="{{action('ServiceController@index')}}"
               class="list-group-item {{($data['subMenu'] == 'all')?'active':''}}">
                <span class="badge">{{$data['qtdAll']}}</span>
                Todos
            </a>
            <a href="{{action('ServiceController@getRecent')}}"
               class="list-group-item {{($data['subMenu'] == 'recent')?'active':''}}">
                <span class="badge">{{$data['qtdRecent']}}</span>
                Recentes
            </a>
            <a href="{{action('ServiceController@getScheduled')}}"
               class="list-group-item {{($data['subMenu'] == 'scheduled')?'active':''}}">
                <span class="badge">{{$data['qtdScheduled']}}</span>
                Agendados
            </a>
            <a href="{{action('ServiceController@getNotFinished')}}"
               class="list-group-item {{($data['subMenu'] == 'notFinished')?'active':''}}">
                <span class="badge">{{$data['qtdNotFinished']}}</span>
                Não Finalizado
            </a>
            <a href="{{action('ServiceController@getFinished')}}"
               class="list-group-item {{($data['subMenu'] == 'finished')?'active':''}}">
                <span class="badge">{{$data['qtdFinished']}}</span>
                Finalizado
            </a>
            <a href="{{action('ServiceController@getCancel')}}"
               class="list-group-item {{($data['subMenu'] == 'cancel')?'active':''}}">
                <span class="badge">{{$data['qtdCancel']}}</span>
                Cancelados
            </a>
        </div>
    </div>
</div>