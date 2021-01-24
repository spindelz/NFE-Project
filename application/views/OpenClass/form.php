<div class="content-wrapper pt-3">
    <div class="content pb-2">
        <div class="container">
            <div class="content-header" style="color: #517beb">
                <h2><b>เปิดชั้นเรียน</b></h2>
            </div>

            <input type="hidden" name="ClassID" value="<?php echo @$ClassID; ?>">
            
            <div class="card card-primary card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="opren-class-tab" data-toggle="pill" href="#opren-class" role="tab" aria-controls="opren-class" aria-selected="false">บันทึกเปิดชั้นเรียน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="student-tab" data-toggle="pill" href="#student" role="tab" aria-controls="student" aria-selected="false">บันทึกประวัติผู้เรียน </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="result-tab" data-toggle="pill" href="#result" role="tab" aria-controls="result" aria-selected="false">นิเทศ/ติดตามผล</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" id="grade-tab" data-toggle="pill" href="#grade" role="tab" aria-controls="grade" aria-selected="false">ผลการเรียน</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">สรุปประเมินผล</a>
                        </li> -->
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="opren-class" role="tabpanel" aria-labelledby="opren-class-tab">
                        
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

                                    <!-- <div class="form-group">
                                        <label class="font-weight-bold" for="classGrpCode">รหัสกลุ่มเรียน <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="classGrpCode" name="GroupCode" disabled>
                                    </div> -->

                                    <div class="form-group">
                                        <label class="font-weight-bold" for="courseName">ชื่อหลักสูตรวิชา <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="courseName" name="CourseName" maxlength="100" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold" for="NFETambonID">กศน. ตำบล <span class="text-danger">*</span></label>
                                        <select class="form-control" id="NFETambonID" name="NFETambonID" required></select>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold" for="ContactPhoneNumber">เบอร์โทรศัพท์ครูตำบล / ผู้ประสานงาน</label>
                                        <input type="text" class="form-control" id="ContactPhoneNumber" name="ContactPhoneNumber" maxlength="15" placeholder="xxx-xxx-xxxx">
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold" for="LecturerID">วิทยากร <span class="text-danger">*</span></label>
                                        <select class="form-control" id="LecturerID" name="LecturerID" required></select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="courseName">ช่วงวันที่จัดกิจกรรม <span class="text-danger">*</span></label>
                                        <div class="d-flex flex-row">
                                            <div class="col-md-5 pl-0">
                                                <input type="date" class="form-control" id="dateStId" name="ClassDateStart" required>
                                            </div>
                                            - 
                                            <div class="col-md-5 pr-0">
                                                <input type="date" class="form-control" id="dateSpId" name="ClassDateEnd" required>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="courseName">ช่วงเวลาที่จัดกิจกรรม <span class="text-danger">*</span></label>
                                        <div class="d-flex flex-row">
                                            <div class="col-md-5 pl-0">
                                                <input type="time" class="form-control" id="timeStId" name="ClassTimeStart" required>
                                            </div>
                                            - 
                                            <div class="col-md-5 pr-0">
                                                <input type="time" class="form-control" id="timeSpId" name="ClassTimeEnd" required>
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="BudgetLimit">ภายในวงเงิน <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="BudgetLimit" name="BudgetLimit" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="budgetYear">ปีงบประมาณ <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="BudgetYear" name="BudgetYear" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="BudgetTypeID">งบประมาณที่ใช้ <span class="text-danger">*</span></label>
                                                <select class="form-control" id="BudgetTypeID" name="BudgetTypeID" required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="font-weight-bold">ประเภทงบประมาณ <span class="text-danger">*</span></div>
                                    <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                        <input type="radio" id="ExpenState" class="form-check-input custom-control-input" name="BudgetTypeCode" value="1" required>
                                        <label class="custom-control-label mb-0" for="ExpenState"> งบรายจ่ายอื่น</label>
                                    </div>
                                    <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                        <input type="radio" id="OperState" class="form-check-input custom-control-input" name="BudgetTypeCode" value="2">
                                        <label class="custom-control-label mb-0" for="OperState"> งบดำเนินงาน</label>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold" for="AlreadyTools">อุปกรณ์การเรียนที่มีอยู่แล้ว <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="AlreadyTools" name="AlreadyTools" maxlength="100" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="PlaceAddress">ที่อยู่สถานที่จัดกิจกรรม <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="PlaceAddress" name="PlaceAddress" maxlength="50" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="PlaceProvince">จังหวัด <span class="text-danger">*</span></label>
                                                <select class="form-control" id="PlaceProvince" name="ProvinceID" required></select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="PlaceAmphur">อำเภอ <span class="text-danger">*</span></label>
                                                <select class="form-control" id="PlaceAmphur" name="AmphurID" required></select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="PlaceTambon">ตำบล <span class="text-danger">*</span></label>
                                                <select class="form-control" id="PlaceTambon" name="TambonID" required></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="TheoryTime">ระยะเวลาทฤษฎี (ชั่วโมง) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="TheoryTime" name="TheoryTime" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="PracticeTime">ระยะเวลาภาคปฎิบัติ (ชั่วโมง) <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="PracticeTime" name="PracticeTime" required>
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
                                        <textarea class="form-control" id="courseStory" name="CourseHistory" rows="4" placeholder="กรอกรายละเอียด" maxlength="255" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="courseMethod">หลักการของหลักสูตร <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="courseMethod" name="CoursePrinciple" rows="4" placeholder="กรอกรายละเอียด" maxlength="255" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="courseTarget">จุดมุ่งหมาย <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="courseTarget" name="CourseObjective" rows="4" placeholder="กรอกรายละเอียด" maxlength="255" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="courseGroup">กลุ่มเป้าหมาย <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="courseGroup" name="TargetGroup" rows="4" placeholder="กรอกรายละเอียด" maxlength="255" required></textarea>
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
                                    <input type="text" class="form-control" id="HeadBoardName" name="HeadBoardName" maxlength="50" required>
                                </div>
                                <div class="col-md-6 pr-5">
                                    <label class="font-weight-bold" for="AssistTeacherName">ชื่อข้าราชการ / ครู / ครูผู้ช่วย <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="AssistTeacherName" name="AssistTeacherName" maxlength="50" required>
                                </div>
                            </div>
                            
                            <div class="container-fluid text-right pt-4">
                                <a href="javascript:void(0)" class="btn btn-secondary">ยกเลิก</a>
                                <input type="submit" class="btn btn-success" value="บันทึก">
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                            
                        <div class="tab-pane fade" id="student" role="tabpanel" aria-labelledby="student-tab">
                            <div class="content-header text-right">
                                <a href="javascript:void(0)" class="btn btn-success ml-3" data-toggle="modal" data-target="#formStudentModal">เพิ่มผู้เรียน</a>
                            </div>
                            <table class="table table-bordered" id="datatableStudent">
                                <thead class="text-center">
                                    <tr>
                                        <th style="width:5%">ลำดับ</th>
                                        <th style="width:65%">ชื่อผู้เรียน</th>
                                        <th style="width:10%">เพศ</th>
                                        <th style="width:10%">อายุ</th>
                                        <th style="width:10%">อาชีพ</th>
                                        <th style="width:10%"></th>
                                    </tr>
                                </thead>
                                <tbody class="text-center"></tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade" id="result" role="tabpanel" aria-labelledby="result-tab">
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

                        <div class="tab-pane fade" id="grade" role="tabpanel" aria-labelledby="grade-tab">
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

