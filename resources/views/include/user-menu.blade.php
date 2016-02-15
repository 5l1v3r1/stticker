<div class="sidebar">
    <h3><a href="{{ route("frontend.user.settings") }}">{{ auth()->user()->fullname }}</a></h3>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link @if(\Request::is("user/settings")) active @endif" href="{{ route("frontend.user.settings") }}">Hesap Ayarları</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(\Request::is("user/address*")) active @endif" href="{{ route("frontend.user.address.index") }}">Adres Bilgilerim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link @if(\Request::is("user/payment*")) active @endif" href="{{ route("frontend.user.payment.index") }}">Siparişlerim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route("frontend.user.logout") }}">Çıkış Yap</a>
        </li>
    </ul>

    @if(auth()->user()->is_admin)
        <h3><a href="#">Yönetim Paneli</a></h3>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link @if(\Request::is("admin/sticker*")) active @endif" href="{{ route("backend.sticker.index") }}">Stickerlar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::is("admin/category*")) active @endif" href="{{ route("backend.sticker.category.index") }}">Kategoriler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::is("admin/order*")) active @endif" href="{{ route("backend.order.index") }}">Siparişler</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::is("admin/page*")) active @endif" href="{{ route("backend.page.index") }}">Sayfalar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::is("admin/blog*")) active @endif" href="{{ route("backend.blog.index") }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::is("admin/user*")) active @endif" href="{{ route("backend.user.index") }}">Kullanıcılar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if(\Request::is("admin/settings*")) active @endif" href="{{ route("backend.settings") }}">Ayarlar</a>
            </li>
        </ul>
    @endif
</div>