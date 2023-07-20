<a class="button product-link itemQuickView" href="javascript:void(0);" data-link="{{ route('quickView.product', $item->slug) }}" rel="nofollow noindex" data-toggle="tooltip" data-placement="top" title="{{ trans('app.quick_view') }}">
  <i class="fal fa-eye"></i>
</a>

@if (is_incevio_package_loaded('comparison'))
  <a class="button product-link add-to-product-compare" data-link="{{ route('comparable.add', $item->id) }}" data-toggle="tooltip" data-placement="top" title="{{ trans('comparison::lang.add_to_compare') }}">
    <i class="fal fa-balance-scale"></i>
  </a>
@endif

<a href="javascript:void(0);" data-link="{{ route('wishlist.add', $item) }}" class="button add-to-wishlist" data-toggle="tooltip" data-placement="top" title="{{ trans('theme.button.add_to_wishlist') }}">
  <i class="fal fa-heart"></i>
</a>

{{-- <a href="#" class="button">
    <i class="fal fa-repeat"></i>
</a> --}}
<a href="javascript:void(0);" data-link="{{ route('cart.addItem', $item->slug) }}" class="button button--cart sc-add-to-cart">
  <i class="fal fa-shopping-cart"></i>
  {{ trans('theme.add_to_cart') }}
</a>
