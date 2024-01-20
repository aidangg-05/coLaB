function togglePopup() {
    var popup = document.getElementById("notificationPopup");
    popup.style.display = (popup.style.display === "none") ? "block" : "none";
}

function closePopup() {
    document.getElementById("notificationPopup").style.display = "none";
}
function goprofile(){
    window.location.href="profile.php";
}