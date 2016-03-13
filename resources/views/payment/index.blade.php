@extends("layout.page")

@section("title") Sipariş @stop

@section("container")
    <section class="payment">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route("frontend.home.index") }}"><i class="fa fa-cubes"></i> Stticker</a></li>
                        <li><a href="{{ route("frontend.home.index") }}"><i class="fa fa-home"></i> Anasayfa</a></li>
                        <li><a href="{{ route("frontend.cart.index") }}"><i class="fa fa-shopping-cart"></i> Sepetim</a></li>
                        <li class="active"><i class="fa fa-try"></i> Sipariş</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if($errors->has())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            {!! Form::open(["route" => "frontend.payment.store"]) !!}
            <div class="row">
                <div class="col-md-6">
                    <h3>Sipariş Bilgileri</h3>
                    <div class="row">
                        @if(auth()->check())
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label("my_address", "Adreslerim") !!}
                                    {!! Form::select("my_address", [0 => "- Yeni Adres -"] + \App\UserAddress::lists("name", "id")->toArray(), old("my_address"), ["class" => "form-control", "data-url" => route("frontend.user.address.show")]) !!}
                                </div>
                            </div>
                        @endif
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label("name", "Ad Soyad") !!}
                                {!! Form::text("name", auth()->check() ? auth()->user()->name : null, ["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label("email", "E-Posta") !!}
                                {!! Form::email("email", auth()->check() ? auth()->user()->email : null, ["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label("phone", "Telefon") !!}
                                {!! Form::text("phone", auth()->check() ? auth()->user()->phone : null, ["class" => "form-control", "type" => "phone"]) !!}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label("city_id", "Şehir") !!}
                                {!! Form::select("city_id", [0 => "Şehir Seçiniz"] + \App\City::lists("name", "id")->toArray(), old("city_id"), ["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label("town", "İlçe / Semt") !!}
                                {!! Form::text("town", old("town"), ["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label("zipcode", "Posta Kodu") !!}
                                {!! Form::text("zipcode", old("zipcode"), ["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label("address", "Adres") !!}
                                {!! Form::textarea("address", old("address"), ["class" => "form-control", "rows" => 3]) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label("notes", "Sipariş Notu") !!}
                                {!! Form::textarea("notes", old("notes"), ["class" => "form-control", "rows" => 3]) !!}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="c-input c-checkbox">
                                    {!! Form::checkbox("remember", true, old("remember") ? true : false, ["id" => "remember"]) !!}
                                    <span class="c-indicator"></span>
                                    Kargo bilgilerini sonraki alışverişlerim için kaydet.
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12" style="display: none;" id="addressName">
                            <div class="form-group">
                                {!! Form::label("address_name", "Yeni Adres Başlığı") !!}
                                {!! Form::text("address_name", old("address_name"), ["class" => "form-control"]) !!}
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
                                @foreach($cart as $item)
                                    <?php $sticker = \App\Sticker::where("slug", $item->options->sticker)->first(); ?>
                                    <?php $size = \App\StickerSize::find($item->options->size); ?>
                                <tr>
                                    <td>{{ $sticker->name }}({{ $size->name }}) <b>x {{ $item->qty }}</b></td>
                                    <td>{{ number_format($item->price*$item->qty, 2) }} <i class="fa fa-try"></i></td>
                                    <td><a href="{{ route("frontend.cart.remove", $item->rowid) }}" class="btn btn-secondary-outline btn-sm"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                Ara Toplam
                                <span class="label label-default label-pill pull-xs-right">{{ number_format(Cart::total(), 2) }} <i class="fa fa-try"></i></span>
                            </li>
                            <li class="list-group-item @if($cargo == 0) list-group-item-success @endif">
                                Kargo Ücreti
                                <span class="label label-default label-pill pull-xs-right">{{ number_format($cargo, 2) }} <i class="fa fa-try"></i> @if($cargo == 0.00)(Ücretsiz)@endif</span>
                            </li>
                            <li class="list-group-item">
                                Genel Toplam
                                <span class="label label-primary label-pill pull-xs-right">{{ number_format(Cart::total() + $cargo, 2) }} <i class="fa fa-try"></i></span>
                            </li>
                        </ul>
                        <div class="card-block">
                            <div class="form-group">
                                <label class="c-input c-radio">
                                    {!! Form::radio("payment", "bank", old("payment") ? old("payment") == "bank" ? true : false : true) !!}
                                    <span class="c-indicator"></span>
                                    Banka Havalesi
                                </label>
                            </div>
                            <div id="bank" style="display: block;">
                                <div class="alert alert-info">
                                    <p>Ödemeyi bilgileri verilen Banka Hesabımıza yatırın. Lütfen ilgili Sipariş Numarasını havale dekontunun açıklama kısmına yazınız. Siparişiniz banka havalesi onaylanmadıkça işleme alınmayacaktır.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="c-input c-radio">
                                    {!! Form::radio("payment", "paypal", old("payment") == "paypal" ? true : false) !!}
                                    <span class="c-indicator"></span>
                                    Paypal ile Ödeme
                                </label>
                            </div>
                            <div id="paypal" style="display: none;">
                                <div class="alert alert-info">
                                    <p>PayPal aracılığıyla ödemede PayPal hesabınız yoksa bile kredi kartı ile ödeme yapabilirsiniz.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-block text-xs-right">
                            {!! Form::button("Siparişi Onayla", ["class" => "card-link btn btn-primary btn-xs", "type" => "submit"]) !!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop

@section("scripts")
    <script src="{{ asset("assets/js/payment.js") }}"></script>
@stop