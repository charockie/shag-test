// $('#drop-list').change(function(){
//     $(this).parent('form').submit();
// });

$("document").ready(function(){
    $("#groups").on("pjax:end", function() {
        $.pjax.reload({container:"#students"});
        document.getElementById("drop-list").selected="";
    });
});

$("#myModal").on("show.bs.modal", function (e) {
    var id = $(e.relatedTarget).data("id");
    $.ajax({
        url:"site/student",
        data: ({ id: id }),
        type:"POST",
        dataType: "json",
        success: function(data){
            $("#name").html(data.surname+" "+data.name);
            $("#email").html(data.email);
            $("#phone").html(data.phone);
            $("#age").html(data.age);
            $("#address").html(data.address);
            $("#gpa").html(data.gpa);
            $("#visit").html(data.last_visit);
            $("#group").html(data.title);
        },
        error: function(e){
        }
    });
    $("#myInput").focus();
});