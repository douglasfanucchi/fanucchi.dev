export class Projects {
    constructor($element) {
        this.state = {
            data: {
                currentCategory: null
            },
            listeners: [],
            pushListener: function(func) {
                this.listeners.push(func)
            }
        }

        this.$element = $element

        this.bindEventListeners()
    }

    setState = (e) => {
        this.state.data.currentCategory = e.detail.category
        this.stateChanged()
    }

    stateChanged() {
        this.state.listeners.forEach(func => func(this.state.data))
    }

    bindEventListeners() {
        this.$element.addEventListener("change-state", this.setState)
    }
}

export class ProjectsCategories {
    constructor($categories, ProjectsState) {
        this.$items         = $categories.querySelectorAll(".projects__category")
        this.ProjectsState  = ProjectsState

        this.bindEventListeners()
    }

    bindEventListeners() {
        this.$items.forEach( item => {
            item.addEventListener("click", () => {
                this.manageActiveClass(item)
                this.dispatchEvent(item)
            })
        })
    }

    manageActiveClass($newActive) {
        this.removeActive()
        this.setActive($newActive)
    }

    removeActive() {
        let $active = [].filter.call(this.$items, $item => $item.classList.contains("active") ).shift()
        $active.classList.remove("active")
    }

    setActive($newActive) {
        $newActive.classList.add("active")
    }

    dispatchEvent(item) {
        const event = new CustomEvent("change-state", {
            bubbles: true,
            detail: { category: item.getAttribute("data-category") }
        })

        item.dispatchEvent(event)
    }
}

export class ProjectsList {
    constructor($element, ProjectsState) {
        this.$element      = $element
        this.$items        = $element.querySelectorAll(".projects__item")
        this.ProjectsState = ProjectsState

        this.bindStateListener()
        this.bindEventListeners()
        this.organizeItems()
    }

    bindStateListener() {
        this.ProjectsState.pushListener(this.stateListener)
    }

    bindEventListeners() {
        window.addEventListener("resize", this.organizeItems)
    }

    stateListener = (data) => {
        console.log( this.$element, data )
    }

    organizeItems = () => {
        const itemOffsetWidth = this.$items[0].offsetWidth + 5
        const itemsPerRow     = Math.round( this.$element.offsetWidth / itemOffsetWidth )

        this.$items.forEach(($item, index, arr) => {
            const $previousItem = arr[index - 1]
            const $aboveItem    = arr[index - itemsPerRow]

            const left = this.getCurrentItemLeft($item, $previousItem)
            const top  = this.getCurrentItemTop($aboveItem)

            $item.style.top  = `${top}px`
            $item.style.left = `${left}px`
        })

        this.$element.style.height = "1000px"
    }

    getCurrentItemLeft( $currentItem, $previousItem ) {
        if( !$previousItem )
            return 0

        const left  = parseInt($previousItem.style.left) + $previousItem.offsetWidth + 5
        const right = left + $currentItem.offsetWidth

        if( right > this.$element.offsetWidth )
            return 0

        return left
    }

    getCurrentItemTop($aboveItem) {
        if(!$aboveItem)
            return 0

        return parseInt($aboveItem.style.top) + $aboveItem.offsetHeight + 5
    }
}
