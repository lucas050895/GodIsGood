function dateSelect() {
    const fechaInput = document.getElementById('date');
    const fechaSeleccionada = fechaInput.value;
    loadHoursDisabled(fechaSeleccionada);
}

async function loadHoursDisabled(fecha) {
    try {
        const response = await fetch(`../functions/disabled.php?date=${fecha}`);
        if (!response.ok) {
            throw new Error('Error al cargar las horas inhabilitadas.');
        }
        const hourDisabled = await response.json();
        const hourSelect = document.getElementById('hour');

        hourSelect.innerHTML = '<option value="" selected disabled>Seleccionar</option>';

        const horaInicio = 10;
        const horaFin = 21;

        for (let i = horaInicio; i <= horaFin; i++) {
            const hora = `${i.toString().padStart(2, '0')}:00`;
            const option = document.createElement('option');
            option.value = hora;
            option.text = hora.substring(0, 5);
            
            if (hourDisabled.includes(hora.substring(0, 5))) {
                option.disabled = true;
                option.classList.add('hora-inhabilitada');
            } else {
                option.classList.add('hora-habilitada');
            }
            
            hourSelect.appendChild(option);
        }
    } catch (error) {
        console.error('Ha ocurrido un error:', error);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    dateSelect();
});
