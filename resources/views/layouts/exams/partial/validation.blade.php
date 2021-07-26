<script>
    document.getElementById("main_form").onsubmit = function () {

        var zeroFlag;
        var columns = "<?php echo $c ?>";
        var rows = "<?php echo $r ?>";
        var form = document.forms["main_form"];


        for(var r=0 ; r<rows ;r++) {
            if (form["sample_value"+r+"_0"].value !=""){zeroFlag = 0;}
            else{zeroFlag = 1;}

            for(var c=1 ; c<columns ;c++) {
                if (form["sample_value"+r+"_"+c].value !="" && zeroFlag == 1){
                    swal("مشکل در اطلاعات نمونه ها", "اطلاعات هر نمونه باید کامل   پر شود", "error");
                    return false;
                }else if (form["sample_value"+r+"_"+c].value =="" && zeroFlag == 0){
                    swal("مشکل در اطلاعات نمونه ها", "اطلاعات هر نمونه باید کامل   پر شود", "error");
                    return false;
                }
            }

        }
    }
</script>