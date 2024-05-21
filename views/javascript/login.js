const passwordField = document.getElementById("password_field");
const eyeIcon = document.getElementById("eye_icon");
const input_eye = document.getElementById("input_eye");

input_eye.addEventListener("click",  () =>{
    console.log('El evento click está funcionando');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        eyeIcon.src = '../assets/icons/ojoAbierto.svg';
    } else {
        passwordField.type = 'password';
        eyeIcon.src = '../assets/icons/ojoCerrado.svg';
    }
});