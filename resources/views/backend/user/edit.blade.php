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
                            {!! Form::open(["route" => ["backend.user.update", $user->id], "method" => "PUT"]) !!}
                            {!! Form::hidden("id", $user->id) !!}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("name", "Ad Soyad") !!}
                                        {!! Form::text("name", $user->name, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("email", "E-Posta") !!}
                                        {!! Form::email("email", $user->email, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("phone", "Telefon") !!}
                                        {!! Form::text("phone", $user->phone, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label("password", "Şifre") !!}
                                        {!! Form::password("password", ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label("password_confirmation", "Şifre Tekrarı") !!}
                                        {!! Form::password("password_confirmation", ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("facebook", "Facebook") !!}
                                        {!! Form::text("facebook", $user->facebook, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("twitter", "Twitter") !!}
                                        {!! Form::text("twitter", $user->twitter, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("github", "Github") !!}
                                        {!! Form::text("github", $user->github, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("bio", "Hakkında") !!}
                                        {!! Form::textarea("bio", $user->bio, ["class" => "form-control form-control-lg", "rows" => 4]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("role", "Rol") !!}
                                        {!! Form::select("role", [
                                            "user"  => "Kullanıcı",
                                            "admin" => "Yönetici",
                                        ], old("role") ? old("role") : $user->is_admin ? "admin" : "user", ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::button("Güncelle", ["class" => "btn btn-lg btn-primary btn-block", "type" => "submit"]) !!}
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