<div class="content pb-2">
    <div class="container-fluid pl-5">
        <div class="card-body">
            <div class="content-header">

                <div class="cotainer text-center" style="color: #517beb">
                    <h2><b>ชั้นเรียน</b></h2>
                </div>

                <form action="#">
                    <h3>1. บันทึกเปิดกลุ่มเรียน</h3>
                    <div class="row">
                        <div class="col-md-5">
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">รูปแบบชั้นเรียน<br>
                                <input type="radio" checked="checked" id="h30" name="typeHour">
                                <label for="h30"> การศึกษาต่อเนื่องรูปแบบกลุ่มสนใจ ( ไม่ถึง 30 ชั่วโมง )</label><br>
                                <input type="radio" id="h31" name="typeHour">
                                <label for="h31"> การศึกษาต่อเนื่องรูปแบบวิชาชีพ ( 31 ชั่วโมงขึ้นไป )</label><br>
                            </label>
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">รหัสกลุ่มเรียน<br>
                                <input type="text" class="form-control" id="#" name="#"placeholder="กรอกรายละเอียด">
                            </label>
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">กศน. ตำบล<br>
                                <select class="form-control" name="#" id="#">
                                    <option value="#">ตำบลบางละมุง</option>
                                </select>
                            </label>
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">เบอร์โทรสัพท์ครูตำบล / ผู้ประสานงาน<br>
                                <input type="text" class="form-control" id="#" name="#" placeholder="xxx-xxx-xxxx">
                            </label>
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">ชื่อหลักสูตรวิชา<br>
                                <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                            </label>
                            <div class="col-md-12 pl-4 pt-4">
                                <div class="row">
                                    <label class="font-weight-bold col-md-5 pl-2"> ตั้งแต่วันที่ - ถึงวันที่
                                        <input type="text" class="form-control" id="#" name="#" placeholder="xx/xx/xxxx">
                                    </label>
                                    <td><br> -</td>
                                    <label class="font-weight-bold col-md-5 pl-2">
                                        <br><input type="text" class="form-control" id="#" name="#" placeholder="xx/xx/xxxx">
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-12 pl-4 pt-4">
                                <!-- <p>ช่วงเวลาจัดกิจกรรม</p> -->
                                <div class="row">
                                    <label class="font-weight-bold col-md-5 pl-2">ช่วงเวลาจัดกิจกรรม
                                        <input type="text" class="form-control" id="#" name="#" placeholder="xx : xx น.">
                                    </label>
                                    <td><br> -</td>
                                    <label class="font-weight-bold col-md-5 pl-2">
                                        <br><input type="text" class="form-control" id="#" name="#" placeholder="xx : xx น.">
                                    </label>
                                </div>
                            </div>
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">วันจัดกิจกรรม <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="monday" name="Day" value="monday">
                                    <label class="form-check-label" for="monday"> วันจันทร์ </label><br>
                                    <input class="form-check-input" type="checkbox" id="tuesday" name="Day" value="tuesday">
                                    <label class="form-check-label" for="tuesday"> วันอังคาร </label><br>
                                    <input class="form-check-input" type="checkbox" id="wednesday" name="Day" value="wednesday">
                                    <label class="form-check-label" for="wednesday"> วันพุธ </label><br>
                                    <input class="form-check-input" type="checkbox" id="thursday" name="Day" value="thursday">
                                    <label class="form-check-label" for="thursday"> วันพฤหัสบดี </label><br>
                                    <input class="form-check-input" type="checkbox" id="friday" name="Day" value="friday">
                                    <label class="form-check-label" for="friday"> วันศุกร์ </label><br>
                                    <input class="form-check-input" type="checkbox" id="saturday" name="Day" value="saturday">
                                    <label class="form-check-label" for="saturday"> วันเสาร์ </label><br>
                                    <input class="form-check-input" type="checkbox" id="sunday" name="Day" value="sunday">
                                    <label class="form-check-label" for="sunday"> วันอาทิตย์ </label><br>
                                </div>

                            </label>


                        </div>

                        <div class="col-6">
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">หมวดอาชีพ
                                <select class="form-control" name="#" id="#">
                                    <option value="#">เกษตรกรรม</option>
                                    <option value="#">อุตสาหกรรม</option>
                                    <option value="#">พาณิชยกรรมและบริการ</option>
                                    <option value="#">ความคิดสร้างสรรค์</option>
                                    <option value="#">บริหารจัดการ และเฉพาะทาง</option>
                                </select>
                            </label>
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">ปีงบประมาณ
                                <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                            </label>
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">ภายในวงเงิน
                                <input type="text" class="form-control" id="#" name="#"placeholder="xxxx บาท">
                            </label>
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">งบประมาณที่ใช้
                                <select class="form-control" name="money" id="money">
                                    <option value="#">เงินงบประมาณ</option>
                                    <option value="#">เงินงบประมาณบูรณาการ (EEC)</option>
                                    <option value="#">เงินสนับสนุนจากท้องถิ่น</option>
                                    <option value="moneyOth">เงินสนับสนุนอื่นๆ</option>
                                </select><br>
                                <input type="text" class="form-control" id="moneyOth_box" name="moneyOth_box"
                                    placeholder="กรอกเงินสนับสนุนอื่นๆที่นี่">
                            </label>
                            <label class="font-weight-bold col-md-10 pl-4 pt-2 ">อุปกรณ์การเรียนที่มีอยู่แล้ว
                                <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                            </label>
                            <label class="font-weight-bold col-md-10 pl-4 pt-4 ">สถานที่จัดกิจกรรม
                                <div class="row">
                                    <label class="font-weight-bold col-md-6 pl-2"> ที่อยู่
                                        <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                                    </label>
                                    <label class="font-weight-bold col-md-6 pl-4"> ตำบล
                                        <select class="form-control" name="#" id="#">
                                            <option value="#">ตำบลบางละมุง</option>
                                            <option value="#">...</option>
                                        </select>
                                    </label><br>
                                    <label class="font-weight-bold col-md-6 pl-2"> อำเภอ
                                        <select class="form-control" name="#" id="123">
                                            <option value="#">อำเภอบางละมุง</option>
                                            <option value="#">...</option>
                                        </select>
                                    </label><br>
                                    <label class="font-weight-bold col-md-6 pl-4"> จังหวัด
                                        <select class="form-control" name="#" id="123">
                                            <option value="#">จังหวัดชลบุรี</option>
                                            <option value="#">...</option>
                                        </select>
                                    </label>
                                    <label class="font-weight-bold pl-2"> รูปภาพสถานที่จัดกิจกรรม
                                        <!-- <div class="form-group"> -->
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control" name="#"
                                                id="customFile" multiple>
                                            <label class="custom-file-label" for="customFile">อัพโหลดรูปภาพ</label>
                                        </div>
                                        <!-- </div> -->
                                    </label>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <label class="font-weight-bold col-md-10 pl-4 pt-4 ">ความเป็นมาของหลักสูตร <br>
                            <textarea class="form-control" name="#" rows="5" placeholder="กรอกรายละเอียด">
                                </textarea>
                        </label>
                        <label class="font-weight-bold col-md-10 pl-4 pt-4 ">หลักการของหลักสูตร <br>
                            <textarea class="form-control" name="#" rows="5" placeholder="กรอกรายละเอียด">
                                </textarea>
                        </label>
                        <label class="font-weight-bold col-md-10 pl-4 pt-4 ">จุดมุ่งหมาย <br>
                            <textarea class="form-control" name="#" rows="5" placeholder="กรอกรายละเอียด">
                                </textarea>
                        </label>
                        <label class="font-weight-bold col-md-10 pl-4 pt-4 ">กลุ่มเป้าหมาย <br>
                            <textarea class="form-control" name="#" rows="5" placeholder="กรอกรายละเอียด">
                                </textarea>
                        </label>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">ระยะเวลาทฤษฎี (ชั่วโมง)
                            <input type="text" class="form-control" id="#" name="#" placeholder="xx ชั่วโมง">
                        </div>
                        <div class="font-weight-bold col-md-10 pl-4 pt-4 ">ระยะเวลาภาคปฎิบัติ (ชั่วโมง)
                            <input type="text" class="form-control" id="#" name="#" placeholder="xx ชั่วโมง">
                        </div>
                        <div class="col-md-10 pl-4 pt-4 ">
                            <label class="font-weight-bold " id="asdd">โครงสร้างหลักสูตร</label>
                            <button type="button" class="btn btn-primary col-md-1" id="addCourseStr">เพิ่ม</button>
                            <div class="row" id="CourseStr">
                                <div class="row col-md-12">
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="#" name="#"
                                            placeholder="เรื่อง xxx">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="#" name="#"
                                            placeholder="จุดประสงค์การเรียนรู้">
                                    </div>
                                </div>
                                <div class="row col-md-12 pt-4">
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="#" name="#" placeholder="เนื้อหา">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="#" name="#"
                                            placeholder="การจัดกระบวนการเรียนรู้">
                                    </div>
                                </div>
                                <div class="row col-md-12 pt-4">
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="hourTheory" name="hourTheory"
                                            placeholder="จำนวนชั่วโมงภาคทฤษฎี">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="hourActive" name="hourActive"
                                            placeholder="จำนวนชั่วโมงภาคปฎิบัติ">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <label class="font-weight-bold col-md-10 pl-4 pt-4 ">สื่อการเรียนรู้
                            <div class="row">
                                <div class="col-md">
                                    <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                                </div>
                                <div class="col-md">
                                    <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                                </div>
                            </div>
                        </label>
                        <label class="font-weight-bold col-md-10 pl-4 pt-4 ">การวัดผลประเมิณผล
                            <div class="row">
                                <div class="col-md">
                                    <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                                </div>
                                <div class="col-md">
                                    <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                                </div>
                            </div>
                        </label>
                        <label class="font-weight-bold col-md-10 pl-4 pt-4 ">เกณฑ์การจบหลักสูตร
                            <div class="row">
                                <div class="col-md">
                                    <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                                </div>
                                <div class="col-md">
                                    <input type="text" class="form-control" id="#" name="#" placeholder="xxxxxxxx">
                                </div>
                            </div>
                        </label>
                        <label class="font-weight-bold col-md-10 pl-4 pt-4 ">ขยายเวลา
                            <div class="row">
                                <div class="form-check col-md-10">
                                    <input class="form-check-input" type="radio" name="select_late" id="late"
                                        value="late">
                                    <label class="form-check-label" for="late">ขยายเวลา</label>
                                </div>
                                <div class="form-check col-md-10">
                                    <input class="form-check-input" type="radio" name="select_late" id="nolate"
                                        value="nolate">
                                    <label for="nolate">ไม่ขยายเวลา</label>
                                </div>
                                <div class="row" id="lateTable">
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
                        </label>
                        <div class="col-md-10 pl-3">
                            <label class="font-weight-bold " id="asdd">ตารางหลักสูตรการศึกษาต่อเนื่อง</label>
                            <button type="button" class="btn btn-primary col-md-1" id="#">เพิ่ม</button>
                            <div class="row" id="#">
                                <div class="row col-md-12">
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="#" name="#" placeholder="วันที่">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="#" name="#" placeholder="เวลา">
                                    </div>
                                </div>
                                <div class="row col-md-12 pt-4">
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="#" name="#"
                                            placeholder="กระบวนการจัดการเรียนรู้">
                                    </div>
                                    <div class="col-md">
                                        <input type="text" class="form-control" id="#" name="#" placeholder="หมายเหตุ">
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="font-weight-bold col-md-10 pl-2 pt-4 ">ชื่อหลักสูตรวิชา<br>
                            <div class="col-md pt-4">
                                <input type="text" class="form-control" id="#" name="#"
                                    placeholder="ชื่อประธาน / คณะกรรมการสถานศึกษา">
                            </div>
                            <div class="col-md pt-4">
                                <input type="text" class="form-control" id="#" name="#"
                                    placeholder="ชื่อข้าราชการ / ครู / ครูผู้ช่วย">
                            </div>
                        </div>

                    </div>
                    <div class="container-fluid text-center pt-5 pb-5">
                        <input type="submit" class="btn btn-default col-md-1" value="บันทึก">
                    </div>

                </form>
            </div>
        </div>
    </div>