export default class ReadMore {
    constructor($element) {
        this.$element = $element

        this.bindEventListeners()
    }

    bindEventListeners() {
        this.$element.addEventListener('click', this.click)
    }

    click = () => {
        this.$itemToActive.classList.add('active')
    }

    setItemToActive($item) {
        this.$itemToActive = $item
    }

    getItemToActive() {
        return this.$itemToActive
    }
}
