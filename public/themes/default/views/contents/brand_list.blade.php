<section>
  <div class="container text-center mb-5 mt-0">
    <div class="row thumb-lists">
      @foreach ($brands as $brand)
        <div class="col-6 col-md-2 my-5">
          <span class="vertical-helper"></span>
          <a href="{{ route('show.brand', $brand->slug) }}" class="">
            <img class="lazy" src="/images/loading.webp" data-src="{{ get_storage_file_url(optional($brand->logoImage)->path, 'logo_square') }}">
            <p>{{ $brand->name }}</p>
          </a>
        </div>
      @endforeach
    </div><!-- /.row -->

    <div class="row d-flex justify-content-center pagenav-wrapper mt-5 mb-3">
      {{ $brands->links('theme::layouts.pagination') }}
    </div>
  </div><!-- /.container -->
</section>
