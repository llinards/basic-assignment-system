function validate(form) {
    fail = validateUsername(form.lietotajs.value);
    fail += validateTest(form.tests.value);

    if (fail == "") return true;
    else {
        alert(fail);
    }
    return false;
}

function validateTest(form) {
    fail = validateTestAnswer(form.atbilde.value);

    if (fail == "") return true;
    else {
        alert(fail);
    }
    return false;
}

function validateTestAnswer(value) {
    if (value == "") {
        return "Izvēlies atbildi!";
    } else {
        return "";
    }
}


function validateUsername(value) {
    if (value == "") {
        return "Lūdzu ievadi savu vārdu! \n";
    } else if (value.length < 3) {
        return "Vārdā jābūt vismaz 3 simboliem. \n";
    } else if (/[^a-zA-Z]/.test(value)) {
        return "Tikai a-z, A-Z simobli ir atļauti. \n";
    } else {
        return "";
    }
}

function validateTest(value) {
    if (value == "") {
        return "Izvēlies testu! \n";
    } else {
        return "";
    }
}