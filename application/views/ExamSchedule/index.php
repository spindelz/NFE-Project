<?php if ($checkPrint == null) : ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container text-center" style="color: #517beb">
            หลักสูตรการศึกษานอกระบบระดับการศึกษาขั้นพื้นฐาน พุทธศักราช 2551<br>
            <span style="font-weight: 500;"><?php echo @$UserTypeName ? 'ระดับ '.$UserTypeName : 'ยินดีต้อนรับสู่เว็บไซต์ของ กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี'; ?></span>
        </div>
    </div>
    <?php endif; ?>

    <div class="content pb-2">
        <div class="container">
            <div class="mb-2 clearfix">
            <?php if ($checkPrint == null) : ?>
                <!-- <?php if($isTeacher){ ?> -->
                <a href="<?php echo SITE;?>Group" class="btn btn-secondary">< กลับไปหน้ากลุ่มเรียน</a>
                <!-- <?php } ?> -->
                <a href="<?php echo SITE; ?>PrintData?page_name=ExamSchedule & content=ExamSchedule/index" class="btn btn-secondary float-right" target="_blank"><i class="fas fa-sm fa-print"></i> Print</a>
            </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-body">
                
                    <table class="table table-bordered" id="datatable">
                        <thead class="text-center">
                            <tr>
                                <th>ลำดับ</th>
                                <th>วันที่สอบ</th>
                                <th>ช่วงเวลาสอบ</th>
                                <th>รหัสวิชา</th>
                                <th>วิชา</th>
                                <th>ห้องสอบ</th>
                                <th>สนามสอบ</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"></tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>