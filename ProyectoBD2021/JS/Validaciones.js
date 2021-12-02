

function CampoVacio(dato) 
{
	var bandera = false;

	if(dato.length == 0)
	{ 
		bandera = true;
	}

	return bandera; 
}

function Numerico(dato)
{
  var bandera = false;

    if (/^([0-9])*$/.test(dato)) 
    {
      bandera = true;
    }

  return bandera;
}

function Correo(dato)
{
	var bandera = false;
	
    if (/^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i.test(dato)) 
    {
      bandera = true;
	  }
	return bandera; 
}

/*-----------------------------------------------------------------------------------------------------------*/

function NumerosLetras(e)
{
  key = e.keyCode || e.which;

  teclado = String.fromCharCode(key).toLowerCase();
  letras = "0123465789 qwertyuiopasdfghjklzxcvbnmñéúíóá , . ' ";
  tecladoSpecial = false;

  if(letras.indexOf(teclado) == -1 && !tecladoSpecial)
  {
    return false;
  }
}

function Numeros(e)
{
  key = e.keyCode || e.which;

  teclado = String.fromCharCode(key).toLowerCase();
  letras = "0123465789";
  tecladoSpecial = false;

  if(letras.indexOf(teclado) == -1 && !tecladoSpecial)
  {
    return false;
  }
}

function Letras(e)
{
  key = e.keyCode || e.which;

  teclado = String.fromCharCode(key).toLowerCase();
  letras = " qwertyuiopasdfghjklzxcvbnmñéúíóá ' ";
  tecladoSpecial = false;

  if(letras.indexOf(teclado) == -1 && !tecladoSpecial)
  {
    return false;
  }
}

function caracteres(e){
  key = e.keyCode || e.which;

  teclado = String.fromCharCode(key).toLowerCase();
  letras = "~`<>^";
  tecladoSpecial = false;

  if(letras.indexOf(teclado) != -1 && tecladoSpecial){
    return false;
  }
}

















