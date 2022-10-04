window.onload(loadChannels());
function loadChannels() {
  //array from DB
  const array = ["fortnite", "callofdutyChannel"];

  //iterate through array

  if (array.includes("fortnite")) {
    //query select FROM fortniteChannel folder similar to yourChannels.js
    const pageContent = document.querySelector(".fortnite");
    fetch("fortniteChannel/fortniteChannel.html")
      .then((res) => res.text())
      .then((data) => {
        pageContent.innerHTML = data;
      });
  }
  if (array.includes("callofdutyChannel")) {
    //query select FROM fortniteChannel folder similar to yourChannels.js
    const pageContent = document.querySelector(".callofduty");
    fetch("callofdutyChannel/callofdutyChannel.html")
      .then((res) => res.text())
      .then((data) => {
        pageContent.innerHTML = data;
      });
  }
}
