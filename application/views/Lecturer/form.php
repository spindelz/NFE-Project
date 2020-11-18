<div class="content-wrapper pt-3">
    <div class="content pb-2">
        <div class="container">
            <div class="content-header" style="color: #517beb">
                <h2><b>เพิ่มข้อมูลวิทยากร</b></h2>
            </div>

            <input type="hidden" name="LecturerID" value="<?php echo $LecturerID; ?>">
            
            <div class="card">
                <div class="card-body">
                    <?php echo form_open_multipart('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formSaveData')); ?>
                            
                        <div class="row px-4">
                            <div class="col-md-6 pr-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="PrefixID">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                                            <select class="form-control" id="PrefixID" name="PrefixID" required></select>
                                        </div>
                                    </div>
                                    <div class="col-md-9 pr-0 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="FirstName">ชื่อวิทยากร <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="FirstName" name="FirstName" maxlength="50" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="LastName">นามสกุล <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="LastName" name="LastName" maxlength="50" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="PersonalID">เลขประจำตัวประชาชน <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="PersonalID" name="PersonalID" maxlength="13" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="LecturerTypeID">ประเภทวิทยากร</label>
                                    <select class="form-control" id="LecturerTypeID" name="LecturerTypeID" required></select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="BirthDate">วันเกิด <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control input-datepicker" id="BirthDate" name="BirthDate" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="BirthProvinceID">จังหวัดที่เกิด <span class="text-danger">*</span></label>
                                            <select class="form-control" id="BirthProvinceID" name="BirthProvinceID" required></select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 pr-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="Religion">ศาสนา <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Religion" name="Religion" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="Nationality">สัญชาติ <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Nationality" name="Nationality" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="Origin">เชื้อชาติ <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Origin" name="Origin" maxlength="50" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="CurrentAddress">ที่อยู่ปัจจุบัน <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="CurrentAddress" name="CurrentAddress" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="CurrentProvinceID">จังหวัด <span class="text-danger">*</span></label>
                                            <select class="form-control" id="CurrentProvinceID" name="CurrentProvinceID" required></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="CurrentAmphurID">อำเภอ <span class="text-danger">*</span></label>
                                            <select class="form-control" id="CurrentAmphurID" name="CurrentAmphurID" required></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="CurrentTambonID">ตำบล <span class="text-danger">*</span></label>
                                            <select class="form-control" id="CurrentTambonID" name="CurrentTambonID" required></select>
                                            <input type="hidden" class="form-control" id="CurrentPostCode" name="CurrentPostCode">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="PhoneNumber">เบอร์โทรศัพท์</label>
                                    <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" maxlength="10">
                                </div>
                                
                            </div>
                        </div>
                        <hr>
                        <div class="row px-4">
                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="DegreeID">วุฒิการศึกษา <span class="text-danger">*</span></label>
                                    <select class="form-control" id="DegreeID" name="DegreeID" required></select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="SpecialSkill">ความสามารถพิเศษ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="SpecialSkill" name="SpecialSkill" maxlength="100">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="WorkAddress">ที่อยู่ที่ทำงาน <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="WorkAddress" name="WorkAddress" maxlength="50" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="WorkProvinceID">จังหวัด <span class="text-danger">*</span></label>
                                            <select class="form-control" id="WorkProvinceID" name="WorkProvinceID" required></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="WorkAmphurID">อำเภอ <span class="text-danger">*</span></label>
                                            <select class="form-control" id="WorkAmphurID" name="WorkAmphurID" required></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="WorkTambonID">ตำบล <span class="text-danger">*</span></label>
                                            <select class="form-control" id="WorkTambonID" name="WorkTambonID" required></select>
                                            <input type="hidden" class="form-control" id="WorkPostCode" name="WorkPostCode">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="Department">สาขาวิชา <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Department" name="Department" maxlength="50" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="CurrentCareer">อาชีพปัจจุบัน <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="CurrentCareer" name="CurrentCareer" maxlength="50" required>
                                </div>
                                <div class="form-group">
                                    <div class="font-weight-bold">ประสบการณ์งานการศึกษาต่อเนื่อง <span class="text-danger">*</span></div>
                                    <div class="custom-control custom-radio custom-control-inline ml-4">
                                        <input type="radio" id="Experience" name="isExperience" class="custom-control-input" value="1" required>
                                        <label class="custom-control-label" for="Experience">เคยสอน</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="notExperience" name="isExperience" class="custom-control-input" value="0">
                                        <label class="custom-control-label" for="notExperience">ไม่เคยสอน</label>
                                    </div>
                                </div>
                                <div class="row collapse experience">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="CourceName">ชื่อหลักสูตรระยะสั้น <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="CourceName" name="CourceName" maxlength="100">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="CourceProvinceID">จังหวัดที่เคยสอน <span class="text-danger">*</span></label>
                                            <select class="form-control" id="CourceProvinceID" name="CourceProvinceID"></select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="CourceYearAmount">ระยะเวลา (ปี) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control number" id="CourceYearAmount" name="CourceYearAmount">
                                        </div>
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="CourceAmphurID">อำเภอที่เคยสอน <span class="text-danger">*</span></label>
                                            <select class="form-control" id="CourceAmphurID" name="CourceAmphurID"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="AlreadyTools">รูปภาพวิทยากร <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" name="LecturerImage" id="LecturerImage" required>
                                        <label class="custom-file-label" for="LecturerImage">อัพโหลดรูปภาพ</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="font-weight-bold pl-4 border-bottom">คณะกรรมการพิจารณาหลักสูตร</div>
                        <div class="row px-4 pt-4">
                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="GuarantorName">ชื่อผู้รับรอง <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="GuarantorName" name="GuarantorName" maxlength="50" required>
                                </div>
                            </div>
                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="GuarantorPosition">ตำแหน่ง <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="GuarantorPosition" name="GuarantorPosition" maxlength="50" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group px-4 mr-4">
                            <label class="font-weight-bold" for="LectureContent1">เนื้อหาที่สอน 1 <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="LectureContent1" name="LectureContent1" rows="4" placeholder="กรอกรายละเอียด" maxlength="150" required></textarea>
                        </div>
                        <div class="form-group px-4 mr-4">
                            <label class="font-weight-bold" for="LectureContent2">เนื้อหาที่สอน 2</label>
                            <textarea class="form-control" id="LectureContent2" name="LectureContent2" rows="4" placeholder="กรอกรายละเอียด" maxlength="150"></textarea>
                        </div>
                        <div class="form-group px-4 mr-4">
                            <label class="font-weight-bold" for="LectureContent3">เนื้อหาที่สอน 3</label>
                            <textarea class="form-control" id="LectureContent3" name="LectureContent3" rows="4" placeholder="กรอกรายละเอียด" maxlength="150"></textarea>
                        </div>
                        
                        <div class="container-fluid text-right pt-4">
                            <a href="javascript:void(0)" class="btn btn-secondary">ยกเลิก</a>
                            <input type="submit" class="btn btn-success" value="บันทึก">
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>