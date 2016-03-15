<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1 class="logo text-md-left text-lg-left text-sm-center text-xs-center">
                    <a href="{{ route("frontend.home.index") }}">
                        <img src="{{ asset("assets/images/logo.png") }}">
                    </a>
                </h1>
            </div>
            <div class="col-md-8">
                <nav class="nav nav-inline nav-primary text-md-right text-sm-center text-xs-center">
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route("frontend.home.index") }}"><i class="fa fa-home"></i> Anasayfa</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ route("frontend.sticker.index") }}" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cubes"></i> Sticker</a>
                        <div class="dropdown-menu">
                            @foreach(\App\StickerCategory::whereNull("parent_id")->get() as $headerCategory)
                            <a class="dropdown-item" href="{{ route("frontend.sticker.category.show", $headerCategory->slug) }}"><i class="{{ $headerCategory->icon }}"></i> {{ $headerCategory->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    @if(auth()->check())
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route("frontend.user.settings") }}"><i class="fa fa-user"></i> {{ auth()->user()->fullname }}</a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route("frontend.user.logout") }}"><i class="fa fa-sign-out"></i> Çıkış Yap</a>
                        </div>
                    @else
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route("frontend.user.login") }}"><i class="fa fa-sign-in"></i> Giriş Yap</a>
                        </div>
                        <div class="nav-item">
                            <a class="nav-link" href="{{ route("frontend.user.register") }}"><i class="fa fa-user-plus"></i> Kayıt Ol</a>
                        </div>
                    @endif
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route("frontend.cart.index") }}"><i class="fa fa-shopping-cart"></i> Sepetim (<span class="cart-count">{{ count(\Cart::content()) }}</span>)</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>