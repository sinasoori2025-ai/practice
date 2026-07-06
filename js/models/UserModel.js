export default class UserModel {

    constructor(name, phone) {
        this.name = name;
        this.phone = phone;
    }

    isValid() {
        return (
            this.name.trim() !== "" &&
            this.phone.trim() !== ""
        );
    }

}