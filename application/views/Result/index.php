<div class="content-wrapper">
    <div class="content-header">
        <div class="container text-center" style="color: #517beb">
            หลักสูตรการศึกษานอกระบบระดับการศึกษาขั้นพื้นฐาน พุทธศักราช 2551<br>
            <span style="font-weight: 500;"><?php echo @$UserTypeName ? 'ระดับ '.$UserTypeName : 'ยินดีต้อนรับสู่เว็บไซต์ของ กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี'; ?></span>
        </div>
    </div>

    <div class="content pb-2">
        <div class="container">
            <div style="background: #FFFFCC; margin-left: 100px; margin-right: 100px;" class="p-3 mb-3" id="headerData">
                <div class="row">
                    <div class="col-md-6">
                        <p>ภาคเรียน : <span id="SemestryTop"></span></p>
                        <p>ชื่อกลุ่ม : <span id="GroupName"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p>ชื่ออาจารย์ : <span id="TeacherName"></span></p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('', $attributes = array('method' => 'get', 'class' => 'form-horizontal', 'id' => 'formSearch')); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="hidden" name="isTeacher" value="<?php echo $isTeacher ? 1 : ""; ?>">
                            <input type="hidden" name="StudentCode" value="<?php echo @$StudentCode; ?>">
                            <input type="hidden" name="UserType" value="<?php echo @$UserType; ?>">
                            <select class="form-control" name="Semestry" id="Semestry"></select>
                        </div>
                    
                        <div class="col-md-4">
                            <input type="submit" class="btn btn-success" value="ค้นหา">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="<?php echo @$isTeacher ? 'd-flex':'text-right' ?> mb-2">
                <?php if(@$isTeacher){ ?>
                <a href="<?php echo SITE;?>Student" class="btn btn-secondary mr-auto">< กลับไปหน้ารายชื่อนักศึกษา</a>
                <?php } ?>
                <a href="javascript:void(0)" class="btn btn-secondary"><i class="fas fa-sm fa-print"></i> Print</a>
            </div>

            <div class="card">
                <div class="card-body">
                
                    <table class="table table-bordered" id="datatable">
                        <thead class="text-center">
                            <tr>
                                <th>ลำดับ</th>
                                <th id="semestryCode">ภาคเรียน</th>
                                <th>รหัสวิชา</th>
                                <th>วิชา</th>
                                <th>หน่วยกิต</th>
                                <th>ผลการเรียน</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"></tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" id="text-gpa" class="text-right">ระดับผลการเรียนเฉลี่ย</td>
                                <td class="text-center"><span id="GPA"></span></td>
                            </tr>
                        </tfoot> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>