<div class="content-wrapper pt-3">
    <div class="content pb-2">
        <div class="container">
            <div class="content-header" style="color: #517beb">
                <h2><b>เปิดชั้นเรียน</b></h2>
            </div>

            
            
            <div class="card card-primary card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">บันทึกเปิดชั้นเรียน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">บันทึกข้อมูลวิทยากร</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">บันทึกประวัติผู้เรียน </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">นิเทศ/ติดตามผล</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " id="custom-tabs-three-result-tab" data-toggle="pill" href="#custom-tabs-three-result" role="tab" aria-controls="custom-tabs-three-result" aria-selected="true">ผลการเรียน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">สรุปประเมินผล</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                        <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formOpenClass_Home')); ?>
                            
                            <div class="row px-4">
                                <div class="col-md-6 pr-5">
                                    <div class="font-weight-bold">รูปแบบชั้นเรียน</div>
                                    <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                        <input type="radio" id="h30" class="form-check-input custom-control-input" name="ClassTypeID" value="1" required>
                                        <label class="custom-control-label mb-0" for="h30"> การศึกษาต่อเนื่องรูปแบบกลุ่มสนใจ ( ไม่ถึง 30 ชั่วโมง )</label>
                                    </div>
                                    <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                        <input type="radio" id="h31" class="form-check-input custom-control-input" name="ClassTypeID" value="2">
                                        <label class="custom-control-label mb-0" for="h31"> การศึกษาต่อเนื่องรูปแบบวิชาชีพ ( 31 ชั่วโมงขึ้นไป )</label>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" >รหัสกลุ่มเรียน</label>
                                        <input type="text" class="form-control" id="classGrpCode" name="GroupCode">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" >กศน. ตำบล</label>
                                        <select class="form-control" id="TambonID" name="NFETambonID"></select>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" >เบอร์โทรศัพท์ครูตำบล / ผู้ประสานงาน</label>
                                        <input type="text" class="form-control" id="teachTel" name="ContactPhoneNumber" placeholder="xxx-xxx-xxxx">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" >ชื่อหลักสูตรวิชา</label>
                                        <input type="text" class="form-control" id="courseName" name="CourseName">
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" >วิทยากร</label>
                                        <select class="form-control" id="LecturerID" name="LecturerID"></select>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" >ช่วงวันที่จัดกิจกรรม</label>
                                        <div class="d-flex flex-row">
                                            <div class="col-md-5 pl-0">
                                                <input type="text" class="form-control" id="ClassDateStart" name="ClassDateStart">
                                            </div>
                                            - 
                                            <div class="col-md-5 pr-0">
                                                <input type="text" class="form-control" id="ClassDateEnd" name="ClassDateEnd">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" >ช่วงเวลาที่จัดกิจกรรม</label>
                                        <div class="d-flex flex-row">
                                            <div class="col-md-5 pl-0">
                                                <input type="text" class="form-control" id="timeStId" name="TimeStart">
                                            </div>
                                            - 
                                            <div class="col-md-5 pr-0">
                                                <input type="text" class="form-control" id="timeSpId" name="TimeEnd">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 pr-5">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >หมวดอาชีพ</label>
                                        <select class="form-control" id="careerTypeID" name="CareerTypeID">
                                            <option value="เกษตรกรรม">เกษตรกรรม</option>
                                            <option value="อุตสาหกรรม">อุตสาหกรรม</option>
                                            <option value="พาณิชยกรรมและบริการ">พาณิชยกรรมและบริการ</option>
                                            <option value="ความคิดสร้างสรรค์">ความคิดสร้างสรรค์</option>
                                            <option value="บริหารจัดการ และเฉพาะทาง">บริหารจัดการ และเฉพาะทาง</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" >ปีงบประมาณ</label>
                                                <input type="text" class="form-control" id="budgetYear" name="BudgetYear">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" >งบประมาณที่ใช้</label>
                                                <select class="form-control" id="budgetTypeID" name="BudgetTypeID">
                                                    <option value="เงินงบประมาณ">เงินงบประมาณ</option>
                                                    <option value="เงินงบประมาณบูรณาการ">เงินงบประมาณบูรณาการ(EEC)</option>
                                                    <option value="เงินสนับสนุนจากท้องถิ่น">เงินสนับสนุนจากท้องถิ่น</option>
                                                    <option value="">เงินสนับสนุนอื่นๆ</option>
                                                </select>
                                                <div class="collapse coll_budget pt-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold" >อุปกรณ์การเรียนที่มีอยู่แล้ว</label>
                                        <input type="text" class="form-control" id="alreadyTools" name="AlreadyTools">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" >ที่อยู่สถานที่จัดกิจกรรม</label>
                                                <input type="text" class="form-control" id="PlaceAddress" name="PlaceAddress">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="province">จังหวัด</label>
                                                <select class="form-control" id="province" name="ProvinceID"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="amphur">อำเภอ</label>
                                                <select class="form-control" id="amphur" name="AmphurID"></select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" for="tambon">ตำบล</label>
                                                <select class="form-control" id="tambon" name="TombonID"></select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" >ระยะเวลาทฤษฎี (ชั่วโมง)</label>
                                                <input type="text" class="form-control" id="lecture" name="Lecture">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" >ระยะเวลาภาคปฎิบัติ (ชั่วโมง)</label>
                                                <input type="text" class="form-control" id="lab" name="Lab">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold" >รูปภาพสถานที่จัดกิจกรรม</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" id="placeImage" name="PlaceImage" >
                                            <label class="custom-file-label" for="placeImage">อัพโหลดรูปภาพ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="pl-4">
                                <div class="font-weight-bold">วันจัดกิจกรรม</div>
                                <div class="ml-4">
                                    <div class="form-check form-check-inline custom-checkbox">
                                        <input class="form-check-input custom-control-input" type="checkbox" id="monday" name="ClassDays[]" value="1">
                                        <label class="form-check-label custom-control-label" for="monday"> วันจันทร์ </label>
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
                                        <label class="font-weight-bold" >ความเป็นมาของหลักสูตร</label>
                                        <textarea class="form-control" id="courseStory" name="CourseHistory" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >หลักการของหลักสูตร</label>
                                        <textarea class="form-control" id="coursePrinciple" name="CoursePrinciple" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >จุดมุ่งหมาย</label>
                                        <textarea class="form-control" id="courseObjective" name="CourseObjective" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-4">
                                    <div class="form-group">
                                        <label class="font-weight-bold" >กลุ่มเป้าหมาย</label>
                                        <textarea class="form-control" id="targetGroup" name="TargetGroup" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-default mx-4">
                                <div class="card-header d-flex">
                                    <span class="mr-auto">โครงสร้างหลักสูตร</span><button type="button" class="btn btn-success add-tb" value="addCourseStr">เพิ่ม</button>
                                </div>
                                <div class="card-body">
                                    <div class="row main-co-str">
                                        <div class="callout " id="course-str0">
                                            <!-- <div class="text-right"><a href="javascript:void(0)"><i class="fas fa-times-circle text-danger"></i></a></div> -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="from-group row">
                                                        <label class="font-weight-bold text-right col-md-5" >เรื่อง</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" id="stuctName0" name="CourseStructure[0][Topic]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="from-group row">
                                                        <label class="font-weight-bold text-right col-md-5" >จุดประสงค์การเรียนรู้</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" id="stuctName0" name="CourseStructure[0][Objective]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="from-group row">
                                                        <label class="font-weight-bold text-right col-md-5" >เนื้อหา</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" id="stuctName0" name="CourseStructure[0][Content]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="from-group row">
                                                        <label class="font-weight-bold text-right col-md-5" >การจัดกระบวนการเรียนรู้</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" id="stuctName0" name="CourseStructure[0][LearningProcess]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="from-group row">
                                                        <label class="font-weight-bold text-right col-md-5" >จำนวนชั่วโมงภาคทฤษฎี</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" id="stuctName0" name="CourseStructure[0][TheoryTime]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="from-group row">
                                                        <label class="font-weight-bold text-right col-md-5" >จำนวนชั่วโมงภาคปฎิบัติ</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" id="stuctName0" name="CourseStructure[0][PracticeTime]">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-default mx-4">
                                <div class="card-header d-flex">
                                    <span class="mr-auto">ตารางหลักสูตรการศึกษาต่อเนื่อง</span>
                                    <button type="button" class="btn btn-success add-tb" value="add_nfetable">เพิ่ม</button>
                                </div>
                                <div class="card-body">
                                    <div class="row main-nfetb">
                                        <div class="callout" id="nfe-tb0">
                                            <!-- <div class="text-right"><a href="javascript:void(0)"><i class="fas fa-times-circle text-danger"></i></a></div> -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="from-group row">
                                                        <label class="font-weight-bold text-right col-md-5" >วันที่ และเวลา</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" id="nfeTable0" name="ClassDetail[0][LearningDateTime]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="from-group row">
                                                        <label class="font-weight-bold text-right col-md-5" >กระบวนการจัดการเรียนรู้</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" id="nfeTable0" name="ClassDetail[0][LearningDetail]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="from-group row">
                                                        <label class="font-weight-bold text-right col-md-5" >หมายเหตุ</label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" id="nfeTable0" name="ClassDetail[0][Remark]">
                                                        </div>
                                                    </div>
                                                </div>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group px-4">
                                        <label class="font-weight-bold mr-auto">สื่อการเรียนรู้</label>
                                        <button type="button" class="btn btn-sm btn-success add-tb" value="add_materials">เพิ่ม</button>
                                        <div class="row main-materials">
                                            <div class="col-md-11" id="mtr_tb0">
                                                <input type="text" class="form-control" id="mtr0" name="LearningMaterial[0][Name]">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center"><!-- <i class="fas fa-times-circle text-danger"></i> --></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group px-4">
                                        <label class="font-weight-bold mr-auto">การวัดผลประเมิณผล</label>
                                        <button type="button" class="btn btn-sm btn-success add-tb" value="add_evaluation">เพิ่ม</button>
                                        <div class="row main-evalue">
                                            <div class="col-md-11" id="evalue0">
                                                <input type="text" class="form-control" id="evl0" name="Evaluate[0][Detail]">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center"><!-- <i class="fas fa-times-circle text-danger"></i> --></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group px-4">
                                        <label class="font-weight-bold mr-auto">เกณฑ์การจบหลักสูตร</label>
                                        <button type="button" class="btn btn-sm btn-success add-tb" value="add_criteria">เพิ่ม</button>
                                        <div class="row main-crt">
                                            <div class="col-md-11" id="criteria0">
                                                <input type="text" class="form-control" id="crt0" name="CriteriaComplete[0][Detail]">
                                            </div>
                                            <div class="col-md-1 d-flex align-items-center"><!-- <i class="fas fa-times-circle text-danger"></i> --></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group px-4">
                                <div class="font-weight-bold">การขยายเวลา</div>
                                <div class="custom-control custom-radio custom-control-inline ml-4">
                                    <input type="radio" id="Extend" name="isExtendTime" class="custom-control-input" value="1">
                                    <label class="custom-control-label" >ขยายเวลา</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="notExtend" name="isExtendTime" class="custom-control-input" value="0">
                                    <label class="custom-control-label" >ไม่ขยายเวลา</label>
                                </div>
                                <div class="row collapse lateTable">
                                    <div class="col-md-6 row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" >จำนวนชั่วโมง</label>
                                                <input type="text" class="form-control" id="HourAmount" name="HourAmount">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="font-weight-bold" >จำนวนวัน</label>
                                                <input type="text" class="form-control" id="DayAmount" name="DayAmount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold" >ช่วงวันที่ขยาย</label>
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
                                            <label class="font-weight-bold" >ช่วงเวลาที่ขยาย</label>
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
                                    <label class="font-weight-bold" >ชื่อประธาน / คณะกรรมการสถานศึกษา</label>
                                    <input type="text" class="form-control" id="HeadBoardName" name="HeadBoardName">
                                </div>
                                <div class="col-md-6 pr-5">
                                    <label class="font-weight-bold" >ชื่อข้าราชการ / ครู / ครูผู้ช่วย</label>
                                    <input type="text" class="form-control" id="AssistTeacherName" name="AssistTeacherName">
                                </div>
                            </div>
                            <div class="container-fluid text-right pt-4">
                                <a href="javascript:void(0)" class="btn btn-secondary">ยกเลิก</a>
                                <input type="submit" class="btn btn-success" value="บันทึก">
                            </div>
                            <?php echo form_close(); ?>
                        </div>

                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                        <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formOpenClass_lecturer')); ?>
                            <div class="row">
                                <!-- <div class="card card-default mx-4"> -->
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="RegisterDate"> วันที่สมัคร : </label>
                                            </div>
                                            <div class="col-md-8 px-4">
                                                <input type="text" class="form-control" id="RegisterDate" name="RegisterDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group row">
                                            <div class="col-md-3 px-4">
                                                <label class="font-weight-bold" for="FirstName"> ชื่อวิทยากร : </label>
                                            </div>
                                            <div class="col-md-4 px-4">
                                                <input type="text" class="form-control" id="FirstName" name="FirstName">
                                            </div>
                                            <div class="col-md-4 px-4">
                                                <input type="text" class="form-control" id="LastName" name="LastName">
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
                                                <select class="form-control" id="LecturerID" name="LecturerID"></select>
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
                                                <select class="form-control" id="LecturerTypeID" name="LecturerTypeID"></select>
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
                                                <select class="form-control" id="TambonID" name="CurrentNFETambonID"></select>
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
                                            <option value="ต่ำกว่า ป.4">ต่ำกว่าป.4</option>
                                            <option value="ป.4">ป.4</option>
                                            <option value="ป.6">ป.6</option>
                                            <option value="ป.7">ป.7</option>
                                            <option value="มัธยมศึกษาตอนต้น">มัธยมศึกษาตอนต้น</option>
                                            <option value="มัธยมศึกษาตอนปลาย">มัธยมศึกษาตอนปลาย</option>
                                            <option value="ปวช.">ปวช.</option>
                                            <option value="ปวท.">ปวท.</option>
                                            <option value="ปวส.">ปวส.</option>
                                            <option value="ปริญญาตรี">ปริญญาตรี</option>
                                            <option value="สูงกว่าปริญญาตรี">สูงกว่าปริญญาตรี</option>
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
                                            <label class="font-weight-bold" for="TambonID">ตำบล : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                        <select class="form-control" id="TambonID" name="TambonID"></select>
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
                                                <option value="เด็กด้อยโอกาส">เด็กด้อยโอกาส</option>
                                                <option value="สตรีกลุ่มเสี่ยง">สตรีกลุ่มเสี่ยง</option>
                                                <option value="ผู้สูงอายุ">ผู้สูงอายุ</option>
                                                <option value="คนพิการ">คนพิการ</option>
                                                <option value="ผู้นำท้องถิ่น">ผู้นำท้องถิ่น</option>
                                                <option value="อบต.">อบต.</option>
                                                <option value="ผู้ต้องขัง">ผู้ต้องขัง</option>
                                                <option value="ทหารกองประจำการ">ทหารกองประจำการ</option>
                                                <option value="ผู้ใช้แรงงาน">ผู้ใช้แรงงาน</option>
                                                <option value="แรงงานต่างด้าว">แรงงานต่างด้าว</option>
                                                <option value="เกษตรกร">เกษตรกร</option>
                                                <option value="อสม.">อสม.</option>
                                                <option value="ผู้ปฏิบัติศาสนกิจ">ผู้ปฏิบัติศาสนกิจ</option>
                                                <option value="เยาวชน">เยาวชน</option>
                                                <option value="ชาวไทยภูเขา">ชาวไทยภูเขา</option>
                                                <option value="ชุมชนแออัด">ชุมชนแออัด</option>
                                                <option value="">อื่นๆ</option>
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
                                                <option value="เป็นพื้นฐานในการศึกษาต่อในระดับ/สาขา">เป็นพื้นฐานในการศึกษาต่อในระดับ/สาขา . . .</option>
                                                <option value="ต้องการเปลี่ยนอาชีพ">ต้องการเปลี่ยนอาชีพ</option>
                                                <option value="ต้องการใช้เวลาว่างให้เป็นประโยชน์">ต้องการใช้เวลาว่างให้เป็นประโยชน์</option>
                                                <option value="ต้องการมีอาชีพเสริม/อาชีพหลัก">ต้องการมีอาชีพเสริม/อาชีพหลัก</option>
                                                <option value="">อื่นๆ</option>
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
                                                <option value="ว่างงาน">ว่างงาน</option>
                                                <option value="สมาชิกกองทุนสตรี">สมาชิกกองทุนสตรี</option>
                                                <option value="ผู้ถือบัตรสวัสติการของรัฐ">ผู้ถึอบัตรสวัสดิการของรัฐ</option>
                                                <option value="อสม/อสส">อสม/อสส</option>
                                                <option value="รับข้าง">รับจ้าง</option>
                                                <option value="เกษตรกร">เกษตรกร</option>
                                                <option value="สมาชิกกองทุนหมู่บ้าน">สมาชิกกองทุนหมู่บ้าน</option>
                                                <option value="">อื่นๆ</option>
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
                                            <label class="font-weight-bold" for="LecturerID">วันที่ออกติดตาม : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                            <input type="date" class="form-control" id="addmaterials1" name="LearningMaterial[0][Name]">
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
                                                        <label class="font-weight-bold" for="LecturerID">ชื่อผู้ติดตามผลที่ 1 : </label>
                                                    </div>
                                                    <div class="col-md-3 px-4">
                                                        <input type="text" class="form-control" id="addmaterials1" name="LearningMaterial[0][Name]" placeholder="ชื่อจริง">
                                                    </div>
                                                    <div class="col-md-3 px-4">
                                                        <input type="text" class="form-control" id="addmaterials1" name="LearningMaterial[0][Name]" placeholder="นามสกุล">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-md-2 px-4">
                                                        <label class="font-weight-bold" for="LecturerID">ชื่อผู้ติดตามผลที่ 2 : </label>
                                                    </div>
                                                    <div class="col-md-3 px-4">
                                                        <input type="text" class="form-control" id="addmaterials1" name="LearningMaterial[0][Name]" placeholder="ชื่อจริง">
                                                    </div>
                                                    <div class="col-md-3 px-4">
                                                        <input type="text" class="form-control" id="addmaterials1" name="LearningMaterial[0][Name]" placeholder="นามสกุล">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group row pt-2">
                                        <div class="col-md-3 px-4">
                                            <label class="font-weight-bold" for="LecturerID">ได้นำความรู้ไปใช้เกี่ยวกับ : </label>
                                        </div>
                                        <div class="col-md-5 px-3">
                                                <select class="form-control" id="LecturerID" name="LecturerID"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-8 px-3">
                                            <label class="font-weight-bold" for="courseStory">เนื้อหาสรุปการติดตาม</label>
                                            <textarea class="form-control" id="courseStory" name="CourseHistory" rows="4" placeholder="กรอกรายละเอียด" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <div class="col-md-12 px-4">
                                            <label class="font-weight-bold" for="LecturerID">ภาพกิจกรรม (เปิดอบรม)  </label>
                                        </div>
                                        <div class="col-md-11 px-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="PlaceImage" id="image">
                                                <label class="custom-file-label" for="image">อัพโหลดรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12 px-4">
                                            <label class="font-weight-bold" for="LecturerID">ภาพกิจกรรม (ครูผู้สอนกับผู้ฝึกอบรม)  </label>
                                        </div>
                                        <div class="col-md-11 px-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="PlaceImage" id="image">
                                                <label class="custom-file-label" for="image">อัพโหลดรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12 px-4">
                                            <label class="font-weight-bold" for="LecturerID">ภาพกิจกรรม (เจ้าของงานกับกลุ่มจัดฝึกอบรม)  </label>
                                        </div>
                                        <div class="col-md-11 px-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="PlaceImage" id="image">
                                                <label class="custom-file-label" for="image">อัพโหลดรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <div class="col-md-12 px-4">
                                            <label class="font-weight-bold" for="LecturerID">ภาพกิจกรรม (ผู้ฝึกอบรมและฝึกปฏิบัติ)  </label>
                                        </div>
                                        <div class="col-md-11 px-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="PlaceImage" id="image">
                                                <label class="custom-file-label" for="image">อัพโหลดรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <div class="col-md-12 px-4">
                                            <label class="font-weight-bold" for="LecturerID">ภาพกิจกรรม (ผู้อบรมพร้อมชิ้นงานที่สำเร็จ)  </label>
                                        </div>
                                        <div class="col-md-11 px-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="PlaceImage" id="image">
                                                <label class="custom-file-label" for="image">อัพโหลดรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <div class="col-md-12 px-4">
                                            <label class="font-weight-bold" for="LecturerID">ภาพกิจกรรม (ผู้นิเทศกิจกรรมการฝึกอบรม)  </label>
                                        </div>
                                        <div class="col-md-11 px-4">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input form-control" name="PlaceImage" id="image">
                                                <label class="custom-file-label" for="image">อัพโหลดรูปภาพ</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container-fluid text-right pt-4">
                                    <a href="javascript:void(0)" class="btn btn-secondary">ยกเลิก</a>
                                    <input type="submit" class="btn btn-success" value="บันทึก">
                                </div>  
                            </div>
                        </div>
        <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
        <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->

                        <div class="tab-pane fade " id="custom-tabs-three-result" role="tabpanel" aria-labelledby="custom-tabs-three-result-tab">
                            <div class="row">
                                <div class="row col-md-6">
                                    <div class="col-md-4">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="LecturerID">ผู้เรียน : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                            <select class="form-control" id="LecturerID" name="LecturerID"></select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-4">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="LecturerID">เลขวุฒิใบสมัคร : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Religion" name="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-4">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="LecturerID">เกรด : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Religion" name="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-6">
                                    <div class="col-md-4">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="LecturerID">ออกเมื่อวันที่ : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Religion" name="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-5">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="LecturerID">ความรู้ความเข้าใจในเนื้อหาสาระ (20 คะแนน) : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Religion" name="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-5">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="LecturerID">ทักษะการปฏิบัติ (40 คะแนน) : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Religion" name="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-5">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="LecturerID">คุณภาพของผลงาน / ผลการปฏิบัติ (40 คะแนน) : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Religion" name="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-5">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="LecturerID">ผลการประเมิณรวม (100 คะแนน) : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Religion" name="Religion">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-5">
                                        <div class="form-group px-4">
                                            <label class="font-weight-bold" for="LecturerID">ระดับการประเมิณ (เกรด 1-4) : </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group px-3">
                                            <input type="text" class="form-control" id="Religion" name="Religion">
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
                                                <input type="radio" id="" class="form-check-input custom-control-input" name="ClassTypeID" value="1" required>
                                                <label class="custom-control-label mb-0" > ในเขตเทศบาล </label>
                                            </div>
                                        </div>
                                        <div class="form-group row px-5">
                                            <div class="col-md-2 ml-4">
                                            <label class="font-weight-bold" for="LecturerID">ชื่อหมู่บ้าน / ชุมชน : </label>
                                            </div>
                                            <div class="col-md-4 px-5">
                                                    <input type="text" class="form-control" id="Religion" name="Religion">
                                            </div>
                                        </div>
                                        <div class="col-md-6 px-5">
                                            <div class="form-check custom-control custom-radio custom-control-inline ml-3">
                                                <input type="radio" id="" class="form-check-input custom-control-input" name="ClassTypeID" value="1" required>
                                                <label class="custom-control-label mb-0" > นอกเขตเทศบาล </label>
                                            </div>
                                        </div>
                                        <div class="form-group row px-5">
                                            <div class="col-md-2 ml-4">
                                                <label class="font-weight-bold" for="LecturerID">ชื่อหมู่บ้าน / ชุมชน : </label>
                                            </div>
                                            <div class="col-md-4 px-5">
                                                <input type="text" class="form-control" id="Religion" name="Religion">
                                            </div>
                                            <div class="col-md-1 ">
                                                <label class="font-weight-bold" for="LecturerID">หมู่ที่ : </label>
                                            </div>
                                            <div class="col-md-4 px-5">
                                                <input type="text" class="form-control" id="Religion" name="Religion">
                                            </div>
                                            <div class="col-md-2 ml-4">
                                                <label class="font-weight-bold" for="LecturerID">ตำบล : </label>
                                            </div>
                                            <div class="col-md-4 px-5">
                                                <select class="form-control" id="LecturerID" name="LecturerID"></select>
                                            </div>
                                            <div class="col-md-1 ">
                                                <label class="font-weight-bold" for="LecturerID">จังหวัด : </label>
                                            </div>
                                            <div class="col-md-4 px-5">
                                                <select class="form-control" id="LecturerID" name="LecturerID"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-default mx-4">
                                        <div class="col-md-5">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="LecturerID">ส่วนวิธีการสำรวจความต้องการเรียน ดำเนินการอย่างไร : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ml-4 ">
                                            <div class="form-group px-5">
                                                <div class="form-check form-check-inline custom-checkbox">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="monday" name="ClassDays[]" value="1">
                                                    <label class="form-check-label custom-control-label" for="monday"> ประชาคม </label>
                                                </div>
                                            </div>
                                            <div class="form-group px-5">
                                                <div class="form-check form-check-inline custom-checkbox">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="monday" name="ClassDays[]" value="1">
                                                    <label class="form-check-label custom-control-label" for="monday"> แนะแนว </label>
                                                </div>
                                            </div>
                                            <div class="form-group px-5">
                                                <div class="form-check form-check-inline custom-checkbox">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="monday" name="ClassDays[]" value="1">
                                                    <label class="form-check-label custom-control-label" for="monday"> สำรวจความต้องการ </label>
                                                </div>
                                            </div>
                                            <div class="form-group px-5">
                                                <div class="form-check form-check-inline custom-checkbox">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="monday" name="ClassDays[]" value="1">
                                                    <label class="form-check-label custom-control-label" for="monday"> อื่นๆ </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-default mx-4">
                                        <div class="col-md-5">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="LecturerID">ส่วนการติดตามผู้ผ่านการฝึกอบรม : </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ml-4 ">
                                            <div class="form-group row px-5 ml-1 ">
                                                <div class="form-check form-check-inline custom-checkbox col-md-1">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="12" name="25" value="2">
                                                    <label class="form-check-label custom-control-label" for="12"> ไม่มี </label>
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="font-weight-bold " for="LecturerID">เพราะ : </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="Religion" name="Religion">
                                                </div>
                                            </div>
                                            <div class="form-group row px-5 ml-1 ">
                                                <div class="form-check form-check-inline custom-checkbox col-md-1">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="12" name="25" value="2">
                                                    <label class="form-check-label custom-control-label" for="12"> มี </label>
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <label class="font-weight-bold " for="LecturerID"> ดำเนินการอย่างไร : </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" id="Religion" name="Religion">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-default mx-4">
                                        <div class="form-group row">
                                            <div class="col-md-5 px-4">
                                                    <label class="font-weight-bold" for="LecturerID">ผลประเมิณความพึงพอใจในการจัดการโครงการอยู่ในระดับ : </label>
                                            </div>
                                            <div class="col-md-5 px-3">
                                                    <select class="form-control" id="LecturerID" name="LecturerID"></select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-default mx-4">
                                        <div class="col-md-5">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="LecturerID">ผู้ผ่านการอบรมได้นำความรู้ไปใช้จริง  </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ml-4 ">
                                            <div class="form-group row px-5 ">
                                                <div class="col-md-2 ">
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
                                                <div class="col-md-2 ">
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
                                                <div class="col-md-2 ">
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
                                                <div class="col-md-2 ">
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
                                                <div class="col-md-2 ">
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
                                                <div class="col-md-2 ">
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
                                </div>
                                <div class="col-md-12">
                                    <div class="card card-default mx-4">
                                        <div class="col-md-5 ">
                                            <div class="form-group px-4">
                                                <label class="font-weight-bold" for="LecturerID">ส่วนปัญหา อุปสรรค และข้อเสนอแนะ  </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 ml-4 ">
                                            <div class="col-md-6 ml-4">
                                                <label class="font-weight-bold " for="LecturerID">ปัญหา อุปสรรค  </label>
                                            </div>
                                            <div class="form-group row px-5 ml-1 ">
                                                <div class="form-check form-check-inline custom-checkbox col-md-1">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="2" name="29" value="2">
                                                    <label class="form-check-label custom-control-label" for="12"> ไม่มี </label>
                                                </div>
                                                <div class="form-check form-check-inline custom-checkbox col-md-1">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="16" name="5" value="2">
                                                    <label class="form-check-label custom-control-label" for="12"> มี </label>
                                                </div>
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
                        </div>
                        <div class="tab-pane fade " id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                        </div>

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</div>