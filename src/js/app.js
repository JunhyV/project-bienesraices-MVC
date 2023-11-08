//Variables
const barra = document.querySelector('.navegacion__barra');
const darkmode = document.querySelector('.navegacion__darkmode');
const legends = document.querySelectorAll('.legend');
const contactar = document.querySelectorAll('input[name="contacto[contactar]"]');
const formaContactar = document.querySelector('.contacto__forma');

//Cargar DOM
document.addEventListener('DOMContentLoaded', () => {
    eventListeners();
})
contactar.forEach(input => input.addEventListener('click', mostrarContacto))

//Set Eventos
function eventListeners() {
    barra.addEventListener('click', mostrarOpciones);
    darkmode.addEventListener('click', cambiarModo);
}

//Funciones
function mostrarOpciones(){
    const opciones = document.querySelector('.navegacion__ul');
    opciones.classList.toggle('aparecer');
}
function cambiarModo() {
    document.body.classList.toggle('darkmode');
    legends.forEach(e => e.classList.toggle('legend__darkmode'));
}
function mostrarContacto(e){
    formaContactar.innerHTML = "";
    

    if (e.target.value === "telefono") {
        formaContactar.innerHTML = `
        <label for="telefono">TELÉFONO</label>
        <input required type="number" name="contacto[telefono]" id="telefono" placeholder="Tu Teléfono" />
        <label for="fecha">FECHA</label>
        <input required type="date" name="contacto[fecha]" id="fecha" />
        <label for="hora">HORA</label>
        <input required type="time" name="contacto[hora]" id="hora" />
        `;
    } else {
        formaContactar.innerHTML = `
        <label for="email">EMAIL</label>
        <input required type="text" name="contacto[email]" id="email" placeholder="Tu Email" />
        `;
    }
}
