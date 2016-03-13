@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <p class="text-xs-right"><a href="{{ route("backend.sticker.size.create") }}" class="btn btn-sm btn-success-outline">Yeni Boyut Ekle</a></p>
                    <table class="table table-hover table-striped table-middle">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Adı</th>
                            <th>Fiyat</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sizes as $size)
                            <tr>
                                <td>{{ $size->name }}</td>
                                <td>{{ number_format($size->price, 2) }} <i class="fa fa-try"></i></td>
                                <td class="text-xs-right">
                                    <a href="{{ route("backend.sticker.size.edit", $size->id) }}" class="btn btn-sm btn-info-outline"><i class="fa fa-pencil"></i> Düzenle</a>
                                    <a href="{{ route("backend.sticker.size.destroy", $size->id) }}" class="btn btn-sm btn-danger-outline"><i class="fa fa-trash-o"></i> Sil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop