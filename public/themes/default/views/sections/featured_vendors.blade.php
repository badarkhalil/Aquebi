@if (count($featured_vendors))
  <section class="my-4">
    <div class="product-type">
      <div class="container">
        <div class="product-type__inner">
          <div class="row">
            @foreach ($featured_vendors as $featured_vendor)
              <div class="col-lg-4">
                <div class="product-type__col">
                  <div class="product-type__col-header">
                    <div class="sell-header">
                      {{-- <div class="sell-header__title"> --}}
                      <div class="mr-2">
                        <h2>
                          <img src="{{ get_storage_file_url(optional($featured_vendor->logoImage)->path, 'thumbnail') }}" class="seller-info-logo mb-1" alt="{{ trans('theme.logo') }}">
                        </h2>
                      </div>

                      <div class="header-line">
                        <span></span>
                      </div>

                      <div class="ml-1">
                        <ul>
                          <li>
                            <h4>
                              <a href="{{ route('show.store', $featured_vendor->slug) }}" class="seller-info-name ml-1" targer="_blank">
                                {!! $featured_vendor->getQualifiedName() !!}
                              </a>
                            </h4>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="product-type__col-product">

                    @include('theme::partials._product_vertical', ['products' => $featured_vendor->inventories->take(5)])

                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endif
