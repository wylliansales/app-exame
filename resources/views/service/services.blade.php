<div class="panel-body"> <!-- Table -->
    <table id="table-service-recentes" class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Funcionário</th>
            <th>Empresa</th>
            <th>Médico</th>
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
                <td>{{$service->employee->name}}</td>
                <td>{{$service->company->name}}</td>
                <td>{{$service->doctor->name}}</td>
                <td>
                    @foreach($service->services_has_exams as $exam)
                        {{$exam->exam->name}} &nbsp; R$ {{$exam->exam->price}} <br>
                       <?php $total +=  $exam->exam->price; ?>
                    @endforeach
                </td>
                <td>R$ {{$total}}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!!$services->render()!!}
</div>
