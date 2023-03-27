const password = document.getElementById("password");
const email = document.getElementById("email");

// Email validation
email.addEventListener("input", () => {
    const emailRegExFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    const found = emailRegExFormat.test(email.value);

    if ( found ) 
        email.style.outline = "1px solid green";
    else
        email.style.outline = "1px solid orangered";
})

// Password validation
password.addEventListener("input", () => {
    const passwordRegExFormat = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-])?.{8,}$/;
    const found = passwordRegExFormat.test(password.value);

    if ( !found )
        password.style.outline = "1px solid orangered";
    else 
        password.style.outline = "1px solid green";
})
