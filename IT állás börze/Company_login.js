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

    let isValid = true;



    if ($('email').value == ''){
        $('email').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('email').style.border = "";
    }

    if ($('company_password').value == ''){
        $('company_password').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('company_password').style.border = "";
    }


    return isValid;
};