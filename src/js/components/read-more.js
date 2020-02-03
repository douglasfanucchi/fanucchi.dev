export default class ReadMore {
    constructor($element, modalState) {
        this.$element = $element
        this.postID   = $element.getAttribute('data-post-id')
        this.modalState = modalState

        this.bindEventListeners()
    }

    bindEventListeners() {
        this.$element.addEventListener('click', this.click)
    }

    click = () => {
        this.$itemToActive.classList.add('active')
        this.modalState.setState(this.postID)
    }

    setItemToActive($item) {
        this.$itemToActive = $item
    }

    getItemToActive() {
        return this.$itemToActive
    }
}
