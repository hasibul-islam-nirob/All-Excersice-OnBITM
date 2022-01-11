<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{asset('/admin')}}/assets/img/admin-avatar.png" width="45px" />
            </div>
            <div class="admin-info">
                <div class="font-strong">James Brown</div><small>Administrator</small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{route('dashboard')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                    <span class="nav-label">Category Module</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route("create-category")}}">Add Category</a>
                    </li>
                    <li>
                        <a href="{{route("manage-category")}}">Manage Category</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                    <span class="nav-label">Sub Category Module</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route("create-sub-category")}}">Add Sub Category</a>
                    </li>
                    <li>
                        <a href="{{route("manage-sub-category")}}">Manage Sub Category</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-table"></i>
                    <span class="nav-label">Brand Module</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('create-brand')}}">Add Brand</a>
                    </li>
                    <li>
                        <a href="{{route('manage-brand')}}">Manage Brand</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                    <span class="nav-label">Unit Module</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">
                    <li>
                        <a href="{{route('create-unit')}}">Add Unit</a>
                    </li>
                    <li>
                        <a href="{{route('manage-unit')}}">Manage Unit</a>
                    </li>

                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-map"></i>
                            <span class="nav-label">Product Module</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="{{route('create-product')}}">Add Product</a>
                            </li>
                            <li>
                                <a href="{{route('manage-product')}}">Manage Product</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-envelope"></i>
                            <span class="nav-label">Order Module</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="mailbox.html">Manage Order</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">User Module</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="invoice.html">Add User</a>
                            </li>
                            <li>
                                <a href="profile.html">Manage User</a>
                            </li>
                        </ul>
                    </li>
                </ul>
    </div>
</nav>