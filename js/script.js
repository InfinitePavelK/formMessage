const emailRegExp = /^(([^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*)|(".+"))@(([^<>()[\].,;:\s@"]+\.)+[^<>()[\].,;:\s@"]{2,})$/iu;
const nameRegExp = /[а-яА-Я]{2,}/;
const phoneRegExp = /^\+?[78][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$/;

const emailInput = document.getElementsByName('senderEmail')[0];
const nameInput = document.getElementsByName('senderName')[0];
const phoneInput = document.getElementsByName('senderPhone')[0];
const sendForm = document.getElementsByClassName('sendMessage')[0];
const sendButton = document.getElementsByName('send')[0];
let borderColor = emailInput.style.borderColor;
let flags = {
    name: false,
    phone: false,
    email: false
}

async function isEmailNotExist() {
    let data = new FormData();
    data.set('emailSearch', emailInput.value);
    let response = await fetch('vendor/functions.php', {
        method: 'POST',
        body: data
    });
    let result = await response.text();
    return result;
}

function isInputCorrect(regExp, inputName, flagName){
    if(regExp.test(inputName.value) && inputName != ''){
        inputName.style.borderColor = borderColor;
        flags[flagName] = true;
    } else {
        inputName.style.borderColor = 'red';
        flags[flagName] = false;
    }
}

function visibilitySendButton(){
    for (const key in flags) {
        if(!flags[key]){
            console.log(sendButton.style.display);
            sendButton.style.display = "none";
            return;
        }
    }
    sendButton.style.display = "block";
}

emailInput.addEventListener('input', function(){
    isInputCorrect(emailRegExp, emailInput, 'email');
    if(flags['email']){
        isEmailNotExist().then(function(value){
            if(value){
                emailInput.style.borderColor = borderColor;
                flags['email'] = true;
            } else {
                emailInput.style.borderColor = 'red';
                flags['email'] = false;
            }
            visibilitySendButton();
        });
    } else {
        visibilitySendButton();
    }
    
});

nameInput.addEventListener('input', function(){
    isInputCorrect(nameRegExp, nameInput, 'name');
    visibilitySendButton();
});

phoneInput.addEventListener('input', function(){
    isInputCorrect(phoneRegExp, phoneInput, 'phone');
    visibilitySendButton();
});

sendForm.addEventListener('submit', function(event){
    for (const key in flags) {
        if(!flags[key]){
            event.preventDefault();
            alert('Заполните все поля правильно');
            break;
        }
    }
});