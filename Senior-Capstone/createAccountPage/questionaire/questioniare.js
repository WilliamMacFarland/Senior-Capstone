var sliderq1 = document.getElementById("questionOne");
var output1 = document.getElementById("q1");
output1.innerHTML = sliderq1.value;

sliderq1.oninput = function () {
  output1.innerHTML = this.value;
};

var sliderq2 = document.getElementById("questionTwo");
var output2 = document.getElementById("q2");
output2.innerHTML = sliderq2.value;

sliderq2.oninput = function () {
  output2.innerHTML = this.value;
};

var sliderq3 = document.getElementById("questionThree");
var output3 = document.getElementById("q3");
output3.innerHTML = sliderq3.value;

sliderq3.oninput = function () {
  output3.innerHTML = this.value;
};

var sliderq4 = document.getElementById("questionFour");
var output4 = document.getElementById("q4");
output4.innerHTML = sliderq4.value;

sliderq4.oninput = function () {
  output4.innerHTML = this.value;
};

var sliderq5 = document.getElementById("questionFive");
var output5 = document.getElementById("q5");
output5.innerHTML = sliderq5.value;

sliderq5.oninput = function () {
  output5.innerHTML = this.value;
};

var sliderq6 = document.getElementById("questionSix");
var output6 = document.getElementById("q6");
output6.innerHTML = sliderq6.value;

sliderq6.oninput = function () {
  output6.innerHTML = this.value;
};

var sliderq7 = document.getElementById("questionSeven");
var output7 = document.getElementById("q7");
output7.innerHTML = sliderq7.value;

sliderq7.oninput = function () {
  output7.innerHTML = this.value;
};

var sliderq8 = document.getElementById("questionEight");
var output8 = document.getElementById("q8");
output8.innerHTML = sliderq8.value;

sliderq8.oninput = function () {
  output8.innerHTML = this.value;
};

var sliderq9 = document.getElementById("questionNine");
var output9 = document.getElementById("q9");
output9.innerHTML = sliderq9.value;

sliderq9.oninput = function () {
  output9.innerHTML = this.value;
};

var sliderq10 = document.getElementById("questionTen");
var output10 = document.getElementById("q10");
output10.innerHTML = sliderq10.value;

sliderq10.oninput = function () {
  output10.innerHTML = this.value;
};

$(function () {
  $("input[type=range]").change(getTotal);
  getTotal();
});

function getTotal() {
  var first = document.getElementById("q1").innerText;
  var second = document.getElementById("q2").innerText;
  var third = document.getElementById("q3").innerText;
  var fourth = document.getElementById("q4").innerText;
  var fifth = document.getElementById("q5").innerText;
  var sixth = document.getElementById("q6").innerText;
  var seventh = document.getElementById("q7").innerText;
  var eighth = document.getElementById("q8").innerText;
  var nineth = document.getElementById("q9").innerText;
  var tenth = document.getElementById("q10").innerText;
  total.innerHTML =
    Number(first) +
    Number(second) +
    Number(third) +
    Number(fourth) +
    Number(fifth) +
    Number(sixth) +
    Number(seventh) +
    Number(eighth) +
    Number(nineth) +
    Number(tenth);
}
