window.onload(loadChannels());
function loadChannels() {
  //array from DB
  const array = ["fortnite", "callofdutyChannel"];

  //iterate through array

  if (array.includes("fortnite")) {
    //query select FROM fortniteChannel folder similar to yourChannels.js
    const pageContent = document.querySelector(".fortnite");
    pageContent.innerHTML = "FORTNITE CHANNEL";
  }
  if (array.includes("callofdutyChannel")) {
    //query select FROM fortniteChannel folder similar to yourChannels.js
    const pageContent = document.querySelector(".callofduty");
    pageContent.innerHTML = "Call of Duty CHANNEL";
  }
}
