  @php
      
      $brands = resolve(App\Http\Controllers\Admin\MasterController::class)->getBrands();
  @endphp

 @if(isset($brands) && count($brands) > 0)
<section class="home-logos">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="home-logos-header">
                 @foreach($brands as $val)
                <div class="home-logo"><img src="{{ asset($val->brand_image ?? '') }}" alt="{{ $val->name?? '' }}"></div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>
@endif