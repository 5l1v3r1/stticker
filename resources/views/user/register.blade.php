@extends("layout.master")

@section("body")

    <nav class="register-top bg-primary">
        <div class="container">
            <div class="col-md-12">
                <a href="{{ route("frontend.home.index") }}"><i class="fa fa-arrow-left"></i> Geri Dön</a>
            </div>
        </div>
    </nav>

    <section class="register">
        <div class="center-block register-box">
            <div class="text-center">
                <img src="http://api.adorable.io/avatars/75/{{ str_random(6) }}" class="img-thumbnail img-circle">
                <h4>Diğer <b>{{ \App\User::count() }}</b> üyemiz gibi, sen de aramıza katıl!</h4>
            </div>

            @if($errors->has())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {!! Form::open(["route" => "frontend.user.register"]) !!}
                <div class="form-group">
                    {!! Form::email("email", old("email"), ["class" => "form-control form-control-lg", "placeholder" => "E-Posta Adresi"]) !!}
                    {!! Form::password("password", ["class" => "form-control form-control-lg", "placeholder" => "Şifre"]) !!}
                    {!! Form::password("password_confirmation", ["class" => "form-control form-control-lg", "placeholder" => "Şifre Tekrarı"]) !!}
                </div>
                <div class="form-group">
                    {!! Form::button("Kayıt Ol", ["type" => "submit", "class" => "btn btn-success btn-lg btn-block"]) !!}
                    <a href="{{ route("frontend.user.login") }}" class="btn btn-primary-outline btn-block btn-lg">Giriş Yap</a>
                </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop