@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <p class="text-xs-right"><a href="{{ route("backend.sticker.category.create") }}" class="btn btn-sm btn-success-outline">Yeni Sticker Ekle</a></p>
                    <table class="table table-hover table-striped table-middle">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Kategori</th>
                            <th>Alt Kategoriler</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->name }}</td>
                                <td>
                                    <a href="{{ route("backend.sticker.category.index", $subcategory->slug) }}" class="btn btn-sm btn-primary-outline"><i class="fa fa-bars"></i> Alt Kategoriler</a>
                                </td>
                                <td class="text-xs-right">
                                    <a href="{{ route("backend.sticker.category.edit", $subcategory->slug) }}" class="btn btn-sm btn-info-outline"><i class="fa fa-pencil"></i> Düzenle</a>
                                    <a href="{{ route("backend.sticker.category.destroy", $subcategory->slug) }}" class="btn btn-sm btn-danger-outline"><i class="fa fa-trash-o"></i> Sil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {!! $categories->render() !!}
                </div>
            </div>
        </div>
    </section>
@stop