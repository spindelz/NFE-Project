<div class="content-wrapper pt-3">
    <div class="content pb-2">
        <div class="container">
            <div class="content-header" style="color: #517beb">
                <div class="d-flex">
                    <h2 class="mb-0 mr-auto"><b>เอกสารเปิดชั้นเรียน</b></h2>
                    <a href="<?php echo SITE; ?>OpenClass/form" class="btn btn-success ml-3">เพิ่มหลักสูตรชั้นเรียน</a>
                </div>
                
            </div>
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('', $attributes = array('method' => 'get', 'class' => 'form-horizontal', 'id' => 'formSearch')); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="hidden" name="TeachFirstName" value="<?php echo @$TeachFirstName; ?>">
                            <input type="hidden" name="TeachLastName" value="<?php echo @$TeachLastName; ?>">
                            <select class="form-control" name="Semestry" id="Semestry"></select>
                        </div>
                        <div class="col-md-4">
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
                                <th style="width:5%">ลำดับ</th>
                                <th style="width:30%">หลักสูตร</th>
                                <th style="width:10%">กศน.ตำบล</th>
                                <th style="width:10%">ชื่อวิทยากร</th>
                                <th style="width:10%">ผู้จบหลักสูตร</th>
                                <th style="width:10%">สถานะ</th>
                                <th style="width:10%">วันที่บันทึก</th>
                                <th style="width:10%">ผู้บันทึก</th>
                                <th style="width:5%"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>