export default class Hamburger {
    constructor($element) {
        this.$element = $element
        
        this.addListeners()
    }

    addListeners() {
        this.$element.addEventListener("click", () => this.$element.classList.toggle("primary-menu__hamburger-button--active") )
    }
}