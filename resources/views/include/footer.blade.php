<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav nav-inline nav-footer text-center">
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route("frontend.home.index") }}">Anasayfa</a>
                    </div>
                    @foreach(\App\Page::all() as $page)
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route("frontend.page.show", $page->slug) }}">{{ $page->name }}</a>
                    </div>
                    @endforeach
                    <div class="nav-item dropup">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{ route("frontend.sticker.index") }}" role="button" aria-haspopup="true" aria-expanded="false">Sticker</a>
                        <div class="dropdown-menu">
                            @foreach(\App\StickerCategory::whereNull("parent_id")->get() as $headerCategory)
                                <a class="dropdown-item" href="{{ route("frontend.sticker.category.show", $headerCategory->slug) }}"><i class="{{ $headerCategory->icon }}"></i> {{ $headerCategory->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route("frontend.contact.index") }}">İletişim</a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Stticker Project is trademark of Webjektif. Copyright &copy; Webjektif 2016</h3>
                <h3 class="text-center">Design by <a href="http://jackmcdade.com/">Jack McDade</a> from <a href="https://laravel.com/">Laravel</a></h3>
            </div>
        </div>
    </div>
</footer>