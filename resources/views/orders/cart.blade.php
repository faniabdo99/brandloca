@include('layout.header')

<body>
    @include('layout.navbar')
    <!-- cart section end -->
    <section class="cart-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table text-right">
                        <h3>سلة المشتريات</h3>
                        <div class="cart-table-warp">
                            <table>
                                <thead>
                                    <tr>
                                        <th width="50%" class="text-right">المنتج</th>
                                        <th width="20%">تعديل</th>
                                        <th width="10%">الحجم</th>
                                        <th width="10%">اللون</th>
                                        <th width="10%">السعر</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($CartItems as $Cart)
                                    <tr>
                                        <td width="50%" class="product-col d-flex align-items-center justify-content-between">
                                          <div>
                                            <img src="{{$Cart->Product->main_image}}" class="d-block ml-2">
                                          </div>
                                          <span class="text-right mr-3">{{$Cart->Product->title}}</span>
                                        </td>
                                        <td width="20%">
                                            <div class="quantity">
                                              <a class="text-danger ml-3" href="#"><i class="fas fa-trash"></i></a>
                                                <div class="pro-qty">
                                                    <input type="text" value="{{$Cart->qty}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td width="10%">{{$Cart->size}}</td>
                                        <td width="10%" >
                                          <div style="height:20px;width:20px;border-radius: 50%;background:{{$Cart->color}};"></div>
                                        </td>
                                        <td width="10%">{{$Cart->TotalPrice}} L.E</td>
                                    </tr>
                                  @empty

                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="total-cost d-flex justify-content-between">
                          <h6>الاجمالي</h6>
                          <h6>{{array_sum($CartTotal)}} L.E</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 card-right">
                    <h6 class="text-right mb-3">لديك كوبون خصم؟</h6>
                    <form class="promo-code-form">
                        <button>ادخال</button>
                        <input type="text" placeholder="ادخل الكوبون">
                    </form>
                    <a href="#" class="site-btn">اكمال عملية الشراء</a>
                    <a href="#" class="site-btn sb-dark">شراء منتجات اخرى</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->

    <!-- Related product section -->
    <section class="related-product-section">
        <div class="container">
            <div class="section-title text-uppercase">
                <h2>Continue Shopping</h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <div class="tag-new">New</div>
                            <img src="{{url('public/img')}}/product/2.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Black and White Stripes Dress</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{url('public/img')}}/product/5.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Flamboyant Pink Top </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{url('public/img')}}/product/9.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Flamboyant Pink Top </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{url('public/img')}}/product/1.jpg" alt="">
                            <div class="pi-links">
                                <a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
                                <a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
                            </div>
                        </div>
                        <div class="pi-text">
                            <h6>$35,00</h6>
                            <p>Flamboyant Pink Top </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related product section end -->
    @include('layout.footer')
    @include('layout.scripts')

</body>

</html>
