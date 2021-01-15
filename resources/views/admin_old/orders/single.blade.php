@include('admin.layout.header')
<style>
    .single-item-in-list{
        background: #ececec;
        padding: 10px;
        margin-bottom: 15px;
    }
</style>
<body class="app">
    <div>
        @include('admin.layout.sidebar')
        <div class="page-container">
            @include('admin.layout.navbar')
            <main class="main-content bgc-grey-100 mb-5">
                <div id="mainContent">
                    <div class="container">
                        <div class="row">
                          <div class="col-md-12">
                            <h2>Order #{{$TheOrder->id}}</h2>
                            <div class="white_box">
                              <p><b>Customer Name:</b> {{$TheOrder->User->name}}</p>

                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    @include('admin.layout.scripts')
</body>

</html>
