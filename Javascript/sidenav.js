function myBar() {
const element = document.getElementById("bar");
if (element.className == "sidebar") {
    element.className = "mobilebar";
  } else {
    element.className = "sidebar";
  }
}