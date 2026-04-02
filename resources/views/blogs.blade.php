@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
    @include('components.breadcrumb')

    <!-- Blog Listing -->
    <section class="blog-pg py-5 bg-black text-white">
        <div class="container">
            <div class="text-center mb-5 w-75 mx-auto" data-aos="fade-up">
                <h2 class="web-title">{{ $page->page_name }}</h2>
            </div>

            <div class="row g-4">
                @if($data['blogs'])
                    @foreach($data['blogs'] as $blog)

                    <!-- Featured Blog Post -->
                    <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up">
                        <div class="blog-card">
                            <!-- <span class="badge">Featured</span> -->
                            <img src="{{ asset($blog->blog_image) }}"
                                class="card-img-top" alt="{{ $blog->blog_headline }}">
                            <div class="card-body">
                                <div class="blog-meta">
                                    <i class="fas fa-calendar"></i> {{ date("F d, Y", strtotime($blog->post_date)); }} |
                                    <i class="fas fa-tag"></i> {{ explode(',', $blog->blog_tags)[0] }}
                                </div>
                                <h5>{{ $blog->blog_headline }}</h5>
                                <p>
                                @php
                                    $short_description = substr(htmlspecialchars_decode($blog->short_description), 0, 200)."...";
                                    echo strip_tags($short_description);
                                @endphp
                                </p>
                                <a href="{{ route('single.blog', $blog->blog_url) }}" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

            <!-- Pagination -->

            {{ $data['blogs']->links('pagination::bootstrap-4') }}
        </div>
    </section>

    @include('components.newsletter')
@endsection
