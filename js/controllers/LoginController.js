import LoginView from "../views/LoginView.js";
import UserModel from "../models/UserModel.js";

export default class LoginController {

    constructor() {

        this.view = new LoginView();

        this.view.form.addEventListener(
            "submit",
            this.login.bind(this)
        );

    }

    login(event) {

        event.preventDefault();

        const data = this.view.getData();

        const user = new UserModel(
            data.name,
            data.phone
        );

        if (user.isValid()) {

            this.view.showMessage("ورود با موفقیت انجام شد.");

        } else {

            this.view.showMessage("لطفاً اطلاعات را کامل وارد کنید.");

        }

    }

}