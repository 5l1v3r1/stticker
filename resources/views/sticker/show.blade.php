@extends("layout.page")

@section("title") {{ $sticker->category->name }} / {{ $sticker->name }} @stop

@section("og_image"){{ asset($sticker->image) }}@stop

@section("container")
    <section class="sticker-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route("frontend.home.index") }}"><i class="fa fa-cubes"></i> Stticker</a></li>
                        <li><a href="{{ route("frontend.home.index") }}"><i class="fa fa-home"></i> Anasayfa</a></li>
                        @if($sticker->category->parent)
                        <li><a href="{{ route("frontend.sticker.category.show", $sticker->category->parent->slug) }}"><i class="{{ $sticker->category->parent->icon }}"></i> {{ $sticker->category->parent->name }}</a></li>
                        @endif
                        <li><a href="{{ route("frontend.sticker.category.show", $sticker->category->slug) }}">{{ $sticker->category->name }}</a></li>
                        <li class="active">{{ $sticker->name }}</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <img src="{{ asset($sticker->image) }}" class="img-fluid img-thumbnail">
                </div>
                <div class="col-md-5">
                    <h2>{{ $sticker->name }}</h2>
                    <h3><a href="{{ route("frontend.sticker.category.show", $sticker->category->slug) }}">{{ $sticker->category->name }}</a></h3>
                    {!! Form::open(["route" => ["frontend.cart.add", $sticker->slug], "class" => "form-cart"]) !!}
                        <div class="form-group">
                            <div class="input-group">
                                {!! Form::label("size", "Boyut", ["class" => "input-group-addon bg-primary"]) !!}
                                {!! Form::select("size", $sticker->category->parent->sizes->lists("name", "id"), old("size"), ["class" => "form-control"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                {!! Form::label("quantity", "Adeti", ["class" => "input-group-addon bg-primary"]) !!}
                                {!! Form::number("quantity", 1, ["class" => "form-control"]) !!}
                                <span class="input-group-btn">
                                    {!! Form::button("Sepete Ekle", ["class" => "btn btn-primary", "type" => "submit"]) !!}
                                </span>
                            </div>
                        </div>
                        <div class="card text-xs-center">
                            <div class="card-header">
                                <i class="fa fa-truck fa-flip-horizontal"></i> <b>Türkiye</b> için Kargo
                            </div>
                            <div class="card-block">
                                <p class="text-center">
                                    2-3 gün kargo süresi (<b>Express</b>)<br>
                                    3-5 gün kargo süresi (<b>Normal</b>)
                                </p>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <div class="card">
                        <div class="card-header text-xs-center">
                            Sosyal Ağda Paylaş
                        </div>
                        <div class="card-block">
                            <div class="btn-group text-xs-center" role="group" aria-label="Sosyal Ağda Paylaş">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ route("frontend.sticker.show", $sticker->slug) }}" target="_blank" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i></a>
                                <a href="http://twitter.com/home?status={{ route("frontend.sticker.show", $sticker->slug) }}" target="_blank" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="https://plus.google.com/share?url={{ route("frontend.sticker.show", $sticker->slug) }}" target="_blank" class="btn btn-social btn-google"><i class="fa fa-google-plus"></i></a>
                                <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ route("frontend.sticker.show", $sticker->slug) }}" target="_blank" class="btn btn-social btn-linkedin"><i class="fa fa-linkedin"></i></a>
                                <a href="http://www.tumblr.com/share/link?url={{ route("frontend.sticker.show", $sticker->slug) }}" target="_blank" class="btn btn-social btn-tumblr"><i class="fa fa-tumblr"></i></a>
                                <a href="https://vk.com/share.php?url={{ route("frontend.sticker.show", $sticker->slug) }}&noparse=true" target="_blank" class="btn btn-social btn-vk"><i class="fa fa-vk"></i></a>
                                <a href="https://www.reddit.com/login?dest=http://www.reddit.com/submit?url={{ route("frontend.sticker.show", $sticker->slug) }}" target="_blank" class="btn btn-social btn-reddit"><i class="fa fa-reddit"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-xs-center">
                            Benzer Stickerlar
                        </div>
                        <div class="card-block">
                            <div class="row">
                                @foreach($sticker->relateds()->take(6)->get() as $related)
                                <div class="col-md-2">
                                    <a href="{{ route("frontend.sticker.show", $related->slug) }}" class="card card-inverse sticker">
                                        <img class="card-img-top img-fluid" src="{{ asset($related->image) }}" alt="{{ $related->name }}">
                                        <div class="card-img-overlay">
                                            <h4 class="card-title text-center">{{ $related->name }}</h4>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop