@extends("layout.page")

@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <p class="text-xs-right"><a href="{{ route("backend.user.create") }}" class="btn btn-sm btn-success-outline">Yeni Kullanıcı Ekle</a></p>
                    <table class="table table-hover table-striped table-middle">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Ad Soyad</th>
                            <th>E-Posta</th>
                            <th>Rol</th>
                            <th>Son Giriş</th>
                            <th>Kayıt Tarihi</th>
                            <th>Sipariş</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->is_admin)
                                        <span class="label label-success">Yönetici</span>
                                    @else
                                        <span class="label label-danger">Kullanıcı</span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->last_login)
                                        {{ $user->last_login }}
                                    @else
                                        Giriş Yapmadı
                                    @endif
                                </td>
                                <td>{{ $user->created_at->format("d.m.Y H:i") }}</td>
                                <td>{{ $user->orders()->count() }}</td>
                                <td class="text-xs-right">
                                    <a href="{{ route("backend.user.edit", $user->id) }}" class="btn btn-sm btn-info-outline"><i class="fa fa-pencil"></i> Düzenle</a>
                                    @if($user->id != auth()->user()->id)
                                    <a href="{{ route("backend.user.destroy", $user->id) }}" class="btn btn-sm btn-danger-outline"><i class="fa fa-trash-o"></i> Sil</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @include('pagination.bootstrap-4', ['paginator' => $users])
                </div>
            </div>
        </div>
    </section>
@stop