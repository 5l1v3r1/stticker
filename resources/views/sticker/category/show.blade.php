@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.sidebar")
                </div>
                <div class="col-md-9 main">
                    <form class="search">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Sticker Arayın...">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary text-primary" type="button"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>

                    <div class="row">
                        @foreach($stickers as $sticker)
                        <div class="col-md-3">
                            <a href="{{ route("frontend.sticker.show", $sticker->slug) }}" class="card card-inverse sticker">
                                <img class="card-img-top img-fluid" src="{{ asset($sticker->image) }}" alt="{{ $sticker->name }}">
                                <div class="card-img-overlay">
                                    <h4 class="card-title text-center">{{ $sticker->name }}</h4>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="text-center">
                                {!! $stickers->render() !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop