<div id="primary-navigation">
  <div class="header__top">
    <div class="container-fluid">
      <div class="header__top-inner py-0">
        <div class="header__top-welcome">
          {{-- @if (is_incevio_package_loaded('zipcode') && Session::has('zipcode')) --}}
          @if (is_incevio_package_loaded('zipcode') && Session::has('zipcode_default'))
            <a class="modalAction" href="{{ route(config('zipcode.routes.shipTo')) }}">
              <i class="fal fa-location-arrow"></i> {{ trans('theme.ship_to') . ' ' . Session::get('zipcode_default') }}
            </a>
          @else
            <h3>{{ trans('theme.welcome') . ' ' . config('app.name') }}</h3>
          @endif

          {{-- @unless (empty($promotional_tagline['text']))
            <a style="text-decoration: none" href="{{ $promotional_tagline['action_url'] ?? 'javascript:void(0)' }}">
              {!! $promotional_tagline['text'] !!}
            </a>
          @endunless --}}
        </div>

        <div class="header__top-utility">
          <ul>
            @auth('customer')
              <li class="image-icon">
                <a href="{{ route('account', 'dashboard') }}">
                  <i class="fal fa-user"></i>
                  <span>{{ trans('theme.hello') .
                      ', ' .
                      Auth::guard('customer')->user()->getName() }}</span>
                </a>
              </li>

              <li class="image-icon">
                <a href="{{ route('customer.logout') }}">
                  <i class="fal fa-power-off"></i>
                  <span>{{ trans('theme.logout') }}</span>
                </a>
              </li>
            @else
              <li class="image-icon">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal">
                  <i class="fal fa-user"></i>
                  <span>{{ trans('theme.sing_in') }}</span>
                </a>
              </li>
            @endauth

            @if (is_wallet_configured_for('customer'))
              <li class="image-icon">
                <a href="{{ route('customer.account.wallet') }}">
                  <i class="fas fa-wallet"></i>
                  @if (Auth::guard('customer')->check())
                    <strong>{{ get_formated_currency(Auth::guard('customer')->user()->balance) }}</strong>
                  @else
                    {{ trans('wallet::lang.wallet') }}
                  @endif
                </a>
              </li>
            @endif

            {{-- <li class="image-icon">
              <a href="{{ route('brands') }}">
                <i class="fal fa-crown"></i> {{ trans('theme.all_brands') }}
              </a>
            </li>

            <li class="image-icon">
              <a href="{{ route('shops') }}">
                <i class="fal fa-store"></i> {{ trans('theme.all_shops') }}
              </a>
            </li> --}}

            <li class="image-icon">
              <a href="{{ route('account', 'orders') }}">
                <!-- <img src="images/truck.svg" alt=""> -->
                <i class="fal fa-map-marker-alt"></i> {{ trans('theme.track_your_order') }}
              </a>
            </li>
            <li class="image-icon">
              <a href="{{ get_page_url(\App\Models\Page::PAGE_CONTACT_US) }}">
                <i class="fal fa-life-ring"></i> {{ trans('theme.support') }}
              </a>
            </li>

            {{-- <li class="currency">
              <select name="currency" id="currencyChange">
                <option value="usd" data-imagesrc="{{ theme_asset_url('icon/lang3.png') }}">USD</option>
                <option value="jpy" data-imagesrc="{{ theme_asset_url('icon/lang4.png') }}">JPY</option>
                <option value="eur" data-imagesrc="{{ theme_asset_url('icon/lang5.png') }}">EUR</option>
                <option value="aud" data-imagesrc="{{ theme_asset_url('icon/lang6.png') }}">AUD</option>
              </select>
            </li> --}}

            <li class="language">
              <select name="lang" id="languageChange">
                @foreach (config('active_locales') as $lang)
                  <option dd-link="{{ route('locale.change', $lang->code) }}" value="{{ $lang->code }}" data-imagesrc="{{ get_flag_img_by_code(array_slice(explode('_', $lang->php_locale_code), -1)[0], true) }}" {{ $lang->code == \App::getLocale() ? 'selected' : '' }}>
                    {{ $lang->language }}
                  </option>
                @endforeach
              </select>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="header__main">
    <div class="container">
      <div class="header__main-inner">
        <div class="header__menu-icon">
          <div class="menu-icon">
            <a class="main-menu-toggle" href="javascript:void(0);"><i class="fal fa-bars"></i></a>
          </div>
        </div>
        <div class="header__logo mr-3">
          <a href="{{ url('/') }}">
            <img src="{{ get_logo_url('system', 'logo') }}" class="brand-logo" alt="{{ trans('theme.logo') }}" title="{{ trans('theme.logo') }}">
          </a>
        </div>

        <!-- Customer Care -->
        {{-- <div class="d-none d-xl-block col-md-auto"> --}}
        {{-- <div class="d-flex"> --}}
        {{-- <i class="fal fa-user-headset fa-3x"></i> --}}
        {{-- <div class="ml-2"> --}}
        {{-- <div class="phone"> --}}
        {{-- <strong>{{ trans('theme.support') }}:</strong> <a href="tel:{{ config('system_settings.support_phone') }}" class="text-info">{{ config('system_settings.support_phone') }}</a> --}}
        {{-- </div> --}}
        {{-- <div class="email"> --}}
        {{-- {{ trans('theme.email') }}: <a href="mailto:{{ config('system_settings.support_email') }}" class="text-info"> --}}
        {{-- {{ config('system_settings.support_email') }} --}}
        {{-- </a> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        {{-- </div> --}}
        <!-- End Customer Care -->

        <div class="header__search ml-md-2 my-1">
          {!! Form::open(['route' => 'inCategoriesSearch', 'method' => 'GET', 'id' => 'search-categories-form', 'class' => 'navbar-left navbar-search mb-1', 'role' => 'search']) !!}
          <div class="search-box header-search-border-color">
            <div class="search-box__input">
              {!! Form::text('q', Request::get('q'), ['id' => 'autoSearchInput', 'placeholder' => trans('theme.main_searchbox_placeholder'), 'autocomplete' => 'off', 'data-search']) !!}
            </div>

            <div class="search-box__select d-none d-sm-block">
              <i class="fas fa-caret-down"></i>
              {{-- <i class="fad fa-chevron-down"></i> --}}
              <select class="category search-category-select" name="insubgrp">
                <option value="all">{{ trans('theme.all_categories') }}</option>

                @foreach ($search_category_list as $search_category_grp)
                  <optgroup label="{{ $search_category_grp->name }}">
                    @foreach ($search_category_grp->subGroups as $search_category)
                      <option value="{{ $search_category->slug }}" {{ Request::get('insubgrp') == $search_category->slug ? 'selected' : '' }}>
                        {{ $search_category->name }}
                      </option>
                    @endforeach
                  </optgroup>
                @endforeach
              </select>
            </div>

            <div class="search-box__button">
              <button type="submit" class="navbar-search-submit">

                {{-- <button type="submit" class="navbar-search-submit" onclick="document.getElementById('search-categories-form').submit()"> --}}
                {{-- <a class="navbar-search-submit" onclick="document.getElementById('search-categories-form').submit()"> --}}
                <i class="fal fa-search"></i>
                {{-- </a> --}}
              </button>
            </div>

            {{-- Search Autocomplete package load --}}
            @if (is_incevio_package_loaded('searchAutocomplete'))
              @include('searchAutocomplete::_autoComplete')
            @endif
          </div>
          {!! Form::close() !!}

          <p id="search-nav-feedabck" class="pl-4 text-danger small hide">{{ trans('theme.type_min_char', ['min' => 3]) }}</p>

          {{-- Trending Keywords --}}
          @if (is_incevio_package_loaded('trendingKeywords'))
            @include('trendingKeywords::_keyword_lists')
          @endif
        </div>

        <div class="header__utility ml-md-4">
          <ul>
            <li>
              <a href="{{ route('account', 'account') }}">
                <i class="fal fa-user" data-toggle="tooltip" data-placement="top" title="{{ trans('theme.your_account') }}"></i>
                <!-- <img src="images/big-user.svg" alt=""> -->
              </a>
            </li>

            @if (is_incevio_package_loaded('comparison'))
              @php
                $comparison_item = !empty(Session::get('comparables')) ? count(Session::get('comparables')) : 0;
              @endphp
              <li>
                <a href="{{ route('product.comparables') }}">
                  <i class="fal fa-balance-scale" data-toggle="tooltip" data-placement="top" title="{{ trans('theme.your_comparisons') }}"></i>
                  {{-- <i class="far fa-repeat-alt"></i> --}}
                  {{-- <i class="fal fa-balance-scale-right"></i> --}}
                  <span id="globalCompareItemCount" class="badge {{ $comparison_item == 0 ? 'hidden' : '' }}">{{ $comparison_item }}</span>
                </a>
              </li>
            @endif

            <li>
              <a href="{{ route('account', 'wishlist') }}">
                <i class="fal fa-heart" data-toggle="tooltip" data-placement="top" title="{{ trans('theme.your_wishlist') }}"></i>
                <span id="globalWishlistItemCount" class="badge {{ $wishlist_item_count == 0 ? 'hidden' : '' }}">{{ $wishlist_item_count }}</span>
                <!-- <img src="images/big-heart.svg" alt=""> -->
                {{-- <span class="badge">2</span> --}}
              </a>
            </li>

            <li>
              <a href="{{ route('cart.index') }}">
                <i class="fal fa-shopping-cart" data-toggle="tooltip" data-placement="top" title="{{ trans('theme.your_cart') }}"></i>
                <!-- <img src="images/shopping-bag.svg" alt=""> -->
                <span id="globalCartItemCount" class="badge {{ $cart_item_count == 0 ? 'hidden' : '' }}">{{ $cart_item_count }}</span>
              </a>
            </li>

            {{-- <li>
              <a href="#">
                <i class="fas fa-wallet"></i>
                <!-- <img src="images/wal.svg" alt=""> -->
                <span>$159.00</span>
              </a>
            </li> --}}
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="header__navigation">
  <div class="container">
    <div class="header__navigation-inner">
      <ul class="menu-dropdown-list header__navigation-category">
        @if (is_null($hidden_menu_items) || !in_array('Categories', $hidden_menu_items))
          <li>
            <a href="{{ route('categories') }}" class="menu-link" data-menu-link>
              <i class="fas fa-stream" style="margin-right: 10px;"></i>
              {{ trans('theme.categories') }}
              {{-- <i class="far fa-chevron-down"></i> --}}
            </a>

            <ul class="menu-cat" data-menu-toggle>
              @foreach ($all_categories as $catGroup)
                @if ($catGroup->subGroups->count())
                  @php
                    $categories_count = $catGroup->subGroups->sum('categories_count');
                    $cat_counter = 0;
                  @endphp
                  <li>
                    <a href="{{ route('categoryGrp.browse', $catGroup->slug) }}">
                      @if ($catGroup->logoImage && Storage::exists($catGroup->logoImage->path))
                        <img src="{{ get_storage_file_url($catGroup->logoImage->path, 'tiny_thumb') }}" alt="{{ $catGroup->name }}">
                      @else
                        <i class="fal {{ $catGroup->icon ?? 'fa-cube' }}"></i>
                      @endif

                      <span>{{ $catGroup->name }}</span>
                      <i class="fal fa-chevron-right"></i>
                    </a>

                    <div class="mega-dropdown" style="background-image:url({{ $catGroup->backgroundImage ? get_storage_file_url(optional($catGroup->backgroundImage)->path, 'full') : '' }}); background-position: right bottom; background-repeat: no-repeat;margin-right: 0; background-size: contain;">

                      <div class="row">
                        @foreach ($catGroup->subGroups as $subGroup)
                          <div class="col-lg-{{ $categories_count > 15 ? '4' : '6' }}">
                            @php
                              $cat_counter = 0; //Reset the counter
                            @endphp

                            <div class="mega-dropdown__item">
                              <h3>
                                <a href="{{ route('categories.browse', $subGroup->slug) }}">{{ $subGroup->name }}</a>
                              </h3>
                              <ul>
                                @foreach ($subGroup->categories as $cat)
                                  <li>
                                    <a href="{{ route('category.browse', $cat->slug) }}">{{ $cat->name }}</a>
                                    @if ($cat->description)
                                      <p class="text-muted">{!! $cat->description !!}</p>
                                    @endif
                                  </li>
                                  @php
                                    $cat_counter++; //Increase the counter value by 1
                                  @endphp
                                @endforeach
                              </ul>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </li>
                @endif
              @endforeach
            </ul>
          </li>
        @endif
      </ul>

      <ul class="header__menu">
        @if (is_null($hidden_menu_items) || !in_array('Brands', $hidden_menu_items))
          <li>
            <a class="menu-link" href="{{ route('brands') }}">
              <i class="fal fa-crown menu-icon"></i> {{ trans('theme.brands') }}
            </a>
          </li>
        @endif

        @if (is_null($hidden_menu_items) || !in_array('Vendors', $hidden_menu_items))
          <li>
            <a class="menu-link" href="{{ route('shops') }}">
              <i class="fal fa-store menu-icon"></i> {{ trans('theme.vendors') }}
            </a>
          </li>
        @endif

        @foreach (get_main_nav_categories() as $nav_cat)
          <li>
            <a class="menu-link" href="{{ route('category.browse', $nav_cat->slug) }}">
              <i class="fas fa-fire-alt menu-icon"></i> {{ $nav_cat->name }}
            </a>
          </li>
        @endforeach

        @if (is_incevio_package_loaded('eventy'))
          @if (is_null($hidden_menu_items) || !in_array('events', $hidden_menu_items))
            <li>
              <a class="menu-link" href="{{ route('events') }}">
                <i class="fal fa-calendar-alt menu-icon"></i> {{ trans('theme.events') }}
              </a>
            </li>
          @endif
        @endif

        @foreach ($pages->where('position', 'main_nav') as $page)
          <li>
            <a href="{{ get_page_url($page->slug) }}" class="menu-link">
              <i class="fal fa-link menu-icon"></i> {{ $page->title }}
            </a>
          </li>
        @endforeach

        @if (is_null($hidden_menu_items) || !in_array('Sale', $hidden_menu_items))
          <li>
            <a class="menu-link" href="{{ url('/selling') }}">
              <i class="fal fa-seedling menu-icon"></i>
              {{ trans('theme.nav.sell_on', ['platform' => get_platform_title()]) }}
            </a>
          </li>
        @endif

        {{-- <li class="menu-dropdown-list">
                      <a class="menu-link" href="#">
                        Shop
                        <i class="far fa-chevron-down"></i>
                      </a>
                      <div class="menu-cat shop-menu">
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="menu-cat__item mega-dropdown__item">
                              <h3>
                                <a href="#">Home & Garden</a>
                              </h3>
                              <ul>
                                <li><a href="#">Schoen and Sons <p>Air Jordan 1 Top 3 Sneaker (DS)</p> </a></li>
                                <li><a href="#">Funk, Paucek and Krajcik <p>iPad Pro 2017 Model</p> </a></li>
                                <li><a href="#">Home Entertainment <p>Heimer Miller Sofa (Mint Condition)</p> </a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="menu-cat__item mega-dropdown__item">
                              <h3>
                                <a href="#">Electronics</a>
                              </h3>
                              <ul>
                                <li><a href="#">Corkery Group <p>Brand New Bike, Local buyer only</p> </a></li>
                                <li><a href="#">Corkery Group <p>Coach Tabby 26 for sale</p> </a></li>
                                <li><a href="#">Home Entertainment <p>Playstation 4 Limited Edition (with games)</p> </a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="menu-cat__item mega-dropdown__item">
                              <h3>
                                <a href="#">hobbies & DIY</a>
                              </h3>
                              <ul>
                                <li><a href="#">Schoen and Sons <p>DJI Mavic Pro 2</p> </a></li>
                                <li><a href="#">Funk, Paucek and Krajcik <p>Dell Computer Monitor</p> </a></li>
                                <li><a href="#">Dell Computer Monitor <p>Gopro hero 7 (with receipt)</p> </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="menu-cat__item mega-dropdown__item">
                              <h3>
                                <a href="#">Pats</a>
                              </h3>
                              <ul>
                                <li><a href="#">Schoen and Sons <p>Macbook Pro 16 inch (2020 ) For Sale</p> </a></li>
                                <li><a href="#">Funk, Paucek and Krajcik <p>Heimer Miller Sofa (Mint Condition)</p> </a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="menu-cat__item mega-dropdown__item">
                              <h3>
                                <a href="#">kids & Toy</a>
                              </h3>
                              <ul>
                                <li><a href="#">Schoen and Sons <p>Gaming Chair, local pickup only</p> </a></li>
                                <li><a href="#">Funk, Paucek and Krajcik <p>Lego Star'War edition</p> </a></li>
                              </ul>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="menu-cat__item mega-dropdown__item">
                              <h3>
                                <a href="#">Clothing & Shoes</a>
                              </h3>
                              <ul>
                                <li><a href="#">Schoen and Sons <p>Brand New Bike, Local buyer only</p> </a></li>
                                <li><a href="#">Funk, Paucek and Krajcik <p>Gaming Chair, local pickup only</p> </a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="menu-banner">
                              <a href="#">
                                <img src="{{ theme_asset_url('img/shop-1.png') }}" alt="">
                              </a>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="menu-banner">
                              <a href="#">
                                <img src="{{ theme_asset_url('img/shop-2.png') }}" alt="">
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li> --}}

        {{-- <li class="menu-dropdown-list">
                    <a class="menu-link" href="#">
                      Pages
                      <i class="far fa-chevron-down"></i>
                    </a>
                    <ul class="menu-cat">
                      <li>
                        <a href="#">Shopping Cart</a>
                      </li>
                      <li>
                        <a href="#">Checkout</a>
                      </li>
                      <li>
                        <a href="#">Account</a>
                      </li>
                      <li>
                        <a href="#">About Us</a>
                      </li>
                      <li>
                        <a href="#">Blog</a>
                      </li>
                      <li>
                        <a href="#">Wishlist</a>
                      </li>
                    </ul>
                  </li> --}}
      </ul>

      <div class="shale-text">
        <a style="text-decoration: none" href="{{ $promotional_tagline['action_url'] ?? 'javascript:void(0)' }}">
          <p>{{ !empty($promotional_tagline['text']) ? $promotional_tagline['text'] : '' }}</p>
        </a>
      </div>
    </div>
  </div>
</div>
