@extends('user-dashboard.layouts.MainLayouts')
@section('dashboard-title', 'Edit Profile')
@section('content')
<div class="dashboard-wrapper">
    <div class="container">
        <div class="row">
            @include('user-dashboard.components.dashboard-sidebar')

            <div class="col-lg-9 mainContent-col">
                <div class="dashboard-content">

                    @include('user-dashboard.components.dashboard-header')

                    <div class="dashboard-content-inner">
                        <div class="c-spacer__horizontal my-4"></div>
                        <h2 class="dashboard-page-title">Edit Profile</h2>

                        <div class="dashboard-stat-card border-0 p-0 mt-4">

                            <ul class="profile-edit-content">
                                <div class="accordion" id="accordionProfile">

                                    <form id="companyDetails">

                                        <div class="accordion-item">

                                            <h2 class="accordion-header" id="headingDetails">
                                                <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                                    data-bs-target="#details" type="button">
                                                    Company Details
                                                </button>
                                            </h2>

                                            <div id="details" class="accordion-collapse collapse"
                                                data-bs-parent="#accordionProfile">

                                                <div class="accordion-body dash-form edit-profile-form">

                                                    <div class="row g-4">

                                                        <div class="col-lg-6 form-box">
                                                            <label>Company Name <span>*</span></label>
                                                            <input type="text" class="form-control" name="company_name"
                                                                value="{{ !empty($user->userprofile()) ? $user->userprofile->company_name : $userCompany->company_name ?? '' }}">
                                                        </div>

                                                        <div class="col-lg-6 form-box">
                                                            <label>Slogan <span>*</span></label>
                                                            <input type="text" class="form-control" name="slogan"
                                                                value="{{ !empty($user->userprofile()) ? $user->userprofile->slogan :  '' }}">
                                                        </div>

                                                        <div class="col-lg-6 form-box">
                                                            <label>Number Of Employees</label>
                                                            <input type="text" class="form-control"
                                                                name="employee_count"
                                                                value="{{ !empty($user->userprofile()) ? $user->userprofile->number_of_employees :  '' }}">
                                                        </div>

                                                        <div class="col-lg-6 form-box">
                                                            <label>Company Type <span>*</span></label>
                                                            <input type="text" class="form-control"
                                                                name="organization_type"
                                                                value="{{ !empty($user->userprofile()) ? $user->userprofile->company_type : $userCompany->organization_type ?? '' }}">
                                                        </div>

                                                        <div class="col-lg-12 form-box">
                                                            <label>Company Description</label>

                                                            <textarea class="form-control"
                                                                name="company_description">{{ !empty($user->userprofile()) ? $user->userprofile->company_description :  '' }}</textarea>
                                                        </div>

                                                        <div class="col-lg-12 text-end">

                                                            <button type="submit" class="form-submit-btn">
                                                                Save & Publish
                                                            </button>

                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </form>

                                    <!-- Products & Brands -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingProducts">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#products"
                                                aria-expanded="false" aria-controls="products">
                                                Products & Brands
                                            </button>
                                        </h2>
                                        <div id="products" class="accordion-collapse collapse"
                                            aria-labelledby="headingProducts" data-bs-parent="#accordionProfile">
                                            <div class="accordion-body">
                                                <form id="productsBrandsForm" >
                                                    <!-- Trade Sectors -->
                                                    <div class="mb-4">
                                                        <label class="form-label fw-semibold">Trade Sectors <span
                                                                class="text-danger">*</span></label>
                                                        <div class="row">


                                                            @foreach(array_chunk($trade_sectors->toArray(),
                                                            ceil(count($trade_sectors)/3)) as $column)

                                                            <div class="col-md-4">

                                                                @foreach($column as $value)

                                                                <div class="form-check">

                                                                    <input type="checkbox" class="form-check-label"
                                                                        id="trade_{{ \Illuminate\Support\Str::slug($value['name']) }}"
                                                                        name="trade[]" value="{{ $value['id'] }}">

                                                                    <label class="form-check-label"
                                                                        for="trade_{{ \Illuminate\Support\Str::slug($value['name']) }}">

                                                                        {{ $value['name'] }}

                                                                    </label>

                                                                </div>

                                                                @endforeach

                                                            </div>

                                                            @endforeach

                                                        </div>
                                                    </div>
                                                    <!-- Product Categories -->
                                                    <div class="mb-4">
                                                        <label class="form-label fw-semibold">Product Categories <span
                                                                class="text-danger">*</span></label>
                                                        <div class="row">
                                                            @foreach(array_chunk($product_categories->toArray(),
                                                            ceil(count($product_categories)/3)) as $column)
                                                            <div class="col-md-4">
                                                                @foreach($column as $value)
                                                                <div class="form-check">
                                                                    <input type="checkbox"
                                                                        id="product_{{ \Illuminate\Support\Str::slug($value['name']) }}" name="product_category[]" value="{{ $value['id'] }}">
                                                                    <label class="form-check-label"
                                                                        for="product_{{ \Illuminate\Support\Str::slug($value['name']) }}">
                                                                        {{ $value['name'] }}
                                                                    </label>
                                                                </div>
                                                                @endforeach
                                                            </div>

                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <!-- Temperature -->
                                                    <div class="mb-4">
                                                        <label class="form-label fw-semibold">Temperature <span
                                                                class="text-danger">*</span></label>
                                                        <div class="row">
                                                            @foreach(array_chunk($temperatures->toArray(),
                                                            ceil(count($temperatures)/3)) as $column)
                                                            <div class="col-md-4">
                                                                @foreach($column as $value)
                                                                <div class="form-check">
                                                                    <input type="checkbox" id="temperature_{{ \Illuminate\Support\Str::slug($value['name']) }}" name="temperature[]" value="{{ $value['id'] }}">
                                                                    <label class="form-check-label"
                                                                        for="temperature_{{ \Illuminate\Support\Str::slug($value['name']) }}" name="temperature[]" value="{{ $value['id'] }}">
                                                                        {{ $value['name'] }}
                                                                    </label>
                                                                </div>
                                                                @endforeach
                                                            </div>

                                                       @endforeach
                                                        </div>
                                                    </div>
                                                    <!-- Highlight Your Brands -->
                                                   <div class="mb-4">
                                                        <label class="form-label fw-semibold">Highlight Your Brands</label>
                                                        <select class="form-control select2-brands" name="brands[]" multiple="multiple">
                                                            @foreach($brands as $brand)
                                                                <option value="{{ $brand->id }}" 
                                                                    {{ in_array($brand->id, $user->brands->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                                    {{ $brand->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <span class="text-muted form-span"><em>Search and select your brands from the list</em></span>
                                                    </div>
                                                    <div class="col-lg-12 text-end">
                                                        <button type="submit" class="form-submit-btn"> <svg
                                                                class="svg-icon">
                                                                <use href="../images/icons/icons-sprite.svg#icon-tick">
                                                                </use>
                                                            </svg>
                                                            Save & Publish
                                                        </button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                    <!-- Company Links -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingLinks">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#links" aria-expanded="false"
                                                aria-controls="links">
                                                Company Links
                                            </button>
                                        </h2>
                                        <div id="links" class="accordion-collapse collapse"
                                            aria-labelledby="headingLinks" data-bs-parent="#accordionProfile">
                                            <div class="accordion-body">
                                                <form id="companyLinksForm" >
                                                    <div class="row g-4">
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Website URL</label>
                                                            <input type="url" placeholder="" name="website_url" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Linkedin URL</label>
                                                            <input type="url" placeholder="" name="linkedin_url" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Facebook URL</label>
                                                            <input type="url" placeholder="" name="facebook_url" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">X URL</label>
                                                            <input type="url" placeholder="" name="twitter_urls" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Instagram URL</label>
                                                            <input type="url" placeholder="" name="instagram_url" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Youtube URL</label>
                                                            <input type="url" placeholder="" name="youtube_url" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Pinterest URL</label>
                                                            <input type="url" placeholder="" name="pinterest_url" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Whatsapp URL or Number</label>
                                                            <input type="text" placeholder="" name="whatsapp_url_or_number" class="form-control">
                                                        </div>
                                                        <!-- If add btn is click this is for that container  -->
                                                        <div id="customLinksContainerLinks" class="m-0"></div>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <!-- <div class="col-lg-4 text-start">
                                                                <button type="submit" id="addCustomLinkBtnLinks"
                                                                    class="btn-submit-2 form-submit-btn">
                                                                    <svg class="svg-icon">
                                                                        <use
                                                                            href="../images/icons/icons-sprite.svg#icon-plus">
                                                                        </use>
                                                                    </svg> Add Custom Link
                                                                </button>
                                                            </div> -->
                                                            <div class="col-lg-4 text-end">
                                                                <button type="submit" class="form-submit-btn"> <svg
                                                                        class="svg-icon">
                                                                        <use
                                                                            href="../images/icons/icons-sprite.svg#icon-tick">
                                                                        </use>
                                                                    </svg>
                                                                    Save & Publish</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Company Contact Details -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingContact">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#contact"
                                                aria-expanded="false" aria-controls="contact">
                                                Company Contact Details
                                            </button>
                                        </h2>
                                        <div id="contact" class="accordion-collapse collapse"
                                            aria-labelledby="headingContact" data-bs-parent="#accordionProfile">
                                            <div class="accordion-body">
                                                <form action="">
                                                    <div class="row g-4">
                                                        <div class="col-lg-12 form-box">
                                                            <label for="">Main Address</label>
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Google Maps URL</label>
                                                            <input type="url" placeholder="" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Country</label>
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>

                                                        <!-- If add btn is click this is for that container  -->
                                                        <div id="customLinksContainerAddress" class="m-0"></div>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="col-lg-4 text-start">
                                                                <button type="button" id="addCustomLinkBtnAddress"
                                                                    class="btn-submit-2 form-submit-btn">
                                                                    <svg class="svg-icon">
                                                                        <use
                                                                            href="../images/icons/icons-sprite.svg#icon-plus">
                                                                        </use>
                                                                    </svg> Add Exrta Address
                                                                </button>
                                                            </div>
                                                            <div class="col-lg-4 text-end">
                                                                <button type="submit" class="form-submit-btn"> <svg
                                                                        class="svg-icon">
                                                                        <use
                                                                            href="../images/icons/icons-sprite.svg#icon-tick">
                                                                        </use>
                                                                    </svg>
                                                                    Save & Publish</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Point Of Contact -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingPOC">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#poc" aria-expanded="false"
                                                aria-controls="poc">
                                                Point Of Contact
                                            </button>
                                        </h2>
                                        <div id="poc" class="accordion-collapse collapse" aria-labelledby="headingPOC"
                                            data-bs-parent="#accordionProfile">
                                            <div class="accordion-body">
                                                <form class="profile-form">
                                                    <div class="row g-4">
                                                        <div class="col-lg-12 form-box">
                                                            <!-- file uplaod class (image-upload) do not change it  -->
                                                            <div class="image-upload form-control">
                                                                <input type="file" accept="image/*" hidden>
                                                                <div class="upload-placeholder">
                                                                    <button type="button" class="select-btn"> <svg
                                                                            class="svg-icon"
                                                                            style="width:20px;height:20px;">
                                                                            <use
                                                                                href="../images/icons/icons-sprite.svg#icon-camera">
                                                                            </use>
                                                                        </svg> Select Photo</button>
                                                                </div>
                                                                <div class="image-preview">
                                                                    <img src="" alt="preview">
                                                                    <span class="file-name"></span>
                                                                    <div class="actions">
                                                                        <button type="button" class="edit-btn"><svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-edit">
                                                                                </use>
                                                                            </svg></button>
                                                                        <button type="button" class="delete-btn"> <svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-bin">
                                                                                </use>
                                                                            </svg> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Contact Name <span>*</span></label>
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Surname <span>*</span></label>
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Contact Position <span>*</span></label>
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Contact Gender <span>*</span></label>
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Email <span>*</span></label>
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>
                                                        <div class="col-lg-6 form-box">
                                                            <label for="">Phone<span>*</span></label>
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>

                                                        <!-- JS injected contacts & extra feilds-->
                                                        <div id="customProfileContainer" class="m-0"></div>

                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="col-lg-4 text-start">
                                                                <button type="button" id="addProfileBtn"
                                                                    class="btn-submit-2 form-submit-btn">
                                                                    <svg class="svg-icon">
                                                                        <use
                                                                            href="../images/icons/icons-sprite.svg#icon-plus">
                                                                        </use>
                                                                    </svg> Add Extra Contact
                                                                </button>
                                                            </div>

                                                            <div class="col-lg-4 text-end">
                                                                <button type="submit" class="form-submit-btn">
                                                                    <svg class="svg-icon">
                                                                        <use
                                                                            href="../images/icons/icons-sprite.svg#icon-tick">
                                                                        </use>
                                                                    </svg> Save & Publish
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Appearance -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingAppearance">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#appearance"
                                                aria-expanded="false" aria-controls="appearance">
                                                Appearance
                                            </button>
                                        </h2>
                                        <div id="appearance" class="accordion-collapse collapse"
                                            aria-labelledby="headingAppearance" data-bs-parent="#accordionProfile">
                                            <div class="accordion-body">
                                                <form class="appearance-form">
                                                    <div class="row g-4">
                                                        <div class="col-lg-12 form-box">
                                                            <label for="">Company Logo</label>
                                                            <div class="image-upload form-control">
                                                                <input type="file" accept="image/*" hidden>
                                                                <div class="upload-placeholder">
                                                                    <button type="button" class="select-btn"> <svg
                                                                            class="svg-icon"
                                                                            style="width:20px;height:20px;">
                                                                            <use
                                                                                href="../images/icons/icons-sprite.svg#icon-camera">
                                                                            </use>
                                                                        </svg> Select Photo</button>
                                                                </div>
                                                                <div class="image-preview">
                                                                    <img src="" alt="preview">
                                                                    <span class="file-name"></span>
                                                                    <div class="actions">
                                                                        <button type="button" class="edit-btn"><svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-edit">
                                                                                </use>
                                                                            </svg></button>
                                                                        <button type="button" class="delete-btn"> <svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-bin">
                                                                                </use>
                                                                            </svg> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span class="form-span">We recommend square images
                                                                larger than 256x256px.</span>
                                                        </div>

                                                        <div class="col-lg-12 form-box">
                                                            <label for="">Cover Image</label>
                                                            <div class="image-upload form-control">
                                                                <input type="file" accept="image/*" hidden>
                                                                <div class="upload-placeholder">
                                                                    <button type="button" class="select-btn"> <svg
                                                                            class="svg-icon"
                                                                            style="width:20px;height:20px;">
                                                                            <use
                                                                                href="../images/icons/icons-sprite.svg#icon-camera">
                                                                            </use>
                                                                        </svg> Select Photo</button>
                                                                </div>
                                                                <div class="image-preview">
                                                                    <img src="" alt="preview">
                                                                    <span class="file-name"></span>
                                                                    <div class="actions">
                                                                        <button type="button" class="edit-btn"><svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-edit">
                                                                                </use>
                                                                            </svg></button>
                                                                        <button type="button" class="delete-btn"> <svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-bin">
                                                                                </use>
                                                                            </svg> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span class="form-span">We recommend images larger than
                                                                1024x768px.</span>
                                                        </div>

                                                        <div class="col-lg-12 form-box">
                                                            <label>Display Promotional Banner? <span>*</span></label>
                                                            <div class="radio-group d-flex align-items-center gap-2">
                                                                <label
                                                                    class="radio-box d-inline-flex align-items-center gap-1">
                                                                    <input type="radio" name="promo_banner" value="yes">
                                                                    <span class="custom-radio"></span>
                                                                    Yes
                                                                </label>

                                                                <label
                                                                    class="radio-box d-inline-flex align-items-center gap-1">
                                                                    <input type="radio" name="promo_banner" value="no">
                                                                    <span class="custom-radio"></span>
                                                                    No
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-12 form-box">
                                                            <label for="">Promotional Banner</label>
                                                            <div class="image-upload form-control">
                                                                <input type="file" accept="image/*" hidden>
                                                                <div class="upload-placeholder">
                                                                    <button type="button" class="select-btn"> <svg
                                                                            class="svg-icon"
                                                                            style="width:20px;height:20px;">
                                                                            <use
                                                                                href="../images/icons/icons-sprite.svg#icon-camera">
                                                                            </use>
                                                                        </svg> Select Photo</button>
                                                                </div>
                                                                <div class="image-preview">
                                                                    <img src="" alt="preview">
                                                                    <span class="file-name"></span>
                                                                    <div class="actions">
                                                                        <button type="button" class="edit-btn"><svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-edit">
                                                                                </use>
                                                                            </svg></button>
                                                                        <button type="button" class="delete-btn"> <svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-bin">
                                                                                </use>
                                                                            </svg> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span class="form-span">We recommend images that are
                                                                1440x480px or larger.</span>
                                                        </div>

                                                        <div class="col-lg-12 form-box">
                                                            <label for="">Promotional Banner (For mobile
                                                                devices)</label>
                                                            <div class="image-upload form-control">
                                                                <input type="file" accept="image/*" hidden>
                                                                <div class="upload-placeholder">
                                                                    <button type="button" class="select-btn"> <svg
                                                                            class="svg-icon"
                                                                            style="width:20px;height:20px;">
                                                                            <use
                                                                                href="../images/icons/icons-sprite.svg#icon-camera">
                                                                            </use>
                                                                        </svg> Select Photo</button>
                                                                </div>
                                                                <div class="image-preview">
                                                                    <img src="" alt="preview">
                                                                    <span class="file-name"></span>
                                                                    <div class="actions">
                                                                        <button type="button" class="edit-btn"><svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-edit">
                                                                                </use>
                                                                            </svg></button>
                                                                        <button type="button" class="delete-btn"> <svg
                                                                                class="svg-icon"
                                                                                style="width:20px;height:20px;">
                                                                                <use
                                                                                    href="../images/icons/icons-sprite.svg#icon-bin">
                                                                                </use>
                                                                            </svg> </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span class="form-span">We recommend square images larger
                                                                than 768x768px..</span>
                                                        </div>

                                                        <div class="col-lg-12 form-box">
                                                            <label for="">Link For Promotional Banner
                                                                <span>*</span></label>
                                                            <input type="text" placeholder="" class="form-control">
                                                        </div>

                                                        <div class="col-lg-12 text-end">
                                                            <button type="submit" class="form-submit-btn">
                                                                <svg class="svg-icon">
                                                                    <use
                                                                        href="../images/icons/icons-sprite.svg#icon-tick">
                                                                    </use>
                                                                </svg> Save & Publish
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </ul>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@push('user-custom-js')
<script>
    $(document).ready(function() {
       $("#companyLinksForm").validate({
            rules: {
                facebook_url: {
                    url: true
                },
                twitter_urls: {
                    url: true
                },
                instagram_url: {
                    url: true
                },
                youtube_url: {
                    url: true
                },
                pinterest_url: {
                    url: true
                },
                whatsapp_url_or_number: {
                    required: true
                }
            },
            messages: {
                facebook_url: {
                    url: "Please enter a valid URL"
                },
                twitter_urls: {
                    url: "Please enter a valid URL"
                },
                instagram_url: {
                    url: "Please enter a valid URL"
                },
                youtube_url: {
                    url: "Please enter a valid URL"
                },
                pinterest_url: {
                    url: "Please enter a valid URL"
                },
                whatsapp_url_or_number: {
                    required: "Whatsapp URL or number is required"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
            submitHandler: function(form) {
                
                $.ajax({
                    url: "{{ route('member.company.link') }}",
                    type: "POST",
                    data: $(form).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res) {
                        if (res.success === false) {
                            alertify.error(res.message);
                            return;
                        }
                        alertify.success("Company profile updated successfully");
                    },
                    error: function(xhr, status, error) {
                        alertify.error("Something went wrong");
                    }
                });
            }
    });   
    });
    $(document).ready(function() {
        $('#productsBrandsForm').submit(function(e) {
            e.preventDefault();

            let tradeSectors = $('input[name="trade[]"]:checked').length;
            let productCats = $('input[name="product_category[]"]:checked').length;
            let temps = $('input[name="temperature[]"]:checked').length;

            if (tradeSectors === 0 ) {
                alertify.error('Please select at least one item from Trade sector section.');
                return false;
            }
            if (productCats === 0) {
                alertify.error('Please select at least one item from Product category section.');
                return false;
            }
            if (temps === 0) {
                alertify.error('Please select at least one item from Temperature section.');
                return false;
            }

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('member.profile.product_category.store') }}", 
                method: "POST",
                data: formData,
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                beforeSend: function() {
                    // Disable button to prevent double clicks
                    $('.form-submit-btn').prop('disabled', true).text('Saving...');
                },
                success: function(response) {
                    if (response.success) {
                        alertify.success(response.message);
                        
                    }
                },
                error: function(xhr) {
                    $('.form-submit-btn').prop('disabled', false).html('Save & Publish');
                    
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            alertify.error(value[0]);
                        });
                    } else {
                        alertify.error('Something went wrong. Please try again.');
                    }
                }
            });
        });
});
</script>
<script>
$(document).ready(function() {

    $("#companyDetails").submit(function(e) {

        e.preventDefault();

        let form = $(this);

        let company_name = $("input[name='company_name']").val();
        let slogan = $("input[name='slogan']").val();
        let organization_type = $("input[name='organization_type']").val();
        let employee_count = $("input[name='employee_count']").val();


        // simple validation
        if (company_name == "") {
            alertify.error("Company name is required");
            return false;
        }

        if (slogan == "") {
            alertify.error("Slogan is required");
            return false;
        }

        if (organization_type == "") {
            alertify.error("Company type is required");
            return false;
        }
        if (employee_count == "") {
            alertify.error("Number of employee is required");
            return false;
        }


        // ajax submit
        $.ajax({

            url: "{{ route('member.company.details') }}",
            type: "POST",
            data: form.serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(res) {
                if (res.success === false) {
                    alertify.error(res.message);
                    return;
                }
                alertify.success("Company profile updated successfully");

            },

            error: function(xhr, status, error) {
                alertify.error("Something went wrong");

            }

        });

    });

});
</script>
<script>
let addressCount = 0;

