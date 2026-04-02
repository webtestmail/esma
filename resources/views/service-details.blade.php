@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
    @include('components.breadcrumb')

    <!-- Service Detail Content -->
    <section class="service-detail-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-overview-card">
                        <h2 class="mb-4">{{ $service->service_name }}</h2>

                        <div class="service-de-img">
                            <img src="{{ asset($service->service_image) }}" alt="{{ $service->service_name }}"
                                class="img-fluid mb-4" data-aos="fade-up">
                        </div>

                        {!! htmlspecialchars_decode($service->description) !!}
                    </div>

                    @if ($service->service_sections->isNotEmpty())
                        <div class="row service-feature-grid">
                            @foreach ($service->service_sections as $service_section)
                                <div class="col-md-6 mb-4">
                                    <div class="service-feature-item">
                                        <div class="service-feature-icon">
                                            {!! $service_section->section_icon !!}
                                        </div>
                                        <h4 class="service-feature-title">{{ $service_section->section_headline }}</h4>
                                        <p class="service-feature-desc">
                                            {{ strip_tags(htmlspecialchars_decode($service_section->description)) }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="col-lg-4">
                    <div class="service-highlights">
                        <h4 class="mb-4">Service Highlights</h4>
                        {!! htmlspecialchars_decode($service->service_highlights) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $service_section_one = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(1);
    @endphp
    @if ($service_section_one)
        <!-- Service Image Gallery -->
        <section class="service-image-gallery">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h2 class="web-title">{{ $service_section_one->section_headline }}</h2>
                        <p class="web-para">{!! strip_tags(htmlspecialchars_decode($service_section_one->description)) !!}</p>
                    </div>
                </div>
                @if ($service_section_one->sub_sections->isNotEmpty())
                    <div class="row">
                        @foreach ($service_section_one->sub_sections as $sub_section)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="service-gallery-item">
                                    <div class="service-gallery-image">
                                        <img src="{{ asset($sub_section->section_image) }}"
                                            alt="{{ $sub_section->section_headline }}">
                                    </div>
                                    <div class="service-gallery-overlay">
                                        <h5>{{ $sub_section->section_headline }}</h5>
                                        <p class="mb-0">{!! strip_tags(htmlspecialchars_decode($sub_section->description)) !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    @php
        $service_section_two = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(3);
    @endphp
    @if ($service_section_two)
        <!-- Service Process Steps -->
        <section class="service-process-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center mb-5">
                        <h2 class="web-title text-white">{{ $service_section_two->section_headline }}</h2>
                        <p class="web-para text-white">{!! strip_tags(htmlspecialchars_decode($service_section_two->description)) !!}</p>
                    </div>
                </div>
                @if ($service_section_two->sub_sections->isNotEmpty())
                    <div class="service-process-timeline">
                        @php $count = 1; @endphp
                        @foreach ($service_section_two->sub_sections as $sub_section)
                            <div class="service-process-step">
                                <div class="service-step-content">
                                    <h4>{{ $sub_section->section_headline }}</h4>
                                    {!! htmlspecialchars_decode($sub_section->description) !!}
                                </div>
                                <div class="service-step-number">{{ $count }}</div>
                            </div>
                            @php $count++; @endphp
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    @include('components.cta')
@endsection
