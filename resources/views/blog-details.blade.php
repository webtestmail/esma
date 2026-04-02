@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
    @include('components.breadcrumb')

    <!-- Blog Detail -->
    <section class="blog-detail py-5">
        <div class="container">

            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-container">
                        <div class="blog-de-img">
                            <img src="{{ asset($blog->blog_image) }}" alt="{{ $blog->blog_headline }}"
                                class="img-fluid featured" data-aos="fade-up">
                        </div>
                        @if (isset($blog->blog_sections) && !empty($blog->blog_sections))
                            @foreach ($blog->blog_sections as $section)
                                @php
                                    $link = strtolower($section->section_title);
                                    $link = str_replace(['/', ' '], '-', $link);
                                    $link = preg_replace('/[^a-z0-9-]+/', '-', $link);
                                    $link = trim($link, '-');
                                    $link = preg_replace('/-+/', '-', $link);
                                @endphp
                                <div id="{{ $link }}">
                                    <h2 data-aos="fade-up">{{ $section->section_headline }}</h2>
                                    {!! htmlspecialchars_decode($section->description) !!}
                                </div>
                            @endforeach
                        @endif
                        <!-- Share Section -->
                        <div class="share-section" data-aos="fade-up">
                            <h5>Share this article</h5>
                            <div class="share-icons">
                                <a href="#" onclick="shareOnTwitter()"><i class="fab fa-twitter"></i></a>
                                <a href="#" onclick="shareOnFacebook()"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" onclick="shareOnLinkedIn()"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" onclick="copyLink()"><i class="fas fa-link"></i></a>
                                <a href="#" onclick="shareOnWhatsApp()"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>

                        @if ($data['previous_blog'] || $data['next_blog'])
                            <!-- Post Navigation -->
                            <div class="post-nav" data-aos="fade-up">
                                @if ($data['previous_blog'])
                                    <a href="{{ route('single.blog', $data['previous_blog']->blog_url) }}"
                                        class="post-nav-item prev">
                                        <div class="nav-label">Previous</div>
                                        <div class="nav-title">{{ $data['previous_blog']->blog_headline }}</div>
                                    </a>
                                @endif
                                @if ($data['next_blog'])
                                    <a href="{{ route('single.blog', $data['next_blog']->blog_url) }}"
                                        class="post-nav-item next">
                                        <div class="nav-label">Next</div>
                                        <div class="nav-title">{{ $data['next_blog']->blog_headline }}</div>
                                    </a>
                                @endif
                            </div>
                        @endif

                        <!-- Comments -->
                        <div class="comments" data-aos="fade-up">
                            <h4><i class="fas fa-comments"></i> Comments (2)</h4>

                            <div class="comment-box" data-aos="fade-up" data-aos-delay="100">
                                <div class="comment-header">
                                    <div class="comment-avatar">EC</div>
                                    <div class="comment-meta">
                                        <h6>Emily Carter</h6>
                                        <div class="comment-date">2 hours ago</div>
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Excellent article! The insights about AI-generated creators are particularly
                                    fascinating. I'm
                                    curious about the ethical implications of using deepfake technology in marketing.
                                </div>
                            </div>

                            <div class="comment-box" data-aos="fade-up" data-aos-delay="200">
                                <div class="comment-header">
                                    <div class="comment-avatar">ML</div>
                                    <div class="comment-meta">
                                        <h6>Michael Lee</h6>
                                        <div class="comment-date">4 hours ago</div>
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Would love to see a detailed case study on brands that have successfully implemented AI
                                    influencers. The ROI predictions seem very promising!
                                </div>
                            </div>

                            <!-- Comment Form -->
                            <div class="comment-form" data-aos="fade-up">
                                <h5><i class="fas fa-edit"></i> Leave a Comment</h5>
                                <form id="commentForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Your Name" required>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    <textarea class="form-control" rows="5" placeholder="Share your thoughts..." required></textarea>
                                    <button type="submit" class="btn-accent">Post Comment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        @if (isset($blog->blog_sections) && !empty($blog->blog_sections))
                            <!-- Table of Contents -->
                            <div class="toc" data-aos="fade-up" data-aos-delay="200">
                                <h4><i class="fas fa-list"></i> Table of Contents</h4>
                                <ul>
                                    @php $count = 1; @endphp
                                    @foreach ($blog->blog_sections as $section)
                                        @php
                                            $link = strtolower($section->section_title);
                                            $link = str_replace(['/', ' '], '-', $link);
                                            $link = preg_replace('/[^a-z0-9-]+/', '-', $link);
                                            $link = trim($link, '-');
                                            $link = preg_replace('/-+/', '-', $link);
                                        @endphp
                                        <li><a href="#{{ $link }}">{{ $count }}.
                                                {{ $section->section_headline }}</a></li>
                                        @php $count++; @endphp
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (isset($blog->blog_tags) && !empty($blog->blog_tags))
                            @php
                                $blog_tags = explode(',', $blog->blog_tags);
                            @endphp
                            <!-- Tags Section -->
                            <div class="tags-section" data-aos="fade-up">
                                <h5>Tags:</h5>
                                @foreach ($blog_tags as $blog_tag)
                                    <a href="#" class="tag">{{ $blog_tag }}</a>
                                @endforeach
                            </div>
                        @endif

                        <!-- Author Box -->
                        <div class="author-box" data-aos="fade-up">
                            <img src="{{ asset($blog->writer_image) }}" alt="{{ $blog->written_by }}">
                            <div>
                                <h5>{{ $blog->written_by }}</h5>
                                <div class="author-role">{{ $blog->writer_designation }}</div>
                                <div class="author-bio">
                                    {!! strip_tags(htmlspecialchars_decode($blog->writer_description)) !!}
                                </div>
                                <div class="share-icons">
                                    <a href="{{ $blog->writer_x }}"><i class="fab fa-twitter"></i></a>
                                    <a href="{{ $blog->writer_linkedin }}"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="{{ $blog->writer_instagram }}"><i class="fab fa-instagram"></i></a>
                                    <a href="{{ $blog->writer_personal }}"><i class="fas fa-globe"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Posts -->
    <section class="related-posts">
        <div class="container">
            <h4 data-aos="fade-up">Related Articles</h4>
            @if ($blog->related_blogs->isNotEmpty())
                <div class="row g-4">
                    @foreach ($blog->related_blogs as $related_blog)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="related-post-card">
                                <a href="#">
                                    <img src="{{ asset($blog->blog_image) }}" alt="{{ $blog->blog_headline }}">
                                    <div class="card-body">
                                        <h6>{{ $blog->blog_headline }}</h6>
                                        <p>{!! strip_tags(htmlspecialchars_decode($blog->short_description)) !!}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row g-4">
                    No Data Found!
                </div>
            @endif
        </div>
    </section>
@endsection
