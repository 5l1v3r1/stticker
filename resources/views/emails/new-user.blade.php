@extends("emails.layout")

@section("body")
        <!-- =============== START BODY =============== -->

<div class='movableContent'>
    <table width="580" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr><td height='40'></td></tr>
        <tr>
            <td style='border: 1px solid #EEEEEE; border-radius:6px;-moz-border-radius:6px;-webkit-border-radius:6px'>
                <table width="480" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr><td height='25'></td></tr>
                    <tr>
                        <td>
                            <div class='contentEditableContainer contentTextEditable'>
                                <div class='contentEditable' style='text-align: center;'>
                                    <h2 style="font-size: 20px;">Yeni Üyelik</h2>
                                    <br>
                                    <p><a href="{{ url('/') }}" title="Stticker.com">Stticker.com</a> üyeliğiniz oluşturulmuştur. Siparişlerinizi ve adres bilgilerinizi yönetebilirsiniz. Üyelik bilgileriniz aşağıda yer almaktadır.</p>
                                    <p>
                                        E-Posta Adresi: {{ $user->email }}<br>
                                        Şifre: {{ $password }}
                                    </p>
                                    <p>Giriş yaptıktan sonra şifrenizi değiştirmeyi unutmayınız.</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr><td height='24'></td></tr>
                </table>
            </td>
        </tr>
    </table>
</div>

<!-- =============== END BODY =============== -->
@stop