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
                      <div>
                        <h3 class="mb-2">سلة المشتريات</h3>
                        @if($CartItems->count() > 0)
                            <p>تبقى جميع العناصر في سلة مشترياتك لمدة 3 ساعات , في حال لم تقم باكمال عملية الشراء خلال 3 ساعات سيتم افراغ سلة مشترياتك تلقائياً</p>
                        @endif
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
                                          {{-- {{route('cart.delete' , $Cart->id)}} --}}
                                              <a class="text-danger" rel="nofollow" href="javascript:;" data-toggle="modal" data-target="#delete-from-cart"><i class="fas fa-trash"></i></a>
                                              <input type="number" data-target="{{route('cart.update' , [$Cart->id , getUserId()])}}" class="cart-qty-input" value="{{$Cart->qty}}">
                                        </td>
                                        <td width="10%">{{$Cart->size}}</td>
                                        <td width="10%" >
                                          <div style="height:20px;width:20px;border-radius: 50%;background:{{$Cart->color}};"></div>
                                        </td>
                                        <td width="10%">{{$Cart->Product->FinalPrice()}} L.E</td>
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
                      @if($CartItems->count() > 0)
                        <div class="text-right">
                          <a href="{{route('orders.checkout')}}" class="site-btn mt-4">اكمال عملية الشراء</a>
                        </div>
                      @endif
                </div>
                <div class="col-lg-4 card-right text-right ">
                  @if(count($CartItems) > 0)
                    <h6 class="mb-3">لديك كوبون خصم؟</h6>
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
                              <a class="text-right btn btn-danger mt-4" href="{{route('cart.coupon.delete' , [getUserId() , $HasCoupon])}}">حذف</a>
                            </p>

                          @else
                            <button id="cart-coupon" data-target="{{route('cart.coupon')}}">ادخال</button>
                            <input hidden name="user_id" value="{{getUserId()}}">
                            <input type="text" name="cuopon_code" placeholder="ادخل الكوبون">
                          @endif
                      </form>
                      @endif
                    @endauth
                    <a href="{{route('shop')}}" class="site-btn sb-dark">متابعة التسوق</a>
                </div>
            </div>
        </div>
    </section>
    <!-- cart section end -->
    <!-- Modal -->
    <div class="modal fade delete-from-cart-modal" id="delete-from-cart" tabindex="-1" role="dialog" aria-labelledby="delete-from-cartLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">تأكيد حذف المنتج</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <label class="input-label">لم تريد ازالة هذا المنتج من سلة التسوق؟</label>
              <p><input type="checkbox" name="reasons[]" id="add-acc" value="Added Accendentally"><label for="add-acc"> قمت باضافة المنتج بالخطأ</label></p>
              <p><input type="checkbox" name="reasons[]" id="too-exp" value="Too Expensive"><label for="too-exp"> سعر المنتج غير مناسب</label></p>
              <p><input type="checkbox" name="reasons[]" id="exp-shi" value="Expensive Shipping"><label for="exp-shi"> أسعار التوصيل غير مناسبة</label></p>
              <br><br>
              <label class="input-label">معلومات اضافية</label>
              <textarea class="mb-3" name="more_info" rows="6" placeholder="هل لديك اي بيانات اضافية تريد اضافتها؟"></textarea>
              <button class="site-btn sb-danger" type="submit"><i class="fas fa-trash"></i> ازالة المنتج من سلة المشتريات</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Related product section -->
    <section class="related-product-section spad">
        <div class="container">
            <div class="section-title">
                <h2>منتجات مميزة</h2>
            </div>
            <div class="row">
                @forelse(getLatestProducts() as $Product)
                <div class="col-lg-3 col-sm-6">
					<a href="{{route('product' , [$Product->slug , $Product->id])}}">
						<div class="product-item">
							<div class="pi-pic">
								@if($Product->hasDiscount())
									<div class="tag-sale">فترة محدودة</div>
								@endif
								<img src="{{$Product->MainImage}}" alt="{{$Product->title}}">
								<div class="pi-links">
									<a href="#" class="add-card"><i class="fas fa-eye"></i><span>اضافة الى السلة</span></a>
									@auth
										<a href="javascript:;" class="wishlist-btn @if($Product->LikedByUser()) liked @endif global-add-to-wishlist" data-action="{{route('favourite.toggle')}}" data-id="{{$Product->id}}" data-user="{{getUserId()}}"><i class="fas fa-heart"></i></a>
									@endauth
								</div>
							</div>
							<a href="{{route('product' , [$Product->slug , $Product->id])}}">
								<div class="pi-text">
									<h6>{{$Product->FinalPrice()}} L.E</h6>
									<p>{{$Product->title}}</p>
								</div>
							</a>
						</div>
					</a>
				</div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
    <!-- Related product section end -->
    @include('layout.footer')
    @include('layout.scripts')
</body>
</html>
