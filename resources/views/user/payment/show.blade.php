@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">

                    <h3>Sipariş Detayı</h3>

                    <table class="table table-striped table-middle">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Sipariş Kodu</th>
                            <th>Sipariş Tarihi</th>
                            <th class="text-xs-center"><i class="fa fa-try"></i></th>
                            <th class="text-xs-center"><i class="fa fa-tasks"></i></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>IST01</td>
                            <td>13.02.2016 - 05:03</td>
                            <td class="text-xs-center"><i class="fa fa-try"></i> 30.00</td>
                            <td class="text-xs-center">
                                <span class="label label-info">Kargoda</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <h3>Ürünler</h3>

                    <table class="table table-striped table-hover table-cart table-middle">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Ürün</th>
                            <th>Boyut</th>
                            <th>Adet</th>
                            <th class="text-xs-center">Fiyat</th>
                            <th class="text-xs-center">Toplam</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td width="10%"><img src="http://devstickers.com/assets/img/cat/php.png" class="img-fluid img-thumbnail"></td>
                            <td>PHP</td>
                            <td>3.00'' x 4.00''</td>
                            <td width="8%">3 Adet</td>
                            <td class="text-xs-center">10.00 <i class="fa fa-try"></i></td>
                            <td class="text-xs-center">30.00 <i class="fa fa-try"></i></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop