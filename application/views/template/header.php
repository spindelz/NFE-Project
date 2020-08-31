<div class="wrapper">

    <nav class="navbar-header">
        <div class="p-3 navbar-toggle-menu">
            <button class="navbar-toggler order-1 d-flex align-items-center" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                <i class="fas fa-bars"></i>
            </button>
        </div>
        

        <div class="collapse navbar-collapse order-3 px-3 bg-white" id="navbarCollapse">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?php echo SITE; ?>" class="nav-link">หน้าแรก</a>
                    <?php if(array_search($UserTypeID, array(5,6,7))){ ?>
                    <a href="#" class="nav-link">กิจกรรม (กพช.)</a>
                    <a href="#" class="nav-link">ตารางเรียน</a>
                    <a href="#" class="nav-link">ตารางสอบ</a>
                    <a href="#" class="nav-link">ผลการเรียน</a>
                    <?php }elseif($UserTypeID == 4){ ?>
                    <a href="<?php echo SITE; ?>Group" class="nav-link">กลุ่มเรียน</a>
                    <a href="<?php echo SITE; ?>Subject" class="nav-link">รายชื่อวิชา</a>
                    <a href="<?php echo SITE; ?>Student" class="nav-link">รายชื่อนักศึกษา</a>
                    <a href="#" class="nav-link">ผลการเรียนของนักศึกษา</a>
                    <?php } ?>
                </li>
                
                </li>
            </ul>
        </div>

        <div class="container pt-3" style="padding-bottom:100px;">
            <div class="row py-1">
                <div class="col-md-2 d-flex justify-content-center align-items-center">
                    <img src="<?php echo ASSETS_IMG; ?>/NFE.Chon_100.png" style="width:150px; height: 150px;">
                </div>
                <div class="col-md-6 text-left pt-4">
                    <h1 style="color:#666666;"><b>ระบบสารสนเทศงานทะเบียนออนไลน์</b></h1> 
                    <h3 style="color:#fff;"><b>กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี</b></h3>
                </div>
                <div class="col-md-4">
                    <div style="border:1px solid black; border-radius:12px;background:#9bdbf6" class="py-2 px-3 text-center">
                        <?php echo $FullName; ?><br>
                        <?php if(array_search($UserTypeID, array(5,6,7)) > -1){ ?>
                        รหัสนักศึกษา: <?php echo $StudentCode;?><br>
                        เลขประจำตัวประชาชน: <?php echo $PersonalID; ?><br>
                        <?php }else{ ?>
                        ตำแหน่ง: <?php echo $Position; ?><br>
                        <?php } ?>
                        <a href="<?php echo SITE; ?>/Home/logout" class="btn btn-sm btn-danger">ออกจากระบบ</a>
                    </div>
                </div>
            </div>  
        </div>
        
        <div class="nav-menu depth-1 col-md-12">
            <ul class="menu">
                <li class="menu-item text-center">
                    <a class="menu-link" href="<?php echo SITE; ?>">หน้าแรก</a>
                </li>
                <?php if(array_search($UserTypeID, array(5,6,7)) > -1){ ?>
                <li class="menu-item text-center<?php echo ($pageID == 1 ? ' active' : ''); ?>">
                    <a class="menu-link" href="<?php echo SITE; ?>Activity">กิจกรรม (กพช.)</a>
                </li>
                <li class="menu-item text-center<?php echo ($pageID == 2 ? ' active' : ''); ?>">
                    <a class="menu-link" href="<?php echo SITE; ?>ClassSchedule">วิชาที่ลงทะเบียนเรียน</a>
                </li>
                <li class="menu-item text-center<?php echo ($pageID == 3 ? ' active' : ''); ?>">
                    <a class="menu-link" href="<?php echo SITE; ?>ExamSchedule">ตารางสอบ</a>
                </li>
                <li class="menu-item text-center<?php echo ($pageID == 4 ? ' active' : ''); ?>">
                    <a class="menu-link" href="<?php echo SITE; ?>Result">ผลการเรียน</a>
                </li>
                
                <?php }elseif($UserTypeID == 4){ ?>
                <li class="menu-item text-center<?php echo ($pageID == 5 ? ' active' : ''); ?>">
                    <a class="menu-link" href="<?php echo SITE; ?>Group">กลุ่มเรียน</a>
                </li>
                <li class="menu-item text-center<?php echo ($pageID == 6 ? ' active' : ''); ?>">
                    <a class="menu-link" href="<?php echo SITE; ?>Subject">รายชื่อวิชา</a>
                </li>
                <li class="menu-item text-center<?php echo ($pageID == 7 ? ' active' : ''); ?>">
                    <a class="menu-link" href="<?php echo SITE; ?>Student">รายชื่อนักศึกษา</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    