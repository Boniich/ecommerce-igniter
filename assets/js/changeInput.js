function changeInput() {
	onchange = (event) => {
		let input = event.target;
		let msgError = document.getElementById("error-msg-input-amount");
		let addProductButton = document.getElementById("button-car");

		let value = parseInt(input.value);
		let min = parseInt(input.min);
		let max = parseInt(input.max);
		if (value < min || value > max || input.value === "") {
			addProductButton.disabled = true;
			msgError.className = "d-block text-danger";
		} else {
			addProductButton.disabled = false;
			msgError.className = "d-none";
		}
	};
}
