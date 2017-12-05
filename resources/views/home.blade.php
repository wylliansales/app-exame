@extends('layouts.app')<br>

@section('content')
<div class="container">
    <div class="row">
        <div style="margin-top: 25px"><div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Serviços
                </div>
            </div>
                <div class="list-menu-home">
                    <a href="#" class="list-group-item">
                        <span class="badge">14</span>
                        Recentes
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="badge">9</span>
                        Iniciado
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="badge">2</span>
                        Finalizado
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="badge">1</span>
                        Cancelados
                    </a>
                </div>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default panel-menu">
                <!-- Default panel contents -->
                <div class="panel-heading">Panel heading</div>

               <div class="panel-body"> <!-- Table -->
                   <table id="table-service-recentes" class="table table-hove">
                       <thead>
                       <tr>
                           <th>ID</th>
                           <th>Nome</th>
                           <th>Função</th>
                           <th>Data Nasc</th><th>Função</th>
                           <th>Data Nasc</th><th>Função</th>
                           <th>Data Nasc</th>
                           <th></th>
                       </tr>
                       </thead>
                       <tbody>
                       <tr>
                           <td class="row"></td>
                           <td>aaa</td>
                           <td>aaaaaa</td>
                           <td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td>
                       </tr>
                       <tr>
                           <td class="row"></td>
                           <td>aaa</td>
                           <td>aaaaaa</td>
                           <td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td>
                       </tr>
                       <tr>
                           <td class="row"></td>
                           <td>aaa</td>
                           <td>aaaaaa</td>
                           <td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td>
                       </tr>
                       <tr>
                           <td class="row"></td>
                           <td>aaa</td>
                           <td>aaaaaa</td>
                           <td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td>
                       </tr>
                       <tr>
                           <td class="row"></td>
                           <td>aaa</td>
                           <td>aaaaaa</td>
                           <td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td><td>aaaaa</td>
                           <td>aaaaaaaa</td>
                       </tr>
                       </tbody>
                   </table>
               </div>

            </div>
        </div>

    </div>
</div>
@endsection
