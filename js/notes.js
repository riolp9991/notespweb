const isEditting = document.querySelector("#isEditting");
const createButton = document.querySelector("#create");
const float = document.querySelector(".float-form");

const isEdittin = document.querySelector("#isEditting");
const nameText = document.querySelector("#nameText");
const textText = document.querySelector("#textText");

const floatTitle = document.querySelector("#floatTitle");

console.log(nameText);
console.log(textText);

const editButtons = document.querySelectorAll("#editButton");
console.log(editButtons);

createButton.addEventListener("click", () => {
	float.classList.toggle("active");
	isEditting.value = "false";
	floatTitle.innerHTML = "Crear Nota";
});

if(document.querySelector("#cancelCreate")){
document.querySelector("#cancelCreate").addEventListener("click", (e) => {
	e.preventDefault();
	nameText.value = "";
	textText.value = "";
	isEditting.value = "false";
	float.classList.toggle("active");
	floatTitle.innerHTML = "Crear Nota";
})
}

const idInput = document.querySelector("#noteID");

editButtons.forEach((button) => {
	button.addEventListener("click", () => {
		idInput.value = button.dataset.id;
		nameText.value = button.dataset.name;
		textText.value = button.dataset.text;
		isEditting.value = "true";
		float.classList.toggle("active");
		floatTitle.innerHTML = "Editar Nota";
	});
});
