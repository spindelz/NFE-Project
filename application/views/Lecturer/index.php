<div class="content-wrapper pt-3">
    <div class="content pb-2">
        <div class="container">
            <div class="content-header" style="color: #517beb">
                <div class="d-flex">
                    <h2 class="mb-0 mr-auto"><b>ข้อมูลวิทยากร</b></h2>
                    <a href="<?php echo SITE; ?>Lecturer/form" class="btn btn-success ml-3">เพิ่มข้อมูลวิทยากร</a>
                </div>
                
            </div>
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('', $attributes = array('method' => 'get', 'class' => 'form-horizontal', 'id' => 'formSearch')); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control" name="LecturerName" id="LecturerName" placeholder="ชื่อวิทยากร">
                        </div>
                        <div class="col-md-4">
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
                                <th style="width:25%">ชื่อวิทยากร</th>
                                <th style="width:10%">ประเภทของวิทยากร</th>
                                <th style="width:10%">เบอร์โทรศัพท์</th>
                                <th style="width:10%">สถานะ</th>
                                <th style="width:10%">วันที่สมัคร</th>
                                <th style="width:15%">ผู้บันทึก</th>
                                <th style="width:15%"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>