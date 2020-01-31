export default class Modal {
    constructor($element) {
        this.$element = $element
        this.$close   = $element.querySelector('.modal__close')
    
        this.bindEventListeners()
    }

    bindEventListeners() {
        this.$close.addEventListener('click', this.close)
    }

    close = () => {
        this.$element.classList.remove('active')
    }
}