document.addEventListener("DOMContentLoaded", function() {
    // Custom Links Section
    const addCustomLinkBtnLinks = document.getElementById("addCustomLinkBtnLinks");
    const customLinksContainerLinks = document.getElementById("customLinksContainerLinks");
    if (addCustomLinkBtnLinks && customLinksContainerLinks) {
        addCustomLinkBtnLinks.addEventListener("click", function() {
            const newField = document.createElement("div");
            newField.className = "row mt-4 custom-link-field";
            newField.innerHTML = `
                    <div class="col-6">
                        <label>Custom Link - Caption</label>
                        <input type="text" class="form-control" maxlength="12">
                        <span class="text-muted form-span"><em>Max 12 characters</em></span>
                    </div>
                    <div class="col-6">
                        <label>Custom Link - URL</label>
                        <input type="url" class="form-control">
                    </div>
                    <button type="button" class="btn btn-sm btn-danger mt-2 removeLink w-auto"><i class="bi bi-trash"></i></button>
                `;
            customLinksContainerLinks.appendChild(newField);
        });
        customLinksContainerLinks.addEventListener("click", function(e) {
            if (e.target.classList.contains("removeLink")) {
                e.target.closest(".custom-link-field").remove();
            }
        });
    }

    // Exrta Address Section
    const addCustomLinkBtnAddress = document.getElementById("addCustomLinkBtnAddress");
    const customLinksContainerAddress = document.getElementById("customLinksContainerAddress");
    if (addCustomLinkBtnAddress && customLinksContainerAddress) {
        addCustomLinkBtnAddress.addEventListener("click", function() {
            addressCount++;
            const wrapper = document.createElement("div");
            wrapper.className = "col-lg-12 extra-address  mt-3";
            wrapper.innerHTML = `
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <label>Main Address</label>
                            <input type="text" class="form-control" name="extra_address_${addressCount}" placeholder="">
                        </div>
                        <div class="col-lg-6">
                            <label>Google Maps URL</label>
                            <input type="url" class="form-control" name="extra_map_${addressCount}" placeholder="">
                        </div>
                        <div class="col-lg-6">
                            <label>Country</label>
                            <input type="text" class="form-control" name="extra_country_${addressCount}" placeholder="">
                        </div>
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-sm btn-danger removeAddress"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                `;
            customLinksContainerAddress.appendChild(wrapper);
        });
        customLinksContainerAddress.addEventListener("click", function(e) {
            if (e.target.classList.contains("removeAddress")) {
                e.target.closest(".extra-address").remove();
            }
        });
    }

    // Profile Form feilds 
    const addProfileBtn = document.getElementById("addProfileBtn");
    const customProfileContainer = document.getElementById("customProfileContainer");

    if (addProfileBtn && customProfileContainer) {

        addProfileBtn.addEventListener("click", function() {

            const wrapper = document.createElement("div");
            wrapper.className = "row g-4 mt-3 extra-contact";

            wrapper.innerHTML = `

        <div class="col-lg-12 form-box">
            <div class="image-upload form-control">
                <input type="file" accept="image/*" hidden>

                <div class="upload-placeholder">
                    <button type="button" class="select-btn">
                        <svg class="svg-icon" style="width:20px;height:20px;"> <use href="../images/icons/icons-sprite.svg#icon-camera"></use></svg>
                    Select Photo </button>
                </div>

                <div class="image-preview">
                    <img src="" alt="preview">
                    <span class="file-name"></span>

                    <div class="actions">
                        <button type="button" class="edit-btn">✏️</button>
                        <button type="button" class="delete-btn">🗑</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 form-box">
            <label>Contact Name</label>
            <input type="text" class="form-control">
        </div>

        <div class="col-lg-6 form-box">
            <label>Surname</label>
            <input type="text" class="form-control">
        </div>

        <div class="col-lg-6 form-box">
            <label>Contact Position</label>
            <input type="text" class="form-control">
        </div>

        <div class="col-lg-6 form-box">
            <label>Contact Gender</label>
            <input type="text" class="form-control">
        </div>

        <div class="col-lg-6 form-box">
            <label>Email</label>
            <input type="text" class="form-control">
        </div>

        <div class="col-lg-6 form-box">
            <label>Phone</label>
            <input type="text" class="form-control">
        </div>

        <div class="col-12 text-end">
            <button type="button" class="btn btn-sm btn-danger removeProfile">
                <i class="bi bi-trash"></i>
            </button>
        </div>

        `;

            customProfileContainer.appendChild(wrapper);

        });


        customProfileContainer.addEventListener("click", function(e) {

            if (e.target.closest(".removeProfile")) {
                e.target.closest(".extra-contact").remove();
            }

        });

    }

});
</script>


