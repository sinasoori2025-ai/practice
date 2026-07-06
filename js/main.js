const form = document.getElementById("form");
const nameInput = document.getElementById("name");
const phoneInput = document.getElementById("phone");

form.addEventListener("submit", function(e){
    e.preventDefault();

    if(nameInput.value.trim() === "" || phoneInput.value.trim() === ""){
        alert("Please complete all required information.");
    }else{
        alert("Login successful.");
    }
});