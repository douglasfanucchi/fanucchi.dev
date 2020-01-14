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
    constructor($categories, state) {
        this.$items = $categories.querySelectorAll(".projects__category")
        this.state  = state

        this.bindEventListeners()
    }

    bindEventListeners() {
        this.$items.forEach( item => {
            item.addEventListener("click", () => this.dispatchEvent(item))
        })
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
        this.ProjectsState = ProjectsState

        this.bindStateListener()
    }

    bindStateListener() {
        this.ProjectsState.pushListener(this.stateListener)
    }

    stateListener = (data) => {
        console.log( this.$element, data )
    }
}
