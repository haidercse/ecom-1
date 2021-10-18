<!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('admin/assets/images/icon/logo.png') }}" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{ route('admin.dashboard') }}">DashBoard Page</a></li>


                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Manage Products</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{ route('admin.product.create') }}">Create Product</a></li>
                                    <li><a href="{{ route('admin.product.show') }}">Show Product</a></li>

                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Manage Orders</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{ route('admin.order.create') }}">Show Manage Order</a></li>
                                    {{-- <li><a href="{{ route('admin.order.show') }}">Show order</a></li> --}}

                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Manage Categories</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{ route('admin.category.create') }}">Create category</a></li>
                                    <li><a href="{{ route('admin.category.show') }}">Show category</a></li>

                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Manage Brands</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{ route('admin.brand.create') }}">Create Brand</a></li>
                                    <li><a href="{{ route('admin.brand.show') }}">Show Brand</a></li>

                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Manage Divisions</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{ route('admin.division.create') }}">Create Division</a></li>
                                    <li><a href="{{ route('admin.division.show') }}">Show Division</a></li>

                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Manage District</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{ route('admin.district.create') }}">Create District</a></li>
                                    <li><a href="{{ route('admin.district.show') }}">Show District</a></li>

                                </ul>
                            </li>
                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-dashboard"></i><span>Manage Slider</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="{{ route('admin.slider.create') }}">Create Slider</a></li>
                                    <li><a href="{{ route('admin.slider.show') }}">Show Slider</a></li>

                                </ul>
                            </li>


                            <li><a href="maps.html"><i class="ti-map-alt"></i> <span>maps</span></a></li>
                            <li><a href="invoice.html"><i class="ti-receipt"></i> <span>Invoice Summary</span></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
