<div class="content-wrapper">
    <div class="content-header">
        <div class="container text-center">
            <div class="container text-center" style="color: #517beb">
                หลักสูตรการศึกษานอกระบบระดับการศึกษาขั้นพื้นฐาน พุทธศักราช 2551<br>
                <span style="font-weight: 500;">ยินดีต้อนรับสู่เว็บไซต์ของ กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี</span>
            </div>
        </div>
    </div>

    <div class="content pb-2">
        <div class="container">
            <?php if(@$Semestry){ ?>
                <a href="<?php echo SITE;?>Group" class="btn btn-secondary mb-2">< กลับไปหน้ากลุ่มเรียน</a>
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('', $attributes = array('method' => 'get', 'class' => 'form-horizontal', 'id' => 'formSearch')); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <input class="form-control" name="GroupName" id="GroupName" placeholder="ชื่อกลุ่มเรียน">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" name="StudentCode" id="StudentCode" placeholder="รหัสนักศึกษา">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" name="PersonalID" id="PersonalID" placeholder="รหัสประจำตัวประชาชน">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" name="StudentName" id="StudentName" placeholder="ชื่อนักศึกษา">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <input type="hidden" name="TeachFirstName" value="<?php echo @$TeachFirstName; ?>">
                            <input type="hidden" name="TeachLastName" value="<?php echo @$TeachLastName; ?>">
                            <input type="hidden" name="GroupCode" value="<?php echo @$GroupCode; ?>">
                            <select class="form-control" name="Semestry" id="Semestry"></select>
                        </div>
                        <div class="col-md-9 text-right">
                            <input type="submit" class="btn btn-success" value="ค้นหา">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead class="text-center">
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อกลุ่ม</th>
                                <th>ภาคเรียน</th>
                                <th>รหัสนักศึกษา</th>
                                <th>รหัสประจำตัวประชาชน</th>
                                <th>ชื่อนักศึกษา</th>
                                <th>ดูรายละเอียด</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>