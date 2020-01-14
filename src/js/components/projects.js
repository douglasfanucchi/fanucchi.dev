export default class Projects {
    constructor($element) {
        this.$element    = $element
        this.$categories = this.$element.querySelector(".projects__categories")
        this.$list       = this.$element.querySelector(".projects__list")
    }
}
