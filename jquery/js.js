$("document").ready(function(){
    $("#p1  ").click(()=>{
        var x = $("#p1").html();
        $("#span1").html(x);
        alert($("#p1").text());
    }); 

});