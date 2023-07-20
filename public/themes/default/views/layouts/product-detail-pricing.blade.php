<div class="row">
  <div class="col-6 product-info-price nopadding-right">
    <span class="product-info-price-new">
      {!! get_formated_price($item->current_sale_price(), config('system_settings.decimals', 2)) !!}
    </span>

    @if ($item->hasOffer())
      <span class="old-price">{!! get_formated_price($item->sale_price, config('system_settings.decimals', 2)) !!}</span>
    @endif
  </div>

  @if($item->sold_quantity > 0)
    <div class="col-6 sold-qtt-progress nopadding-left">
      <span class="sold-qtt-label">{{ trans('theme.sold_item_qtt', ['item' => $item->sold_quantity]) }}</span>
      <div class="progress">
        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
             style="width:{{ ($item->sold_quantity / ($item->stock_quantity + $item->sold_quantity)) * 100 }}%;"
             aria-valuenow="{{ $item->sold_quantity }}" aria-valuemin="0"
             aria-valuemax="{{ $item->stock_quantity }}"></div>
      </div>
    </div>
  @endif
</div>


{{-- <ul class="product-info-feature-labels">
    @foreach ($item->getLabels() as $label)
        <li>{!! $label !!}</li>
    @endforeach
</ul> --}}
