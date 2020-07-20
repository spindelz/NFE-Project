<div class="wrapper">
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
        <div class="container">
            <a href="<?php echo SITE; ?>" class="navbar-brand">            
                <img src="<?php echo ASSETS_IMG; ?>/BCom_logo.png" alt="B-Commerce Logo" class="brand-image" style="opacity: .8">
                <span class="brand-text font-weight-light">Commerce</span>
            </a>
        
            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-3 px-3" id="navbarCollapse">
                <form class="form-inline ml-0 ml-md-3 my-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#" class="nav-link">หน้าแรก</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="menu-order" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">คลังสินค้า</a>
                        <ul aria-labelledby="menu-order" class="dropdown-menu border-0 shadow">
                            <li><a href="#" class="dropdown-item">สินค้าทั้งหมด</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

            <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

                <li class="nav-item nav-search hide">
                    <div style="padding: .25rem 1rem">
                        <form class="form-inline ml-0 ml-md-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <div style="padding: .25rem 0">
                        <a href="#" class="btn btn-sm btn-info px-2">ดูร้านค้า</a>
                    </div>
                </li>

                <li class="nav-item">
                    <div style="padding: .25rem 0 .25rem 1rem">
                        <select class="form-control form-control-sm">
                            <option>ภาษาไทย</option>
                            <!-- <option>English</option> -->
                        </select>
                    </div>
                </li>

                <li class="nav-item dropdown hide">
                    <a class="nav-link pr-0" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <!-- <span class="badge badge-warning navbar-badge">15</span> -->
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">0 Notifications</span>
                        <!-- <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a> -->
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <li class="nav-item dropdown-nonclick">
                    <a class="nav-link pt-0 dropdown-link" href="#">
                        <img src="<?php echo ASSETS_IMG; ?>/user8-128x128.jpg" alt="User Avatar" class="img-size-32 img-circle" style="margin-top: 5px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">
                            <img src="<?php echo ASSETS_IMG; ?>/user8-128x128.jpg" alt="User Avatar" class="img-size-64 img-circle my-1">
                        </span>
                        <div class="dropdown-divider"></div>
                        <span class="dropdown-item-profile">
                            <div class="row">
                                <div class="col-3">
                                    <span>ชื่อ:</span>
                                </div>
                                <div class="col-9">
                                    <span class="float-right text-muted"><?php echo $FullName; ?></span>
                                </div>
                                <div class="col-3">
                                    <span>ตำแหน่ง:</span>
                                </div>
                                <div class="col-9">
                                    <span class="float-right text-muted"><?php echo $Position; ?></span>
                                </div>
                            </div>
                        </span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-center bg-dark">
                            <i class="far fa-edit mr-2"></i> แก้ไขข้อมูลส่วนตัว
                        </a>
                        <a href="<?php echo SITE; ?>home/logout" class="dropdown-item dropdown-footer bg-danger">ออกจากระบบ</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar-header">
        <div class="overlay"></div>

        <div class="container">
            <div class="shop-header py-5">
                <div class="shop-logo d-table-cell"></div>
                <h1 class="d-table-cell pl-4">BCommerce</h1>
            </div>
        </div>

        <div class="nav-menu depth-1">
            <ul class="menu">
                <li class="menu-item" id="menu1">
                    <a class="menu-link" href="#">หน้าแรก</a>
                    <div class="nav-menu depth-2">
                        <ul class="menu">
                            <li class="menu-item"><span class="menu-link">test</span></li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="menu-item" id="menu2">
                    <a class="menu-link" href="#">การขาย</a>

                    <div class="nav-menu depth-2">
                        <ul class="menu">
                            <li class="menu-item">
                                <a class="menu-link" href="#">ข้อมูลการขาย</a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link" href="#">รายงานการขาย</a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                
            </ul>
        </div>
    </nav>