// Login Form
const loginFormContainer = document.getElementById("loginFormContainer");
// Signup Form
const signupLink = document.getElementById("signupLink");
const loginlink = document.getElementById("loginlink");
const signupFormContainer = document.getElementById("signupFormContainer");

document.addEventListener("DOMContentLoaded", function () {
    var signupFormContainer = document.getElementById("signupFormContainer");
    signupFormContainer.style.display = "none";
});

signupLink.addEventListener("click", () => {
    signupFormContainer.style.display = "block";
    loginFormContainer.style.display = "none";
});
loginlink.addEventListener("click", () => {
    loginFormContainer.style.display = "block";
    signupFormContainer.style.display = "none";
});

// Notes Area
document.addEventListener("DOMContentLoaded", function () {
    var notePad = document.getElementById("notePad");
    notePad.style.display = "none";
});
function togglePopup() {
    var notePad = document.getElementById("notePad");
    if (notePad.style.display === "none" || notePad.style.display === "") {
        notePad.style.display = "block";
        loginFormContainer.style.display = "none";
        signupFormContainer.style.display = "none";
    } else {
        notePad.style.display = "none";
    }
}


