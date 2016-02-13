@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <img src="http://api.adorable.io/avatars/75/demo@demo.com" class="img-thumbnail img-circle">
                                <h4>Eray Aydın</h4>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ad Soyad</label>
                                            <input type="text" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>E-Posta</label>
                                            <input type="email" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Telefon</label>
                                            <input type="phone" class="form-control form-control-lg">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                                <input type="text" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                                <input type="text" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Github</label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-github"></i></span>
                                                <input type="text" class="form-control form-control-lg">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hakkında</label>
                                            <textarea class="form-control form-control-lg"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-block btn-lg">Kaydet <i class="fa fa-save"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop