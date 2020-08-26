<div class="content-wrapper">
    <div class="content-header">
        <div class="container">
            <div class="row mb-0">
            <div class="text-center pt-2">
              <p style="color:#0099CC;">
               หลักสูตรการศึกษานอกระบบระดับการศึกษาขั้นพื้นฐาน พุทธศักราช 2551
              </pre>
    
</div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo SITE; ?>">Print</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content pb-1">
        <div class="container">

            <div class="card">
                
                <div class="card-body">
                    <?php echo form_open('', $attributes = array('method' => 'get', 'class' => 'form-horizontal', 'id' => 'formSearch')); ?>
                    <div class="row">
                    <div class="col-md-4 pr-5">
                            <select class="form-control" name="Semestry" id="Semestry"></select>
                        </div>
                        <div class="col-md-4 pr-5">
                            <input class="form-control" name="GroupName" id="GroupName" placeholder="ชื่อกลุ่มเรียน">
                        </div>
                        <div class="co;-md-4">
                            <input type="submit" class="btn btn-success" value="ค้นหา">
                        </div>
                    <?php echo form_close(); ?>
                    
                </div>
                
                
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <table class="table table-bordered table-striped text-center" id="datatable">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ภาคเรียน/ปี</th>
                                <th>โครงการ/กิจกรรมพัฒนาคุณภาพชีวิต</th>
                                <th>จำนวนชั่วโมง</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                
                </div>
            </div>
            

        </div>
    </div>

    
</div>
