const form = document.querySelector(".container form"),
    continueBtn = form.querySelector(".container button"),
    errorText = form.querySelector(".error-text");
successText = form.querySelector(".success-text");
alertPart = form.querySelector(".alertPart");

form.onsubmit = (e) => {
    e.preventDefault();
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", BASE_URL + API_PRODUCT, true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data === "success") {
                    setTimeout(function () {
                        location.reload(true);
                    }, 3000);
                    successText.style.display = "block";
                    successText.textContent = "Cập nhật sản phẩm thành công !";
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
    formData.append('action', EDIT_PRODUCT);
    xhr.send(formData);
}