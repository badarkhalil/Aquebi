<section class="mb-4">
  <div class="shell-banner">
    <div class="container">
      <div class="shell-banner__inner">
        <div class="row">
          @foreach ($banners as $banner)
            <div class="col-lg-{{ $banner['columns'] }} col-12 my-2 px-2">
              <a href="{{ $banner['link'] }}">
                <div class="image-banner {{ $banner['columns'] > 11 ? 'single-banner' : '' }}">
                  <div class="shell-banner__box {{ !empty($banner['effect']) ? 'outline-effect' : '' }}">
                    <div class="shell-banner__img">
                      <img class="lazy" src="/images/loading.webp" data-src="{{ isset($banner['feature_image']['path']) && Storage::exists($banner['feature_image']['path']) ? get_storage_file_url($banner['feature_image']['path'], 'full') : get_storage_file_url() }}" alt="{{ $banner['title'] ?? 'Banner Image' }}" title="{{ $banner['title'] ?? 'Banner Image' }}">
                    </div>

                    <div class="shell-banner__overlay {{ isset($banner['color']) ? 'black' : '' }}">
                      <div class="single-banner__texts {{ isset($banner['color']) ? 'black' : '' }} ">
                        <div class=shell-banner__overlay-title>
                          <h3>{!! $banner['title'] !!}</h3>
                        </div>

                        <div class="shell-banner__overlay-text">
                          <p>{!! $banner['description'] !!}</p>
                        </div>
                      </div>

                      @if ($banner['link_label'])
                        <div class="neckbands__button">
                          <span>
                            {!! $banner['link_label'] ? $banner['link_label'] . ' <i class="fas fa-caret-right"></i>' : '' !!}
                          </span>
                        </div>
                      @endif

                      {{-- <div class="shell-banner__overlay-price-text">
                      <p>STARTING FROM</p>
                      <h3 class="shell-banner__orange">$399,00</h3>
                    </div> --}}
                    </div>
                  </div>
                  {{-- <a href="#">
                  <img src="images/ib-02.png" alt="">
                </a> --}}
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
