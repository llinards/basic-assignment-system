//Tiek veikta formas validācija, lai pārbaudītu, ka lietotājs ir ievadījis vārdu un izvēlējies testu
function validate(form) {
    fail = validateUsername(form.lietotajs.value);
    fail += validateTest(form.tests.value);
    if (fail == "") return true;
    else {
        alert(fail);
    }
    return false;
}

//Tiek veikta formas validācija, lai pārbaudītu, ka lietotajs ir atbildējis uz jautājumu
function validateTest(form) {
    fail = validateTestAnswer(form.atbilde.value);

    if (fail == "") return true;
    else {
        alert(fail);
    }
    return false;
}

//Tiek pārbaudīts, vai lietotājs izvēlējās atbildi
function validateTestAnswer(value) {
    if (value == "") {
        return "Izvēlies atbildi!";
    } else {
        return "";
    }
}

// Tiek pārbaudīts lietotājvārds, vai nesatur neatļautus simbolus, nav tukšs vai aizdomīgi īss
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

// Tiek pārbaudīts, vai lietotājs izvēlējās testu
function validateTest(value) {
    if (value == "") {
        return "Izvēlies testu! \n";
    } else {
        return "";
    }
}


//progresa joslas animācija
