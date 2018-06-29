<!DOCTYPE html>
<html dir="ltr" lang="ja">
    <head>
        <title>福岡・ラオス友好協会 | Fukuoka-Laos Friendship Association | Admin | Login</title>
        <meta name="" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=yes, maximum-scale=1.0, minimum-scale=1.0"><!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('admin.partials._stylesheets')
    </head>
    <body>
        @include('admin.partials._preloader')
        <div id="main-wrapper">
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
                <div class="auth-box bg-dark border-top border-secondary">
                    <div id="loginform">
                        <div class="text-center p-t-20 p-b-20">
                            <span class="db"><strong><h1>福岡・ラオス友好協会</h1></strong></span>
                        </div>
                        <!-- Form -->
                        <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="row p-b-30">
                                <div class="col-12">

                                    @if ($errors->has('email'))
                                        <p class="text-danger help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </p> 
                                    @endif
                                    <div class="input-group mb-3 {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="email">
                                    </div>
                                    
                                    @if ($errors->has('password'))
                                        <p class="text-danger help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </p>
                                    @endif
                                    <div class="input-group mb-3 {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                        </div>
                                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top border-secondary">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="p-t-20">
                                            <button class="btn btn-success btn-block float-right" type="submit">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials._javascripts')
    </body>
</html>





