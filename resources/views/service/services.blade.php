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
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <?php $total = 0 ?>
            <tr onclick="location.href = '{{action('ServiceController@show', ['id'=> $service->id])}}';" style="cursor: hand;">
                <td class="row">{{$service->id}}</td>
                <td>
                    {{$service->employee->name}}
                    @if($service->status == 1)
                        <span class="label label-danger pull-right">Finalizado</span>
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
                </td>
                <td>R$ {{number_format($total,2)}}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    @if($data['subMenu'] == 'all' || $data['subMenu'] == 'finished' || $data['subMenu'] == 'cancel')
    {!!$services->render()!!}
    @endif
</div>
