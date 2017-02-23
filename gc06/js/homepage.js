
function add(){
  console.log("add");
    var elem = document.getElementById("friend");
//    var elem2=document.getElementById("name");

    elem.parentElement.removeChild(elem);
};

/*
function add(){
  console.log("add");
    var elem = document.getElementsByClassName('test');
    elem.parentElement.removeChild(elem);
}
*/
function ignore(){
  console.log("ignore");
  var elem = document.getElementById("friend");
  elem.parentElement.removeChild(elem);
}
