//issue #9 about poor design
//just setting up the layout of how the links will be displayed.
function hamburgerBar() {
    var x = document.getElementById("myLinks");
    if (x.style.display === "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}

function clickFunctionFood () {
};


function clickFunction () {
    window.location.replace("home.php");
};
