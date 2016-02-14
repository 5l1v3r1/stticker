@extends("layout.page")

@section("container")
    <section class="addresses">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <div class="row">
                        @foreach($addresses as $address)
                        <div class="col-md-4">
                            <div class="card card-block text-xs-center">
                                <h4 class="card-title">{{ $address->name }}</h4>
                                <p class="card-text">
                                    {{ str_limit($address->address, 72) }}
                                </p>
                                <a href="{{ route("frontend.user.address.destroy", $address->id) }}" onclick="return confirm('Silmek istediğinizden emin misiniz?');" class="btn btn-sm btn-danger">Sil</a>
                                <a href="{{ route("frontend.user.address.edit", $address->id) }}" class="btn btn-sm btn-info">Düzenle</a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-md-4">
                            <a href="{{ route("frontend.user.address.create") }}" class="card card-block card-new text-xs-center">
                                <div class="card-text">
                                    <i class="fa fa-plus fa-5x"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop