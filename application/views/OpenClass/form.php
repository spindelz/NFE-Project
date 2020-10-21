<div class="content-wrapper pt-3">
    <div class="content pb-2">
        <div class="container">
            <div class="content-header" style="color: #517beb">
                <h2><b>เปิดชั้นเรียน</b></h2>
            </div>
            <div class="card">
                <div class="card-body">
                <?php echo form_open('', $attributes = array('method' => 'post', 'class' => 'form-horizontal', 'id' => 'formSaveData')); ?>
                
                <h3>1. บันทึกเปิดกลุ่มเรียน</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 " required>รูปแบบชั้นเรียน<br>
                            <input type="radio" id="h30" name="typeHour" value="การศึกษาต่อเนื่องรูปแบบกลุ่มสนใจ ( ไม่ถึง 30 ชั่วโมง )">
                            <label for="h30"> การศึกษาต่อเนื่องรูปแบบกลุ่มสนใจ ( ไม่ถึง 30 ชั่วโมง )</label><br>
                            <input type="radio" id="h31" name="typeHour" value="การศึกษาต่อเนื่องรูปแบบวิชาชีพ ( 31 ชั่วโมงขึ้นไป )">
                            <label for="h31"> การศึกษาต่อเนื่องรูปแบบวิชาชีพ ( 31 ชั่วโมงขึ้นไป )</label><br>
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">รหัสกลุ่มเรียน<br>
                            <input type="text" class="form-control" id="classGrpCode" name="GroupCode" placeholder="รหัสตำบล/ปี/กลุ่มที่">
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">กศน. ตำบล<br>
                            <select class="form-control" id="nfeTambon" name="NFE_Tambon">
                            </select>
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">เบอร์โทรสัพท์ครูตำบล / ผู้ประสานงาน<br>
                            <input type="text" class="form-control" id="teachTel" name="TeacherTelNumber" placeholder="081-xxx-xxxx">
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">ชื่อหลักสูตรวิชา<br>
                            <input type="text" class="form-control" id="courseName" name="CourseName" placeholder="xxxxxxxx">
                        </div>
                        <div class="col-md-12 pl-4 pt-4">
                            <div class="row">
                                <label class="font-weight-bold col-md-5 pl-2"> ตั้งแต่วันที่ - ถึงวันที่
                                    <input type="text" class="form-control" id="dateStId" name="DateStart" placeholder="xx/xx/xxxx">
                                </label>
                                <td><br> -</td>
                                <label class="font-weight-bold col-md-5 pl-2">
                                    <br><input type="text" class="form-control" id="dateSpId" name="DateStop" placeholder="xx/xx/xxxx">
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12 pl-4 pt-4">
                            <!-- <p>ช่วงเวลาจัดกิจกรรม</p> -->
                            <div class="row">
                                <label class="font-weight-bold col-md-5 pl-2">ช่วงเวลาจัดกิจกรรม
                                    <input type="text" class="form-control" id="timeStId" name="TimeStart" placeholder="xx : xx น.">
                                </label>
                                <td><br> -</td>
                                <label class="font-weight-bold col-md-5 pl-2">
                                    <br><input type="text" class="form-control" id="timeSpId" name="TimeStop" placeholder="xx : xx น.">
                                </label>
                            </div>
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">วันจัดกิจกรรม <br>
                            <div class="form-check col-md-5">
                                <input class="form-check-input" type="checkbox" id="monday" name="monday"
                                    value="วันจันทร์">
                                <label class="form-check-label" for="monday"> วันจันทร์ </label><br>
                                <input class="form-check-input" type="checkbox" id="tuesday" name="tuesday"
                                    value="วันอังคาร">
                                <label class="form-check-label" for="tuesday"> วันอังคาร </label><br>
                                <input class="form-check-input" type="checkbox" id="wednesday" name="wednesday"
                                    value="วันพุธ">
                                <label class="form-check-label" for="wednesday"> วันพุธ </label><br>
                                <input class="form-check-input" type="checkbox" id="thursday" name="thursday"
                                    value="วันพฤหัสบดี">
                                <label class="form-check-label" for="thursday"> วันพฤหัสบดี </label><br>
                                <input class="form-check-input" type="checkbox" id="friday" name="friday"
                                    value="วันศุกร์">
                                <label class="form-check-label" for="friday"> วันศุกร์ </label><br>
                                <input class="form-check-input" type="checkbox" id="saturday" name="saturday"
                                    value="วันเสาร์">
                                <label class="form-check-label" for="saturday"> วันเสาร์ </label><br>
                                <input class="form-check-input" type="checkbox" id="sunday" name="sunday"
                                    value="วันอาทิตย์">
                                <label class="form-check-label" for="sunday"> วันอาทิตย์ </label><br>
                            </div>

                        </div>


                    </div>

                    <div class="col-md-6">
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">หมวดอาชีพ
                            <select class="form-control" id="occType" name="OccupationType">
                                <option value="เกษตรกรรม">เกษตรกรรม</option>
                                <option value="อุตสาหกรรม">อุตสาหกรรม</option>
                                <option value="พาณิชยกรรมและบริการ">พาณิชยกรรมและบริการ</option>
                                <option value="ความคิดสร้างสรรค์">ความคิดสร้างสรรค์</option>
                                <option value="บริหารจัดการ และเฉพาะทาง">บริหารจัดการ และเฉพาะทาง</option>
                            </select>
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">ปีงบประมาณ
                            <input type="text" class="form-control" id="budgetYear" name="BudgetYear" placeholder="xxxxxxxx">
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">ภายในวงเงิน
                            <input type="text" class="form-control" id="moneyLimit" name="MoneyLimit" placeholder="xxxx บาท">
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">งบประมาณที่ใช้
                            <select class="form-control" id="budget" name="Budget">
                                <option value="เงินงบประมาณ">เงินงบประมาณ</option>
                                <option value="เงินงบประมาณบูรณาการ">เงินงบประมาณบูรณาการ(EEC)</option>
                                <option value="เงินสนับสนุนจากท้องถิ่น">เงินสนับสนุนจากท้องถิ่น</option>
                                <option value="">เงินสนับสนุนอื่นๆ</option>
                            </select>

                        </div>
                        <div class="col-md-10 pl-4 pt-4 collapse coll_budget">
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-2 ">อุปกรณ์การเรียนที่มีอยู่แล้ว
                            <input type="text" class="form-control" id="toolsClass" name="Tools" placeholder="xxxxxxxx">
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">สถานที่จัดกิจกรรม
                            <div class="row">
                                <label class="font-weight-bold col-md-6 pl-2"> ที่อยู่
                                    <input type="text" class="form-control" id="addressId" name="Address" placeholder="xxxxxxxx">
                                </label>
                                <label class="font-weight-bold col-md-6 pl-4"> ตำบล
                                    <select class="form-control" id="tambonId" name="Address_Tambon"></select>
                                </label><br>
                                <label class="font-weight-bold col-md-6 pl-2"> อำเภอ
                                    <select class="form-control" id="amphurId" name="Address_Amphur"></select>
                                </label><br>
                                <label class="font-weight-bold col-md-6 pl-4"> จังหวัด
                                    <select class="form-control" id="provinceId" name="Address_Province"></select>
                                </label>
                                <label class="font-weight-bold pl-2"> รูปภาพสถานที่จัดกิจกรรม
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input form-control" name="Image" id="imdAdd" multiple>
                                        <label class="custom-file-label" for="customFile">อัพโหลดรูปภาพ</label>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="font-weight-bold col-md-10 pl-4 pt-4 ">ความเป็นมาของหลักสูตร <br>
                        <textarea class="form-control" id="courseStory" name="CourseStory" rows="5" placeholder="กรอกรายละเอียด"> </textarea>
                    </div>
                    <div class="font-weight-bold col-md-10 pl-4 pt-4 ">หลักการของหลักสูตร <br>
                        <textarea class="form-control" id="courseMethod" name="CourseMethod" rows="5" placeholder="กรอกรายละเอียด"> </textarea>
                    </div>
                    <div class="font-weight-bold col-md-10 pl-4 pt-4 ">จุดมุ่งหมาย <br>
                        <textarea class="form-control" id="courseTarget" name="CourseTarget" rows="5" placeholder="กรอกรายละเอียด"> </textarea>
                    </div>
                    <div class="font-weight-bold col-md-10 pl-4 pt-4 ">กลุ่มเป้าหมาย <br>
                        <textarea class="form-control" id="courseGroup" name="CourseGroup" rows="5" placeholder="กรอกรายละเอียด"> </textarea>
                    </div>
                    <div class="font-weight-bold col-md-10 pl-4 pt-4 ">ระยะเวลาทฤษฎี (ชั่วโมง)
                        <input type="text" class="form-control" id="lecture" name="Lecture" placeholder="xx ชั่วโมง">
                    </div>
                    <div class="font-weight-bold col-md-10 pl-4 pt-4 ">ระยะเวลาภาคปฎิบัติ (ชั่วโมง)
                        <input type="text" class="form-control" id="lab" name="Lab" placeholder="xx ชั่วโมง">
                    </div>
                    <div class="col-md-12 pl-4 pt-4 main-co-str">
                        <label class="font-weight-bold ">โครงสร้างหลักสูตร</label>
                        <button type="button" class="btn btn-primary col-md-1 ml-4 add-tb" value="addCourseStr" >เพิ่ม</button>
                        <div class="row " id="course-str1">
                            <div class="row col-md-12 pt-4">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="stuctName1" name="StructureName1" placeholder="เรื่อง xxx">
                                </div>
                                <div class="col-md-5 ml-1">
                                    <input type="text" class="form-control" id="stuctPurpose1" name="StructurePurpose1" placeholder="จุดประสงค์การเรียนรู้">
                                </div>
                            </div>
                            <div class="row col-md-12 pt-4">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="stuctDescript1" name="StructureDescription1" placeholder="เนื้อหา">
                                </div>
                                <div class="col-md-5 ml-1">
                                    <input type="text" class="form-control" id="stuctMethod1" name="StructureMethod1" placeholder="การจัดกระบวนการเรียนรู้">
                                </div>
                            </div>
                            <div class="row col-md-12 pt-4">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" id="stuctLec1" name="StructureLecture1" placeholder="จำนวนชั่วโมงภาคทฤษฎี">
                                </div>
                                <div class="col-md-5 ml-1">
                                    <input type="text" class="form-control" id="stuctLab1" name="StructureLab1" placeholder="จำนวนชั่วโมงภาคปฎิบัติ">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="font-weight-bold main-materials col-md-12 pl-4 pt-4 ">
                        <label class="font-weight-bold ">สื่อการเรียนรู้</label>
                        <button type="button" class="btn btn-primary col-md-1 ml-4 add-tb" value="add_materials" >เพิ่ม</button>
                        <div class="row pt-4" id="mt-r1">
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="addmaterials1" name="Materials1" placeholder="xxxxxxxx">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="addmaterials2" name="Materials2" placeholder="xxxxxxxx">
                            </div>
                        </div>
                    </div>
                    <div class="font-weight-bold main-evalue col-md-12 pl-4 pt-4 ">
                    <label class="font-weight-bold ">การวัดผลประเมิณผล</label>
                        <button type="button" class="btn btn-primary col-md-1 ml-4 add-tb" value="add_evaluation" >เพิ่ม</button>
                        <div class="row pt-4" id="evalue1">
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="addevaluation1" name="Evaluation1" placeholder="xxxxxxxx">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="addevaluation2" name="Evaluation2" placeholder="xxxxxxxx">
                            </div>
                        </div>
                    </div>
                    <div class="font-weight-bold main-crt col-md-12 pl-4 pt-4 ">
                    <label class="font-weight-bold ">เกณฑ์การจบหลักสูตร</label>
                        <button type="button" class="btn btn-primary col-md-1 ml-4 add-tb" value="add_criteria" >เพิ่ม</button>
                        <div class="row pt-4" id="crt1">
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="addcriteria1" name="Criterion1" placeholder="xxxxxxxx">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="addcriteria2" name="Criterion2" placeholder="xxxxxxxx">
                            </div>
                        </div>
                    </div>
                    <div class="font-weight-bold col-md-10 pl-4 pt-4 ">ขยายเวลา
                        <div class="row">
                            <div class="form-check col-md-10">
                                <input class="form-check-input" type="radio" name="select_late" id="late" value="late">
                                <label class="form-check-label" for="late">ขยายเวลา</label>
                            </div>
                            <div class="form-check col-md-10">
                                <input class="form-check-input" type="radio" name="select_late" id="nolate"
                                    value="nolate">
                                <label class="form-check-label" for="nolate">ไม่ขยายเวลา</label>
                            </div>
                            <div class="row collapse lateTable" >
                                <label class="font-weight-bold col-md-5 pl-2"> จำนวนชั่วโมง
                                    <input type="text" class="form-control" id="lateHour" name="lateHour" placeholder="xx ชั่วโมง">
                                </label>
                                <label class="font-weight-bold col-md-5 pl-2 "> จำนวนวัน
                                    <input type="text" class="form-control" id="lateDay" name="lateDay" placeholder="x วัน">
                                </label><br>
                                <label class="font-weight-bold col-md-5 pl-2"> ตั้งแต่วันที่ - ถึงวันที่
                                    <input type="text" class="form-control" id="lateStDay" name="lateStDay" placeholder="xx/xx/xxxx">
                                </label>
                                <td><br> -</td>
                                <label class="font-weight-bold col-md-5 pl-2">
                                    <br><input type="text" class="form-control" id="lateEndDay" name="lateEndDay" placeholder="xx/xx/xxxx">
                                </label>
                                <label class="font-weight-bold col-md-5 pl-2">ช่วงเวลาจัดกิจกรรม
                                    <input type="text" class="form-control" id="lateStTime" name="lateStTime" placeholder="xx : xx น.">
                                </label>
                                <td><br> -</td>
                                <label class="font-weight-bold col-md-5 pl-2">
                                    <br><input type="text" class="form-control" id="lateEndTime" name="lateEndTime" placeholder="xx : xx น.">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="main-nfetb col-md-10 pl-3">
                        <label class="font-weight-bold ">ตารางหลักสูตรการศึกษาต่อเนื่อง</label>
                        <button type="button" class="btn btn-primary col-md-1 ml-4 add-tb" value="add_nfetable" >เพิ่ม</button>
                        <div class="row" id="nfe-tb1">
                            <div class="row col-md-12 pt-4">
                                <div class="col-md">
                                    <input type="text" class="form-control" id="nfetable_day1" name="nfeTable_Day1" placeholder="วันที่">
                                </div>
                                <div class="col-md">
                                    <input type="text" class="form-control" id="nfetable_time1" name="nfeTable_Time1" placeholder="เวลา">
                                </div>
                            </div>
                            <div class="row col-md-12 pt-4">
                                <div class="col-md">
                                    <input type="text" class="form-control" id="nfetable_manage1" name="nfeTable_Manage1"placeholder="กระบวนการจัดการเรียนรู้">
                                </div>
                                <div class="col-md">
                                    <input type="text" class="form-control" id="nfetable_note1" name="nfeTable_Note1" placeholder="หมายเหตุ">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="font-weight-bold col-md-10 pl-2 pt-4 ">ชื่อหลักสูตรวิชา<br>
                        <div class="col-md pt-4">
                            <input type="text" class="form-control" id="director" name="Director_Name"
                                placeholder="ชื่อประธาน / คณะกรรมการสถานศึกษา">
                        </div>
                        <div class="col-md pt-4">
                            <input type="text" class="form-control" id="teacherName" name="Teacher_Name"
                                placeholder="ชื่อข้าราชการ / ครู / ครูผู้ช่วย">
                        </div>
                    </div>

                </div>
                <div class="container-fluid text-center pt-5 pb-5">
                    <input type="submit" class="btn btn-success col-md-1" value="บันทึก">
                </div>
                <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>