async function cargarHorasInhabilitadas(fecha) {
    const response = await fetch(`horas_inhabilitadas.php?fecha=${fecha}`);
    const horasInhabilitadas = await response.json();
    const horaInput = document.getElementById('hora');
    horaInput.innerHTML = ''; // Limpiar opciones anteriores

    const horaInicio = 10; // Hora inicial (10:00)
    const horaFin = 21; // Hora final (21:00)

    for (let i = horaInicio; i <= horaFin; i++) {
        const hora = `${i.toString().padStart(2, '0')}:00`;
        const option = document.createElement('option');
        option.value = hora;
        option.text = hora;
        if (horasInhabilitadas.includes(hora)) {
            option.disabled = true; // Deshabilitar hora ocupada
        }
        horaInput.appendChild(option);
    }
}

document.getElementById('fecha').addEventListener('change', function() {
    cargarHorasInhabilitadas(this.value);
});