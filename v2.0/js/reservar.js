const abrirModal = document.querySelector('.reservar');
const modal = document.querySelector('.modal-fondo');
const cerrarModal = document.querySelector('.cerrarModal')

abrirModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal-show');
});

cerrarModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.remove('modal-show');
});

