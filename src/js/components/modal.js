import template from '../templates/modal.js'

export default class Modal {
    constructor($element) {
        this.$element = $element

        this.state = {
            data: {
                title: '',
                demo: '',
                description: '',
                links: []
            },
            listeners: [],
            pushListener(func) {
                if(func)
                    this.listeners.push(func)
            },
            setState(postID) {
                fetch(`http://fanucchi.local/wp-json/wp/v2/projects?include[]=${postID}&_fields=title,content,atributos`)
                    .then(r => r.json())
                    .then(json => {
                        const post = json.shift()
                        console.log(post)
                        this.data.title = post.title.rendered
                        this.data.description = post.content.rendered
                        this.data.demo = post.atributos.demo

                        this.listeners.forEach( listener => listener(this) )
                    })
            }
        }

        this.render( this.state )

        this.$close = $element.querySelector('.modal__close')

        this.bindEventListeners()
        this.bindStateListeners()
    }

    bindEventListeners = () => {
        this.$close.addEventListener('click', this.close)
    }

    bindStateListeners() {
        this.state.pushListener(this.render)
        this.state.pushListener(this.bindEventListeners)
    }

    close = () => {
        this.$element.classList.remove('active')
    }

    render = ({ data }) => {
        this.$element.innerHTML = template(data)
        this.$close = this.$element.querySelector('.modal__close')
    }
}