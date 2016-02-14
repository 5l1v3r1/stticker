@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <h4>Adres Ekle</h4>
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
                            {!! Form::open(["route" => "frontend.user.address.store"]) !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label("name", "Adres Başlığı") !!}
                                            {!! Form::text("name", old("name"), ["class" => "form-control"]) !!}
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
                                            {!! Form::textarea("address", old("address"), ["class" => "form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::button("Kaydet <i class='fa fa-save'></i>", ["class" => "btn btn-primary btn-block btn-lg", "type" => "submit"]) !!}
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop