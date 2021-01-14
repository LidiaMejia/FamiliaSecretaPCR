//Validaciones de Campos con Expresiones Regulares

var emptyText  = /^\s*$/; //Vacío
var nameRegex  = /^[a-zA-ZÀ-ÿ\ñ\Ñ\']{1,}(\[a-zA-ZÀ-ÿ\ñ\Ñ\ ])*(\s*[a-zA-ZÀ-ÿ\ñ\Ñ\']*)*[a-zA-ZÀ-ÿ\ñ\Ñ\']+$/; ///^([a-zA-ZÀ-ÿ\ñ\Ñ\'\ ]{2,200})+$/;
var celRegex   = /^(\d)(?!\1+$)\d{7}$/; //12345678
var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
var edadRegex  = /^[1-9]{1}([0-9]{1})?/;

function valEmptyField(field)
{
    return (emptyText.test(field)); //true si está vacío
}

function valName(name)
{
    return (nameRegex.test(name)); //true si está bien escrito
}

function valCel(cel)
{
    return (celRegex.test(cel)); //true si está bien escrito
}

function valEmail(email)
{
    return (emailRegex.test(email)); //true si está bien escrito
}

function valEdad(edad)
{
    return (edadRegex.test(edad)); //true si está bien escrito
}