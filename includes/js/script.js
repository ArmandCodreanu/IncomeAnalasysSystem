$(document).ready(function(){
    
    //stop return key from sending forms
    $(window).keydown(function(event){
        if(event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
    
    //check if approval is needed
    var salary = $("input[name=old_salariu]").val();
    var other = $("input[name=old_alte_surse]").val();
    
    $("input[name=salariu]").blur(function(){
        console.log("asdadsa" + salary);
        if($(this).val() < salary){
            $("input[name=aps]").show();
            $("input[name=aps]").removeAttr("disabled");
            $("input[name=update]").attr("value","Approve by admin and update");
        }
    });
    
    $("input[name=alte_surse]").blur(function(){
        if($(this).val() < other){
            $("input[name=aps]").show();
            $("input[name=aps]").removeAttr("disabled");
            $("input[name=update]").attr("value","Approve by admin and update");
        }
    });
    
    //redirect to master
    $(document).keydown(function(e){
        if(e.ctrlKey && e.shiftKey && e.altKey && e.keyCode == 88){
            window.location.replace("/anaf/master");  
        }
    });
    
    //nr inmatriculare doar CAPS
    $('input[name=nr_auto]').keyup(function () {
        $(this).val($(this).val().toUpperCase());
    });
    
    
});