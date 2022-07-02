function myFunction() {
    var x = document.getElementById("myDIV");
    var x2 = document.getElementById("myDIV0");
    if (x.style.display === "block") {
      x.style.display = "none",
      x2.style.display = "block";
    } else {
      x.style.display = "block";
    }
  }

  