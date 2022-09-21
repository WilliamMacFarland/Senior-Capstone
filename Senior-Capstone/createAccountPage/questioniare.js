var slider1 = document.getElementById("questionOne");
var output1 = document.getElementById("q1Input");
output1.innerHTML = slider1;

slider1.oninput = function () {
  output1.innerHTML = this.value;
};

var slider2 = document.getElementById("questionTwo");
var output2 = document.getElementById("q2Input");
output2.innerHTML = slider1;

slider1.oninput = function () {
  output2.innerHTML = this.value;
};

$(function () {
  $("input[type=range]").change(total); // not () - you're not calling the function
  total(); // initialy call it
});

function total() {
  var q1 = document.getElementById("q1Input").innerText;
  var q1 = parseInt(slider2.value);
  total.innerHTML = Number(q1) + Number(q2);
}
