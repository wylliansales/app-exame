<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">


    <style type="text/css">

        @media print {

            * {
                background: transparent !important;
                color: #000 !important;
                text-shadow: none !important;
                filter: none !important;
                -ms-filter: none !important;
            }

            body {
                margin: 0;
                padding: 0;
                line-height: 1.4em;
                font: 12pt Georgia, "Times New Roman", Times, serif;
                color: #000;
            }

            @page {
                margin: 1.5cm;
            }

            .wrap {
                width: 100%;
                margin: 0;
                float: none !important;
            }

            .no-print, nav, footer, video, audio, object, embed, a, button {
                display: none;
            }

            .print {
                display: block;
            }

            img {
                max-width: 100%;
            }

            aside {
                display: block;
                page-break-before: always;
            }

            h1 {
                font-size: 24pt;
            }

            h2 {
                font-size: 18pt;
            }

            h3 {
                font-size: 14pt;
            }

            p {
                font-size: 12pt;
                widows: 3;
                orphans: 3;
            }

            a, a:visited {
                text-decoration: underline;
            }

            a:link:after, a:visited:after {
                content: " (" attr(href) ") ";
            }

            p a {
                word-wrap: break-word;
            }

            q:after {
                content: " (" attr(cite) ")"
            }

            a:after, a[href^="javascript:"]:after, a[href^="#"]:after {
                content: "";
            }

            .page-break {
                page-break-before: always;
            }

            /*Estilos da Demo*/
            .header.print h1 {
                width: 100%;
                margin-bottom: 0.5cm;
                font-size: 18pt;
            }

            .header.print:after {
                content: "Este artigo foi escrito pela designer Dani Guerrato e retirado do site Tableless.";
            }

            .artigo {
                margin-top: 0;
                border-top: 1px solid #000;
                padding-top: 1cm;
            }

            h1 a:link:after, h1 a:visited:after {
                content: "";
            }
        }
        body{
            /*background: url("{{ asset('/img/fundo.jpg') }}");*/
            background: #343a40;
        }
        .menu-select{
            background: rgba(0,0,0, 0.2);
        }
    </style>


</head>
<body>
<div id="app">
    <nav class="navbar navbar-custom">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav ">
                    &nbsp;@if(isset($menu))
                    <li class="{{($menu == 'home')?'menu-select':''}}"><a href="{{ action('HomeController@index') }}">Home</a></li>
                    <li class="{{($menu == 'service')?'menu-select':''}}"><a href="{{ action('ServiceController@index') }}">Serviços</a></li>
                    <li class="{{($menu == 'company')?'menu-select':''}}"><a href="{{ action('CompanyController@index') }}">Empresas</a></li>
                    <li class="{{($menu == 'employee')?'menu-select':''}}"><a href="{{ action('EmployeeController@index') }}">Funcionários</a></li>
                    <li class="{{($menu == 'doctor')?'menu-select':''}}"><a href="{{ action('DoctorController@index') }}">Médicos</a></li>
                    <li class="{{($menu == 'exam')?'menu-select':''}}"><a href="{{ action('ExamController@index') }}">Exames</a></li>
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li><a href="{{ url('/auth/register') }}">Novo login</a></li>
                                    <li><a href="{{ action('ServiceController@deletes') }}">Deletados</a></li>
                                </ul>
                            </li>
                        @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/app-validacao.js') }}"></script>
<script src="{{ asset('js/prog.js') }}"></script>

<script>
    $(function () {
        var formService = $('#form-service');
        $( "#employee-name-input" ).autocomplete({
            source: '{{ action('EmployeeController@all') }}',
            select: function (event, ui) {
                var item = ui.item.value;
                $.ajax({
                    url: '{{action('EmployeeController@getEmployeeId')}}',
                    data: 'name='+item,
                    success: function (employee) {
                        formService.find('input[name="employee_id"]').val(employee[0].id);
                    }
                })
            }
        });

        $('#doctor-name-input').autocomplete({
            source: '{{action('DoctorController@all')}}',
            select: function (event, ui) {
                var item = ui.item.value;
                $.ajax({
                    url: '{{action('DoctorController@getDoctorId')}}',
                    data: 'name='+item,
                    success: function (doctor) {
                        formService.find('input[name="doctor_id"]').val(doctor[0].id);
                    }
                })
            }
        });

        $('#exam-name-input').autocomplete({
            source: '{{action('ExamController@all')}}',
            select: function (event, ui) {
                var item = ui.item.value;
                $.ajax({
                    url: '{{action('ExamController@getExamId')}}',
                    data: 'name='+item,
                    success: function (exam) {
                        $('#exam_id').val(exam[0].id);
                    }
                })
            }
        });

        $('#company-name-input').autocomplete({
            source: '{{action('CompanyController@all')}}',
            select: function (event, ui) {
                var item = ui.item.value;
                $.ajax({
                    url: '{{action('CompanyController@getCompanyId')}}',
                    data: 'name='+item,
                    success: function (company) {
                        formService.find('input[name="company_id"]').val(company[0].id);
                    }
                })
            }
        });

        $('.button-store-service').click(function () {
            formService.submit();
        })
    })
</script>

</body>
</html>
