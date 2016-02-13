<div class="sidebar">
    @foreach(\App\StickerCategory::whereNull("parent_id")->get() as $sidebarCategory)
    <h3><a href="{{ route("frontend.sticker.category.show", $sidebarCategory->slug) }}">{{ $sidebarCategory->name }}</a></h3>
    <ul class="nav">
        @foreach($sidebarCategory->subs as $sidebarSubCategory)
        <li class="nav-item">
            <a class="nav-link" href="{{ route("frontend.sticker.category.show", $sidebarSubCategory->slug) }}">{{ $sidebarSubCategory->name }}</a>
        </li>
        @endforeach
    </ul>
    @endforeach
</div>