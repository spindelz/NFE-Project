<div class="content-wrapper pt-3">
    <div class="content pb-2">
        <div class="container">
            <div class="content-header" style="color: #517beb">
                <h2><b>เปิดชั้นเรียน</b></h2>
            </div>

            <input type="hidden" name="ClassID" value="<?php echo $ClassID; ?>">
            
            <div class="card card-primary card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">บันทึกเปิดชั้นเรียน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="true">บันทึกข้อมูลวิทยากร</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">บันทึกประวัติผู้เรียน </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">นิเทศ/ติดตามผล</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="custom-tabs-three-result-tab" data-toggle="pill" href="#custom-tabs-three-result" role="tab" aria-controls="custom-tabs-three-result" aria-selected="false">ผลการเรียน</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">สรุปประเมินผล</a>
                        </li> -->
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                        <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formOpenClass')); ?>
                            
                            <div class="row px-4">
                                <div class="col-md-6 pr-5">
                                    <div class="font-weight-bold">รูปแบบชั้นเรียน <span class="text-danger">*</span></div>
                                    <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                        <input type="radio" id="h30" class="form-check-input custom-control-input" name="ClassTypeID" value="1" required>
                                        <label class="custom-control-label mb-0" for="h30"> การศึกษาต่อเนื่องรูปแบบกลุ่มสนใจ ( ไม่ถึง 30 ชั่วโมง )</label>
                                    </div>
                                    <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                        <input type="radio" id="h31" class="form-check-input custom-control-input" name="ClassTypeID" value="2">
                                        <label class="custom-control-label mb-0" for="h31"> การศึกษาต่อเนื่องรูปแบบวิชาชีพ ( 31 ชั่วโมงขึ้นไป )</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="classGrpCode">รหัสกลุ่มเรียน <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="classGrpCode" name="GroupCode" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="nfeTambon">กศน. ตำบล <span class="text-danger">*</span></label>
                                        <select class="form-control" id="nfeTambon" name="NFETambonID" required></select>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" >เบอร์โทรศัพท์ครูตำบล / ผู้ประสานงาน</label>
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
                                    <input type="radio" id="notExtend" name="isExtendTime" class="custom-control-input" value="0">
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

                        <div class="tab-pane fade show active" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formOpenClass_lecturer')); ?>
                            <div class="row">
                                <!-- <div class="card card-default mx-4"> -->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="RegisterDate"> วันที่สมัคร : </label>
                                            </div>
                                            <div class="col-md-8 px-4">
                                                <input type="date" class="form-control" id="RegisterDate" name="RegisterDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="FirstName"> ชื่อวิทยากร : </label>
                                            </div>
                                            <div class="col-md-4 px-4">
                                                <input type="text" class="form-control" id="FirstName" name="FirstName" placeholder="ชื่อ">
                                            </div>
                                            <div class="col-md-4 px-4">
                                                <input type="text" class="form-control" id="LastName" name="LastName" placeholder="นามสกุล">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="PersonalID"> เลขบัตรประจำตัวประชาชน : </label>
                                            </div>
                                            <div class="col-md-8 px-4">
                                                <input type="text" class="form-control" id="PersonalID" name="PersonalID">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-6 px-4">
                                                <label class="font-weight-bold" for="BirthProvinceID"> จังหวัดที่เกิด : </label>
                                            </div>
                                            <div class="col-md-6 px-4">
                                                <select class="form-control" id="BirthProvinceID" name="BirthProvinceID"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3 ">
                                                <label class="font-weight-bold" for="Religion"> ศาสนา : </label>
                                            </div>
                                            <div class="col-md-6 px-4">
                                                <input type="text" class="form-control" id="Religion" name="Religion">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="Origin"> เชื้อชาติ : </label>
                                            </div>
                                            <div class="col-md-3 px-4">
                                                <input type="text" class="form-control" id="Origin" name="Origin">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="CurrentAddress"> ที่อยู่ปัจจุบัน : </label>
                                            </div>
                                            <div class="col-md-8 px-4">
                                                <input type="text" class="form-control" id="CurrentAddress" name="CurrentAddress">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-6 px-4">
                                                <label class="font-weight-bold" for="ProvinceID">จังหวัด : </label>
                                            </div>
                                            <div class="col-md-6 px-4">
                                                <select class="form-control" id="ProvinceID" name="CurrentProvinceID"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3 ">
                                                <label class="font-weight-bold" for="AmphurID">อำเภอ : </label>
                                            </div>
                                            <div class="col-md-6 px-4">
                                                <select class="form-control" id="AmphurID" name="CurrentAmphurID"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-6 px-4">
                                                <label class="font-weight-bold" for="TambonID">ตำบล : </label>
                                            </div>
                                            <div class="col-md-6 px-4">
                                                <select class="form-control" id="TambonID" name="CurrentTambonID"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3 ">
                                                <label class="font-weight-bold" for="CurrentPostCode">รหัสไปรษณีย์ : </label>
                                            </div>
                                            <div class="col-md-6 px-4">
                                                <input type="text" class="form-control" id="CurrentPostCode" name="CurrentPostCode">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="PhoneNumber">เบอร์โทรศัพท์ : </label>
                                            </div>
                                            <div class="col-md-3 px-4">
                                                <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-6 px-4">
                                                <label class="font-weight-bold" for="LecturerID">วุฒิการศึกษา : </label>
                                            </div>
                                            <div class="col-md-6 px-4">
                                                <select class="form-control" id="LecturerID" name="LecturerID">
                                                    <option value="12">ต่ำกว่าปริญญาตรี</option>
                                                    <option value="13">ปริญญาตรี</option>
                                                    <option value="14">ปริญญาโท</option>
                                                    <option value="15">ปริญญาเอก</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3 ">
                                                <label class="font-weight-bold" for="DegreeID">สาขาวิชา : </label>
                                            </div>
                                            <div class="col-md-6 px-4">
                                                <input type="text" class="form-control" id="DegreeID" name="DegreeID">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-6 px-4">
                                                <label class="font-weight-bold" for="LecturerTypeID">ประเภทของวิทยากร : </label>
                                            </div>
                                            <div class="col-md-6 px-4">
                                                <select class="form-control" id="LecturerTypeID" name="LecturerTypeID">
                                                    <option value="1">ข้าราชการ</option>
                                                    <option value="2">ลูกจ้าง</option>
                                                    <option value="3">วิทยากรภายนอก</option>
                                                    <option value="4">อื่นๆ</option>
                                                </select>
                                                <div class="collapse coll_lacturerType pt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-3.5 ">
                                                <label class="font-weight-bold" for="SpecialSkill"> ความสามารถพิเศษ : </label>
                                            </div>
                                            <div class="col-md-6 px-4 ml-2">
                                                <input type="text" class="form-control" id="SpecialSkill" name="SpecialSkill">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="CurrentCareer">อาชีพปัจจุบัน : </label>
                                            </div>
                                            <div class="col-md-3 px-4">
                                                <input type="text" class="form-control" id="CurrentCareer" name="CurrentCareer">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="form-group px-4">
                                                        <label class="font-weight-bold" for="WorkAddress">สถานที่ทำงาน  </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <div class="col-md-4 px-4">
                                                            <label class="font-weight-bold" for="ProvinceID">จังหวัด : </label>
                                                        </div>
                                                        <div class="col-md-8 px-4">
                                                            <select class="form-control" id="ProvinceID" name="WorkProvinceID"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-3 ">
                                                            <label class="font-weight-bold" for="AmphurID">อำเภอ : </label>
                                                        </div>
                                                        <div class="col-md-6 px-4">
                                                            <select class="form-control" id="AmphurID" name="WorkAmphurID"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group row">
                                                        <div class="col-md-4 px-4">
                                                            <label class="font-weight-bold" for="TambonID">ตำบล : </label>
                                                        </div>
                                                        <div class="col-md-8 px-4">
                                                            <select class="form-control" id="TambonID" name="WorkTambonID"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-3 ">
                                                            <label class="font-weight-bold" for="WorkPostCode">รหัสไปรษณีย์ : </label>
                                                        </div>
                                                        <div class="col-md-6 px-4">
                                                            <input type="text" class="form-control" id="WorkPostCode" name="WorkPostCode">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="form-group px-4">
                                                        <label class="font-weight-bold" for="LecturerID">ประสบการณ์งานการศึกษาต่อเนื่อง  </label>
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline ml-4">
                                                    <input type="radio" id="Extend" name="isExperience" class="custom-control-input" value="1">
                                                    <label class="custom-control-label" for="Extend">เคยสอน</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="notExtend" name="isExperience" class="custom-control-input" value="0">
                                                    <label class="custom-control-label" for="notExtend">ไม่เคยสอน</label>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row collapse lateTable">
                                                        <div class="col-md-12">
                                                            <div class="card card-default mx-4">
                                                                <div class="form-group row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group row pt-2">
                                                                            <div class="col-md-3 px-4">
                                                                                <label class="font-weight-bold" for="CourceName">ชื่อหลักสูตรระยะสั้น : </label>
                                                                            </div>
                                                                            <div class="col-md-3 px-4">
                                                                                <select class="form-control" id="CourceName" name="CourceName"></select>
                                                                            </div>
                                                                            <div class="col-md-1.5 ">
                                                                                <label class="font-weight-bold" for="CourceYearAmount">ระยะเวลา : </label>
                                                                            </div>
                                                                            <div class="col-md-3 px-4">
                                                                                <select class="form-control" id="CourceYearAmount" name="CourceYearAmount"></select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group px-4">
                                                                            <label class="font-weight-bold" >สถานที่สอน  </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group row">
                                                                            <div class="col-md-3 px-4">
                                                                                <label class="font-weight-bold" for="CourceProvinceID">จังหวัด : </label>
                                                                            </div>
                                                                            <div class="col-md-3 px-4">
                                                                                <select class="form-control" id="CourceProvinceID" name="CourceProvinceID"></select>
                                                                            </div>
                                                                            <div class="col-md-1.5 px-">
                                                                                <label class="font-weight-bold" for="CourceAmphurID">อำเภอ : </label>
                                                                            </div>
                                                                            <div class="col-md-3 px-4">
                                                                                <select class="form-control" id="CourceAmphurID" name="CourceAmphurID"></select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="form-group row pt-2">
                                                <div class="col-md-3 px-4">
                                                    <label class="font-weight-bold" for="LecturerImage">รูปวิทยากร : </label>
                                                </div>
                                                <div class="col-md-6 px-4">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input form-control" name="LecturerImage" id="image">
                                                        <label class="custom-file-label" for="image">อัพโหลดรูปภาพ</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="form-group row">
                                                <div class="col-md-12">
                                                    <div class="form-group px-4">
                                                        <label class="font-weight-bold" >หนังสือรับรองวิทยากร  </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2 px-4">
                                                            <label class="font-weight-bold" for="GuarantorName">ชื่อผู้รับรอง : </label>
                                                        </div>
                                                        <div class="col-md-3 px-4">
                                                            <input type="text" class="form-control" id="FirstName" name="GuarantorFirstName" placeholder="ชื่อจริง">
                                                        </div>
                                                        <div class="col-md-3 px-4">
                                                            <input type="text" class="form-control" id="LastName" name="GuarantorLastName" placeholder="นามสกุล">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2 px-4">
                                                            <label class="font-weight-bold" for="GuarantorPosition">ตำแหน่ง : </label>
                                                        </div>
                                                        <div class="col-md-3 px-4">
                                                            <input type="text" class="form-control" id="GuarantorPosition" name="GuarantorPosition" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4 px-4">
                                                            <label class="font-weight-bold" for="LectureContent1">เนื้อหาที่สอน 1 : </label>
                                                        </div>
                                                        <div class="col-md-6 px-4">
                                                            <input type="text" class="form-control" id="LectureContent1" name="LectureContent1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4 ">
                                                            <label class="font-weight-bold" for="LectureContent2">เนื้อหาที่สอน 2 : </label>
                                                        </div>
                                                        <div class="col-md-6 px-4">
                                                            <input type="text" class="form-control" id="LectureContent2" name="LectureContent2">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <div class="col-md-4 px-4">
                                                            <label class="font-weight-bold" for="LectureContent3">เนื้อหาที่สอน 3 : </label>
                                                        </div>
                                                        <div class="col-md-6 px-4">
                                                            <input type="text" class="form-control" id="LectureContent3" name="LectureContent3">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid text-right pt-4">
                                        <a href="javascript:void(0)" class="btn btn-secondary">ยกเลิก</a>
                                        <input type="submit" class="btn btn-success" value="บันทึก">
                                    </div>  
                                <!-- </div> -->
                            </div>
                        <?php echo form_close(); ?>
                        </div>
                            
                        <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                        <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formOpenClass_Profile')); ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group px-4">
                                            <label class="font-weight-bold" for="TambonID">ปัจจุบันเรียนที่ กศน. ตำบล : </label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                                <select class="form-control" id="TambonID" name="CurrentNFETombonID"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group px-4">
                                            <label class="font-weight-bold" for="FirstName">ชื่อผู้เรียน : </label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group row ">
                                        <div class="col-md-6 pl-3">
                                            <input type="text" class="form-control" id="FirstName" name="FirstName">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" id="LastName" name="LastName">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group px-4">
                                            <label class="font-weight-bold" for="PersonalID">เลขบัตรประจำตัวประชาชน : </label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="col-md-12">
                                        <div class="form-group ">
                                            <input type="text" class="form-control" id="PersonalID" name="PersonalID">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group px-4">
                                            <label class="font-weight-bold" >เพศ : </label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                            <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                                <input type="radio" id="Sex1" class="form-check-input custom-control-input" name="Sex" value="1">
                                                <label class="custom-control-label mb-0" for="Sex1"> ชาย </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                                <input type="radio" id="Sex2" class="form-check-input custom-control-input" name="Sex" value="2">
                                                <label class="custom-control-label mb-0" for="Sex2"> หญิง </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="Nationality">สัญชาติ : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Nationality" name="Nationality">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-4">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="Religion">ศาสนา : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Religion" name="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="DegreeID">วุฒิการศึกษา : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                        <select class="form-control" id="DegreeID" name="DegreeID">
                                            <option value="">เลือกวุฒิการศึกษา</option>
                                            <option value="1">ต่ำกว่าป.4</option>
                                            <option value="2">ป.4</option>
                                            <option value="3">ป.6</option>
                                            <option value="4">ป.7</option>
                                            <option value="5">มัธยมศึกษาตอนต้น</option>
                                            <option value="6">มัธยมศึกษาตอนปลาย</option>
                                            <option value="7">ปวช.</option>
                                            <option value="8">ปวท.</option>
                                            <option value="9">ปวส.</option>
                                            <option value="10">ปริญญาตรี</option>
                                            <option value="11">สูงกว่าปริญญาตรี</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-4">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="SchoolName">สถานศึกษา : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="SchoolName" name="SchoolName">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="SchoolProvinceID">จังหวัด : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group px-2 ml-1">
                                            <select class="form-control" id="SchoolProvinceID" name="SchoolProvinceID"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group px-4">
                                            <label class="font-weight-bold" for="Address">ที่อนู่ตามทะเบียนบ้าน : </label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="col-md-8">
                                        <div class="form-group ">
                                            <input type="text" class="form-control" id="Address" name="Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="ProvinceID">จังหวัด : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                        <select class="form-control" id="ProvinceID" name="ProvinceID"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-4">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="AmphurID">อำเภอ : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                                <select class="form-control" id="AmphurID" name="AmphurID"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="TombonID">ตำบล : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                        <select class="form-control" id="TombonID" name="TombonID"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-4">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="PostCode">รหัสไปรษณีย์ : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="PostCode" name="PostCode">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-6">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="PhoneNumber">เบอร์โทรศัพท์ : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-4">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="CareerID">อาชีพ : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                            <select class="form-control" id="CareerID" name="CareerID">
                                                <option value="ไม่มีอาชีพ">ไม่มีอาชีพ</option>
                                                <option value="รับราชการ">รับราชการ</option>
                                                <option value="พนักงานรัฐวิสาหกิจ">พนักงานรัฐวิสาหกิจ</option>
                                                <option value="ค้าขาย">ค้าขาย</option>
                                                <option value="รับจ้าง">รับจ้าง</option>
                                                <option value="แม่บ้าน">แม่บ้าน</option>
                                                <option value="เกษตรกร">เกษตรกร</option>
                                                <option value="วิทยากรภายนอก">วิทยากรภายนอก</option>
                                                <option value="">อื่นๆ</option>
                                            </select>
                                            <div class="collapse coll_career pt-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="GroupTargetID">กลุ่มเป้าหมาย : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <select class="form-control" id="GroupTargetID" name="GroupTargetID">
                                                <option value="1">เด็กด้อยโอกาส</option>
                                                <option value="2">สตรีกลุ่มเสี่ยง</option>
                                                <option value="3">ผู้สูงอายุ</option>
                                                <option value="4">คนพิการ</option>
                                                <option value="5">ผู้นำท้องถิ่น</option>
                                                <option value="6">อบต.</option>
                                                <option value="7">ผู้ต้องขัง</option>
                                                <option value="8">ทหารกองประจำการ</option>
                                                <option value="9">ผู้ใช้แรงงาน</option>
                                                <option value="10">แรงงานต่างด้าว</option>
                                                <option value="11">เกษตรกร</option>
                                                <option value="12">อสม.</option>
                                                <option value="13">ผู้ปฏิบัติศาสนกิจ</option>
                                                <option value="14">เยาวชน</option>
                                                <option value="15">ชาวไทยภูเขา</option>
                                                <option value="16">ชุมชนแออัด</option>
                                                <option value="17">อื่นๆ</option>
                                            </select>
                                            <div class="collapse coll_groupTar pt-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" >สนใจเข้าร่วมเนื่องจาก : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <select class="form-control" id="InterestedByID" name="InterestedByID">
                                                <option value="1">เป็นพื้นฐานในการศึกษาต่อในระดับ/สาขา . . .</option>
                                                <option value="2">ต้องการเปลี่ยนอาชีพ</option>
                                                <option value="3">ต้องการใช้เวลาว่างให้เป็นประโยชน์</option>
                                                <option value="4">ต้องการมีอาชีพเสริม/อาชีพหลัก</option>
                                                <option value="5">อื่นๆ</option>
                                            </select>
                                            <div class="collapse coll_interest pt-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" >สถานภาพของผู้สมัคร : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <select class="form-control" id="PeopleStatusID" name="PeopleStatusID">
                                                <option value="1">ว่างงาน</option>
                                                <option value="2">สมาชิกกองทุนสตรี</option>
                                                <option value="3">ผู้ถึอบัตรสวัสดิการของรัฐ</option>
                                                <option value="4">อสม/อสส</option>
                                                <option value="5">รับจ้าง</option>
                                                <option value="6">เกษตรกร</option>
                                                <option value="7">สมาชิกกองทุนหมู่บ้าน</option>
                                                <option value="8">อื่นๆ</option>
                                            </select>
                                            <div class="collapse coll_status pt-3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-3.5">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="GetNewsFrom">ท่านได้รับข่าวสารการรับสมัครจาก : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="GetNewsFrom" name="GetNewsFrom">
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid text-right pt-4">
                                    <a href="javascript:void(0)" class="btn btn-secondary">ยกเลิก</a>
                                    <input type="submit" class="btn btn-success" value="บันทึก">
                                </div>
                               
                            </div>
                        <?php echo form_close(); ?>
                        </div>

                        <div class="tab-pane fade " id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                            <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formOpenClass_Trace')); ?>    
                                <div class="row">
                                    <div class="row col-md-6">
                                        <div class="col-md-4">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" >ผู้เรียน : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group px-3">
                                                <select class="form-control select2 " id="TraceStudent" name="TraceStudent">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-6">
                                        <div class="col-md-4">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="TraceDate">วันที่ออกติดตาม : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group px-3">
                                                <input type="date" class="form-control" id="TraceDate" name="TraceDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="form-group row pt-2">
                                                <div class="col-md-12">
                                                    <div class="form-group px-4">
                                                        <label class="font-weight-bold" for="LecturerID">ชื่อผู้ติดตามผล  </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2 px-4">
                                                            <label class="font-weight-bold" >ชื่อผู้ติดตามผลที่ 1 : </label>
                                                        </div>
                                                        <div class="col-md-3 px-4">
                                                            <input type="text" class="form-control" id="FollowerFirstName1" name="FollowerFirstName1" placeholder="ชื่อจริง">
                                                        </div>
                                                        <div class="col-md-3 px-4">
                                                            <input type="text" class="form-control" id="FollowerLastName1" name="FollowerLastName1" placeholder="นามสกุล">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <div class="col-md-2 px-4">
                                                            <label class="font-weight-bold" >ชื่อผู้ติดตามผลที่ 2 : </label>
                                                        </div>
                                                        <div class="col-md-3 px-4">
                                                            <input type="text" class="form-control" id="FollowerFirstName2" name="FollowerFirstName2" placeholder="ชื่อจริง">
                                                        </div>
                                                        <div class="col-md-3 px-4">
                                                            <input type="text" class="form-control" id="FollowerLastName2" name="FollowerLastName2" placeholder="นามสกุล">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row pt-2">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="KnowledgeID">ได้นำความรู้ไปใช้เกี่ยวกับ : </label>
                                            </div>
                                            <div class="col-md-5 px-3">
                                                    <select class="form-control" id="KnowledgeID" name="KnowledgeID">
                                                        <option value="1">ต้องการมีรายได้</option>
                                                        <option value="2">ต้องการมีอาชีพ</option>
                                                        <option value="3">ต้องการได้รับการพัฒนา</option>
                                                        <option value="4">ใช้เวลาว่างให้เกิดประโยชน์</option>
                                                        <option value="5">อื่นๆ</option>
                                                    </select>
                                                    <div class="collapse coll_knowladge pt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-8 px-3">
                                                <label class="font-weight-bold" for="Conclude">เนื้อหาสรุปการติดตาม</label>
                                                <textarea class="form-control" id="Conclude" name="Conclude" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-md-12 px-4">
                                                <label class="font-weight-bold">ภาพกิจกรรม (เปิดอบรม)  </label>
                                            </div>
                                            <div class="col-md-11 px-4">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" name="OpenClassImage" id="OpenClassImage">
                                                    <label class="custom-file-label" for="OpenClassImage">อัพโหลดรูปภาพ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-12 px-4">
                                                <label class="font-weight-bold" >ภาพกิจกรรม (ครูผู้สอนกับผู้ฝึกอบรม)  </label>
                                            </div>
                                            <div class="col-md-11 px-4">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" name="TeacherStudentImage" id="TeacherStudentImage">
                                                    <label class="custom-file-label" for="TeacherStudentImage">อัพโหลดรูปภาพ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="col-md-12 px-4">
                                                <label class="font-weight-bold" >ภาพกิจกรรม (เจ้าของงานกับกลุ่มจัดฝึกอบรม)  </label>
                                            </div>
                                            <div class="col-md-11 px-4">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" name="OwnerStuffImage" id="OwnerStuffImage">
                                                    <label class="custom-file-label" for="OwnerStuffImage">อัพโหลดรูปภาพ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-md-12 px-4">
                                                <label class="font-weight-bold" >ภาพกิจกรรม (ผู้ฝึกอบรมและฝึกปฏิบัติ)  </label>
                                            </div>
                                            <div class="col-md-11 px-4">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" name="StudentClassImage" id="StudentClassImage">
                                                    <label class="custom-file-label" for="StudentClassImage">อัพโหลดรูปภาพ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-md-12 px-4">
                                                <label class="font-weight-bold" >ภาพกิจกรรม (ผู้อบรมพร้อมชิ้นงานที่สำเร็จ)  </label>
                                            </div>
                                            <div class="col-md-11 px-4">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" name="TeacherSuccessImage" id="TeacherSuccessImage">
                                                    <label class="custom-file-label" for="TeacherSuccessImage">อัพโหลดรูปภาพ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <div class="col-md-12 px-4">
                                                <label class="font-weight-bold" >ภาพกิจกรรม (ผู้นิเทศกิจกรรมการฝึกอบรม)  </label>
                                            </div>
                                            <div class="col-md-11 px-4">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" name="PeopleClassImage" id="PeopleClassImage">
                                                    <label class="custom-file-label" for="PeopleClassImage">อัพโหลดรูปภาพ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid text-right pt-4">
                                        <a href="javascript:void(0)" class="btn btn-secondary">ยกเลิก</a>
                                        <input type="submit" class="btn btn-success" value="บันทึก">
                                    </div>  
                                </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div class="tab-pane fade " id="custom-tabs-three-result" role="tabpanel" aria-labelledby="custom-tabs-three-result-tab">
                            <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formOpenClass_Result')); ?>    
                                <div class="row">
                                    <div class="row col-md-6">
                                        <div class="col-md-4">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" >ผู้เรียน : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group px-3">
                                                <select class="form-control select2 " id="StudentID" name="StudentID">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-6">
                                        <div class="col-md-4">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="DiplomaNumber">เลขวุฒิใบสมัคร : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group px-3">
                                                <input type="text" class="form-control" id="DiplomaNumber" name="DiplomaNumber">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-6">
                                        <div class="col-md-4">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="GradeResultID">เกรด : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group px-3">
                                                <input type="text" class="form-control" id="GradeResultID" name="GradeResultID">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-6">
                                        <div class="col-md-4">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="GradeResultDate">ออกเมื่อวันที่ : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group px-3">
                                                <input type="text" class="form-control" id="GradeResultDate" name="GradeResultDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-5">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="UnderstandScore">ความรู้ความเข้าใจในเนื้อหาสาระ (20 คะแนน) : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group px-3">
                                                <input type="text" class="form-control" id="UnderstandScore" name="UnderstandScore">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-5">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="SkillScore">ทักษะการปฏิบัติ (40 คะแนน) : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group px-3">
                                                <input type="text" class="form-control" id="SkillScore" name="SkillScore">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-5">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="PracticeResultScore">คุณภาพของผลงาน / ผลการปฏิบัติ (40 คะแนน) : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group px-3">
                                                <input type="text" class="form-control" id="PracticeResultScore" name="PracticeResultScore">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-5">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="AssessmentScore">ผลการประเมิณรวม (100 คะแนน) : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group px-3">
                                                <input type="text" class="form-control" id="AssessmentScore" name="AssessmentScore">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-5">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="SatisfactionLevel">ระดับการประเมิณ (เกรด 1-4) : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group px-3">
                                                <input type="text" class="form-control" id="SatisfactionLevel" name="SatisfactionLevel">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 ">
                                        <div class="card card-default mx-4">
                                            <div class="col-md-5">
                                                <div class="form-group px-4">
                                                    <label class="font-weight-bold" for="LecturerID">ส่วนพื้นที่การดำเนินสอนของวิทยากร : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-5">
                                                <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                                    <input type="radio" id="isInField" class="form-check-input custom-control-input" name="isInField" value="0" required>
                                                    <label class="custom-control-label mb-0" for="isInField"> ในเขตเทศบาล </label>
                                                </div>
                                            </div>
                                            <div class="form-group row px-5">
                                                <div class="col-md-2 ml-4">
                                                <label class="font-weight-bold" for="VillageNameInField">ชื่อหมู่บ้าน / ชุมชน : </label>
                                                </div>
                                                <div class="col-md-4 px-5">
                                                        <input type="text" class="form-control" id="VillageNameInField" name="VillageNameInField">
                                                </div>
                                            </div>
                                            <div class="col-md-6 px-5">
                                                <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                                    <input type="radio" id="isNotField" class="form-check-input custom-control-input" name="isInField" value="1" required>
                                                    <label class="custom-control-label mb-0" for="isNotField"> นอกเขตเทศบาล </label>
                                                </div>
                                            </div>
                                            <div class="form-group row px-5">
                                                <div class="col-md-2 ml-4">
                                                    <label class="font-weight-bold" for="VillageNameOutField">ชื่อหมู่บ้าน / ชุมชน : </label>
                                                </div>
                                                <div class="col-md-4 px-5">
                                                    <input type="text" class="form-control" id="VillageNameOutField" name="VillageNameOutField">
                                                </div>
                                                <div class="col-md-1 ">
                                                    <label class="font-weight-bold" for="MooOutField">หมู่ที่ : </label>
                                                </div>
                                                <div class="col-md-4 px-5">
                                                    <input type="text" class="form-control" id="MooOutField" name="MooOutField">
                                                </div>
                                                <div class="col-md-2 ml-4">
                                                    <label class="font-weight-bold" for="TombonIDOutField">ตำบล : </label>
                                                </div>
                                                <div class="col-md-4 px-5">
                                                    <select class="form-control" id="TombonIDOutField" name="TombonIDOutField"></select>
                                                </div>
                                                <div class="col-md-1 ">
                                                    <label class="font-weight-bold" for="ProvinceIDOutField">จังหวัด : </label>
                                                </div>
                                                <div class="col-md-4 px-5">
                                                    <select class="form-control" id="ProvinceIDOutField" name="ProvinceIDOutField"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="form-group row">
                                                <div class="form-group px-4">
                                                    <label class="font-weight-bold" >ส่วนวิธีการสำรวจความต้องการเรียน ดำเนินการอย่างไร : </label>
                                                </div>
                                                <div class="col-md-6 ml-4 ">
                                                    <div class="col-md-12">
                                                        <select class="form-control " id="WantToLearnID" name="WantToLearnID">
                                                            <option value="1">ประชาคม</option>
                                                            <option value="2">แนะแนว</option>
                                                            <option value="3">สำรวจความต้องการ</option>
                                                            <option value="4">อื่นๆ</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 pt-2 collapse coll_wantToLearn">
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="col-md-5">
                                                <div class="form-group px-4">
                                                    <label class="font-weight-bold" >ส่วนการติดตามผู้ผ่านการฝึกอบรม : </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 ml-4 ">
                                                <div class="form-group row px-5 ml-1 ">
                                                    <div class="form-check custom-control custom-radio custom-control-inline col-md-1">
                                                        <input class="form-check-input custom-control-input" type="radio" id="isHasFollow0" name="isHasFollow" value="0">
                                                        <label class="form-check-label custom-control-label" for="isHasFollow0"> ไม่มี </label>
                                                    </div>
                                                    <div class="col-md-2 collapse coll_bc0">
                                                        <label class="font-weight-bold ">เพราะ : </label>
                                                    </div>
                                                    <div class="col-md-4 collapse coll_followDetil0">
                                                        <input type="text" class="form-control" id="FollowDetail" name="FollowDetail">
                                                    </div>
                                                </div>
                                                <div class="form-group row px-5 ml-1 ">
                                                    <div class="form-check custom-control custom-radio custom-control-inline col-md-1">
                                                        <input class="form-check-input custom-control-input" type="radio" id="isHasFollow1" name="isHasFollow" value="1">
                                                        <label class="form-check-label custom-control-label" for="isHasFollow1"> มี </label>
                                                    </div>
                                                    <div class="col-md-2 collapse coll_bc1">
                                                        <label class="font-weight-bold " > ดำเนินการอย่างไร : </label>
                                                    </div>
                                                    <div class="col-md-4 collapse coll_followDetil1">
                                                        <input type="text" class="form-control" id="FollowDetail" name="FollowDetail">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="form-group row pt-2">
                                                <div class="col-md-5 px-4">
                                                        <label class="font-weight-bold" for="SatisfactionLevel">ผลประเมิณความพึงพอใจในการจัดการโครงการอยู่ในระดับ : </label>
                                                </div>
                                                <div class="col-md-6 px-3">
                                                        <select class="form-control" id="SatisfactionLevel" name="SatisfactionLevel">
                                                            <option value="1">พอใช้</option>
                                                            <option value="2">ปานกลาง</option>
                                                            <option value="3">ดี</option>
                                                            <option value="4">ดีมาก</option>
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="form-group row pt-2">
                                                <div class="col-md-5 px-4">
                                                    <label class="font-weight-bold" >ผู้ผ่านการอบรมได้นำความรู้ไปใช้จริง :</label>
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="col-md-12">
                                                        <select class="form-control " id="KnowledgeID" name="KnowledgeID">
                                                            <option value="6">เพิ่มรายได้</option>
                                                            <option value="7">ลดรายจ่าย</option>
                                                            <option value="8">นำไปประกอบอาชีพ</option>
                                                            <option value="9">พัฒนาาคุณภาพชีวิต</option>
                                                            <option value="10">ใช้เวลาว่างให้เกิดประโยชน์</option>
                                                            <option value="11">อื่นๆ</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 pt-2 collapse coll_Knowledge">
                                                    </div>
                                                </div>    
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="col-md-5">
                                                <div class="form-group px-4">
                                                    <label class="font-weight-bold" for="LecturerID">ผู้ผ่านการอบรมได้นำความรู้ไปใช้จริง  </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 ml-4 ">
                                                <div class="form-group row px-5 ">
                                                    <div class="col-md-3 ">
                                                        <label class="font-weight-bold " for="LecturerID"> เพิ่มรายได้ : </label>
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">จำนวน </label>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <input type="text" class="form-control" id="Religion" name="Religion">
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">คน  </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-5 ">
                                                    <div class="col-md-3 ">
                                                        <label class="font-weight-bold " for="LecturerID"> ลดรายจ่าย : </label>
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">จำนวน </label>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <input type="text" class="form-control" id="Religion" name="Religion">
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">คน  </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-5  ">
                                                    <div class="col-md-3 ">
                                                        <label class="font-weight-bold " for="LecturerID"> นำไปประกอบวิชาชีพ : </label>
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">จำนวน </label>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <input type="text" class="form-control" id="Religion" name="Religion">
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">คน  </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-5  ">
                                                    <div class="col-md-3 ">
                                                        <label class="font-weight-bold " for="LecturerID"> พัฒนาคุณภาพชีวิต : </label>
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">จำนวน </label>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <input type="text" class="form-control" id="Religion" name="Religion">
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">คน  </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-5  ">
                                                    <div class="col-md-3 ">
                                                        <label class="font-weight-bold " for="LecturerID"> ใช้เวลาว่างให้เกิดประโยชน์ : </label>
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">จำนวน </label>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <input type="text" class="form-control" id="Religion" name="Religion">
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">คน  </label>
                                                    </div>
                                                </div>
                                                <div class="form-group row px-5  ">
                                                    <div class="col-md-3 ">
                                                        <label class="font-weight-bold " for="LecturerID"> อื่นๆ : </label>
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">จำนวน </label>
                                                    </div>
                                                    <div class="col-md-4 ">
                                                        <input type="text" class="form-control" id="Religion" name="Religion">
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <label class="font-weight-bold " for="LecturerID">คน  </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="col-md-12">
                                        <div class="card card-default mx-4">
                                            <div class="col-md-5 ">
                                                <div class="form-group px-4">
                                                    <label class="font-weight-bold" >ส่วนปัญหา อุปสรรค และข้อเสนอแนะ  </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 ml-4 ">
                                                <div class="col-md-6 ml-4">
                                                    <label class="font-weight-bold " >ปัญหา อุปสรรค  </label>
                                                </div>
                                                <div class="form-group px-5 ml-1 ">
                                                    <div class="form-check form-check-inline custom-radio col-md-1">
                                                        <input class="form-check-input custom-control-input" type="radio" id="isProblem0" name="isProblem" value="1">
                                                        <label class="form-check-label custom-control-label" for="isProblem0"> มี </label>
                                                    </div>
                                                    <div class="form-check form-check-inline custom-radio col-md-1">
                                                        <input class="form-check-input custom-control-input" type="radio" id="isProblem1" name="isProblem" value="0">
                                                        <label class="form-check-label custom-control-label" for="isProblem1"> ไม่มี </label>
                                                    </div>
                                                </div>
                                                <div class="col=md-6 ml-4 collapse coll_isProblem">
                                                    <input type="text" class="form-control" id="ProblemDetail" name="ProblemDetail" placeholder="กรอกปัญหา อุปสรรค ที่นี่" required>
                                                </div>
                                                <div class="col-md-6 ml-4">
                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="courseStory">ข้อเสนอแนะ</label>
                                                        <textarea class="form-control" id="courseStory" name="CourseHistory" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container-fluid text-right pt-4">
                                        <a href="javascript:void(0)" class="btn btn-secondary">ยกเลิก</a>
                                        <input type="submit" class="btn btn-success" value="บันทึก">
                                    </div>
                                </div>
                            <?php echo form_close(); ?>
                        </div>

                
                        <!-- <div class="tab-pane fade " id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                        </div> -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>