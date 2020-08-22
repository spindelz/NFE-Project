<div class="content-wrapper">
    <div class="content-header">
        <div class="container text-center" style="color: #517beb">
            หลักสูตรการศึกษานอกระบบระดับการศึกษาขั้นพื้นฐาน พ.ศ. 2551<br>
            กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี<br>
            <span style="font-weight: 500;">ยินดีต้อนรับสู่เว็บไซต์ของ กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี</span>
        </div>
    </div>

    <div class="content pb-2">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('', $attributes = array('method' => 'get', 'class' => 'form-horizontal', 'id' => 'formSearch')); ?>
                    <div class="row">
                        <div class="col-md-4 pr-5">
                            <input type="hidden" name="TeachFirstName" value="<?php echo @$TeachFirstName; ?>">
                            <input type="hidden" name="TeachLastName" value="<?php echo @$TeachLastName; ?>">
                            <select class="form-control" name="Semestry" id="Semestry"></select>
                        </div>
                        <div class="col-md-4 pr-5">
                            <input class="form-control" name="GroupName" id="GroupName" placeholder="ชื่อกลุ่มเรียน">
                        </div>
                        <div class="co;-md-4">
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
                                <th>ภาคเรียน/ปี</th>
                                <th>ชื่อกลุ่ม</th>
                                <th>สถานที่พบกลุ่ม</th>
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