document.querySelector("#button").onclick = function(){

    const logo = document.querySelector("#name");
    const navlinks = document.querySelector(".navlinks");
    const button = document.querySelector("#button");



    logo.style.display ="none"



    navlinks.style.display = "inline"


    button.style.display ="none"

    console.log(centered.style)
    centered.style.display ="inline"
}

document.querySelector("#popup1").onclick = function() {
    const centered = document.querySelector(".centered");
    centered.style.display = "inline";

    // Add event listener to document to detect clicks outside of popup box
    document.addEventListener("click", handleClickOutside);

    // Add event listener to popup button to detect clicks on popup button when box is displayed
    this.addEventListener("click", handleClickInside);

    function handleClickOutside(event) {
        // If the click target is not the popup box or a child of the popup box, hide the popup box
        if (!centered.contains(event.target) && event.target !== centered) {
            centered.style.display = "none";
            document.removeEventListener("click", handleClickOutside);
            centered.removeEventListener("click", handleClickInside);
        }
    }

    function handleClickInside(event) {
        // If the popup box is already displayed, do nothing
        if (centered.style.display === "inline") {
            event.stopPropagation();
        }
    }
};

function closePopup() {
    const popup = document.getElementById('notificationPopup');
    const overlay = document.getElementById('overlay');

    popup.style.display = 'none';
    overlay.style.display = 'none';
}
function goprofile(){
    window.location.href="profile.php";
}
function goabout(){
    window.location.href="about.php"
}
function addproject(){
    window.location.href="addprojectform.php"
}
function gocontactus(){
    window.location.href="contactus.php"
}