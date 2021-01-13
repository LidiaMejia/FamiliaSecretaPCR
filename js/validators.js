//Validaciones de Campos con Expresiones Regulares

var emptyText = /^\s*$/; //Vacío
var nameRegex = /^[A-Za-zÁÉÍÓÚáéíóúüñÑ ]+$/;
var celRegex = /[0-9]{4}[0-9]{4}/; //12345678
var emailRegex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
var edadRegex = /^[0-9]{1,2}$/;

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