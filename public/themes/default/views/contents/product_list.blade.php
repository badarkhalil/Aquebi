@include('theme::contents.product_list_top_filter')

<div class="row product-list">
  @foreach ($products as $item)
    <div class="col-12 col-sm-4 col-md-{{ $colum ?? '3' }} p-0">
      <div class="product product-grid-view sc-product-item">
        <ul class="product-info-labels">
          @if ($item->shop->isVerified() && Route::current()->getName() != 'show.store')
            <li>@lang('theme.from_verified_seller')</li>
          @endif
          @foreach ($item->getLabels() as $label)
            <li>{!! $label !!}</li>
          @endforeach
        </ul>
        <div class="product-img-wrap">
          <img class="product-img-primary lazy" src="/images/loading.webp" data-src="{{ get_product_img_src($item, 'medium') }}" alt="{{ $item->title }}" title="{{ $item->title }}" />

          <img class="product-img-alt lazy" src="/images/loading.webp" data-src="{{ get_product_img_src($item, 'medium', 'alt') }}" alt="{{ $item->title }}" title="{{ $item->title }}" />

          <a class="product-link" href="{{ route('show.product', $item->slug) }}"></a>
        </div>

        <div class="product-actions btn-group">

          @include('theme::partials._product_list_wishlist_btn')

          @if (is_incevio_package_loaded('comparison'))
            @include('comparison::_product_list_compare_btn')
          @endif

          <a class="btn btn-default flat itemQuickView" href="javascript:void(0);" data-link="{{ route('quickView.product', $item->slug) }}" rel="nofollow noindex" data-toggle="tooltip" title="@lang('theme.button.quick_view')">
            <i class="far fa-eye"></i> <span>@lang('theme.button.quick_view')</span>
          </a>

          <a class="btn btn-primary flat sc-add-to-cart add-to-card-mod" data-link="{{ route('cart.addItem', $item->slug) }}" data-toggle="tooltip" title="@lang('theme.add_to_cart')">
            <i class="far fa-shopping-cart"></i>
          </a>
        </div>

        <div class="product-info">
          @include('theme::layouts.ratings', ['ratings' => $item->ratings, 'count' => $item->ratings_count])

          <a href="{{ route('show.product', $item->slug) }}" class="product-info-title" data-name="product_name">{{ $item->title }}</a>

          <div class="product-info-availability">
            @lang('theme.availability'): <span>{{ $item->stock_quantity > 0 ? trans('theme.in_stock') : trans('theme.out_of_stock') }}</span>
          </div>

          @include('theme::layouts.pricing', ['item' => $item])

          <div class="product-info-desc"> {!! $item->description !!} </div>

          <ul class="product-info-feature-list">
            @if (config('system_settings.show_item_conditions'))
              <li>{!! $item->condition !!}</li>
            @endif
            {{-- <li>{{ $item->manufacturer->name }}</li> --}}
          </ul>
        </div><!-- /.product-info -->
      </div><!-- /.product -->
    </div><!-- /.col-md-* -->

    @if ($loop->iteration % 4 == 0)
      <div class="clearfix"></div>
    @endif
  @endforeach
</div><!-- /.row .product-list -->

<div class="sep"></div>

<div class="row pagenav-wrapper text-center mb-5 mt-3">
  {{ $products->appends(request()->input())->links('theme::layouts.pagination') }}
</div><!-- /.row .pagenav-wrapper -->
