const container = document.getElementById('container'),
main = document.getElementById('main'),
forgotPass = document.getElementById('esqueciSenha'),
enviar = document.getElementById('enviar'),
back = document.getElementById('voltar'),
text = document.getElementById('emailTextBox'),
lblRegistrar = document.getElementById('lblRegistrar'),
lblLogin = document.getElementById('lblLogin'),
loginEmail = document.getElementById('loginEmail'),
loginSenha = document.getElementById('loginSenha'),
btnLogin = document.getElementById('btnLogin'),
containerReset = document.getElementById('containerReset'),
codiContainerValidation = document.getElementById('codiContainerValidation'),
voltarRedefinir = document.getElementById('voltarRedefinir');


if(container.classList.contains("inactive-dx"))
{
    enviar.disabled = true;
    enviar.style.cursor = "default";
    text.disabled = true;
    text.style.cursor = "dafault";
}

forgotPass.addEventListener("click", () => {
    main.classList.add("inactive-sx");
    main.classList.remove("active-sx");
    container.classList.remove("inactive-dx");
    container.classList.add("active-dx");
    enviar.removeAttribute('style');
    text.removeAttribute('disabled');
    text.removeAttribute('style');
    lblRegistrar.disabled = true;
    lblRegistrar.style.cursor = "default";
    lblLogin.disabled = true;
    lblLogin.style.cursor = "dafault";
    loginEmail.disabled = true;
    loginEmail.style.cursor = "dafault";
    loginSenha.disabled = true;
    loginSenha.style.cursor = "dafault";
    btnLogin.disabled = true;
    forgotPass.disabled = true;
})

back.addEventListener("click", () => {
    main.classList.add("active-sx");
    main.classList.remove("inactive-sx");
    container.classList.remove("active-dx");
    container.classList.add("inactive-dx");
    enviar.disabled = true;
    enviar.style.cursor = "default";
    text.disabled = true;
    text.style.cursor = "dafault";
    lblRegistrar.removeAttribute('disabled');
    lblRegistrar.removeAttribute('style');
    lblLogin.removeAttribute('disabled');
    lblLogin.removeAttribute('style');
    loginEmail.removeAttribute('disabled');
    loginEmail.removeAttribute('style');
    loginSenha.removeAttribute('disabled');
    loginSenha.removeAttribute('style');
    btnLogin.removeAttribute('disabled');
    forgotPass.removeAttribute('disabled');
})
back.addEventListener("click", () => {
    containerReset.style.display = "none";
    main.classList.add("active-sx");
    main.classList.remove("inactive-sx");
    container.classList.remove("active-dx");
    container.classList.add("inactive-dx");
    enviar.disabled = true;
    enviar.style.cursor = "default";
    text.disabled = true;
    text.style.cursor = "dafault";
    lblRegistrar.removeAttribute('disabled');
    lblRegistrar.removeAttribute('style');
    lblLogin.removeAttribute('disabled');
    lblLogin.removeAttribute('style');
    loginEmail.removeAttribute('disabled');
    loginEmail.removeAttribute('style');
    loginSenha.removeAttribute('disabled');
    loginSenha.removeAttribute('style');
    btnLogin.removeAttribute('disabled');
    forgotPass.removeAttribute('disabled');
})
voltarRedefinir.addEventListener("click", () => 
{
    containerReset.style.display = "none";
})
const backSentEmail = document.getElementById('backSentEmail');
backSentEmail.addEventListener("click", () =>
{
    codiContainerValidation.style.display = "none";
})

const emailTextBox = document.getElementById('emailTextBox');
enviar.addEventListener("click", () => 
{
    //codiContainerValidation.removeAttribute('style');
    document.getElementById('emailPreenchido').innerHTML = emailTextBox.value;
})

const sentCodeValidation = document.getElementById('sentCodeValidation');
sentCodeValidation.addEventListener("click", () => 
{
    containerReset.removeAttribute('style');
})

function showPass() 
{
    const txtSenha = document.getElementById('txtSenha'),
    iconEye = document.getElementById('iconEye');
    if (txtSenha.type === "password") 
    {
        txtSenha.type = "text";
        iconEye.classList.remove("fa-eye");
        iconEye.classList.add("fa-eye-slash");
    } 
    else 
    {
        txtSenha.type = "password";
        iconEye.classList.remove("fa-eye-slash");
        iconEye.classList.add("fa-eye");
    }
}

function showPassLogin() 
{
    const loginSenha = document.getElementById('loginSenha'),
    iconEyeLogin = document.getElementById('iconEyeLogin');
    if (loginSenha.type === "password") 
    {
        loginSenha.type = "text";
        iconEyeLogin.classList.remove("fa-eye");
        iconEyeLogin.classList.add("fa-eye-slash");
    } 
    else 
    {
        loginSenha.type = "password";
        iconEyeLogin.classList.remove("fa-eye-slash");
        iconEyeLogin.classList.add("fa-eye");
    }
}

const code1 = document.getElementById('code1'),
code2 = document.getElementById('code2'),
code3 = document.getElementById('code3'),
code4 = document.getElementById('code4'),
code5 = document.getElementById('code5');

code1.addEventListener("keyup", function ()
{
    code1.addEventListener("click", function ()
    {
        this.setSelectionRange(0, this.value.length);
    })
    this.setSelectionRange(0, this.value.length);
    code2.focus();
    if(event.which == 8 || event.which == 37)
    {
        code1.focus();
    }
})
code2.addEventListener("keyup", function ()
{
    code2.addEventListener("click", function ()
    {
        this.setSelectionRange(0, this.value.length);
    })
    this.setSelectionRange(0, this.value.length);
    code3.focus();
    if(event.which == 8 || event.which == 37)
    {
        code1.focus();
    }
})
code3.addEventListener("keyup", function ()
{
    code3.addEventListener("click", function ()
    {
        this.setSelectionRange(0, this.value.length);
    })
    this.setSelectionRange(0, this.value.length);
    code4.focus();
    if(event.which == 8 || event.which == 37)
    {
        code2.focus();
    }
})
code4.addEventListener("keyup", function ()
{
    code4.addEventListener("click", function ()
    {
        this.setSelectionRange(0, this.value.length);
    })
    this.setSelectionRange(0, this.value.length);
    code5.focus();
    if(event.which == 8 || event.which == 37)
    {
        code3.focus();
    }
})
code5.addEventListener("keyup", function ()
{
    code5.addEventListener("click", function ()
    {
        this.setSelectionRange(0, this.value.length);
    })
    this.setSelectionRange(0, this.value.length);
    if(event.which == 8 || event.which == 37)
    {
        code4.focus();
    }
})