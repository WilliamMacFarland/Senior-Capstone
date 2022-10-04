const siteHeader = document.querySelector(".mainPage");
fetch("../mainPage.html")
  .then((res) => res.text())
  .then((data) => {
    siteHeader.innerHTML = data;
  });
