const form = document.querySelector(".dashboard-user-profile form"),
    	continueBtn = form.querySelector(".dashboard-user-profile button"),
        errorText = form.querySelector(".error-text");
    	successText = form.querySelector(".success-text");
        alertPart = form.querySelector(".alertPart");

    	form.onsubmit = (e)=>{
    		e.preventDefault();
    	}

    	continueBtn.onclick = ()=>{
    		let xhr = new XMLHttpRequest();
    		xhr.open("POST", BASE_URL + API_AUTHEN, true);
    		xhr.onload = ()=>{
    			if(xhr.readyState === XMLHttpRequest.DONE){
    				if(xhr.status === 200){
    					let data = xhr.response;
    					if(data === "success"){
							successText.style.display = "block";
                            successText.textContent = "Thêm tài khoản thành công !";
                            alertPart.style.display = "block";
                        }else{
    						errorText.style.display = "block";
    						errorText.textContent = data;
                            alertPart.style.display = "block";
    					}
    				}
    			}
    		}
    		let formData = new FormData(form);
    		formData.append('action', AUTHEN_ADD_USER);
    		xhr.send(formData);
    	}