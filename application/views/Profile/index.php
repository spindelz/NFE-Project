<div class="content-wrapper">
    <div class="content-header">
        <div class="container text-center" style="color: #517beb">
            หลักสูตรการศึกษานอกระบบระดับการศึกษาขั้นพื้นฐาน พุทธศักราช 2551<br>
            <span style="font-weight: 500;"><?php echo !empty(@$UserTypeName) ? 'ระดับ '.@$UserTypeName : 'ยินดีต้อนรับสู่เว็บไซต์ของ กศน. อำเภอเมืองชลบุรี จังหวัดชลบุรี'; ?></span>
        </div>
    </div>

    <div class="content pb-2">
        <div class="container">
            <?php if(@$isTeacher){ ?>
                <a href="<?php echo SITE;?>Student" class="btn btn-secondary mb-2">< กลับไปหน้ารายชื่อนักศึกษา</a>
            <?php } ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p>ชื่อ-นามสกุล : <span id="StudentName"></span> </p>
                            <p>รหัสนักศึกษา : <span id="StudentCode"></span></p>
                            <p>เลขประจำตัวประชาชน : <span id="PersonalID"></span></p>
                            <p>วัน/เดือน/ปี : <span id="BirthDate" style="margin-right: 50px;"></span> อายุ : <span id="Age"></span> ปี</p>
                            <p>ที่อยู่ : <span id="Address"></span></p>
                            <p>สถานศึกษาเดิม : <span id="OldSchool"></span></p>
                            <p>จังหวัด : <span id="Province"></span></p>
                            <p>เบอร์โทรศัพท์ : <span id="PhoneNumber"></span></p>
                        </div>
                        <div class="col-md-4 d-flex align-items-center">
                            <div id="notHasImage" class="hide text-center">
                                <i class="far fa-file-image fa-8x fa-border"></i>
                                <?php if(@$isTeacher){ ?>
                                <a href="javascript:void(0)" class="btn btn-success mt-2" data-toggle="modal" data-target="#uploadImageModal">เพิ่มรูปภาพ</a>
                                <?php } ?>
                            </div>
                            <div id="hasImage" class="hide text-center">
                                <img src="" style="width:70%; padding-top: 30px;transform: rotate(0deg)">
                                <?php if(@$isTeacher){ ?>
                                <a href="javascript:void(0)" class="btn btn-warning mt-4" data-toggle="modal" data-target="#uploadImageModal">แก้ไขรูปภาพ</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formStudentImage')); ?>
            <div class="modal-body">
                <div id="previewImage" class="hide text-center my-4" style="height: 200px;">
                    <img src="" style="height:100%;">
                </div>
                
                <div class="input-group mt-2">
                    <div class="custom-file">
                        <input type="hidden" name="StudentCode" value="<?php echo @$StudentCode; ?>">
                        <input type="hidden" name="oldImage">
                        <input type="file" name="StudentImage" class="custom-file-input" id="StudentImage" required>
                        <label class="custom-file-label" for="StudentImage">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
                <div class="hide rotate-image mt-2">
                    <input type="hidden" name="ImageRotate" value="0">
                    <a href="javascript:void(0)" class="btn btn-sm btn-default undo"><i class="fas fa-xs fa-undo-alt"></i></a> 
                    <a href="javascript:void(0)" class="btn btn-sm btn-default redo"><i class="fas fa-xs fa-redo-alt"></i></a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>