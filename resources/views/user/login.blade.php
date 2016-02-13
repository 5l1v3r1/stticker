@extends("layout.master")

@section("body")

    <nav class="login-top bg-primary">
        <div class="container">
            <div class="col-md-12">
                <a href="#"><i class="fa fa-arrow-left"></i> Geri Dön</a>
            </div>
        </div>
    </nav>

    <section class="login">
        <div class="center-block login-box">
            <div class="text-center">
                <img src="http://api.adorable.io/avatars/75/{{ str_random(6) }}" class="img-thumbnail img-circle">
            </div>
            <form class="form-horizontal">
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" placeholder="E-Posta Adresi">
                    <input type="password" class="form-control form-control-lg" placeholder="Şifre">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Giriş Yap</button>
                    <a href="#" class="btn btn-success-outline btn-block btn-lg">Kayıt Ol</a>
                </div>
            </form>
        </div>
    </section>
@stop