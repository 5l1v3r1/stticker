@extends("layout.page")

@section("container")
    <section class="addresses">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include("include.user-menu")
                </div>
                <div class="col-md-9 main">
                    <table class="table table-hover table-striped table-middle">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Sipariş Kodu</th>
                            <th>Sipariş Tarihi</th>
                            <th class="text-xs-center"><i class="fa fa-try"></i></th>
                            <th class="text-xs-center"><i class="fa fa-tasks"></i></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>IST01</td>
                            <td>13.02.2016 - 05:03</td>
                            <td class="text-xs-center"><i class="fa fa-try"></i> 30.00</td>
                            <td class="text-xs-center">
                                <span class="label label-info">Kargoda</span>
                            </td>
                            <td class="text-xs-right">
                                <a href="#" class="btn btn-sm btn-primary-outline"><i class="fa fa-eye"></i> Sipariş Detayı</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>IST01</td>
                            <td>13.02.2016 - 05:03</td>
                            <td class="text-xs-center"><i class="fa fa-try"></i> 30.00</td>
                            <td class="text-xs-center">
                                <span class="label label-success">Teslim Edildi</span>
                            </td>
                            <td class="text-xs-right">
                                <a href="#" class="btn btn-sm btn-primary-outline"><i class="fa fa-eye"></i> Sipariş Detayı</a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>IST01</td>
                            <td>13.02.2016 - 05:03</td>
                            <td class="text-xs-center"><i class="fa fa-try"></i> 30.00</td>
                            <td class="text-xs-center">
                                <span class="label label-warning">Bekliyor</span>
                            </td>
                            <td class="text-xs-right">
                                <a href="#" class="btn btn-sm btn-primary-outline"><i class="fa fa-eye"></i> Sipariş Detayı</a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>IST01</td>
                            <td>13.02.2016 - 05:03</td>
                            <td class="text-xs-center"><i class="fa fa-try"></i> 30.00</td>
                            <td class="text-xs-center">
                                <span class="label label-danger">İptal Edildi</span>
                            </td>
                            <td class="text-xs-right">
                                <a href="#" class="btn btn-sm btn-primary-outline"><i class="fa fa-eye"></i> Sipariş Detayı</a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>IST01</td>
                            <td>13.02.2016 - 05:03</td>
                            <td class="text-xs-center"><i class="fa fa-try"></i> 30.00</td>
                            <td class="text-xs-center">
                                <span class="label label-default">İade</span>
                            </td>
                            <td class="text-xs-right">
                                <a href="#" class="btn btn-sm btn-primary-outline"><i class="fa fa-eye"></i> Sipariş Detayı</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop