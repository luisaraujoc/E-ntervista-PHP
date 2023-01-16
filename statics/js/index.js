// login função
function login() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if (email == "" || password == "") {
        alert("Preencha todos os campos");
    }else{
        // ajax request para o php
        $.ajax({
            url: 'Services/login.php',
            type: 'POST',
            data: {email: email, password: password},
            success: function(data) {
                if (data == "success") {
                    window.location.href = "home.php";
                }else{
                    alert(data);
                }
            },
            error: function(data) {
                alert("Ocorreu um erro ao tentar logar");
            }
        });
    }
}

// registrar função
function registrar() {
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;   
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;


    // 

    if (firstname == "" || lastname == "" || email == "" || password == "" || password2 == "") {
        alert("Preencha todos os campos");
    }else{
        if (password != password2) {
            alert("As senhas não correspondem");
        }else{
            // veficar se o email já existe
            $.ajax({
                url: 'Services/verificarEmail.php',
                type: 'POST',
                data: {email: email},
                success: function(data) {
                    if (data == "success") {
                        // ajax request para o php
                        $.ajax({
                            url: 'Services/registrar.php',
                            type: 'POST',
                            data: {firstname: firstname, lastname: lastname, email: email, password: password},
                            success: function(data) {
                                if (data == "success") {
                                    window.location.href = "index.php";
                                }else{
                                    alert(data);
                                }
                            },
                            error: function(data) {
                                alert("Tente novamente");
                            }
                        });
                    }else{
                        alert(data);
                    }
            }
        })
    }
    }
}