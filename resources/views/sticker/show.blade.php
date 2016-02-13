@extends("layout.master")

@section("body")
    <section class="sticker-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-cubes"></i> Stticker</a></li>
                        <li><a href="#"><i class="fa fa-home"></i> Anasayfa</a></li>
                        <li><a href="#"><i class="fa fa-code"></i> Yazılım</a></li>
                        <li class="active">AngularJS</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <img src="http://devstickers.com/assets/img/cat/angularjs.png" class="img-fluid img-thumbnail">
                </div>
                <div class="col-md-5">
                    <h2>AngularJS</h2>
                    <h3><a href="#">Yazılım</a></h3>
                    <form>
                        <div class="form-group">
                            <div class="input-group">
                                <label for="size" class="input-group-addon bg-primary"><i class="fa fa-crop"></i> Boyut</label>
                                <select id="size" class="form-control">
                                    <option>Küçük (3.0'' x 4.0'')</option>
                                    <option>Orta (4.1'' x 5.5'')</option>
                                    <option>Büyük (6.4'' x 8.5'')</option>
                                    <option>Çok Büyük (10.5'' x 14.0'')</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <label for="quantity" class="input-group-addon bg-primary"><i class="fa fa-archive"></i> Adeti</label>
                                <input id="quantity" type="number" class="form-control" value="1">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">Sepete Ekle <i class="fa fa-shopping-basket"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="card text-xs-center">
                            <div class="card-header">
                                <i class="fa fa-truck fa-flip-horizontal"></i> <b>Türkiye</b> için Kargo
                            </div>
                            <div class="card-block">
                                <p class="text-center">
                                    2-3 gün kargo süresi (<b>Express</b>)<br>
                                    3-5 gün kargo süresi (<b>Normal</b>)
                                </p>
                            </div>
                        </div>
                    </form>
                    <div class="card">
                        <div class="card-header text-xs-center">
                            Sosyal Ağda Paylaş
                        </div>
                        <div class="card-block">
                            <div class="btn-group text-xs-center" role="group" aria-label="Sosyal Ağda Paylaş">
                                <a href="#" target="_blank" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank" class="btn btn-social btn-google"><i class="fa fa-google-plus"></i></a>
                                <a href="#" target="_blank" class="btn btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
                                <a href="#" target="_blank" class="btn btn-social btn-tumblr"><i class="fa fa-tumblr"></i></a>
                                <a href="#" target="_blank" class="btn btn-social btn-vk"><i class="fa fa-vk"></i></a>
                                <a href="#" target="_blank" class="btn btn-social btn-reddit"><i class="fa fa-reddit"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-xs-center">
                            Benzer Stickerlar
                        </div>
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="#" class="card card-inverse sticker">
                                        <img class="card-img-top img-fluid" src="http://devstickers.com/assets/img/cat/php.png" alt="Card image cap">
                                        <div class="card-img-overlay">
                                            <h4 class="card-title text-center">PHP</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="card card-inverse sticker">
                                        <img class="card-img-top img-fluid" src="http://devstickers.com/assets/img/cat/php.png" alt="Card image cap">
                                        <div class="card-img-overlay">
                                            <h4 class="card-title text-center">PHP</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="card card-inverse sticker">
                                        <img class="card-img-top img-fluid" src="http://devstickers.com/assets/img/cat/php.png" alt="Card image cap">
                                        <div class="card-img-overlay">
                                            <h4 class="card-title text-center">PHP</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="card card-inverse sticker">
                                        <img class="card-img-top img-fluid" src="http://devstickers.com/assets/img/cat/php.png" alt="Card image cap">
                                        <div class="card-img-overlay">
                                            <h4 class="card-title text-center">PHP</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="card card-inverse sticker">
                                        <img class="card-img-top img-fluid" src="http://devstickers.com/assets/img/cat/php.png" alt="Card image cap">
                                        <div class="card-img-overlay">
                                            <h4 class="card-title text-center">PHP</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="card card-inverse sticker">
                                        <img class="card-img-top img-fluid" src="http://devstickers.com/assets/img/cat/php.png" alt="Card image cap">
                                        <div class="card-img-overlay">
                                            <h4 class="card-title text-center">PHP</h4>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop