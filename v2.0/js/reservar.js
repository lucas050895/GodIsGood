const abrirModal = document.querySelector('.turno');
const modal = document.querySelector('.fondoModal');
const cerrarModal = document.querySelector('.cierreModal')

abrirModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal-show');
});

cerrarModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.remove('modal-show');
});

