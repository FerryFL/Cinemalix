
const createFormToggle = document.querySelector(".formCreate");
const editToggle = document.querySelectorAll(".Genre");
const editFormToggle = document.querySelector(".formEdit");

const editInputGenre = document.getElementById('editInputGenre');
const changeEditAction = document.getElementById('formEditGenre');
const changeDeleteAction = document.getElementById('formDeleteGenre');

for (let i = 0; i < editToggle.length; i++) {
    editToggle[i].addEventListener('click', () => {
        editFormToggle.classList.toggle('active');
        createFormToggle.classList.toggle('active');
        editInputGenre.value = editToggle[i].textContent;

        const genreID = event.target.getAttribute('data-genre-id');
        changeEditAction.action = "/genre/edit/" + genreID ;
        changeDeleteAction.action = "/genre/delete/" + genreID;
    });
}
