@extends("layout.page")

@section("scripts")
    <script src="{{ asset("assets/plugins/ckeditor/ckeditor.js") }}"></script>
    <script>
        CKEDITOR.replace('bank');
    </script>
@stop

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
                            @if($errors->has())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <p>{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::open(["route" => "backend.settings", "method" => "PUT"]) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label("name", "Site Adı") !!}
                                        {!! Form::text("name", Settings::get("name"), ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label("description", "Site Açıklama") !!}
                                        {!! Form::text("description", Settings::get("description"), ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("google-code", "Google Analytics UA") !!}
                                        {!! Form::text("google-code", Settings::get("google-code"), ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("bank", "Banka Bilgileri") !!}
                                        {!! Form::textarea("bank", Settings::get("bank"), ["id" => "bank", "class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("contact_send_email", "İletişim Mesajlarının Geleceği E-Posta") !!}
                                        {!! Form::text("contact_send_email", Settings::get("contact_send_email"), ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::button("Kaydet", ["class" => "btn btn-lg btn-primary btn-block", "type" => "submit"]) !!}
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