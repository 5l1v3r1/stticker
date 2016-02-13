<div class="sidebar">
    <h3><a href="{{ route("frontend.user.settings") }}">{{ auth()->user()->fullname }}</a></h3>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link @if(\Request::is("user/settings")) active @endif" href="{{ route("frontend.user.settings") }}">Hesap Ayarları</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Adres Bilgilerim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Siparişlerim</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route("frontend.user.logout") }}">Çıkış Yap</a>
        </li>
    </ul>
</div>