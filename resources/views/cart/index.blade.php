@extends("layout.page")

@section("container")
    <section class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route("frontend.home.index") }}"><i class="fa fa-cubes"></i> Stticker</a></li>
                        <li><a href="{{ route("frontend.home.index") }}"><i class="fa fa-home"></i> Anasayfa</a></li>
                        <li class="active"><i class="fa fa-shopping-cart"></i> Sepetim</li>
                    </ol>
                </div>
            </div>
            @if(Cart::count() > 0)
                {!! Form::open(["route" => "frontend.cart.update"]) !!}
                @if(Cart::total() < 10)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <p>Sipariş verebilmek için sepet tutarınız en az <b>10.00</b> <i class="fa fa-try"></i> olmalıdır.</p>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Cart::total() >= 15 && Cart::total() <= 30)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                <p>Sepetinize <b>{{ number_format(30 - Cart::total(), 2) }}</b> <i class="fa fa-try"></i> değerinde ürün ekleyerek kargodan <b>ÜCRETSİZ</b> faydalanabilirsiniz.</p>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-hover table-cart">
                            <thead class="thead-inverse">
                            <tr>
                                <th class="hidden-sm-down"></th>
                                <th>Ürün</th>
                                <th>Boyut</th>
                                <th>Adet</th>
                                <th class="text-xs-center">Fiyat</th>
                                <th class="text-xs-center">Toplam</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $item)
                                <?php $sticker = \App\Sticker::where("slug", $item->options->sticker)->first(); ?>
                                <?php
                                if($item->options->size == "small") {
                                    $number_price = 1.00;
                                } elseif($item->options->size == "middle") {
                                    $number_price = 1.50;
                                } elseif($item->options->size == "big") {
                                    $number_price = 2.00;
                                } elseif($item->options->size == "extra_big") {
                                    $number_price = 2.50;
                                }
                                ?>
                                <tr>
                                    <td class="hidden-sm-down" width="10%"><img src="{{ asset($sticker->image) }}" class="img-fluid img-thumbnail"></td>
                                    <td>{{ $sticker->name }}</td>
                                    <td>
                                        @if($item->options->size == "small")
                                            3.00'' x 4.00''
                                        @elseif($item->options->size == "middle")
                                            4.1'' x 5.5''
                                        @elseif($item->options->size == "big")
                                            6.4'' x 8.5''
                                        @elseif($item->options->size == "extra_big")
                                            10.5'' x 14.0''
                                        @endif
                                    </td>
                                    <td class="quantity">
                                        {!! Form::number("cart[".$item->rowid."]", $item->qty, ["class" => "form-control"]) !!}
                                    </td>
                                    <td class="text-xs-center">
                                        {{ number_format($number_price, 2) }} <i class="fa fa-try"></i>
                                    </td>
                                    <td class="text-xs-center">
                                        {{ number_format($item->price*$item->qty, 2) }} <i class="fa fa-try"></i>
                                    </td>
                                    <td>
                                        <a href="{{ route("frontend.cart.remove", $item->rowid) }}" class="btn btn-danger btn-sm btn-cart-delete"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        {!! Form::submit("Güncelle", ["class" => "btn btn-info btn-block"]) !!}
                    </div>
                    <div class="col-md-4 col-md-offset-6">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Ara Toplam
                                <span class="label label-default label-pill pull-xs-right">{{ number_format(Cart::total(), 2) }} <i class="fa fa-try"></i></span>
                            </li>
                            <li class="list-group-item">
                                Kargo Ücreti
                                <span class="label label-default label-pill pull-xs-right">{{ number_format($cargo, 2) }} <i class="fa fa-try"></i> @if($cargo == 0.00)(Ücretsiz)@endif</span>
                            </li>
                            <li class="list-group-item">
                                Genel Toplam
                                <span class="label label-primary label-pill pull-xs-right">{{ number_format(Cart::total() + $cargo, 2) }} <i class="fa fa-try"></i></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-xs-right">
                        <a href="{{ route("frontend.cart.destroy") }}" class="btn"><i class="fa fa-trash-o"></i> Sepeti Temizle</a>
                        @if(Cart::total() < 10)
                            <a href="javascript:;" data-placement="top" class="btn btn-primary" data-toggle="popover" title="Bilgi" data-content="Sipariş verebilmek için sepet tutarınız en az 10.00 TL olmalıdır.">Sipariş Ver <i class="fa fa-shopping-cart"></i></a>
                        @else
                            <a href="{{ route("frontend.payment.index") }}" class="btn btn-primary">Sipariş Ver <i class="fa fa-shopping-cart"></i></a>
                        @endif
                    </div>
                </div>
                <br>
                {!! Form::close() !!}
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <p>Sepetinizde ürün bulunamadı.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@stop