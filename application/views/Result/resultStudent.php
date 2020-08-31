<div class="content-wrapper">
    <div class="content-header">
        <div class="container text-center">
            <div style="color: #517beb">
                หลักสูตรการศึกษานอกระบบระดับการศึกษาขั้นพื้นฐาน พ.ศ. 2551<br>
                กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี<br>
                <span style="font-weight: 500;">ยินดีต้อนรับสู่เว็บไซต์ของ กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี</span><br>
            </div>
        </div>
    </div>

    <div class="content pb-2">
        <div class="container">
            <div style="background: #FFFFCC; margin-left: 100px; margin-right: 100px;" class="p-3 mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <p>ชื่อนักศึกษา : <span id="StudentName"></span></p>
                        <p>ชื่อกลุ่ม : <span id="GroupName"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p>รหัสนักศึกษา : <span id="StudentCode"></span></p>
                        <p>เลขบัตรประชาชน : <span id="PersonalID"></span></p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('', $attributes = array('method' => 'get', 'class' => 'form-horizontal', 'id' => 'formSearch')); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <input type="hidden" name="TeachFirstName" value="<?php echo @$TeachFirstName; ?>">
                            <input type="hidden" name="TeachLastName" value="<?php echo @$TeachLastName; ?>">
                            <select class="form-control" name="Semestry" id="Semestry"></select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-control select2" name="GroupName" id="GroupName"></select>
                            <!-- <input class="form-control" name="GroupName" id="GroupName" placeholder="ชื่อกลุ่มเรียน"> -->
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" name="StudentName" id="StudentName" placeholder="ชื่อนักศึกษา, รหัวนักศึกษา, รหัสประจำตัวประชาชน">
                        </div>
                        <div class="col-md-3">
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
                                <th>ภาคเรียน</th>
                                <th>รหัสวิชา</th>
                                <th>ชื่อวิชา</th>
                                <th>หน่วยกิจ</th>
                                <th>ผลกรเรียน</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>