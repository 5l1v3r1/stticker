@extends("layout.page")

@section("title") Sipariş: {{ $payment->code }} @stop

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    @if($payment->status == 0)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-success text-xs-center">
                                    <p>Siparişiniz ödeme beklemektedir.</p>
                                    <p><a href="#" class="btn btn-success"><i class="fa fa-paypal"></i> Paypal ile Ödeme</a></p>
                                </div>
                                @if($payment->payment_type == "bank")
                                <div class="alert alert-info text-xs-center">
                                    <h3>Banka Bilgileri</h3>
                                    <p>{{ Settings::get("bank") }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    @endif
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
                            <td>{{ $payment->code }}</td>
                            <td>{{ $payment->created_at->format("d.m.Y - H:i") }}</td>
                            <td class="text-xs-center"><i class="fa fa-try"></i> {{ number_format($payment->total + $payment->cargo, 2) }}</td>
                            <td class="text-xs-center">
                                @if($payment->status == 0)
                                    <span class="label label-danger">Ödeme Bekliyor</span>
                                @elseif($payment->status == 1)
                                    <span class="label label-info">Sipariş Alındı</span>
                                @elseif($payment->status == 2)
                                    <span class="label label-primary">Kargoda</span>
                                @elseif($payment->status == 3)
                                    <span class="label label-success">Teslim Edildi</span>
                                @elseif($payment->status == 4)
                                    <span class="label label-danger">İptal Edildi</span>
                                @elseif($payment->status == 5)
                                    <span class="label label-warning">İade</span>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <h3>Ürünler</h3>

                    <table class="table table-striped table-hover table-cart table-middle">
                        <thead class="thead-inverse">
                        <tr>
                            <th></th>
                            <th>Ürün</th>
                            <th>Boyut</th>
                            <th>Adet</th>
                            <th class="text-xs-center">Fiyat</th>
                            <th class="text-xs-center">Toplam</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payment->stickers as $sticker)
                        <tr>
                            <td width="10%"><img src="{{ asset($sticker->image) }}" class="img-fluid img-thumbnail"></td>
                            <td>{{ $sticker->name }}</td>
                            <td>{{ $sticker->size }}</td>
                            <td class="quantity">{{ $sticker->quantity }} Adet</td>
                            <td class="text-xs-center">{{ number_format($sticker->price/$sticker->quantity, 2) }} <i class="fa fa-try"></i></td>
                            <td class="text-xs-center">{{ number_format($sticker->price, 2) }} <i class="fa fa-try"></i></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop