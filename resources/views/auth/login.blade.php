
@extends('layouts.head')

@section('content')
<div class="container" style="margin-top:90px;">
    <div class="row justify-content-md-center">
        <div class="col-md-5">
            <div class="card" style="background: rgba(20, 18, 29, 0.2); color: white;">

                <h3 class="text-center" style="margin-top: 25px;"><i class="fa fa-user-circle-o fa-4x"></i></h3>

                <div class="card-body" style="margin-top: 19px; padding: 25px;">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            {{--<label for="email" class="col-md-12 control-label">E-Mail</label>--}}

                            <div class="col-md-12">
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Seu Email" required autofocus>
                                </div>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-12 control-label"></label>

                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Senha" required>
                                </div>


                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Relembrar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp;
                                    Entrar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
