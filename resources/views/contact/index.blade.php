@extends("layout.page")

@section("container")
    <section class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">İletişim</h2>
                    <div class="text-justify page-content center-block">
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mesajınız</label>
                                        <textarea class="form-control form-control-lg" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Gönder <i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop