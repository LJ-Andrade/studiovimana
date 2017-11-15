@extends('layouts.store.main')

@section('content')

      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">
          <!-- Products-->
          <div class="col-xl-9 col-lg-8 push-xl-3 push-lg-4">
            <!-- Shop Toolbar-->
            <div class="shop-toolbar padding-bottom-1x mb-2">
              <div class="column">
                <div class="shop-sorting">
                  <label for="sorting">Ordenar por:</label>
                  <select class="form-control" id="sorting">
                    <option>Menor Precio</option>
                    <option>Mayor Precio</option>
                    <option>A - Z</option>
                    <option>Z - A</option>
                  </select>
                  {{--  
                  If Search
                  <span class="text-muted">Mostrando:&nbsp;</span><span>1 - 12 items</span>  --}}
                </div>
              </div>
              <div class="column">
                {{--  <div class="shop-view"><a class="grid-view active" href="shop-grid-ls.html"><span></span><span></span><span></span></a><a class="list-view" href="shop-list-ls.html"><span></span><span></span><span></span></a></div>  --}}
              </div>
            </div>
            <!-- Products Grid-->
            <div class="isotope-grid cols-3 mb-2">
              <div class="gutter-sizer"></div>
              <div class="grid-sizer"></div>
              <!-- Product-->A
              @foreach($articles as $article)
              <div class="grid-item">
                <div class="product-card">
                  {{--  <div class="product-badge text-danger">50% Off</div>  --}}
                  <a class="product-thumb" href="shop-single.html"><img src="{{ asset('webimages/catalogo/'.$article->thumb) }}" alt="Product"></a>
                  <h3 class="product-title"><a href="shop-single.html">{{ $article->name }}</a></h3>
                  <h4 class="product-price">
                    {{--  <del>$99.99</del>  --}}
                    $ {{ $article->price }}
                  </h4>
                  <div class="product-buttons">
                    <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist"><i class="icon-heart"></i></button>
                    <button class="btn btn-outline-primary btn-sm" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!">Add to Cart</button>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <!-- Pagination-->
            {!! $articles->render() !!}

            <nav class="pagination">
              <div class="column">
                <ul class="pages">
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li>...</li>
                  <li><a href="#">12</a></li>
                </ul>
              </div>
              <div class="column text-right hidden-xs-down"><a class="btn btn-outline-secondary btn-sm" href="#">Next&nbsp;<i class="icon-arrow-right"></i></a></div>
            </nav>
          </div>
          <!-- Sidebar          -->
          <div class="col-xl-3 col-lg-4 pull-xl-9 pull-lg-8">
            <aside class="sidebar">
              <div class="padding-top-2x hidden-lg-up"></div>
              <!-- Widget Categories-->
              <section class="widget widget-categories">
                <h3 class="widget-title">Categorias</h3>
                <ul>
                  @foreach($categories as $category)
                  <li class=""><a href="#">{{ $category }}</a><span>(1138)</span></li>
                  @endforeach
                </ul>
              </section>

              <!-- Widget Size Filter-->
              <section class="widget">
                <h3 class="widget-title">Filter by Size</h3>
                <label class="custom-control custom-checkbox d-block">
                  <input class="custom-control-input" type="checkbox"><span class="custom-control-indicator"></span><span class="custom-control-description">XL&nbsp;<span class="text-muted">(208)</span></span>
                </label>
                <label class="custom-control custom-checkbox d-block">
                  <input class="custom-control-input" type="checkbox"><span class="custom-control-indicator"></span><span class="custom-control-description">L&nbsp;<span class="text-muted">(311)</span></span>
                </label>
                <label class="custom-control custom-checkbox d-block">
                  <input class="custom-control-input" type="checkbox"><span class="custom-control-indicator"></span><span class="custom-control-description">M&nbsp;<span class="text-muted">(485)</span></span>
                </label>
                <label class="custom-control custom-checkbox d-block">
                  <input class="custom-control-input" type="checkbox"><span class="custom-control-indicator"></span><span class="custom-control-description">S&nbsp;<span class="text-muted">(213)</span></span>
                </label>
              </section>

            </aside>
          </div>
        </div>
      </div>
  
@endsection
    