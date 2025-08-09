function addEventListenersToInputs(){
    console.log("add event listeners");
    document.getElementById("passwordInputAgain").addEventListener("keyup", passwordCheck);
    document.getElementById("passwordInput").addEventListener("keyup", passwordCheck);
}
function passwordCheck(){
    const firstname = document.getElementById("firstnameInput");
    const lastname = document.getElementById("lastnameInput");
    const email = document.getElementById("emailInput");
    const passwd1 = document.getElementById("passwordInput");
    const passwd2 = document.getElementById("passwordInputAgain");
    const regbtn = document.getElementById("registrationSubmit");

    // Jelszavak egyezése
    if(passwd1.value !== passwd2.value ){
        passwd1.classList.add("incorrectPasswd");
        passwd2.classList.add("incorrectPasswd");
    } else {
        passwd1.classList.remove("incorrectPasswd");
        passwd2.classList.remove("incorrectPasswd");
    }

    // Jelszó hossz ellenőrzés
    if(passwd1.value.length < 8 || passwd1.value.length > 12 || passwd2.value.length < 8 || passwd2.value.length > 12){
        document.getElementById("passwdLenghtWarning").style.color =  "rgba(167, 20, 20, 1)";
    } else {
        document.getElementById("passwdLenghtWarning").style.color =  "rgba(6, 148, 11, 1)";
    }

    // Jelszóban szám legyen
    if(!/\d/.test(passwd1.value)){
        document.getElementById("passwdNumberWarning").style.color =  "rgba(167, 20, 20, 1)";
    } else {
        document.getElementById("passwdNumberWarning").style.color =  "rgba(6, 148, 11, 1)";
    }

    // Összes feltétel ellenőrzése - nem üres mezők és jelszavak validak
    const allFilled = 
        firstname.value.trim() !== "" &&
        lastname.value.trim() !== "" &&
        email.value.trim() !== "" &&
        passwd1.value.trim() !== "" &&
        passwd2.value.trim() !== "";

    const passwordsMatch = passwd1.value === passwd2.value;
    const passwordLengthValid = passwd1.value.length >= 8 && passwd1.value.length <= 12;
    const passwordHasNumber = /\d/.test(passwd1.value);

    if(allFilled && passwordsMatch && passwordLengthValid && passwordHasNumber){
        regbtn.disabled = false;  // engedélyezés
    } else {
        regbtn.disabled = true;   // letiltás
    }
}
