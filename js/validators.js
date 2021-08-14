//Validaciones de Campos con Expresiones Regulares

var emptyText         = /^\s*$/; //Vacío
var nameRegex         = /^[a-zA-ZÀ-ÿ\ñ\Ñ\']{1,}(\[a-zA-ZÀ-ÿ\ñ\Ñ\ ])*(\s*[a-zA-ZÀ-ÿ\ñ\Ñ\']*)*[a-zA-ZÀ-ÿ\ñ\Ñ\']+$/; ///^([a-zA-ZÀ-ÿ\ñ\Ñ\'\ ]{2,200})+$/;
var celRegex          = /^(\d)(?!\1+$)\d{7}$/; //12345678
var emailRegex        = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
var edadRegex         = /^[1-9]{1}([0-9]{1})?/;
var alfanumericoRegex = /^[a-zA-ZÀ-ÿ\ñ\Ñ1-9 ]{2,50}$/;
var completeRegex     = /^[a-zA-ZÀ-ÿ\ñ\Ñ0-9\.\,\"\'\;\:\-\¡\!\¿\?\(\) ]{2,342}$/;

//Retornan True si cumplen con la expresión

function valEmptyField(field)
{
    return (emptyText.test(field));
}

function valName(name)
{
    return (nameRegex.test(name));
}

function valCel(cel)
{
    return (celRegex.test(cel));
}

function valEmail(email)
{
    return (emailRegex.test(email));
}

function valEdad(edad)
{
    return (edadRegex.test(edad));
}

function valAlfanumerico(texto)
{
    return (alfanumericoRegex.test(texto));
}

function valCompleteText(texto)
{
    return (completeRegex.test(texto)); 
}