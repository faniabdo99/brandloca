@include('layout.header', 
[
    'PageTitle' => $TheBlog->title,
    'PageDescription' => $TheBlog->description,
    'PageKeywords' => $TheBlog->keywords
])
<body>
	@include('layout.navbar')
	@include('layout.errors')
    <section class="single-blog-article text-right">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="{{$TheBlog->ImageSrc}}" class="blog-single-main-image mb-5" alt="{{$TheBlog->title}}" title="{{$TheBlog->title}}">
                    <h1 class="blog-single-title">{{$TheBlog->title}}</h1>
                    <p class="blog-single-description">{{$TheBlog->title}}</p>
                    <div class="blog-single-article">
                        {!! $TheBlog->content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
	@include('layout.footer')
	@include('layout.scripts')
</body>

</html>
