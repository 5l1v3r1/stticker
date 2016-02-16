@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <p class="text-xs-right"><a href="{{ route("backend.page.create") }}" class="btn btn-sm btn-success-outline">Yeni Sayfa Ekle</a></p>
                    <table class="table table-hover table-striped table-middle">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Başlık</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td>{{ $page->name }}</td>
                                <td class="text-xs-right">
                                    <a href="{{ route("backend.page.edit", $page->slug) }}" class="btn btn-sm btn-info-outline"><i class="fa fa-pencil"></i> Düzenle</a>
                                    <a href="{{ route("backend.page.destroy", $page->slug) }}" class="btn btn-sm btn-danger-outline"><i class="fa fa-trash-o"></i> Sil</a>
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