 <div class="row">

            <div class="col-lg-3">
                <!-- Members Filter -->
                <div class="members-filter">

                    <div class="accordion members-accordion" id="membersFilterAccordion">
                        <!-- Company Name -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#companyName">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-company"></use>
                                    </svg>
                                    <span>Company Name</span>
                                </button>
                            </h2>

                            <div id="companyName" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="filter-search mb-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-search"></use>
                                        </svg>
                                        <input type="search" wire:model.live.debounce.300ms="search" placeholder="Type company name or tagline">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Member Category -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#memberCategory">
                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-tag-stroke"></use>
                                    </svg>
                                    <span>Member Category</span>
                                </button>
                            </h2>

                            <div id="memberCategory" class="accordion-collapse collapse show">
                                <div class="accordion-body">
                                    <div class="filter-list">
                                        @foreach($memberCategories as $category)
                                        <label class="filter-check">
                                            <input type="checkbox" value="{{ $category->name }}" wire:model.live="selectedCategories">
                                            <span></span>
                                            {{ $category->name }}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Category -->
                        <div class="accordion-item">

                            <h2 class="accordion-header">
                                <button class="accordion-button" data-bs-toggle="collapse"
                                    data-bs-target="#productCategory">

                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-tag-stroke"></use>
                                    </svg>

                                    <span>Product Category</span>

                                </button>
                            </h2>

                            <div id="productCategory" class="accordion-collapse collapse show">

                                <div class="accordion-body">

                                    <div class="product-filter">

                                        @foreach($product_categories as $product)
                                        <div class="product-item active">

                                            <div class="product-head">
                                                <label class="filter-check">
                                                    <input type="checkbox" value="{{ $product->id }}" wire:model.live="selectedProducts">
                                                    <span></span>
                                                    {{ $product->name }}
                                                </label>
                                            </div>
                                        
                                        </div>
                                        @endforeach
                           
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Country -->
                        <div class="accordion-item">

                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#countryFilter">

                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-location-stroke"></use>
                                    </svg>

                                    <span>Country</span>

                                </button>
                            </h2>

                            <div id="countryFilter" class="accordion-collapse collapse">
                                <div class="accordion-body">
                                    <div class="filter-search mb-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-search"></use>
                                        </svg>
                                        <input type="search" placeholder="Find Country">
                                    </div>
                                    <div class="filter-list scroll">
                                        @foreach($countries as $country)
                                        <label class="filter-check"><input type="checkbox" value="{{ $country->id }}" wire:model.live="selectedCountries"><span></span>{{ $country->name }}</label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">

                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#tradeSector">

                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-setting"></use>
                                    </svg>

                                    <span>Trade Sector</span>

                                </button>
                            </h2>

                            <div id="tradeSector" class="accordion-collapse collapse">

                                <div class="accordion-body">

                                    <div class="filter-search mb-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-search"></use>
                                        </svg>
                                        <input type="search" placeholder="Find sectors">
                                    </div>

                                    <div class="filter-list scroll">
                                        @foreach($trade_sectors as $sector)
                                        <label class="filter-check"><input type="checkbox" value="{{ $sector->id }}" wire:model.live="selectedTradeSectors"><span></span>{{ $sector->name }}</label>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                                    
                        </div>


                        <!-- Brand -->
                        <div class="accordion-item">

                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                    data-bs-target="#brandFilter">

                                    <svg class="svg-icon">
                                        <use href="images/icons/icons-sprite.svg#icon-brand"></use>
                                    </svg>

                                    <span>Brand</span>

                                </button>
                            </h2>

                            <div id="brandFilter" class="accordion-collapse collapse">

                                <div class="accordion-body">

                                    <div class="filter-search mb-2">
                                        <svg class="svg-icon">
                                            <use href="images/icons/icons-sprite.svg#icon-search"></use>
                                        </svg>
                                        <input type="search" placeholder="Find brands" wire:model.live="brandSearch">
                                    </div>

                                    <div class="filter-list scroll">
                                        @foreach($brands as $brand)
                                        <label class="filter-check"><input type="checkbox"><span></span>{{ $brand->name }}</label>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                                      

            </div>
            @foreach($members as $profile)
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-6 mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="member-company-boxes">
                            <div class="company-m-img"><img src="images/A. Loacker SpaAG/Untitled-1.jpg"
                                    alt="A. Loacker Spa/AG"></div>
                            <div class="c-tag">{{ ucfirst($profile->company_type) }}</div>
                            <div class="company-m-text">
                                <div class="company-m-logo-both">
                                    <div class="company-m-logo">
                                        <img src="{{ asset('images/c-brands__circles.png') }}" alt="">
                                        <div class="company-m-country-logo"><img src="{{ asset('images/c-glyph-flags.png') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('view-profile', [$profile->slug]) }}" class="company-m-name">{{ $profile->company_name }}</a>
                                <span>{{ $profile->slogan }}</span>
                            </div>
                        </div>
                    </div>
           
                </div>
                <div class="custom-pagination d-flex align-items-center justify-content-center gap-2">

                {{ $members->links() }}    <!-- Prev -->
                
                </div>

            </div>
            @endforeach

        </div>