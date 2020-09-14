<?php if ($checkPrint==null) : ?>
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
            <div class="<?php echo @$isTeacher ? 'd-flex':'text-right' ?> mb-2">
                <?php if(@$isTeacher){ ?>
                <a href="<?php echo SITE;?>Student" class="btn btn-secondary mr-auto">< กลับไปหน้ารายชื่อนักศึกษา</a>
                <?php } ?>
                <?php if ($checkPrint == null) : ?>
                <div class="text-right mb-2">
                    <a href="<?php echo SITE; ?>PrintData?page_name=Activity & content=Activity/index" class="btn btn-secondary" target="_blank"><i class="fas fa-sm fa-print"></i> Print</a>
                </div>
                <?php endif; ?>
            </div>

            <div class="card">
                <div class="card-body">
                
                    <table class="table table-bordered" id="datatable">
                        <thead class="text-center">
                            <tr>
                                <th>ลำดับ</th>
                                <th>ภาคเรียน/ปี</th>
                                <th>โครงการ/กิจกรรมพัฒนาคุณภาพชีวิต</th>
                                <th>จำนวนชั่วโมง</th>
                            </tr>
                        </thead>
                        <tbody class="text-center"></tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-right">รวม</td>
                                <td class="text-center"><span id="Hour"></span></td>
                            </tr>
                        </tfoot> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>