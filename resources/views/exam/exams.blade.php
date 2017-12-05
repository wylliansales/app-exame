@if(!empty($exams))
<table class="table table-hover" style="font-size: 12px">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($exams as $exam)
        <tr>
            <td class="row">{{$exam->id}}</td>
            <td>{{$exam->name}}</td>
            <td>{{$exam->description}}</td>
            <td>{{$exam->price}}</td>
            <td>
                <a href="{{action('ExamController@edit', ['id' => $exam->id])}}" class="link-edit-exam"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                &nbsp;
                <a href="{{action('ExamController@destroy', ['id' => $exam->id])}}"><i class="fa fa-times" aria-hidden="true"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!!$exams->render()!!}
@else
<h3>Não há Médico cadastrado</h3>
@endif

