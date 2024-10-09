<div class="list-group">
    <a @class([
        'list-group-item list-group-item-action',
        'active' => Request::path() == 'san-pham/xi-mang',
    ]) href="/san-pham/xi-mang" aria-current="true">
        Xi măng
    </a>
    <a href="/san-pham/keo-vua-xay-dung" @class([
        'list-group-item list-group-item-action',
        'active' => Request::path() == 'san-pham/keo-vua-xay-dung',
    ])>
        Keo vữa xây dựng
    </a>
    <a href="/san-pham/gach-da-op-lat" @class([
        'list-group-item list-group-item-action',
        'active' => Request::path() == 'san-pham/gach-da-op-lat',
    ])>
        Gạch đá ốp lát
    </a>
    <a href="/san-pham/vat-lieu-chong-tham" @class([
        'list-group-item list-group-item-action',
        'active' => Request::path() == 'san-pham/vat-lieu-chong-tham',
    ])>
        Vật liệu chống thấm
    </a>
    <a href="/san-pham/ngoi-lop" @class([
        'list-group-item list-group-item-action',
        'active' => Request::path() == 'san-pham/ngoi-lop',
    ])>
        Ngói lợp
    </a>
</div>
