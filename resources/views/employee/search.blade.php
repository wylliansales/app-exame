@if(!empty($searchs))
<table class="table table-condensed table-hover" style="font-size: 12px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Função</th>
        <th>Data Nasc</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($searchs as $employee)
        <tr>
            <td class="row">{{$employee->id}}</td>
            <td>{{$employee->name}}</td>
            <td>{{$employee->function}}</td>
            <td>{{Carbon\Carbon::parse($employee->date_of_birth)->format('d/m/Y')}}</td>
            <td>
                <a href="{{action('EmployeeController@edit', ['id' => $employee->id])}}"class="link-edit-employee"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                &nbsp;
                <a href="{{action('EmployeeController@destroy', ['id' => $employee->id])}}"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@else
<h3>Nenhum registro encontrato</h3>
@endif