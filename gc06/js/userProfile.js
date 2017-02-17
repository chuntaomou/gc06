
$(document).ready(function(){
  $("#login").click(function(){
    console.log("click");
    $.get( "../php/userProfile.php", function(data){
     alert("Data Loaded: " + data ) ;
    });
  });
});
