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

    if ($('category').value == ''){
        $('category').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('category').style.border = "";
    }

    if ($('description').value == ''){
        $('description').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('description').style.border = "";
    }

    if ($('money').value == ''){
        $('money').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('money').style.border = "";
    }

    if ($('address').value == ''){
        $('address').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('address').style.border = "";
    }

    return isValid;
};