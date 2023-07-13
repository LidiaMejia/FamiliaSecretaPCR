//Validaciones de Campos con Expresiones Regulares

var emptyText         = /^\s*$/; //Vacío
var IdentidadRegex    = /^(\d)(?!\1+$)\d{12}$/; //0801199200123
var nameRegex         = /^[a-zA-ZÀ-ÿ\ñ\Ñ\']{1,}(\[a-zA-ZÀ-ÿ\ñ\Ñ\ ])*(\s*[a-zA-ZÀ-ÿ\ñ\Ñ\']*)*[a-zA-ZÀ-ÿ\ñ\Ñ\']+$/;
var namePointRegex    = /^[a-zA-ZÀ-ÿ\ñ\Ñ\'\.]{1,}(\[a-zA-ZÀ-ÿ\ñ\Ñ\ ])*(\s*[a-zA-ZÀ-ÿ\ñ\Ñ\'\.]*)*[a-zA-ZÀ-ÿ\ñ\Ñ\'\.]+$/;
var celRegex          = /^(\d)(?!\1+$)\d{7}$/; //12345678
var emailRegex        = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
var edadRegex         = /^[1-9]{1}([0-9]{1})?/;
var placaVehiculoRegex = /^[a-zA-Z]{3}[1-9]{3,4}$/;
var alfanumericoRegex = /^[a-zA-ZÀ-ÿ\ñ\Ñ1-9 ]{2,50}$/;
var completeRegex     = /^[a-zA-ZÀ-ÿ\ñ\Ñ0-9\.\,\"\'\;\:\-\¡\!\¿\?\(\) ]{2,342}$/;

//Retornan True si cumplen con la expresión

function valEmptyField(field)
{
    return (emptyText.test(field));
}

function valIdentidad(identidad, munis)
{
    formatoValido = false;
    muniValido    = false;
    AnioValido    = false;

    municipioNacimiento = identidad.substring(0, 4);
    AnioNacimiento      = parseInt(identidad.substring(4, 8));

    //Validar que sean solo números y que sean exactamente 13
    if(IdentidadRegex.test(identidad))
    {
        formatoValido = true;
    }

    //Validar Código de Municipio
    for(let i=0; i<munis.length; i++)
    {
        if(municipioNacimiento == munis[i]["codigo_municipio"])
        {
            muniValido = true;
            i          = munis.length;
        }
    }

    //Validar Año de Nacimiento (De 5 a 105 años)
    if(AnioNacimiento >= 1917 && AnioNacimiento <= 2017)
    {
        AnioValido = true;
    }

    //Solo si todo es correcto se envía true
    if(formatoValido && muniValido && AnioValido)
    {
        return true;
    }
    else
    {
        return false;
    }
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

function valPlacaVehiculo(placa)
{
    return (placaVehiculoRegex.test(placa));
}

function valNamePoint(text)
{
    return (namePointRegex.test(text));
}

function valAlfanumerico(texto)
{
    return (alfanumericoRegex.test(texto));
}

function valCompleteText(texto)
{
    return (completeRegex.test(texto)); 
}