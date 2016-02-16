@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">

                    {!! Form::open(["route" => ["backend.order.update", $order->id], "method" => "PUT", "class" => "form-inline text-xs-right"]) !!}

                    <div class="form-group">
                        {!! Form::select("status", [
                            0 => "Ödeme Bekliyor",
                            1 => "Sipariş Alındı",
                            2 => "Kargoda",
                            3 => "Teslim Edildi",
                            4 => "İptal Edildi",
                            5 => "İade",
                        ], $order->status, ["class" => "form-control"]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::button("Güncelle", ["class" => "btn btn-primary", "type" => "submit"]) !!}
                    </div>
                    {!! Form::close() !!}

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
                            <td>{{ $order->code }}</td>
                            <td>{{ $order->created_at->format("d.m.Y - H:i") }}</td>
                            <td class="text-xs-center"><i class="fa fa-try"></i> {{ number_format($order->total + $order->cargo, 2) }}</td>
                            <td class="text-xs-center">
                                @if($order->status == 0)
                                    <span class="label label-danger">Ödeme Bekliyor</span>
                                @elseif($order->status == 1)
                                    <span class="label label-info">Sipariş Alındı</span>
                                @elseif($order->status == 2)
                                    <span class="label label-primary">Kargoda</span>
                                @elseif($order->status == 3)
                                    <span class="label label-success">Teslim Edildi</span>
                                @elseif($order->status == 4)
                                    <span class="label label-danger">İptal Edildi</span>
                                @elseif($order->status == 5)
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
                        @foreach($order->stickers as $sticker)
                        <tr>
                            <td width="10%"><img src="{{ asset($sticker->image) }}" class="img-fluid img-thumbnail"></td>
                            <td>{{ $sticker->name }}</td>
                            <td>
                                @if($sticker->size == "small")
                                    3.00'' x 4.00''
                                @elseif($sticker->size == "middle")
                                    4.1'' x 5.5''
                                @elseif($sticker->size == "big")
                                    6.4'' x 8.5''
                                @elseif($sticker->size == "extra_big")
                                    10.5'' x 14.0''
                                @endif
                            </td>
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