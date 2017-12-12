<div class="panel-body"> <!-- Table -->
 <div id="service-print">   
    <table id="table-service-recentes" class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Funcionário</th>
            <th>Empresa</th>
            <th>Médico</th>
            <th>Data/Hora</th>
            <th>Exames</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php $totalGeral = 0; ?>
        @foreach($services as $service)
            <?php $total = 0; ?>
            <tr onclick="location.href = '{{action('ServiceController@show', ['id'=> $service->id])}}';" style="cursor: hand;">
                <td class="row">{{$service->id}}</td>
                <td>
                    {{$service->employee->name}}
                    @if($service->status == 1)
                        <span class="label label-success pull-right">Finalizado</span>
                    @elseif($service->status == 0 && $service->exam_date > date('Y-m-d'))
                        <span class="label label-primary pull-right">Agendado</span>
                    @elseif($service->status == 2)
                        <span class="label label-default pull-right">Cancelado</span>
                    @elseif($service->status == 0 && $service->exam_date < date('Y-m-d'))
                        <span class="label label-danger pull-right">Não Finalizado</span>
                    @endif
                </td>
                <td>{{$service->company->name}}</td>
                <td>{{$service->doctor->name}}</td>
                <td>{{ Carbon\Carbon::parse($service->exam_date)->format('d/m/Y')}} - {{$service->start_time}}</td>
                <td>
                    @foreach($service->services_has_exams as $exam)
                        {{$exam->exam->name}} &nbsp; R$ {{$exam->price}} <br>
                       <?php $total +=  $exam->price; ?>
                    @endforeach
                    <?php $totalGeral += $total; ?>
                </td>
                <td>R$ {{number_format($total,2)}}</td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <th></th>
        <th><strong>Total de registros: {{count($services)}}</strong></th>
        <th></th>
        <th></th>
        <th></th>
        <th><strong class="pull-right">Total geral:</strong> </th>
        <th><strong>R$ {{number_format($totalGeral,2)}}</strong></th>
        </tfoot>
    </table>
    </div>




    @if($data['subMenu'] == 'all' || $data['subMenu'] == 'finished' || $data['subMenu'] == 'cancel')
    {!!$services->render()!!}
    @endif

</div>
