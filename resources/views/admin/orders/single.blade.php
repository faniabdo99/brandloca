@include('admin.layout.header')

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        @include('admin.layout.navbar')
        @include('admin.layout.sidebar')
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        @include('admin.layout.errors')
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Order #{{$TheOrder->id}}</h2>
                            </div>
                            <div class="card-body">
                                <h4 class="mb-2 font-weight-bold mt-3">Customer Data</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered ">
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Name on Account:</th>
                                            <td  style="width:70%">{{$TheOrder->User->name}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Name on Order:</th>
                                            <td  style="width:70%">{{$TheOrder->name}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Phone Number 1:</th>
                                            <td  style="width:70%">{{$TheOrder->phone_number}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Phone Number 2:</th>
                                            <td  style="width:70%">{{$TheOrder->phone_number_2}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Province:</th>
                                            <td  style="width:70%">{{$TheOrder->province}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">City:</th>
                                            <td  style="width:70%">{{$TheOrder->city}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Street Address:</th>
                                            <td  style="width:70%">{{$TheOrder->street_address}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Zip Code:</th>
                                            <td  style="width:70%">{{$TheOrder->zip_code}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <h4 class="mb-2 font-weight-bold mt-5">Order Items</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered ">
                                        <thead>
                                            <th>Product Title</th>
                                            <th>Quantity</th>
                                            <th>Item Code</th>
                                            <th>Actions</th>
                                        </thead>
                                        @forelse($TheOrder->Items as $key => $Item)
                                        <tr>
                                            <td>{{$Item->Product->title}}</td>
                                            <td>{{$Item->qty}}</td>
                                            <td>{{strtoupper($Item->Variation->ref_code)}}</td>
                                            <td><a class="btn btn-brand btn-sm btn-rounded" target="_blank" href="{{route('product' , [$Item->Product->slug,$Item->Product->id])}}">View Product</a></td>
                                        </tr>
                                        @empty
                                            <p>No items in this order yet!</p>
                                        @endforelse
                                    </table>
                                </div>
                                
                                <h4 class="mb-2 font-weight-bold mt-5">Delivery Data</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered ">
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Province:</th>
                                            <td  style="width:70%">{{$TheOrder->shipping_province}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">City:</th>
                                            <td  style="width:70%">{{$TheOrder->shipping_city}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Street Address:</th>
                                            <td  style="width:70%">{{$TheOrder->shipping_street_address}}</td>
                                        </tr>
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%">Zip Code:</th>
                                            <td  style="width:70%">{{$TheOrder->shipping_zip_code}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <h4 class="mb-2 font-weight-bold mt-5">Payment Status</h4>
                                @if($TheOrder->is_paid)
                                    @if($TheOrder->payment_method == 'pod')
                                        <p>Payment will be recived from the shipping company.</p>
                                    @else
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered ">
                                                <tr>
                                                    <th class="font-weight-bold" style="width:30%">Payment Method:</th>
                                                    <td  style="width:70%">{{$TheOrder->PaymentMethodText}}</td>
                                                </tr>
                                                <tr>
                                                    <th class="font-weight-bold" style="width:30%">Total:</th>
                                                    <td  style="width:70%">{{$TheOrder->FinalTotal}} L.E</td>
                                                </tr>
                                            </table>
                                        </div>
                                    @endif
                                @else
                                    <p>The Payment Has Not Been Made Yet.</p>
                                @endif
                                @if($TheOrder->order_notes)
                                <h4 class="mb-2 font-weight-bold mt-5">Additional Notes From the Client</h4>
                                <p>{{$TheOrder->order_notes}}</p> 
                                @endif
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Order Status</h2>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th class="font-weight-bold" style="width:30%;">Current Status</th>
                                            <td style="width:70%;">{{$TheOrder->status}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <form class="mt-5" action="{{route('admin.orders.updateStatus' , $TheOrder->id)}}" method="post">
                                    @csrf
                                    <label class="font-weight-bold">Update Order Status</label>
                                    <select class="form-control mb-3" name="order_status" required>
                                        <option value="">Select a status</option>
                                        <option value="order_recived">Order Recived</option>
                                        <option value="Awaits Payment">Awaits Payment</option>
                                        <option value="Paid">Paid</option>
                                        <option value="Shipped">Shipped</option>
                                        <option value="Returned">Returned</option>
                                        <option value="Complete">Complete</option>
                                    </select>
                                    <button type="sybmit" class="btn btn-success btn-rounded">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    @include('admin.layout.scripts')
</body>
</html>
