const loadSocial = () => {
  const pageContent = document.querySelector(".pageContent");
  fetch("social/social.php")
    .then((res) => res.text())
    .then((data) => {
      pageContent.innerHTML = data;
    });

  const yourChannelsTab = document.getElementById("yourChannelsTab");
  yourChannelsTab.classList.remove("is-active");

  const socialTab = document.getElementById("socialTab");
  socialTab.classList.add("is-active");
};
