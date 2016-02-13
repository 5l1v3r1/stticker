@extends("layout.master")

@section("body")

    <nav class="register-top bg-primary">
        <div class="container">
            <div class="col-md-12">
                <a href="#"><i class="fa fa-arrow-left"></i> Geri Dön</a>
            </div>
        </div>
    </nav>

    <section class="register">
        <div class="center-block register-box">
            <div class="text-center">
                <img src="http://api.adorable.io/avatars/75/{{ str_random(6) }}" class="img-thumbnail img-circle">
                <h4>Diğer <b>600</b> üyemiz gibi, sen de aramıza katıl!</h4>
            </div>
            <form class="form-horizontal">
                <div class="form-group">
                    <input type="email" class="form-control form-control-lg" placeholder="E-Posta Adresi">
                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Şifre">
                    <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Şifre Tekrarı">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Kayıt Ol</button>
                    <a href="#" class="btn btn-primary-outline btn-block btn-lg">Giriş Yap</a>
                </div>
            </form>
        </div>
    </section>
@stop