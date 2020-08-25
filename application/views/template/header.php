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
                    <a href="#" class="nav-link">หน้าแรก</a>
                    <a href="<?php echo SITE; ?>Activity" class="nav-link">กิจกรรม (กพช.)</a>
                    <a href="#" class="nav-link">ตารางเรียน</a>
                    <a href="#" class="nav-link">ตารางสอบ</a>
                    <a href="#" class="nav-link">ผลการเรียน</a>
                    <a href="<?php echo SITE; ?>/Home/logout" class="nav-link">ออกจากระบบ</a>
                </li>
                
                </li>
            </ul>
        </div>

        <div class="container pt-4" style="paddgind-bottom:100px;">
            <div class="row py-1">
                <div class="col-md-2 d-flex justify-content-center align-items-center">
                    <img src="<?php echo ASSETS_IMG; ?>/NFE.Chon_100.png" style="width:150px; height: 150px;">
                </div>
                <div class="col-md-6 text-left" >
                   <br> 
                    <h1 style="color:#666666;"><b>ระบบสารสนเทศงานทะเบียนออนไลน์</b></h1> 
                    <h3 style="color:#fff;"><b>กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี</b></h3>
                </div>
                <div class="col-md-4">
                    <div style="border:1px solid black; border-radius:12px;background:#9bdbf6" class="p-3 text-center">
                        <?php echo $FullName; ?>
                        <br>
                        <?php if(array_search($UserTypeID, array(5,6,7))){ ?>
                        รหัสนักศึกษา: <?php echo $StudentCode;?><br>
                        เลขประจำตัวประชาชน: <?php echo $PersonalID; ?>
                        <br>
                        <?php }else{ ?>
                        ตำแหน่ง: <?php echo $Position; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>  
        </div>
        
        <div class="nav-menu depth-1 col-md-12">
            <ul class="menu">
                <li class="menu-item text-center" id="menu1">
                    <a class="menu-link" href="<?php echo SITE; ?>">หน้าแรก</a>
                </li>
                <?php if(array_search($UserTypeID, array(5,6,7))){ ?>
                <li class="menu-item text-center" id="menu2">
                    <a class="menu-link" href="<?php echo SITE; ?>Activity">กิจกรรม (กพช.)</a>
                </li>
                <li class="menu-item text-center" id="menu3">
                    <a class="menu-link" href="<?php echo SITE; ?>ClassSchedule">วิชาที่ลงทะเบียนเรียน</a>
                </li>
                <li class="menu-item text-center" id="menu4">
                    <a class="menu-link" href="<?php echo SITE; ?>ExamSchedule">ตารางสอบ</a>
                </li>
                <li class="menu-item text-center" id="menu5">
                    <a class="menu-link" href="<?php echo SITE; ?>Result">ผลการเรียน</a>
                </li>
                
                <?php }elseif($UserTypeID == 4){ ?>
                <li class="menu-item text-center" id="menu2">
                    <a class="menu-link" href="<?php echo SITE; ?>Group">กลุ่มเรียน</a>
                </li>
                <li class="menu-item text-center" id="menu3">
                    <a class="menu-link" href="#">รายชื่อวิชา</a>
                </li>
                <li class="menu-item text-center" id="menu4">
                    <a class="menu-link" href="#">รายชื่อนักศึกษา</a>
                </li>
                <li class="menu-item text-center" id="menu5">
                    <a class="menu-link" href="#">ผลการเรียนของนักศึกษา</a>
                </li>
                <?php } ?>
                <li class="menu-item text-center" id="menu6">
                    <a class="menu-link" href="<?php echo SITE; ?>/Home/logout">ออกจากระบบ</a>
                </li>
            </ul>
        </div>
    </nav>
    