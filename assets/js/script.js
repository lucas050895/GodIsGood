// SCRIPT PARA LA CARGA AUTOMATICA DE HORAS DEL BARBERO

document.addEventListener("DOMContentLoaded", () => {
    const barberSelect = document.getElementById("barber");
    const dateInput = document.getElementById("date");
    const hourSelect = document.getElementById("hour");

    function loadHours() {
        const barber = barberSelect.value;
        const date = dateInput.value;
        if (!barber || !date) return;

        fetch(`../functions/hours.php?barber=${encodeURIComponent(barber)}&date=${encodeURIComponent(date)}`)
            .then(res => res.json())
            .then(data => {
                hourSelect.innerHTML = '<option value="" selected disabled>Seleccionar</option>';
                data.forEach(h => {
                    const opt = document.createElement("option");
                    opt.value = h.hora; // esto será HH:MM:SS
                    opt.textContent = h.hora.substring(0,5) + (h.disponible ? " ✅" : " ❌");
                    if (!h.disponible) {
                        opt.disabled = true;
                        opt.classList.add("hora-inhabilitada");
                    } else {
                        opt.classList.add("hora-habilitada");
                    }
                    hourSelect.appendChild(opt);
                });
            })
            .catch(err => console.error("Error al cargar horarios:", err));
    }

    barberSelect.addEventListener("change", loadHours);
    dateInput.addEventListener("change", loadHours);

    if (barberSelect.value && dateInput.value) {
        loadHours();
    }
});