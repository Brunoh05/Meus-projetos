const form = document.getElementById('form');
const tele = document.getElementById("telefone");
const valor = document.getElementById("mensalidade");
const desc = document.getElementById("descricao");
const imgInput = document.getElementById("imagem");

form.addEventListener("submit", (e) => {

    const teleValue = tele.value;
    const valorValue = valor.value;
    const descValue = desc.value;
    const imgFiles = imgInput.files;

    if (teleValue == "" || teleValue == null) {
        e.preventDefault();
        setErroFor(tele, "* PREENCHA ESTE CAMPO *");
    } else if (teleValue.length !== 12 || isNaN(Number(teleValue))) {
        e.preventDefault();
        setErroFor(tele, "* ESTE CAMPO DEVE TER 12 DIGITOS NÚMERICOS *");
    } else {
        setErroFor(tele, "");
        setSuccessFor(tele);
    }

    if (valorValue == "" || valorValue == null) {
        e.preventDefault();
        setErroFor(valor, "* PREENCHA ESTE CAMPO *");
    } else if (isNaN(Number(valorValue))) {
        e.preventDefault();
        setErroFor(valor, "* ESTE CAMPO DEVE APENAS DIGITOS NÚMERICOS *");
    } else {
        setErroFor(valor, "");
        setSuccessFor(valor);
    }

    if (descValue == "" || descValue == null) {
        e.preventDefault();
        setErroFor(desc, "* PREENCHA ESTE CAMPO *");
    } else if (descValue.length > 500){
        e.preventDefault();
        setErroFor(desc, "* LIMITE DE DIGITOS ULTRAPASSADO *");
    }
     else {
        setErroFor(desc, "");
        setSuccessFor(desc);
    }

    if (imgFiles.length === 0) {
        e.preventDefault();
        setErroFor(imgInput, "* SELECIONE UM ARQUIVO *");
    } else {
        setErroFor(imgInput, "");
        setSuccessFor(imgInput);
    }

    function setErroFor(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector("small");

        small.innerText = message;

        formControl.className = "erro";
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;

        formControl.className = "sucesso";
    }
});




