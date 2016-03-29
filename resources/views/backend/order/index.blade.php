@extends("layout.page")
@section("container")
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <table class="table table-hover table-striped table-middle">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Sipariş Kodu</th>
                            <th>Sipariş Veren</th>
                            <th>Sipariş Tarihi</th>
                            <th class="text-xs-center"><i class="fa fa-try"></i></th>
                            <th class="text-xs-center"><i class="fa fa-tasks"></i></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->code }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->created_at->format("d.m.Y - H:i") }}</td>
                                <td class="text-xs-center"><i class="fa fa-try"></i> {{ number_format($order->total+$order->cargo, 2) }}</td>
                                <td class="text-xs-center">
                                    @if($order->status == 0)
                                        <span class="label label-danger">Ödeme Bekliyor</span>
                                    @elseif($order->status == 1)
                                        <span class="label label-info">Sipariş Alındı</span>
                                    @elseif($order->status == 2)
                                        <span class="label label-primary">Kargoda</span>
                                    @elseif($order->status == 3)
                                        <span class="label label-success">Teslim Edildi</span>
                                    @elseif($order->status == 4)
                                        <span class="label label-danger">İptal Edildi</span>
                                    @elseif($order->status == 5)
                                        <span class="label label-warning">İade</span>
                                    @endif
                                </td>
                                <td class="text-xs-right">
                                    <a href="{{ route("backend.order.show", $order->id) }}" class="btn btn-sm btn-primary-outline"><i class="fa fa-eye"></i> Sipariş Detayı</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {!! $orders->render() !!}
                </div>
            </div>
        </div>
    </section>
@stop