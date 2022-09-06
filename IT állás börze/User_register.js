window.addEventListener('load', function () {
    document.getElementById('forma').addEventListener('submit', function (e) {
        e.preventDefault();
        if (check());
    });
})

let $ = function (id) {
    return document.getElementById(id);
};

let check = function () {
    $('errSelect').innerHTML = '';
    $('errSelect1').innerHTML = '';
    $('errSelect2').innerHTML = '';
    $('errSelect3').innerHTML = '';
    $('errSelect4').innerHTML = '';
    $('errSelect5').innerHTML = '';
    $('errSelect6').innerHTML = '';



    let isValid = true;

    if ($('user1').value == ''){
        $('errSelect').innerHTML = 'Add meg a vezeték neved!';
        $('errSelect').style.color = "red";
        $('user1').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('errSelect').textContent = "";
        $('user1').style.border = "1px solid black";
    }

    if ($('user2').value == ''){
        $('errSelect1').innerHTML = 'Add meg a kereszt neved!';
        $('errSelect1').style.color = "red";
        $('user2').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('errSelect1').textContent = "";
        $('user2').style.border = "1px solid black";
    }
    if ($('email').value == ''){
        $('errSelect2').innerHTML = 'Add meg az email címed!';
        $('errSelect2').style.color = "red";
        $('email').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('errSelect2').textContent = "";
        $('email').style.border = "1px solid black";
    }
    if ($('Phone').value == ''){
        $('errSelect3').innerHTML = 'Add meg a telefonszámod ';
        $('errSelect3').style.color = "red";
        $('Phone').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('errSelect3').textContent = "";
        $('Phone').style.border = "1px solid black";
    }

    if ($('password').value == ''){
        $('errSelect4').innerHTML = 'Adja meg a jelszavát!';
        $('errSelect4').style.color = "red";
        $('password').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('errSelect4').textContent = "";
        $('password').style.border = "1px solid black";
    }
    if ($('password2').value == ''){
        $('errSelect5').innerHTML = 'Adja meg a jelszavát ujra!';
        $('errSelect5').style.color = "red";
        $('password2').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('errSelect5').textContent = "";
        $('password2').style.border = "1px solid black";
    }

    if ($('birthday').value == ''){
        $('errSelect6').innerHTML = 'Töltse ki születési évét!';
        $('errSelect6').style.color = "red";
        $('birthday').style.border = "1px solid red";
        isValid = false;
    }
    else
    {
        $('errSelect6').textContent = "";
        $('birthday').style.border = "1px solid black";
    }



    return isValid;
};