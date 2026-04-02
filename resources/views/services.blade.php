@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
    @include('components.breadcrumb')

    <!-- Services Section -->
    <section class="services-section py-5">
        <div class="container">
            <div class="text-center mb-5 w-75 mx-auto">
                <h2 class="web-title text-white" data-aos="fade-up">{{ $page->page_headline }}</h2>
                <p class="text-white web-para" data-aos="fade-up" data-aos-delay="200">
                    {!! strip_tags(htmlspecialchars_decode($page->description)) !!}
                </p>
            </div>

            @if ($data['services']->isNotEmpty())
                <div class="row g-4">
                    @foreach ($data['services'] as $service)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="service-card">
                                <div class="service-icon">
                                    {!! $service->service_icon !!}
                                </div>
                                <h4>{{ $service->service_title }}</h4>
                                {!! htmlspecialchars_decode($service->short_description) !!}
                                <a href="{{ route('single.service', $service->service_url) }}" class="service-btn">Learn
                                    More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    @php
        $service_section_one = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(6);
    @endphp
    @if ($service_section_one)
        <!-- Process Section -->
        <section class="process-section py-5">
            <div class="container">
                <div class="text-center mb-5 w-75 mx-auto">
                    <h2 class="web-title" data-aos="fade-up">{{ $service_section_one->section_headline }}</h2>
                    <p class="web-para" data-aos="fade-up" data-aos-delay="200">
                        {!! strip_tags(htmlspecialchars_decode($service_section_one->description)) !!}
                    </p>
                </div>

                @if ($service_section_one->sub_sections->isNotEmpty())
                    <div class="row">
                        @php $count = 1; @endphp
                        @foreach ($service_section_one->sub_sections as $sub_section)
                            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="process-step">
                                    <div class="step-number">{{ $count }}</div>
                                    <h5>{{ $sub_section->section_headline }}</h5>
                                    {!! htmlspecialchars_decode($sub_section->description) !!}
                                </div>
                            </div>
                            @php $count++; @endphp
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <div class="stat-label">Happy Clients</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <span class="stat-number">1M+</span>
                        <div class="stat-label">Campaigns Delivered</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <span class="stat-number">50+</span>
                        <div class="stat-label">Brand Partners</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-item">
                        <span class="stat-number">95%</span>
                        <div class="stat-label">Success Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    @include('components.cta')
@endsection
