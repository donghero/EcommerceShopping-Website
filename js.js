function openmenu()
{
    document.getElementById("side-menu").style.display="block";
    document.getElementById("menu-btn").style.display="none";
    document.getElementById("close-btn").style.display="block";
}

function closemenu()
{
    document.getElementById("side-menu").style.display="none";
    document.getElementById("menu-btn").style.display="block";
    document.getElementById("close-btn").style.display="none";
}



function show_password() {
    let x = document.getElementById("password");
    let y = document.getElementById("hide1");
    let z = document.getElementById("hide2");
    if (x.type === "password") {
        x.type = "text";
        y.style.display ="none";
        z.style.display="block";
    } else {
        x.type = "password";
        y.style.display ="block";
        z.style.display="none";
    }
}

function show_password2() {
    let x = document.getElementById("password2");
    let y = document.getElementById("hide1_1");
    let z = document.getElementById("hide2_2");
    if (x.type === "password") {
        x.type = "text";
        y.style.display ="none";
        z.style.display="block";
    } else {
        x.type = "password";
        y.style.display ="block";
        z.style.display="none";
    }
}



