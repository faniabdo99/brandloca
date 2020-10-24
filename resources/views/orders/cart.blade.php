@include('layout.header')
<body>
    @include('layout.navbar')
    @include('layout.errors')
    <!-- cart section end -->
    <section class="cart-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-table text-right">
                      <div class="d-flex justify-content-between">
                        <h3>سلة المشتريات</h3>
                        <a class="text-success font-weight-bold d-none" id="update-cart-btn" href="{{route('order.cart')}}">تحديث السلة</a>
                      </div>
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
                                        <td width="50%" class="text-right"><a class="text-dark" href="{{route('product' , [ $Cart->Product->slug , $Cart->Product->id ])}}">{{$Cart->Product->title}}</a></td>
                                        <td width="20%" class="update-cart-column">
                                              <a class="text-danger" href="{{route('cart.delete' , $Cart->id)}}"><i class="fas fa-trash"></i></a>
                                              <input type="number" data-target="{{route('cart.update' , [$Cart->id , auth()->user()->id])}}" class="cart-qty-input" value="{{$Cart->qty}}">
                                        </td>
                                        <td width="10%">{{$Cart->size}}</td>
                                        <td width="10%" >
                                          <div style="height:20px;width:20px;border-radius: 50%;background:{{$Cart->color}};"></div>
                                        </td>
                                        <td width="10%">{{$Cart->TotalPrice}} L.E</td>
                                    </tr>
                                  @empty
                                    <p>لا يوجد عناصر في سلة المشتريات الخاصة بك</p>
                                  @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="total-cost d-flex justify-content-between">
                          <h6>الاجمالي</h6>
                          <h6>{{$CartTotal}} L.E</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 card-right">
                    <h6 class="text-right mb-3">لديك كوبون خصم؟</h6>
                    @guest
                      <p>سجل الدخول الى حسابك لاستخدام الكوبون</p>
                    @endguest
                    @auth
                      <form class="promo-code-form mb-5">
                          @if($HasCoupon)
                            <p class="text-right">
                              الكوبون المستخدم :
                              @php
                                $Cuopon = App\Coupoun::find($HasCoupon);
                              @endphp
                              <b class="d-block mb-2">{{$Cuopon->coupoun_code}}</b>
                              نسبة الخصم :
                               <b class="d-block mb-2">{{$Cuopon->discount_amount.' '.$Cuopon->TypeSymbole()}}</b>
                              <a class="text-right btn btn-danger mt-4" href="{{route('cart.coupon.delete' , [auth()->user()->id , $HasCoupon])}}">حذف</a>
                            </p>

                          @else
                            <button id="cart-coupon" data-target="{{route('cart.coupon')}}">ادخال</button>
                            <input hidden name="user_id" value="{{auth()->user()->id}}">
                            <input type="text" name="cuopon_code" placeholder="ادخل الكوبون">
                          @endif
                      </form>
                      <a href="{{route('orders.checkout')}}" class="site-btn">اكمال عملية الشراء</a>
                    @endauth
                    <a href="{{route('shop')}}" class="site-btn sb-dark">شراء منتجات اخرى</a>
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
