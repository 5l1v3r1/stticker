@extends("layout.page")

@section("title") İletişim @stop

@section("container")
    <section class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">İletişim</h2>
                    <div class="text-justify page-content center-block">
                        @if($errors->has())
                            <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                            </div>
                        @endif
                        {!! Form::open(["route" => "frontend.contact.send"]) !!}
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
                                        {!! Form::label("message", "Mesajınız") !!}
                                        {!! Form::textarea("message", old("message"), ["class" => "form-control form-control-lg", "rows" => 5]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::button("Gönder <i class='fa fa-paper-plane-o'></i>", ["class" => "btn btn-primary btn-lg btn-block", "type" => "submit"]) !!}
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop