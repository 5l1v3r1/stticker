@extends("layout.master")

@section("body")

    <nav class="login-top bg-primary">
        <div class="container">
            <div class="col-md-12">
                <a href="{{ route("frontend.home.index") }}"><i class="fa fa-arrow-left"></i> Geri Dön</a>
            </div>
        </div>
    </nav>

    <section class="login">
        <div class="center-block login-box">
            <div class="text-center">
                <img src="http://api.adorable.io/avatars/75/{{ str_random(6) }}" class="img-thumbnail img-circle">
            </div>

            @if($errors->has())
                <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                </div>
            @endif

            {!! Form::open(["route" => "frontend.user.login"]) !!}
                <div class="form-group">
                    {!! Form::email("email", old("email"), ["class" => "form-control form-control-lg", "placeholder" => "E-Posta Adresi"]) !!}
                    {!! Form::password("password", ["class" => "form-control form-control-lg", "placeholder" => "Şifre"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit("Giriş Yap", ["type" => "submit", "class" => "btn btn-primary btn-lg btn-block"]) !!}
                    <a href="{{ route("frontend.user.register") }}" class="btn btn-success-outline btn-block btn-lg">Kayıt Ol</a>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop