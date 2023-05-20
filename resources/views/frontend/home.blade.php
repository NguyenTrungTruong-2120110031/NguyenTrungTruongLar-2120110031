@extends('layouts.site')
@section('title','Trang chủ')
@section('content')
<section>
  <div class="container">
      <div class="row">
          <div class="col-sm-2">
              {{-- <div class="left-sidebar">
                  <h2>Danh Mục Sản Phẩm</h2>
                  <div class="panel-group category-products" id="accordian">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                              <h4 class="panel-title">
                                  <a data-toggle="collapse" data-parent="#accordian" href="#giay">
                                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                      Giày Đá Bóng
                                  </a>
                              </h4>
                          </div>
                          <div id="giay" class="panel-collapse collapse">
                              <div class="panel-body">
                                <ul>
                                  <li><a href="#">Nike </a></li>
                                  <li><a href="#">Adidas </a></li>
                                  <li><a href="#">Puma</a></li>
                                  <li><a href="#">Mizuno</a></li>
                                  <li><a href="#">Kamito</a></li>
                                  <li><a href="#">Pan</a></li>
                                  <li><a href="#">Joma</a></li>
                                </ul>
                              </div>
                          </div>
                          <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#ao">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        Áo thể thao
                                    </a>
                                </h4>
                            </div>
                            <div id="ao" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">Nike </a></li>
                                        <li><a href="#">Adidas </a></li>
                                        <li><a href="#">Puma</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                      </div>							
                  </div><!--/category-products-->
              </div> --}}
          </div>
          
          <div class="col-sm-10 padding-right">
              <div class="features_items">
                  <h2 class="title text-center">Sản Phẩm</h2>
                  {{-- <div class="col-sm-4">
                      <div class="product-image-wrapper">
                          <div class="single-products">
                                  <div class="productinfo text-center">
                                      <img src="images/home/giay1.png" alt="" />
                                      <h2>680.000</h2>
                                      <p>GIÀY BÓNG ĐÁ PAN TIGER 8</p>
                                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                  </div>
                                  <div class="product-overlay">
                                      <div class="overlay-content">
                                          <h2>680.000</h2>
                                          <p>GIÀY BÓNG ĐÁ PAN TIGER 8</p>
                                          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                      </div>
                                  </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="product-image-wrapper">
                          <div class="single-products">
                              <div class="productinfo text-center">
                                  <img src="images/home/giay2.png" alt="" />
                                  <h2>490.000</h2>
                                  <p>GIÀY BÓNG ĐÁ PAN TANGO 2</p>
                                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                              </div>
                              <div class="product-overlay">
                                  <div class="overlay-content">
                                    <h2>490.000</h2>
                                    <p>GIÀY BÓNG ĐÁ PAN TANGO 2</p>
                                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="product-image-wrapper">
                          <div class="single-products">
                              <div class="productinfo text-center">
                                  <img src="images/home/giay3.png" alt="" />
                                  <h2>555.000</h2>
                                  <p>GIÀY BÓNG ĐÁ QH19</p>
                                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                              </div>
                              <div class="product-overlay">
                                  <div class="overlay-content">
                                      <h2>555.000</h2>
                                      <p>GIÀY BÓNG ĐÁ QH19</p>
                                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                  </div>
                              </div>
                              <img src="images/home/new.png" class="new" alt="" />
                          </div>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="product-image-wrapper">
                          <div class="single-products">
                              <div class="productinfo text-center">
                                  <img src="images/home/giay4.png" style="max-width:230px;" alt="" />
                                  <h2>180.000</h2>
                                  <p>Giày GEET 3 sọc TF - Bạc</p>
                                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                              </div>
                              <div class="product-overlay">
                                  <div class="overlay-content">
                                      <h2>180.000</h2>
                                      <p>Giày GEET 3 sọc TF - Bạc</p>
                                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                  </div>
                              </div>
                              <img src="images/home/new.png" class="new" alt="" />
                          </div>
                      </div>
                  </div>

                  <div class="col-sm-4">
                      <div class="product-image-wrapper">
                          <div class="single-products">
                              <div class="productinfo text-center">
                                  <img src="images/home/giay5.png" alt="" />
                                  <h2>619.000</h2>
                                  <p>GIÀY ĐÁ BÓNG TUẤN ANH KAMITO TA11-IN IC</p>
                                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                              </div>
                              <div class="product-overlay">
                                  <div class="overlay-content">
                                      <h2>619.000</h2>
                                      <p>GIÀY ĐÁ BÓNG TUẤN ANH KAMITO TA11-IN IC</p>
                                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                  </div>
                              </div>
                              
                          </div>
                      </div>
                  </div> --}}
                  @foreach ($list_category as $row_category)
                      <x-product-home : rowcat="$row_category" />
                  @endforeach
                  
              </div><!--features_items-->
              
              <div class="category-tab"><!--category-tab-->
                  <div class="col-sm-12">
                      <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab">Sale</a></li>
                      </ul>
                  </div>
                  <div class="tab-content">
                      <div class="tab-pane fade active in" id="sale" >
                          <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                  <div class="single-products">
                                      <div class="productinfo text-center">
                                          <img src="images/home/giay6.png" alt="" />
                                          <h2>449.000</h2>
                                          <p>GIÀY ĐÁ BÓNG MIRA GALAXY S1 TF</p>
                                          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                  <div class="single-products">
                                      <div class="productinfo text-center">
                                          <img src="images/home/giay7.png" alt="" />
                                          <h2>1.099.000</h2>
                                          <p>GIÀY BÓNG ĐÁ SÂN CỎ TỰ NHIÊN KAMITO TA11 PRO</p>
                                          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                      </div>
                                      
                                  </div>
                              </div>
                          </div>
                          <div class="col-sm-3">
                              <div class="product-image-wrapper">
                                  <div class="single-products">
                                      <div class="productinfo text-center">
                                          <img src="images/home/giay8.png" alt="" />
                                          <h2>210.000</h2>
                                          <p>Giày GEET TF - Đặc biệt</p>
                                          <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection