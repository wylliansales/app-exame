@if(!empty($searchs))
<table class="table table-hover" style="font-size: 12px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Cnpj</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($searchs as $doctor)
        <tr>
            <td class="row">{{$doctor->id}}</td>
            <td>{{$doctor->name}}</td>
            <td>{{$doctor->crm}}</td>
            <td>
                <a href="{{action('DoctorController@edit', ['id' => $doctor->id])}}" class="link-edit-doctor"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                &nbsp;
                <a href="{{action('DoctorController@destroy', ['id' => $doctor->id])}}"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
<h3>Nenhum registro encotrado para essa consulta</h3>
@endif