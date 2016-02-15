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
                            {!! Form::open(["route" => ["backend.sticker.category.update", $category->slug], "method" => "PUT"]) !!}
                            {!! Form::hidden("id", $category->id) !!}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("name", "Kategori Adı") !!}
                                        {!! Form::text("name", $category->name, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("slug", "Kategori Bağlantı") !!}
                                        {!! Form::text("slug", $category->slug, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::label("icon", "Kategori İkon") !!}
                                        {!! Form::text("icon", $category->icon, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("parent_id", "Üst Kategori") !!}
                                        {!! Form::select("parent_id", [0 => "- Ana Kategori -"] + \App\StickerCategory::lists("name", "id")->toArray(), $category->parent_id, ["class" => "form-control form-control-lg"]) !!}
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