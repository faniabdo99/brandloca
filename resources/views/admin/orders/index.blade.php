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
                                <h5 class="mb-0">Orders ({{$Orders->count()}})</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="dataTable" class="table table-striped table-bordered second"
                                        cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Status</th>
                                                <th>User</th>
                                                <th>Is Paid</th>
                                                <th>Payment Method</th>
                                                <th>Total</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($Orders as $Single)
                                            <tr>
                                                <td>{{$Single->id}}</td>
                                                <td>{{$Single->status}}</td>
                                                <td>{{$Single->User->name}}</td>
                                                <td>{{$Single->is_paid}}</td>
                                                <td>{{$Single->PaymentMethodText}}</td>
                                                <td>{{formatPrice($Single->final_total)}} L.E</td>
                                                <td>
                                                    <a href="{{route('admin.orders.single' , $Single->id)}}" class="btn btn-primary mb-0">View</a>
                                                    <a href="{{route('admin.orders.delete' , $Single->id)}}" class="btn btn-danger mb-0">Delete</a>
                                                </td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
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
    <script type="text/javascript">
        $('.delete-btn').dblclick(function () {
            var Elem = $(this);
            var ItemId = $(this).attr('item-id');
            var ActionRoute = $(this).attr('action-route');
            $(this).html('<i class="fas fa-spinner fa-spin"></i>');
            $.ajax({
                method: 'POST',
                url: ActionRoute,
                data: {
                    item_id: ItemId
                },
                success: function (response) {
                    Elem.parent().parent().fadeOut('fast');
                    ShowNoto('noto-success', response, 'Success');
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    ShowNoto('noto-danger', errorThrown, 'Error');
                    Elem.html('Delete');
                }
            });
        });

    </script>
</body>

</html>
