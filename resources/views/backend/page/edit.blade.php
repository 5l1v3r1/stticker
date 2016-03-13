@extends("layout.page")

@section("scripts")
    <script src="{{ asset("assets/plugins/ckeditor/ckeditor.js") }}"></script>
    <script>
        CKEDITOR.replace('content');
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
                            {!! Form::open(["route" => ["backend.page.update", $page->slug], "method" => "PUT"]) !!}
                            {!! Form::hidden("id", $page->id) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label("name", "Sayfa Adı") !!}
                                        {!! Form::text("name", $page->name, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label("slug", "Sayfa Bağlantı") !!}
                                        {!! Form::text("slug", $page->slug, ["class" => "form-control form-control-lg"]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("description", "Sayfa Açıklama") !!}
                                        {!! Form::textarea("description", $page->description, ["class" => "form-control form-control-lg", "rows" => 2]) !!}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label("content", "Sayfa İçerik") !!}
                                        {!! Form::textarea("content", $page->content, ["id" => "content", "class" => "form-control form-control-lg"]) !!}
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