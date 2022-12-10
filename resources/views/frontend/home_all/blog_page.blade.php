@php
    $blogPages = App\Models\Blog::latest()
        ->limit(3)
        ->get();
    // $allMultiImages = App\Models\multiImage::all();
@endphp

<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
            @foreach ($blogPages as $blogPage)
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog__post__item">
                        <div class="blog__post__thumb">
                            <a href="blog-details.html"><img src="{{ asset($blogPage->blog_image) }}" alt=""></a>
                            <div class="blog__post__tags">
                                <a href="blog.html">{{ $blogPage['category']['blog_category'] }}</a>
                            </div>
                        </div>
                        <div class="blog__post__content">
                            <span
                                class="date">{{ Carbon\Carbon::parse($blogPage->created_at)->diffForHumans() }}</span>
                            <h3 class="title"><a href="blog-details.html">{{ $blogPage->blog_title }}</a></h3>
                            <a href="{{ route('blog.details', $blogPage->id) }}" class="read__more">Read mORe</a>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img
                                src="{{ asset('front_end/assets/img/blog/blog_post_thumb02.jpg') }}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Social</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">13 january 2021</span>
                        <h3 class="title"><a href="blog-details.html">Make communication Fast and
                                Effectively.</a></h3>
                        <a href="blog-details.html" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img
                                src="{{ asset('front_end/assets/img/blog/blog_post_thumb03.jpg') }}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="blog.html">Work</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date">13 january 2021</span>
                        <h3 class="title"><a href="blog-details.html">How to increase your productivity at
                                work - 2021</a></h3>
                        <a href="blog-details.html" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="blog__button text-center">
            <a href="blog.html" class="btn">more blog</a>
        </div>
    </div>
</section>
