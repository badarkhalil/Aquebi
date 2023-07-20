<script>
  // Send transaction data with a pageview if available
  // when the page loads. Otherwise, use an event when the transaction data becomes available.
  dataLayer.push({
    ecommerce: null
  }); // Clear the previous ecommerce object.

  dataLayer.push({
    event: 'purchase',
    'ecommerce': {
      'purchase': {
        'actionField': {
          'transaction_id': '{{ $order->order_number }}',
          'affiliation': '{{ $order->shop->name }}',
          'revenue': {{ $order->grand_total }},
          'tax': {{ $order->taxes }},
          'shipping': {{ $order->get_shipping_cost() }},
          'coupon': {{ $order->discount }}
        },
        'products': [
          @foreach ($order->inventories as $schema_item)
            @php
              $t_category = $schema_item->product->categories->first();
            @endphp {
              'name': '{{ $schema_item->title }}',
              'id': '{{ $schema_item->sku }}',
              'price': {{ $schema_item->pivot->unit_price }},
              'brand': '{{ $schema_item->brand }}',
              'category': '{{ $t_category->subGroup->group->name }}',
              'variant': '',
              'quantity': {{ $schema_item->pivot->quantity }}
            }
            @unless($loop->last)
              ,
            @endunless
          @endforeach
        ]
      }
    }
  });
</script>
