@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.sidebar")
                </div>
                <div class="col-md-9 main">
                    {!! Form::open(["route" => "frontend.sticker.search", "class" => "search", "method" => "GET"]) !!}
                    <div class="input-group input-group-lg">
                        {!! Form::text("query", old("query"), ["class" => "form-control", "placeholder" => "Sticker Arayın..."]) !!}
                        <span class="input-group-btn">
                                {!! Form::button("<i class='fa fa-search'></i>", ["class" => "btn btn-secondary text-primary", "type" => "button"] ) !!}
                            </span>
                    </div>
                    {!! Form::close() !!}

                    <div class="row grid">
                        @foreach($stickers = App\Sticker::take(20)->latest()->get() as $sticker)
                            <div class="col-md-3 grid-item">
                                <a href="{{ route("frontend.sticker.show", $sticker->slug) }}" class="card card-inverse sticker">
                                    <img class="card-img-top img-fluid" src="{{ asset($sticker->image) }}" alt="{{ $sticker->name }}">
                                    <div class="card-img-overlay">
                                        <h4 class="card-title text-center">{{ $sticker->name }}</h4>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop