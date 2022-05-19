const fullname = document.forms['regisForm']['fname']
const register = document.forms['regisForm']
const mail = document.forms['regisForm']['Email'] 
const phone = document.forms['regisForm']['Pnum']
const NoG = document.forms['regisForm']['Nguest']
const errorMessage = document.getElementById('error-Message')
const promo = document.forms['regisForm']['Pcode']

regisForm.addEventListener('submit', (e) => {

    let message = []
    let alp = false
    let num = false
    let num2 = false

    for(i = 0; i < fullname.value.length; i++){
        if(fullname.value.charCodeAt(i) >= 97 && fullname.value.charCodeAt(i) <= 122 ){
            alp = true
        } else if(fullname.value.charCodeAt(i) >= 65 && fullname.value.charCodeAt(i) <= 90 ){
            alp = true
        }
    }

    for(j = 0; j < phone.value.length; j++){
        if(phone.value.charCodeAt(j) >= 48 && phone.value.charCodeAt(j) <= 57 ){
            num = true
        }
    }

    for(k = 0; k < NoG.value.length ;k++){
        if(NoG.value.charCodeAt(k) >= 48 && NoG.value.charCodeAt(k) <= 57 ){
            num2 = true
        }
    }

    if (fullname.value === ''){
        message.push('Please fill in your full name!')
    }

    if(alp == false){
        message.push('Full name must contain alphabets only!')
    }

    if(mail.value === ''){
        message.push('Please enter your email!')
    }

    if(mail.value.includes("@gmail.com") == false && mail.value.includes("@yahoo.com") == false){
        message.push("Your email must have @gmail.com or @yahoo.com behind it!")
    }

    if(phone.value === ''){
        message.push('Please enter your phone number!')
    }

    if(num == false){
        message.push("Phone number should contain numbers only!")
    }       
   

    if(NoG.value === ''){
        message.push('Please enter the number of guests!')
    }

    if(num2 == false){
        message.push("Please input number of people in numbers!")
    }

    if(promo.value === ''){

    }else if(promo.value.includes('B2GD') == false && promo.value.includes('C4FR33') == false && promo.value.includes('4FPCK') == false && promo.value.includes('AE4AE') == false){
        message.push("The promo code you entered is wrong!")
    }

    if(message.length > 0){
        e.preventDefault()
        errorMessage.innerText = message[0]
    }
    
})