<script>
$(function() {
    initControl();
});

function initControl() {
    $(document).ready(function() {

        // $("#addCourseStr").click(function() {
        //     $("#CourseStr").append("<input type="text" id="asdff" name="asdff" placeholder="จุดประสงค์การเรียนรู้"> ");
        // });

        $("input[type='radio']").change(function() {
            if ($(this).val() == "late") {
                $("#lateTable").show();
            } else {
                $("#lateTable").hide();
            }
        });

        if ($(this).val() != "moneyOth") {
            $("#moneyOth_box").hide();
        }
        $("#money").change(function() {
            if ($(this).val() == "moneyOth") {
            $("#moneyOth_box").show();
        }else{
            $("#moneyOth_box").hide();
        }
        });
    });
}
</script>