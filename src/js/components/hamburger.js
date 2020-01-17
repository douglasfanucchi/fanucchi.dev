export default class Hamburger {
    constructor($element) {
        this.$element = $element
        
        this.addListeners()
    }

    addListeners() {
        this.$element.addEventListener("click", () => {
            this.setOffsetTop()
            this.setOffsetLeft()
            this.$element.style.top  = `${this.offsetTop}px`
            this.$element.style.left = `${this.offsetLeft}px`

            this.$element.classList.toggle("primary-menu__hamburger-button--active")
        })
    }

    setOffsetTop() {
        this.offsetTop = this.$element.getBoundingClientRect().top
    }

    setOffsetLeft() {
        this.offsetLeft = this.$element.getBoundingClientRect().left
    }
}