<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Tổng quan</span>
                    </a>
                </li>
                 <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn hàng </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ URL::to('/all-order') }}">Danh sách đơn hàng</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh mục sản phẩm </span>
                    </a>
                    <ul class="sub">
						<li><a href="{{ URL::to('/add-category-product') }}">Thêm danh mục</a></li>
						<li><a href="{{ URL::to('/all-category-product') }}">Danh sách danh mục</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Nhà xuất bản </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ URL::to('/add-publisher') }}">Thêm NXB</a></li>
                        <li><a href="{{ URL::to('/all-publisher') }}">Danh sách NXB</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản phẩm </span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{ URL::to('/add-product') }}">Thêm sản phẩm</a></li>
                        <li><a href="{{ URL::to('/all-product') }}">Danh sách sản phẩm</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>