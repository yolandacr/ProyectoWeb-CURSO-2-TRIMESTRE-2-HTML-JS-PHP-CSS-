const botonAceptarCookies = document.getElementById('btn-aceptar-cookies');
const avisoCookies = document.getElementById('aviso-cookies');
const fondoAvisoCookies = document.getElementById('fondo-aviso-cookies');

dataLayer = [];

// este codigo controla si la ventanita de cookies aparecerá o no según si el usuario las haya aceptado o no, guardándose su elección en localstorage


//si no hay algo guardado en localstorage
if(!localStorage.getItem('cookies-aceptadas')){
	avisoCookies.classList.add('activo');
	fondoAvisoCookies.classList.add('activo');
} 
//si hay algo guardado porque ya las ha aceptado y queremos ejecutar el código de Google Analytics
else {
	dataLayer.push({'event': 'cookies-aceptadas'});
}

botonAceptarCookies.addEventListener('click', () => {
	avisoCookies.classList.remove('activo');
	fondoAvisoCookies.classList.remove('activo');

    // se almacena en localstorage que hemos pulsado el botón de "de acuerdo"

	localStorage.setItem('cookies-aceptadas', true);

    //ejecuta el evento que hemos personalizado en nuestro Google Tag Manager que ejecuta un script de Google Analytics al aceptar cookies.

	dataLayer.push({'event': 'cookies-aceptadas'});
});