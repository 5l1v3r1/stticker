@extends("layout.master")

@section("body")
    <section class="sticker-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-cubes"></i> Stticker</a></li>
                        <li><a href="#"><i class="fa fa-home"></i> Anasayfa</a></li>
                        <li class="active"><i class="fa fa-shopping-cart"></i> Sepetim</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-hover table-cart">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th></th>
                            <th>Ürün</th>
                            <th>Boyut</th>
                            <th>Adet</th>
                            <th class="text-xs-center">Fiyat</th>
                            <th class="text-xs-center">Toplam</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td width="10%"><img src="http://devstickers.com/assets/img/cat/php.png" class="img-fluid img-thumbnail"></td>
                            <td>PHP</td>
                            <td>3.00'' x 4.00''</td>
                            <td width="8%"><input type="number" value="10" class="form-control"></td>
                            <td class="text-xs-center">10.00 <i class="fa fa-try"></i></td>
                            <td class="text-xs-center">30.00 <i class="fa fa-try"></i></td>
                            <td><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-8">
                    <ul class="list-group">
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
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12 text-xs-right">
                    <a href="#" class="btn"><i class="fa fa-trash-o"></i> Sepeti Temizle</a>
                    <a href="#" class="btn btn-primary">Sipariş Ver <i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
            <br>
        </div>
    </section>
@stop