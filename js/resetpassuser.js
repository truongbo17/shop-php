const form = document.querySelector(".resetpass form"),
    continueBtn = form.querySelector(".resetpass button"),
    inputBtn = form.querySelector(".resetpass input"),
    errorText = form.querySelector(".error-text");

successText = form.querySelector(".success-text");
alertPart = form.querySelector(".alertPart");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", BASE_URL + API_AUTHEN, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    inputBtn.value = "";
                    successText.style.display = "block";
                    successText.textContent = "Pass word đã được đặt về mặc định : 123456";
                    alertPart.style.display = "block";
                } else {
                    errorText.style.display = "block";
                    errorText.textContent = data;
                    alertPart.style.display = "block";
                }
            }
        }
    }
    let formData = new FormData(form);
    formData.append('action', AUTHEN_RESET_PASSWORD_USER);
    xhr.send(formData);
}