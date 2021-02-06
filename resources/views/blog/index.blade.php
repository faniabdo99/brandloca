@include('layout.header', 
[
    'PageTitle' => 'المدونة',
    'PageDescription' => 'أخبار و مستجدات شركة Arte Online'
])
<body>
	@include('layout.navbar')
	@include('layout.errors')
    <section class="hero-section mb-5" id="blog-hero">
        <div class="dark-overlap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1>المدونة</h1>
                        <p>أخبار و مستجدات شركة Arte Online</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-index">
        <div class="container">
            <div class="row">
                @forelse ($Blogs as $Article)
                    <div class="col-lg-4 col-12">
                        <div class="index-single-blog-item text-right">
                            <img class="d-block mb-3" src="{{$Article->ImageSrc}}" title="{{$Article->title}}" alt="{{$Article->title}}">
                            <div class="mb-4">
                                <h2>{{$Article->title}}</h2>
                                <p>{{$Article->description}}</p>
                                <a class="font-weight-bold" href="{{route('blog.single',[$Article->id,$Article->slug])}}">اقرأ المزيد</a>
                            </div>
                        </div>
                    </div>
                @empty
                    
                @endforelse
            </div>
        </div>
    </section>
	@include('layout.footer')
	@include('layout.scripts')
</body>

</html>
