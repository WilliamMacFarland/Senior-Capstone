//List of questions and content(intro, sliders, game buttons, and thanks card)

const Questions = [
  {
    id: 0,
    q: "Welcome to the GnRU community! Before you go any further we ask that you complete this questionaire. This questionaire is put in place to help find suggested friends through our website. We will not share any of your data or scores with any third parties. Please click on the start button to begin the quiz.",
    i: "<p></p>",
  },
  {
    id: 1,
    q: "How extroverted are you? (10 being the most extroverted)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionOne'  onmousemove='rangeSlider(this.value)'/> <br><p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 2,
    q: "How extroverted are you? (10 being the most extroverted)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionOne'  onmousemove='rangeSlider(this.value)'/> <br><p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 3,
    q: "How passionate are you about videogames? (10 being the most passionate)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionTwo' onmousemove='rangeSlider(this.value)'/> <p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 4,
    q: "How much time do you spend outside? (10 being the most time)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionThree' onmousemove='rangeSlider(this.value)'/> <p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 5,
    q: "How important is winning to you? (10 being the most important)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionFour' onmousemove='rangeSlider(this.value)'/> <p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 6,
    q: "How likely are you to sleep in past noon? (10 being the most likely)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionFive' onmousemove='rangeSlider(this.value)'/> <p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 7,
    q: "How important is it that you exercise regularly? (10 being the most important)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionSix' onmousemove='rangeSlider(this.value)'/> <p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 8,
    q: "Are you a night owl? (10 being the biggest night owl)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionSeven'  onmousemove='rangeSlider(this.value)'/> <p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 9,
    q: "How toxic of a player can you be? (10 being the most toxic)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionEight'  onmousemove='rangeSlider(this.value)'/> <p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 10,
    q: "How seriously do you take gaming? (10 being the most serious)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionNine' onmousemove='rangeSlider(this.value)'/> <p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 11,
    q: "How advanced is your gaming setup? (10 being the most advanced)",
    i: "<input type='range' min='0' max='10' value='0' class='slider' id='questionTen' onmousemove='rangeSlider(this.value)'/> <p>Value: <span id='current'>0</span></p>",
  },
  {
    id: 12,
    q: "What games are you interested in? (You can select multiple games)",
    i: "<div class='buttons'><button class='seatButton' id='fortnite' onclick=toggleFortnite()></button><button class='seatButton' id='COD' onclick=toggleCOD()></button></div>",
  },
  {
    id: 13,
    q: "Thank you for completing the questionaire! Click on the finish button to be redirected to your GnRU account",
    i: "<p></p>",
  },
];

// Set start
var start = true;

// Iterate
function iterate(id) {
  // Getting the question
  const question = document.getElementById("question");
  const slide = document.getElementById("slide");

  // Setting the question text
  question.innerText = Questions[id].q;
  slide.innerHTML = Questions[id].i;
}

if (start) {
  iterate("0");
}

// Next button and method
const next = document.getElementsByClassName("next")[0];
var id = 0;

next.addEventListener("click", () => {
  start = false;
  if (id === 0 || id === 12) {
    id++;
    iterate(id);
    console.log(id);
  }
  if (id < 14) {
    id++;
    var span_Num = document.getElementById("current").innerText;
    getTotal(span_Num);
    iterate(id);
    console.log(id);
  }
});

//changes button name from start to next to finish
function buttonChange() {
  document.getElementById("nextBtn").value = "Next";
  if (id === 12) {
    document.getElementById("nextBtn").value = "Finish";
  }
  if (id > 13) {
    document
      .getElementById("nextBtn")
      .onclick((location.href = "../../mainPage.html"));
  }
}

//displays current value of slider for user
function rangeSlider(val) {
  document.getElementById("current").innerHTML = val;
}

//gets values that user selected saves into array and then finds sum
let arrayTotal = [];
function getTotal(nums) {
  arrayTotal.push(nums);
  var grandTotal = 0;
  for (var i = 0; i < arrayTotal.length; i++) {
    grandTotal += parseInt(arrayTotal[i]);
  }
  total.innerHTML = grandTotal;
  console.log(grandTotal);
}

//Determines if button is selected
let fortniteSelect = false;
console.log("Default value of bool is", fortniteSelect);

function toggleFortnite() {
  fortniteSelect = fortniteSelect ? false : true;
  console.log("Toggled bool is", fortniteSelect);
  if (fortniteSelect === true) {
    document.getElementById("fortnite").style.backgroundColor = "gray";
  }
  if (fortniteSelect === false) {
    document.getElementById("fortnite").style.backgroundColor =
      "rgb(194, 109, 226)";
  }
}

let codSelect = false;
console.log("Default value of bool is", codSelect);

function toggleCOD() {
  codSelect = codSelect ? false : true;
  console.log("Toggled bool is", codSelect);
  if (codSelect === true) {
    document.getElementById("COD").style.backgroundColor = "#606060";
  }
  if (codSelect === false) {
    document.getElementById("COD").style.backgroundColor = "#000000";
  }
}
