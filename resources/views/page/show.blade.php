@extends("layout.page")

@section("container")
    <section class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">{{ $page->name }}</h2>
                    <div class="text-justify page-content center-block">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop