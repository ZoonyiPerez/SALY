const inputs = document.querySelectorAll('input');
const button = document.querySelector('.disabled');
const error = document.querySelector('.error');
let text = false;
let pass1 = false;
let pass2 = false;

function verifyPassword(texto) {
    // Usamos expresiones regulares para verificar la complejidad
    var mayuscula = /[A-Z]/;
    var minuscula = /[a-z]/;
    var numero = /[0-9]/;
    var especial = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/;

    // Verificamos si el texto cumple con los requisitos
    var tieneMayuscula = mayuscula.test(texto);
    var tieneMinuscula = minuscula.test(texto);
    var tieneNumero = numero.test(texto);
    var tieneEspecial = especial.test(texto);

    // Devolvemos true si cumple con todos los requisitos
    return tieneMayuscula && tieneMinuscula && tieneNumero && tieneEspecial;
}

const activateForm = () => {
    let activate = false;
    if (inputs.length == 4) {
        if (text && pass1 && pass2) activate = true;
        else activate = false;
    } else {
        if (text && pass1) activate = true;
        else activate = false;

    }
    if (activate) {
        button.removeAttribute('disabled');
        button.classList.add('button');
    } else {
        button.classList.remove('button');
        button.setAttribute('disabled', 'true');
        console.log('hola 2');
    }
}

const verifyForm = e => {
    if (inputs[0].value != '') text = true;
    else text = false;
    if (inputs[1].value != '') pass1 = true;
    else pass1 = false;
    if (inputs.length == 4) {
        if (verifyPassword(inputs[1].value)) {
            pass1 = true;
        } else {
            error.classList.remove('hidden');
            error.innerHTML = 'las contraseñas deben tener un caracter especial, un numero, mayuscula';
            pass1 = false;
        }
        if (verifyPassword(inputs[2].value)) pass2 = true;
        else pass2 = false;
        if (inputs[1].value != inputs[2].value) {
            error.classList.remove('hidden');
            error.innerHTML = 'las contraseñas no coinciden';
            pass1 = false;
        } else {
            error.classList.add('hidden');
            pass1 = true;
        }
    }
    activateForm();
}



inputs.forEach(i => i.addEventListener('input', verifyForm));
console.log(inputs.length);
