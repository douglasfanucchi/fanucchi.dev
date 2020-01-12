export default class Body {
    constructor($element) {
        this.$element = $element
    }
    
    setMarginTop($header) {
        this.$element.style.paddingTop = `${$header.offsetHeight}px`
    }
}
