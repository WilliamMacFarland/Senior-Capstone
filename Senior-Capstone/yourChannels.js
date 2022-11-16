const loadYourChannels = () => {
  const pageContent = document.querySelector(".pageContent");
  fetch("yourChannels/yourChannels.php")
    .then((res) => res.text())
    .then((data) => {
      pageContent.innerHTML = data;
      loadChannels();
    });

  const yourChannelsTab = document.getElementById("yourChannelsTab");
  yourChannelsTab.classList.add("is-active");

  const socialTab = document.getElementById("socialTab");
  socialTab.classList.remove("is-active");
};

function loadChannels() {
  //array from DB
  const array = ["fortnite", "callofdutyChannel"];

  //iterate through array

  if (array.includes("fortnite")) {
    const pageContent = document.querySelector(".fortnite");
    fetch("/yourChannels/fortniteChannel/fortniteChannel.php")
      .then((res) => res.text())
      .then((data) => {
        pageContent.innerHTML = data;
      });
  }
  if (array.includes("callofdutyChannel")) {
    const pageContent = document.querySelector(".callofduty");
    fetch("/yourChannels/callofdutyChannel/callofdutyChannel.html")
      .then((res) => res.text())
      .then((data) => {
        pageContent.innerHTML = data;
      });
  }
}
function mouseOver(element) {
  element.style.height = "230px";
  // element.style.width = "280px";
}
function mouseLeave(element) {
  element.style.height = "200px";
  // element.style.width = "250px";
}

window.addEventListener("load", loadYourChannels, false);
