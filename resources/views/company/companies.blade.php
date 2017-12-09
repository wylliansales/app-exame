@if(!empty($companies))
<table class="table table-condensed table-hover" style="font-size: 12px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Cnpj</th>
        <th>Endereço</th>
        <th>Fone</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($companies as $company)
        <tr>
            <td class="row">{{$company->id}}</td>
            <td>{{$company->name}}</td>
            <td>{{$company->cnpj}}</td>
            <td>{{$company->address}}</td>
            <td>{{$company->phone}}</td>
            <td>
                <a href="{{action('CompanyController@edit', ['id' => $company->id])}}"class="link-edit-company"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                &nbsp;
                <a href="{{action('CompanyController@destroy', ['id' => $company->id])}}"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!!$companies->render()!!}
@else
<h3>Não há empresa cadastrada</h3>
@endif

