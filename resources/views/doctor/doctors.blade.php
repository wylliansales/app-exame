@if(!empty($doctors))
<table class="table table-hover" style="font-size: 12px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CRM</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($doctors as $doctor)
        <tr>
            <td class="row">{{$doctor->id}}</td>
            <td>{{$doctor->name}}</td>
            <td>{{$doctor->crm}}</td>
            <td>
                <a href="{{action('DoctorController@edit', ['id' => $doctor->id])}}"class="link-edit-doctor"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                &nbsp;
                <a href="{{action('DoctorController@destroy', ['id' => $doctor->id])}}"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!!$doctors->render()!!}
@else
<h3>Não há Médico cadastrado</h3>
@endif

