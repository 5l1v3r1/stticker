@extends("layout.page")

@section("container")
    <section class="payment">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-cubes"></i> Stticker</a></li>
                        <li><a href="#"><i class="fa fa-home"></i> Anasayfa</a></li>
                        <li><a href="#"><i class="fa fa-shopping-cart"></i> Sepetim</a></li>
                        <li class="active"><i class="fa fa-try"></i> Sipariş</li>
                    </ol>
                </div>
            </div>
            <form>
            <div class="row">
                <div class="col-md-6">
                    <h3>Sipariş Bilgileri</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ad</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Soyad</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-Posta</label>
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telefon</label>
                                <input type="phone" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Şehir</label>
                                <select class="form-control">
                                    <option>Şehir Seçiniz</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>İlçe / Semt</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Posta Kodu</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Adres</label>
                                <textarea rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Sipariş Notu</label>
                                <textarea rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="c-input c-checkbox">
                                    <input type="checkbox" checked>
                                    <span class="c-indicator"></span>
                                    Kargo bilgilerini sonraki alışverişlerim için kaydet.
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Siparişiniz</h4>
                            <table class="table table-striped">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>Ürün</th>
                                    <th>Toplam</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>PHP(3.00'' x 4.00'') <b>x 3</b></td>
                                    <td>5.00 <i class="fa fa-try"></i></td>
                                    <td><button class="btn btn-secondary-outline btn-sm"><i class="fa fa-trash-o"></i></button></td>
                                </tr>
                                <tr>
                                    <td>PHP(3.00'' x 4.00'') <b>x 3</b></td>
                                    <td>5.00 <i class="fa fa-try"></i></td>
                                    <td><button class="btn btn-secondary-outline btn-sm"><i class="fa fa-trash-o"></i></button></td>
                                </tr>
                                <tr>
                                    <td>PHP(3.00'' x 4.00'') <b>x 3</b></td>
                                    <td>5.00 <i class="fa fa-try"></i></td>
                                    <td><button class="btn btn-secondary-outline btn-sm"><i class="fa fa-trash-o"></i></button></td>
                                </tr>
                                <tr>
                                    <td>PHP(3.00'' x 4.00'') <b>x 3</b></td>
                                    <td>5.00 <i class="fa fa-try"></i></td>
                                    <td><button class="btn btn-secondary-outline btn-sm"><i class="fa fa-trash-o"></i></button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Ara Toplam
                                <span class="label label-default label-pill pull-xs-right">30.00 <i class="fa fa-try"></i></span>
                            </li>
                            <li class="list-group-item">
                                Kargo Ücreti
                                <span class="label label-default label-pill pull-xs-right">5.00 <i class="fa fa-try"></i></span>
                            </li>
                            <li class="list-group-item">
                                Genel Toplam
                                <span class="label label-primary label-pill pull-xs-right">35.00 <i class="fa fa-try"></i></span>
                            </li>
                        </ul>
                        <div class="card-block">
                            <div class="form-group">
                                <label class="c-input c-radio">
                                    <input name="payment" value="bank" type="radio" checked>
                                    <span class="c-indicator"></span>
                                    Banka Havalesi
                                </label>
                            </div>
                            <div id="bank">
                                <div class="alert alert-info">
                                    <p>Ödemeyi bilgileri verilen Banka Hesabımıza yatırın. Lütfen ilgili Sipariş Numarasını havale dekontunun açıklama kısmına yazınız. Siparişiniz banka havalesi onaylanmadıkça işleme alınmayacaktır.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="c-input c-radio">
                                    <input name="payment" value="paypal" type="radio">
                                    <span class="c-indicator"></span>
                                    Paypal ile Ödeme
                                </label>
                            </div>
                            <div id="paypal">
                                <div class="alert alert-info">
                                    <p>PayPal aracılığıyla ödemede PayPal hesabınız yoksa bile kredi kartı ile ödeme yapabilirsiniz.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-block text-xs-right">
                            <a href="#" class="card-link btn btn-primary btn-xs">Siparişi Onayla <i class="fa fa-try"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </section>
@stop