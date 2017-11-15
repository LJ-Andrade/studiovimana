@extends('layouts.store.main')

@section('content')

      <!-- Page Content-->
      <div class="container padding-bottom-3x mb-1">
        <div class="row">

            <div class="col-md-6">
            <div class="product-gallery"><span class="product-badge text-danger">30% Off</span>
              <div class="gallery-wrapper" data-pswp-uid="1">
                <div class="gallery-item active"><a href="img/shop/single/01.jpg" data-hash="one" data-size="1000x667"></a></div>
                <div class="gallery-item"><a href="img/shop/single/02.jpg" data-hash="two" data-size="1000x667"></a></div>
                <div class="gallery-item"><a href="img/shop/single/03.jpg" data-hash="three" data-size="1000x667"></a></div>
                <div class="gallery-item"><a href="img/shop/single/04.jpg" data-hash="four" data-size="1000x667"></a></div>
                <div class="gallery-item"><a href="img/shop/single/05.jpg" data-hash="five" data-size="1000x667"></a></div>
              </div>
              <div class="product-carousel owl-carousel owl-loaded owl-drag">
                
        
                
              <div class="owl-stage-outer"><div class="owl-stage" style="transform: translate3d(0px, 0px, 0px); transition: 0s; width: 2615px;"><div class="owl-item active" style="width: 523px;"><div data-hash="one"><img src="img/shop/single/01.jpg" alt="Product"></div></div><div class="owl-item" style="width: 523px;"><div data-hash="two"><img src="img/shop/single/02.jpg" alt="Product"></div></div><div class="owl-item" style="width: 523px;"><div data-hash="three"><img src="img/shop/single/03.jpg" alt="Product"></div></div><div class="owl-item" style="width: 523px;"><div data-hash="four"><img src="img/shop/single/04.jpg" alt="Product"></div></div><div class="owl-item" style="width: 523px;"><div data-hash="five"><img src="img/shop/single/05.jpg" alt="Product"></div></div></div></div><div class="owl-nav disabled"><div class="owl-prev">prev</div><div class="owl-next">next</div></div><div class="owl-dots disabled"></div></div>
              <ul class="product-thumbnails">
                <li class="active"><a href="#one"><img src="img/shop/single/th01.jpg" alt="Product"></a></li>
                <li><a href="#two"><img src="img/shop/single/th02.jpg" alt="Product"></a></li>
                <li><a href="#three"><img src="img/shop/single/th03.jpg" alt="Product"></a></li>
                <li><a href="#four"><img src="img/shop/single/th04.jpg" alt="Product"></a></li>
                <li><a href="#five"><img src="img/shop/single/th05.jpg" alt="Product"></a></li>
              </ul>
            </div>
          </div>

          <div class="col-md-6">
            <div class="padding-top-2x mt-2 hidden-md-up"></div>
              <div class="rating-stars"><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star filled"></i><i class="icon-star"></i>
              </div><span class="text-muted align-middle">&nbsp;&nbsp;4.2 | 3 customer reviews</span>
            <h2 class="padding-top-1x text-normal">Reebok Royal CL Jogger 2</h2><span class="h2 d-block">
              <del class="text-muted text-normal">$68.00</del>&nbsp; $47.60</span>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta voluptatibus quos ea dolore rem, molestias laudantium et explicabo assumenda fugiat deserunt in, facilis laborum excepturi aliquid nobis ipsam deleniti aut? Aliquid sit hic id velit qui fuga nemo suscipit obcaecati. Officia nisi quaerat minus nulla saepe aperiam sint possimus magni veniam provident.</p>
            <div class="row margin-top-1x">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="size">Men's size</label>
                  <select class="form-control" id="size">
                    <option>Chooze size</option>
                    <option>11.5</option>
                    <option>11</option>
                    <option>10.5</option>
                    <option>10</option>
                    <option>9.5</option>
                    <option>9</option>
                    <option>8.5</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-5">
                <div class="form-group">
                  <label for="color">Choose color</label>
                  <select class="form-control" id="color">
                    <option>White/Red/Blue</option>
                    <option>Black/Orange/Green</option>
                    <option>Gray/Purple/White</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <select class="form-control" id="quantity">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="pt-1 mb-2"><span class="text-medium">SKU:</span> #21457832</div>
            <div class="padding-bottom-1x mb-2"><span class="text-medium">Categories:&nbsp;</span><a class="navi-link" href="#">Men’s shoes,</a><a class="navi-link" href="#"> Snickers,</a><a class="navi-link" href="#"> Sport shoes</a></div>
            <hr class="mb-3">
            <div class="d-flex flex-wrap justify-content-between">
              <div class="entry-share mt-2 mb-2"><span class="text-muted">Share:</span>
                <div class="share-links"><a class="social-button shape-circle sb-facebook" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook"><i class="socicon-facebook"></i></a><a class="social-button shape-circle sb-twitter" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Twitter"><i class="socicon-twitter"></i></a><a class="social-button shape-circle sb-instagram" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Instagram"><i class="socicon-instagram"></i></a><a class="social-button shape-circle sb-google-plus" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google +"><i class="socicon-googleplus"></i></a></div>
              </div>
              <div class="sp-buttons mt-2 mb-2">
                <button class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="" data-original-title="Whishlist"><i class="icon-heart"></i></button>
                <button class="btn btn-primary" data-toast="" data-toast-type="success" data-toast-position="topRight" data-toast-icon="icon-circle-check" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="icon-bag"></i> Add to Cart</button>
              </div>
            </div>
          </div>


    
        </div>
      </div>
  
@endsection
    