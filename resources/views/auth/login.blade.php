<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Great Greenhouse - Login</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap/bootstrap.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/home/geral.css')}}" rel="stylesheet">
    <link href="{{asset('css/home/login.css')}}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="Absolute-Center is-Responsive">
            <div id="logo-container"></div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title" id="panelTitle">Great Greenhouse</h1>
                </div>
                <div class="panel-body">
                    <div class="col-sm-12 col-md-10 col-md-offset-1">
                        <div id="loginText">
                            <span>Entre na sua conta</span> <span>Ou</span>
                            <a href="/register">
                                <button class="btn btn-xs btn-primary " type="submit">Registe-se</button>
                            </a>
                            <hr>
                        </div>
                        <form method="POST" id="loginForm" action="/authentication/auth">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span></span>
                                <input class="form-control" type="text" name='nome' placeholder="nome de utilizador"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

                                <input class="form-control" type="password" name='palavra-passe' placeholder="palavra-passe"/>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> <span>Lembra-me</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-block">Entrar</button>
                            </div>
                            @if (Session::has('errors'))
                                <br>
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors as $error)

                                            <li>{{ $error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group text-center">
                                <hr>
                                <a href="#">Esqueceu-se da Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{asset('js/jquery/jquery-2.1.4.js')}}"></script>
<script src="{{asset('js/angular/angular.js')}}"></script>
<script src="{{asset('js/bootstrap/bootstrap.js')}}"></script>
</html>