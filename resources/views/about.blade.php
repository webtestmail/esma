@extends('Layouts.MainLayouts')

@section('title')
    {{ $data['meta_title'] }}
@endsection

@section('content')
    @include('components.breadcrumb')

    @php
        $about_section_one = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(10);
    @endphp
    @if ($about_section_one)
        <!-- About Section -->
        <section class="about-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right">
                        <div class="about-img">
                            <img src="{{ asset($about_section_one->section_image) }}"
                                alt="{{ $about_section_one->section_headline }}" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 ps-lg-5 mt-4 mt-lg-0" data-aos="fade-left">
                        <h2 class="web-title">{{ $about_section_one->section_headline }}</h2>
                        {!! htmlspecialchars_decode($about_section_one->description) !!}
                    </div>
                </div>
            </div>
        </section>
    @endif

    @php
        $about_section_two = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(11);
    @endphp
    @if ($about_section_two)
        <!-- Mission Section -->
        <section class="mission-section">
            <div class="container">
                <h3 class="web-title" data-aos="fade-up">{{ $about_section_two->section_headline }}</h3>
                <p data-aos="fade-up" data-aos-delay="200">
                    {!! strip_tags(htmlspecialchars_decode($about_section_two->description)) !!}
                </p>
            </div>
        </section>
    @endif

    @php
        $about_section_three = resolve(App\Http\Controllers\Admin\PagesController::class)->getPageSection(12);
    @endphp
    @if ($about_section_three)
        <!-- Team Section -->
        <section class="team-section">
            <div class="container">
                <div class="text-center mb-5">
                    <h2 class="web-title" data-aos="fade-up">{{ $about_section_three->section_headline }}</h2>
                </div>
                @php
                    $about_team_section = resolve(App\Http\Controllers\Admin\TeamController::class)->getTeam();
                @endphp
                @if ($about_team_section->isNotEmpty())
                    <div class="row g-4">
                        @foreach ($about_team_section as $member)
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="team-card">
                                    <img src="{{ asset($member->employee_image) }}" alt="{{ $member->employee_name }}">
                                    <h5>{{ $member->employee_name }}</h5>
                                    <p>{{ $member->employee_designation }}</p>
                                    <div style="margin-top: 15px;">
                                        @if (filled($member->instagram_count))
                                            <i class="fab fa-instagram"
                                                style="color: var(--accent-color); margin-right: 10px;"></i>
                                            <span style="color: #ccc;">{{ $member->instagram_count }}</span>
                                        @endif
                                        @if (filled($member->youtube_count))
                                            <i class="fab fa-youtube"
                                                style="color: var(--accent-color); margin-right: 10px;"></i>
                                            <span style="color: #ccc;">{{ $member->youtube_count }}</span>
                                        @endif
                                        @if (filled($member->tiktok_count))
                                            <i class="fab fa-tiktok"
                                                style="color: var(--accent-color); margin-right: 10px;"></i>
                                            <span style="color: #ccc;">{{ $member->tiktok_count }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    @include('components.cta')
@endsection