<div class="modal fade" id="formStudentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary px-3 py-2">
                <h2 class="modal-title" id="exampleModalLabel">เพิ่มผู้เรียน</h2>
                <button type="button" class="close mt-1" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times fa-sm"></i>
                </button>
            </div>
            <div class="modal-body">
            <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formStudent')); ?>
                <input type="hidden" name="ClassID">
                <div class="row px-4">
                    <div class="col-md-6">
                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="CurrentNFETombonID">ปัจจุบันเรียนที่ กศน. ตำบล <span class="text-danger">*</span></label>
                            <select class="form-control" id="CurrentNFETombonID" name="CurrentNFETombonID" required></select>
                        </div>

                        <div class="row pr-4">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="PrefixID">คำนำหน้าชื่อ <span class="text-danger">*</span></label>
                                    <select class="form-control" id="PrefixID" name="PrefixID" required></select>
                                </div>
                            </div>
                            <div class="col-md-9 pr-0 row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="font-weight-bold" for="FirstName">ชื่อผู้เรียน <span class="text-danger">*</span></label>
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

                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="PersonalID">เลขบัตรประจำตัวประชาชน <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="PersonalID" name="PersonalID" maxlength="13" required>
                        </div>

                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="BirthDate">วันเดือนปีเกิด <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="BirthDate" name="BirthDate" required>
                        </div>

                        <div class="font-weight-bold">เพศ <span class="text-danger">*</span></div>
                        <div class="custom-control custom-radio custom-control-inline ml-4">
                            <input type="radio" id="Male" name="Sex" class="custom-control-input" value="1" required>
                            <label class="custom-control-label" for="Male">ชาย</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline pb-4">
                            <input type="radio" id="Female" name="Sex" class="custom-control-input" value="2">
                            <label class="custom-control-label" for="Female">หญิง</label>
                        </div>

                        <div class="row pr-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="Religion">ศาสนา <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Religion" name="Religion" maxlength="50" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="Nationality">สัญชาติ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Nationality" name="Nationality" maxlength="50" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="DegreeID">วุฒิการศึกษา <span class="text-danger">*</span></label>
                            <select class="form-control" id="DegreeID" name="DegreeID" required></select>
                        </div>

                        <div class="row pr-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="SchoolName">สถานศึกษา <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="SchoolName" name="SchoolName" maxlength="50" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="SchoolProvinceID">จังหวัด <span class="text-danger">*</span></label>
                                    <select class="form-control" id="SchoolProvinceID" name="SchoolProvinceID" required></select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 px-4">
                        <div class="row pr-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="Address">ที่อยู่ตามทะเบียนบ้าน <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="Address" name="Address" maxlength="50" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="StudentProvince">จังหวัด <span class="text-danger">*</span></label>
                                    <select class="form-control" id="StudentProvince" name="ProvinceID" required></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="StudentAmphur">อำเภอ <span class="text-danger">*</span></label>
                                    <select class="form-control" id="StudentAmphur" name="AmphurID" required></select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-weight-bold" for="StudentTambon">ตำบล <span class="text-danger">*</span></label>
                                    <select class="form-control" id="StudentTambon" name="TambonID" required></select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="PhoneNumber">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" maxlength="10" required>
                        </div>

                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="CareerID">อาชีพ <span class="text-danger">*</span></label>
                            <select class="form-control" id="CareerID" name="CareerID" required></select>
                        </div>

                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="GroupTargetID">กลุ่มเป้าหมาย <span class="text-danger">*</span></label>
                            <select class="form-control" id="GroupTargetID" name="GroupTargetID" required></select>
                        </div>

                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="InterestByID">สนใจเข้าร่วมกิจกรรมเนื่องจาก <span class="text-danger">*</span></label>
                            <select class="form-control" id="InterestByID" name="InterestByID" required></select>
                        </div>

                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="PeopleStatusID">สถานภาพของผู้สมัคร <span class="text-danger">*</span></label>
                            <select class="form-control" id="PeopleStatusID" name="PeopleStatusID" required></select>
                        </div>

                        <div class="form-group pr-4">
                            <label class="font-weight-bold" for="GetNewsFrom">ท่านได้รับข่าวสารการรับสมัครจาก</label>
                            <input type="text" class="form-control" id="GetNewsFrom" name="GetNewsFrom" maxlength="100">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container-fluid text-right pt-4">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <input type="submit" class="btn btn-success" value="บันทึก">
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>