<script>
document.querySelectorAll(".file-upload").forEach(wrapper => {

    const input = wrapper.querySelector(".file-input");
    const button = wrapper.querySelector(".upload-btn");
    const preview = wrapper.querySelector(".preview");

    button.addEventListener("click", () => {
        input.click();
    });

    input.addEventListener("change", function() {
        const file = this.files[0];
        if (!file) return;

        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = "block";
        };

        reader.readAsDataURL(file);
    });

});
</script>
<script>
document.querySelectorAll(".image-upload").forEach(upload => {

    const input = upload.querySelector("input");
    const selectBtn = upload.querySelector(".select-btn");

    const previewBox = upload.querySelector(".image-preview");
    const placeholder = upload.querySelector(".upload-placeholder");

    const img = upload.querySelector("img");
    const fileName = upload.querySelector(".file-name");

    const editBtn = upload.querySelector(".edit-btn");
    const deleteBtn = upload.querySelector(".delete-btn");


    selectBtn.addEventListener("click", () => input.click());
    editBtn.addEventListener("click", () => input.click());

    input.addEventListener("change", () => {

        const file = input.files[0];
        if (!file) return;

        const reader = new FileReader();

        reader.onload = function(e) {

            img.src = e.target.result;
            fileName.textContent = file.name;

            previewBox.style.display = "flex";
            placeholder.style.display = "none";
        }

        reader.readAsDataURL(file);
    });

    deleteBtn.addEventListener("click", () => {

        input.value = "";
        img.src = "";
        fileName.textContent = "";

        previewBox.style.display = "none";
        placeholder.style.display = "block";

    });

});
</script>
@endpush
@endsection