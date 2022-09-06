window.addEventListener('load', function () {
    document.getElementById("form").addEventListener('submit', function (e) {
        e.preventDefault();
        if (check());
    });
})

let $ = function (id) {
    return document.getElementById(id);
};

let check = function () {
    $('errSelect').innerHTML = '';

    let isValid = true;

    if ($('company_name').value == ''){
        $('company_name').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('company_name').style.border = "";
    }

    if ($('web').value == ''){
        $('web').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('web').style.border = "";
    }

    if ($('address').value == ''){
        $('address').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('address').style.border = "";
    }

    if ($('description').value == ''){
        $('description').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('description').style.border = "";
    }

    if ($('email').value == ''){
        $('email').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('email').style.border = "";
    }

    if ($('password').value == ''){
        $('password').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('password').style.border = "";
    }

    if ($('phone').value == ''){
        $('phone').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('phone').style.border = "";
    }
    if (isNaN($('phone').value)){
        $('errSelect2').innerHTML = 'Csak számokat vihet be!';
        $('errSelect2').style.color = "red";
        $('phone').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('errSelect1').textContent = "";
        $('phone').style.border = "";
    }


    return isValid;
};