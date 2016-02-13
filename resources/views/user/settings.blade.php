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
                                <img src="http://api.adorable.io/avatars/75/demo@demo.com" class="img-thumbnail img-circle">
                                <h4>{{ auth()->user()->fullname }}</h4>
                            </div>
                            {!! Form::open(["route" => "frontend.user.settings", "method" => "PUT"]) !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("name", "Ad Soyad") !!}
                                            {!! Form::text("name", auth()->user()->name, ["class" => "form-control form-control-lg"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("email", "E-Posta") !!}
                                            {!! Form::email("email", auth()->user()->email, ["class" => "form-control form-control-lg"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("phone", "Telefon") !!}
                                            {!! Form::text("phone", auth()->user()->phone, ["class" => "form-control form-control-lg"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("facebook", "Facebook") !!}
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                                {!! Form::text("facebook", auth()->user()->facebook, ["class" => "form-control form-control-lg"]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("twitter", "Twitter") !!}
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                                {!! Form::text("twitter", auth()->user()->twitter, ["class" => "form-control form-control-lg"]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("github", "Github") !!}
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-github"></i></span>
                                                {!! Form::text("github", auth()->user()->github, ["class" => "form-control form-control-lg"]) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label("bio", "Hakkında") !!}
                                            {!! Form::textarea("bio", auth()->user()->bio, ["class" => "form-control form-control-lg"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::button("Kaydet <i class='fa fa-save'></i>", ["type" => "submit", "class" => "btn btn-primary btn-block btn-lg"]) !!}
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