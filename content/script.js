const darkModeToggler = document.querySelector(".theme");
const light_theme = document.querySelector(".light__mode");
const dark_theme = document.querySelector(".dark__mode");
const darkMode = localStorage.getItem("darkMode");

// Set Dark Mode
const enableDarkMode = () => {
    document.body.classList.add("darkmode");
    dark_theme.style.display = "block";
    light_theme.style.display = "none";
    // document.querySelector(".aside__container").style.backgroundColor = "#343541";
    // document.querySelector(".heading").style.color = "#eee";
    // document.querySelector(".content__form").style.color = "#eee";
    // document.querySelector("body").style.backgroundColor = "#343541";
    darkMode = localStorage.setItem("darkMode", "enabled")
}

// Disable Dark Mode
const disableDarkMode = () => {
    document.body.classList.remove("darkmode");
    light_theme.style.display = "block";
    dark_theme.style.display = "none";
    darkMode = localStorage.setItem("darkMode", null)
}

// Add Event Listener
darkModeToggler.addEventListener("click", () => {
    let darkMode = localStorage.getItem("darkMode");
    if (darkMode !== "enabled")
        enableDarkMode();
    else {
        disableDarkMode();
    }
})

// Save Dark Mode History
// if (darkMode === "enabled") {
//     enableDarkMode();
// }

