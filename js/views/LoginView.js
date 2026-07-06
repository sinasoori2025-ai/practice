export default class LoginView {

    constructor() {
        this.form = document.getElementById("form");
        this.nameInput = document.getElementById("name");
        this.phoneInput = document.getElementById("phone");
    }

    getData() {
        return {
            name: this.nameInput.value,
            phone: this.phoneInput.value
        };
    }

    showMessage(message) {
        alert(message);
    }

}