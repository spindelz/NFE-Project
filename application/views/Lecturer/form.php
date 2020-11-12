<div class="content-wrapper pt-3">
    <div class="content pb-2">
        <div class="container">
            <div class="content-header" style="color: #517beb">
                <h2><b>เพิ่มข้อมูลวิทยากร</b></h2>
            </div>

            <input type="hidden" name="LecturerID" value="<?php echo $LecturerID; ?>">
            
            <div class="card">
                <div class="card-body">
                    <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formOpenClass')); ?>
                            
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
                                                <input type="text" class="form-control" id="FirstName" name="FirstName" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="LastName">นามสกุล <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="LastName" name="LastName" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="PersonalID">เลขประจำตัวประชาชน <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="PersonalID" name="PersonalID" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="BirthDate">วันเกิด <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="BirthDate" name="BirthDate" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="BirthProvinceID">จังหวัดที่เกิด <span class="text-danger">*</span></label>
                                            <select class="form-control" id="BirthProvinceID" name="BirthProvinceID" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="Religion">ศาสนา <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="Religion" name="Religion" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="Nationality">สัญชาติ <span class="text-danger">*</span></label>
                                            <select class="form-control" id="Nationality" name="Nationality" required></select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="Origin">เชื้อชาติ <span class="text-danger">*</span></label>
                                            <select class="form-control" id="Origin" name="Origin" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="teachTel">เบอร์โทรศัพท์ครูตำบล / ผู้ประสานงาน</label>
                                    <input type="text" class="form-control" id="teachTel" name="ContactPhoneNumber" placeholder="xxx-xxx-xxxx">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="courseName">ชื่อหลักสูตรวิชา <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="courseName" name="CourseName" required>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="LecturerID">วิทยากร <span class="text-danger">*</span></label>
                                    <select class="form-control" id="LecturerID" name="LecturerID" required></select>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="courseName">ช่วงวันที่จัดกิจกรรม <span class="text-danger">*</span></label>
                                    <div class="d-flex flex-row">
                                        <div class="col-md-5 pl-0">
                                            <input type="text" class="form-control" id="dateStId" name="DateStart" required>
                                        </div>
                                        - 
                                        <div class="col-md-5 pr-0">
                                            <input type="text" class="form-control" id="dateSpId" name="DateEnd" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="courseName">ช่วงเวลาที่จัดกิจกรรม <span class="text-danger">*</span></label>
                                    <div class="d-flex flex-row">
                                        <div class="col-md-5 pl-0">
                                            <input type="text" class="form-control" id="timeStId" name="TimeStart" required>
                                        </div>
                                        - 
                                        <div class="col-md-5 pr-0">
                                            <input type="text" class="form-control" id="timeSpId" name="TimeEnd" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 pr-5">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="occType">หมวดอาชีพ <span class="text-danger">*</span></label>
                                    <select class="form-control" id="occType" name="CareerTypeID" required></select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="budgetYear">ปีงบประมาณ <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="budgetYear" name="BudgetYear" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="budget">งบประมาณที่ใช้ <span class="text-danger">*</span></label>
                                            <select class="form-control" id="budget" name="BudgetTypeID" required></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-bold" for="AlreadyTools">อุปกรณ์การเรียนที่มีอยู่แล้ว <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="AlreadyTools" name="AlreadyTools" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="PlaceAddress">ที่อยู่สถานที่จัดกิจกรรม <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="PlaceAddress" name="PlaceAddress" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="province">จังหวัด <span class="text-danger">*</span></label>
                                            <select class="form-control" id="province" name="ProvinceID" required></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="amphur">อำเภอ <span class="text-danger">*</span></label>
                                            <select class="form-control" id="amphur" name="AmphurID" required></select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="tambon">ตำบล <span class="text-danger">*</span></label>
                                            <select class="form-control" id="tambon" name="TombonID" required></select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="tambonId">ระยะเวลาทฤษฎี (ชั่วโมง) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lecture" name="Lecture" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="tambonId">ระยะเวลาภาคปฎิบัติ (ชั่วโมง) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="lab" name="Lab" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="font-weight-bold" for="AlreadyTools">รูปภาพสถานที่จัดกิจกรรม <span class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" name="PlaceImage" id="image" required>
                                        <label class="custom-file-label" for="image">อัพโหลดรูปภาพ</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="pl-4">
                            <div class="font-weight-bold">วันจัดกิจกรรม <span class="text-danger">*</span></div>
                            <div class="ml-4">
                                <div class="form-check form-check-inline custom-checkbox">
                                    <input class="form-check-input custom-control-input" type="checkbox" id="monday" name="ClassDays[]" value="1" required>
                                    <label class="form-check-label custom-control-label" for="monday"> วันจันทร์</label>
                                </div>
                                <div class="form-check form-check-inline custom-checkbox">
                                    <input class="form-check-input custom-control-input" type="checkbox" id="tuesday" name="ClassDays[]" value="2">
                                    <label class="form-check-label custom-control-label" for="tuesday"> วันอังคาร</label>
                                </div>
                                <div class="form-check form-check-inline custom-checkbox">
                                    <input class="form-check-input custom-control-input" type="checkbox" id="wednesday" name="ClassDays[]" value="3">
                                    <label class="form-check-label custom-control-label" for="wednesday"> วันพุธ</label>
                                </div>
                                <div class="form-check form-check-inline custom-checkbox">
                                    <input class="form-check-input custom-control-input" type="checkbox" id="thursday" name="ClassDays[]" value="4">
                                    <label class="form-check-label custom-control-label" for="thursday"> วันพฤหัสบดี</label>
                                </div>
                                <div class="form-check form-check-inline custom-checkbox">
                                    <input class="form-check-input custom-control-input" type="checkbox" id="friday" name="ClassDays[]" value="5">
                                    <label class="form-check-label custom-control-label" for="friday"> วันศุกร์</label>
                                </div>
                                <div class="form-check form-check-inline custom-checkbox">
                                    <input class="form-check-input custom-control-input" type="checkbox" id="saturday" name="ClassDays[]" value="6">
                                    <label class="form-check-label custom-control-label" for="saturday"> วันเสาร์</label>
                                </div>
                                <div class="form-check form-check-inline custom-checkbox">
                                    <input class="form-check-input custom-control-input" type="checkbox" id="sunday" name="ClassDays[]" value="7">
                                    <label class="form-check-label custom-control-label" for="sunday"> วันอาทิตย์</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row px-4">
                            <div class="col-md-6 pr-4">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="courseStory">ความเป็นมาของหลักสูตร <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="courseStory" name="CourseHistory" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 pr-4">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="courseMethod">หลักการของหลักสูตร <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="courseMethod" name="CoursePrinciple" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 pr-4">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="courseTarget">จุดมุ่งหมาย <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="courseTarget" name="CourseObjective" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 pr-4">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="courseGroup">กลุ่มเป้าหมาย <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="courseGroup" name="TargetGroup" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card card-default mx-4">
                            <div class="card-header d-flex">
                                <span class="mr-auto">โครงสร้างหลักสูตร</span><button type="button" class="btn btn-success add-course-structure">เพิ่ม</button>
                            </div>
                            <div class="card-body">
                                <div class="row" id="CourseStructure"></div>
                            </div>
                        </div>

                        <div class="card card-default mx-4">
                            <div class="card-header d-flex">
                                <span class="mr-auto">ตารางหลักสูตรการศึกษาต่อเนื่อง</span><button type="button" class="btn btn-success add-class-detail">เพิ่ม</button>
                            </div>
                            <div class="card-body">
                                <div class="row" id="ClassDetail"></div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group px-4">
                                    <label class="font-weight-bold mr-auto">สื่อการเรียนรู้</label>
                                    <button type="button" class="btn btn-sm btn-success add-learning-material">เพิ่ม</button>
                                    <div id="LearningMaterial"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group px-4">
                                    <label class="font-weight-bold mr-auto">การวัดผลประเมินผล</label>
                                    <button type="button" class="btn btn-sm btn-success add-evaluate">เพิ่ม</button>
                                    <div id="Evaluate"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group px-4">
                                    <label class="font-weight-bold mr-auto">เกณฑ์การจบหลักสูตร</label>
                                    <button type="button" class="btn btn-sm btn-success add-criteria-complete">เพิ่ม</button>
                                    <div id="CriteriaComplete"></div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group px-4">
                            <div class="font-weight-bold">การขยายเวลา <span class="text-danger">*</span></div>
                            <div class="custom-control custom-radio custom-control-inline ml-4">
                                <input type="radio" id="Extend" name="isExtendTime" class="custom-control-input" value="1" required>
                                <label class="custom-control-label" for="Extend">ขยายเวลา</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="notExtend" name="isExtendTime" class="custom-control-input" value="0" required>
                                <label class="custom-control-label" for="notExtend">ไม่ขยายเวลา</label>
                            </div>
                            <div class="row collapse lateTable">
                                <div class="col-md-6 row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="HourAmount">จำนวนชั่วโมง <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="HourAmount" name="HourAmount">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" for="DayAmount">จำนวนวัน <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="DayAmount" name="DayAmount">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="ExtendDateStart">ช่วงวันที่ขยาย <span class="text-danger">*</span></label>
                                        <div class="d-flex flex-row">
                                            <div class="col-md-5 pl-0">
                                                <input type="text" class="form-control" id="ExtendDateStart" name="ExtendDateStart">
                                            </div>
                                            - 
                                            <div class="col-md-5 pr-0">
                                                <input type="text" class="form-control" id="ExtendDateEnd" name="ExtendDateEnd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="ExtendTimeStart">ช่วงเวลาที่ขยาย <span class="text-danger">*</span></label>
                                        <div class="d-flex flex-row">
                                            <div class="col-md-5 pl-0">
                                                <input type="text" class="form-control" id="ExtendTimeStart" name="ExtendTimeStart">
                                            </div>
                                            - 
                                            <div class="col-md-5 pr-0">
                                                <input type="text" class="form-control" id="ExtendTimeEnd" name="ExtendTimeEnd">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="font-weight-bold pl-4 border-bottom">คณะกรรมการพิจารณาหลักสูตร</div>
                        <div class="row px-4 pt-4">
                            <div class="col-md-6 pr-5">
                                <label class="font-weight-bold" for="HeadBoardName">ชื่อประธาน / คณะกรรมการสถานศึกษา <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="HeadBoardName" name="HeadBoardName" required>
                            </div>
                            <div class="col-md-6 pr-5">
                                <label class="font-weight-bold" for="AssistTeacherName">ชื่อข้าราชการ / ครู / ครูผู้ช่วย <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="AssistTeacherName" name="AssistTeacherName" required>
                            </div>
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