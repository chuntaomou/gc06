
function add(){
  console.log("add");
    var elem = document.getElementById("friend");
    elem.parentElement.removeChild(elem);
};

function ignore(){
  console.log("ignore");
  var elem = document.getElementById("friend");
  elem.parentElement.removeChild(elem);
}
