function validForm(){
    let email = document.getElementById("Email").value;
    let senha = document.getElementById("Senha").value;
    let perfil = document.getElementById("Perfil").value;

    if (senha == "" || (perfil !=  1 && perfil != 2 ) || !validateEmail(email)){
        if(email != "" && !validateEmail(email))
            alert("Email inválido...");
        else
            alert("Digita as credencais viadão...");
        return false;
    }
}

function validateEmail(value){
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(value).toLowerCase());
}