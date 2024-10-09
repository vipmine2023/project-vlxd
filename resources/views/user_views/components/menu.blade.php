<div class="list-group">
    <a @class([ 'list-group-item list-group-item-action d-flex justify-content-between' , 'active'=> Request::path() == 'san-pham/xi-mang',
        ]) href="/san-pham/xi-mang" aria-current="true">
        Xi măng
        @if(Request::path() == 'san-pham/xi-mang')
        <span>
            <i class="fa-solid fa-angles-right"></i>
        </span>
        @endif
    </a>
    <a href="/san-pham/keo-vua-xay-dung" @class([ 'list-group-item list-group-item-action d-flex justify-content-between' , 'active'=> Request::path() == 'san-pham/keo-vua-xay-dung',
        ])>
        Keo vữa xây dựng
        @if(Request::path() == 'san-pham/keo-vua-xay-dung')
        <span>
            <i class="fa-solid fa-angles-right"></i>
        </span>
        @endif
    </a>
    <a href="/san-pham/gach-da-op-lat" @class([ 'list-group-item list-group-item-action d-flex justify-content-between' , 'active'=> Request::path() == 'san-pham/gach-da-op-lat',
        ])>
        Gạch đá ốp lát
        @if(Request::path() == 'san-pham/gach-da-op-lat')
        <span>
            <i class="fa-solid fa-angles-right"></i>
        </span>
        @endif
    </a>
    <a href="/san-pham/vat-lieu-chong-tham" @class([ 'list-group-item list-group-item-action d-flex justify-content-between' , 'active'=> Request::path() == 'san-pham/vat-lieu-chong-tham',
        ])>
        Vật liệu chống thấm
        @if(Request::path() == 'san-pham/vat-lieu-chong-tham')
        <span>
            <i class="fa-solid fa-angles-right"></i>
        </span>
        @endif
    </a>
    <a href="/san-pham/ngoi-lop" @class([ 'list-group-item list-group-item-action d-flex justify-content-between' , 'active'=> Request::path() == 'san-pham/ngoi-lop',
        ])>
        Ngói lợp
        @if(Request::path() == 'san-pham/ngoi-lop')
        <span>
            <i class="fa-solid fa-angles-right"></i>
        </span>
        @endif
    </a>
</div>