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
                            {!! Form::open(["route" => ["backend.sticker.update", $sticker->slug], "method" => "PUT", "files" => true]) !!}
                            {!! Form::hidden("id", $sticker->id) !!}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("name", "Sticker Adı") !!}
                                        {!! Form::text("name", $sticker->name, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("slug", "Sticker Bağlantı") !!}
                                        {!! Form::text("slug", $sticker->slug, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("sticker_category_id", "Sticker Kategorisi") !!}
                                        {!! Form::select("sticker_category_id", [0 => "Kategori Seçiniz"] + \App\StickerCategory::lists("name", "id")->toArray(), $sticker->sticker_category_id, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("image", "Sticker Resmi") !!}
                                        {!! Form::file("image", ["class" => "form-control form-control-lg"]) !!}
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