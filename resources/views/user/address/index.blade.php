@extends("layout.page")

@section("container")
    <section class="addresses">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-block text-xs-center">
                                <h4 class="card-title">Evim</h4>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, facere.
                                </p>
                                <a href="#" class="btn btn-sm btn-danger">Sil</a>
                                <a href="#" class="btn btn-sm btn-info">Düzenle</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-block text-xs-center">
                                <h4 class="card-title">İş Yerim</h4>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, facere.
                                </p>
                                <a href="#" class="btn btn-sm btn-danger">Sil</a>
                                <a href="#" class="btn btn-sm btn-info">Düzenle</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="#" class="card card-block card-new text-xs-center">
                                <div class="card-text">
                                    <i class="fa fa-plus fa-5x"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop