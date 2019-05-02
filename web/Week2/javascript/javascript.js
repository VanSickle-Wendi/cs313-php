function changeColor() {
   var textbox1 = document.getElementById("box1_color");
   
   var div1 = document.getElementById("box1");
   
   var color = textbox1.value;
   div1.style.backgroundColor = color;
}

function clicked() {
   alert("Clicked");
}

$(document).ready(function(){
    $("#box2_button").click(function(){
        var $test = $("#box2_color").val();
        $("#box2").css("background-color", $test);
    });
});

$(document).ready(function(){
    $("#box3_button").click(function(){
    $("#box3").fadeToggle(2000);
    });
});



