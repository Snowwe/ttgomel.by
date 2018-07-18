<!-- проверка формы. Начало -->
function checkForm(form) {
    let name = form.name.value;
    let n = name.match(/^[A-Za-zА-Яа-я ]*[A-Za-zА-Яа-я ]+$/);
    if (!n) {
        alert("Имя введено неверно, пожалуйста исправьте ошибку");
        return false;
    }
    let phone = form.phone.value;
    let p = phone.match(/^[0-9+][0-9- ]*[0-9- ]+$/);
    if (!p) {
        alert("Телефон введен неверно");
        return false;
    }
    let mail = form.mail.value;
    let m = mail.match(/^[A-Za-z0-9][A-Za-z0-9\._-]*[A-Za-z0-9_]*@([A-Za-z0-9]+([A-Za-z0-9-]*[A-Za-z0-9]+)*\.)+[A-Za-z]+$/);
    if (!m) {
        alert("E-mail введен неверно, пожалуйста исправьте ошибку");
        return false;
    }
    return true;
}

<!-- проверка формы. Конец -->


function flashit() {
    if (contactTelName.style.background == "url(\"/images/whatsapp_viber_telegram_1.jpg\") 130px top no-repeat") {
        contactTelName.style.background = '';
    }
    else {
        contactTelName.style.background = "url(\"/images/whatsapp_viber_telegram_1.jpg\") no-repeat";
        contactTelName.style.backgroundPosition="130px top";
    }
}

setInterval("flashit()", 1200);