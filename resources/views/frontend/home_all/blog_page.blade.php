@php
    $blogPages = App\Models\Blog::latest()
        ->limit(3)
        ->get();
@endphp

<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach ($blogPages as $blogPage)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="{{ route('blog.details', $blogPage->id) }}"><img
                                    src="{{ asset($blogPage->blog_image) }}" alt=""></a>
                            <div class="blog__post__tags">
                                <a
                                    href="{{ route('blog.details', $blogPage->id) }}">{{ $blogPage['category']['blog_category'] }}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span
                                class="date">{{ Carbon\Carbon::parse($blogPage->created_at)->diffForHumans() }}</span>
                            <h3 class="title"><a href="blog-details.html">{{ $blogPage->blog_title }}</a></h3>
                            <a href="{{ route('blog.details', $blogPage->id) }}" class="read__more">Read MORe</a>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
        <div class="blog__button text-center">
            <a href="{{ route('blog.details', $blogPage->id) }}" class="btn">more blog</a>
        </div>
    </div>
</section>
