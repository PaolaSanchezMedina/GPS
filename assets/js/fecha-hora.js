function actualizarFechaHora() {
    var fecha = new Date();
    var opcionesFecha = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    var opcionesHora = { hour: 'numeric', minute: 'numeric'};
    var fechaFormateada = fecha.toLocaleDateString('es-ES', opcionesFecha);
    var horaFormateada = fecha.toLocaleTimeString('es-ES', opcionesHora);
    var fechaHoraFormateada = fechaFormateada + ' ' + horaFormateada;
    document.getElementById('fecha-hora').textContent = fechaHoraFormateada;
}
setInterval(actualizarFechaHora, 100);