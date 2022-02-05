const createButton = document.querySelector("#create");
const float = document.querySelector(".float-form");
createButton.addEventListener("click", () => {
	float.classList.toggle("active");
});

document.querySelector("#cancelCreate").addEventListener("click", (e) => {
	e.preventDefault();
	float.classList.toggle("active");
});
