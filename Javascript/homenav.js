function myNav() {
const element = document.getElementById("Navbar");
if (element.className == "default") {
    element.className = "topnav";
  } else {
    element.className = "default";
  }
}