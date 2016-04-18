@extends("layout.page")

@section("container")
    @if(session('code'))
        <section class="page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center">{{ session('code') }} Nolu siparişiniz başarıyla gönderildi..</h2>
                        <div class="text-justify page-content center-block">
                            <p>Ödemeyi bilgileri verilen Banka Hesabımıza yatırın. </p>
                            <p>Lütfen ilgili Sipariş Numarasını havale dekontunun açıklama kısmına yazınız. </p>
                            <p>Siparişiniz banka havalesi onaylanmadıkça işleme alınmayacaktır.</p>
                            <h3>Hesap Bilgileri</h3>
                            <p>{!! Settings::get("bank") !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <section class="popular-sticker">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        <h4 class="text-center">Kampanyalı Stickerlar </h4>
                        <h5 class="text-center">(Aynı Gün Kargo) Adet 1 TL minimum 10 Adet alabilirsiniz.</h5>
                    </div>
                </div>

                @foreach($stickers as $sticker)
                    <div class="col-md-2 col-sm-4 col-xs-6">
                        <a href="{{ route("frontend.sticker.show", $sticker->slug) }}" class="card card-inverse sticker" title="{{ $sticker->name }}">
                            <img style="display: none;" class="card-img-top img-fluid" src="{{ asset($sticker->image) }}" alt="{{ $sticker->name }}">
                            <div class="img" style="background-image:url({{ asset($sticker->image) }});"></div>
                            <div class="card-img-overlay">
                                <h4 class="card-title text-center">{{ $sticker->name }}</h4>
                            </div>
                            <p style="margin: 0; padding: 0">No : {{ $sticker->id }}</p>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <section class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Sipariş Ver</h2>
                    <div class="text-justify page-content center-block">
                        @if($errors->has())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        {!! Form::open(["route" => "frontend.sticker.campaign"]) !!}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("name", "Ad Soyad") !!}
                                        {!! Form::text("name", old("name"), ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("email", "E-Posta") !!}
                                        {!! Form::email("email", old("email"), ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("phone", "Telefon") !!}
                                        {!! Form::text("phone", old("phone"), ["class" => "form-control form-control-lg", "type" => "phone"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("adress", "Adres") !!}
                                        {!! Form::textarea("adress", old("adress"), ["class" => "form-control form-control-lg", "rows" => 2]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("content", "Mesajınız ve seçmiş olduğunuz Sticker No'larını yazınız...") !!}
                                        {!! Form::textarea("content", old("content"), ["class" => "form-control form-control-lg", "rows" => 4]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {{ Form::hidden('code', $code) }}
                                        {!! Form::button("#" . $code . " Numaralı Siparişi Gönder <i class='fa fa-paper-plane-o'></i>", ["class" => "btn btn-primary btn-lg btn-block", "type" => "submit"]) !!}
                                        <small>Sipariş kodu ödeme bildiriminde istenmektedir bu nedenle not alınız...</small>
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