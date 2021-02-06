<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="{{route('admin.home')}}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item "><a class="nav-link" href="{{route('admin.home')}}"><i class="fa fa-fw fa-home"></i>Home</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#categories-menu" aria-controls="categories-menu"><i class="fa fa-fw fa-project-diagram"></i>Categories</a>
                        <div id="categories-menu" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link" href="{{route('admin.categories.home')}}">View All</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('admin.categories.getNew')}}">New Category</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#products-menu" aria-controls="products-menu"><i class="fa fa-fw fa-shopping-bag"></i>Products</a>
                        <div id="products-menu" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item"><a class="nav-link" href="{{route('admin.products.home')}}">View All</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('admin.products.getNew')}}">New Product</a></li>
                                <li class="nav-item"><a class="nav-link" href="pages/cards.html">Low Inventory</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.users.home')}}"><i class="fa fa-fw fa-user"></i>Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.discount.home')}}"><i class="fa fa-fw fa-tags"></i>Discounts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.blog.home')}}"><i class="fa fa-fw fa-newspaper"></i>Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.coupoun.home')}}"><i class="fa fa-fw fa-ticket-alt"></i>Cuopons</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.orders.home')}}"><i class="fa fa-fw fa-file"></i>Orders</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>
