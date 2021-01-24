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
                        <div class="col-md-3">
                            <select class="form-control select2" name="NFETambonID" id="NFETambonID"></select>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" name="CourseName" id="CourseName" placeholder="ชื่อหลักสูตร">
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" name="LecturerName" id="LecturerName" placeholder="ชื่อวิทยากร">
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
                                <th style="width:5%">ลำดับ</th>
                                <th style="width:24%">หลักสูตร</th>
                                <th style="width:10%">กศน.ตำบล</th>
                                <th style="width:10%">ชื่อวิทยากร</th>
                                <th style="width:10%">จำนวนผู้จบหลักสูตร</th>
                                <th style="width:10%">วันที่บันทึก</th>
                                <th style="width:10%">ผู้บันทึก</th>
                                <th style="width:11%"></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>