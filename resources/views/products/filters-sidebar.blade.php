<div class="col-lg-3 order-2 order-lg-1 text-right">
    <div class="filter-widget">
        <form class="search-form" action="{{route('shop.search')}}" method="get">
            <label for="search_term">بحث</label>
            <input id="search_term" type="text" placeholder="ادخل كلمة البحث هنا و اضغط Enter" name="search_term" value="{{$_GET['search_term'] ?? ''}}">
            <button type="submit" class="site-btn site-btn-sm">بحث</button>
        </form>
    </div>
    <div class="filter-widget">
        <h2 class="fw-title">الأقسام</h2>
        <ul class="category-menu">
            @forelse ($Categories as $Category)
            <li><a href="{{route('shop.category',$Category->slug)}}">{{$Category->title}}</a>
                {{-- <ul class="sub-menu">
                      <li><a href="#">0-4 سنوات </a></li>
                      <li><a href="#">4-9 سنوات</a></li>
                      <li><a href="#">10-16 سنة</a></li>
                    </ul> --}}
            </li>
            @empty
            @endforelse
        </ul>
    </div>
    <div class="filter-widget">
        <h2 class="fw-title">الحجم</h2>
        <ul class="category-menu">
          <li><a href="{{route('shop.size','mini_bb')}}">ميني ب.ب</a></li>
          <li><a href="{{route('shop.size','bb')}}">ب.ب 1-4 سنوات</a></li>
          <li><a href="{{route('shop.size','medium')}}">وسط 6-9 سنوات</a></li>
          <li><a href="{{route('shop.size','adult')}}">محير 10-16 سنة</a></li>
          <li><a href="{{route('shop.size','older')}}">كبار 16+ سنة</a></li>
        </ul>
    </div>
    <div class="filter-widget">
        <h2 class="fw-title">الموسم</h2>
        <ul class="category-menu">
          <li><a href="{{route('shop.season','summer')}}">صيف</a></li>
          <li><a href="{{route('shop.season','winter')}}">شتاء</a></li>
        </ul>
    </div>
    <div class="filter-widget">
        <h2 class="fw-title">النوع</h2>
        <ul class="category-menu">
          <li><a href="{{route('shop.type','pajama')}}">بيجاما / ترينج</a></li>
          <li><a href="{{route('shop.type','tshirt')}}">تيشرت</a></li>
          <li><a href="{{route('shop.type','pants')}}">بنطال</a></li>
          <li><a href="{{route('shop.type','shoes')}}">أحذية</a></li>
        </ul>
    </div>
</div>
