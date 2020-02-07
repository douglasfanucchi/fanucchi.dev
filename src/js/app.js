import Body from "./components/body"
import Hamburger from "./components/hamburger"
import TypeEffect from "./components/type-effect"
import { Projects, ProjectsCategories, ProjectsList } from "./components/projects"
import ReadMore from "./components/read-more"
import Modal from "./components/modal"

const $body   = document.querySelector("body")
const $header = document.getElementById("header")
const $hamburger = $header.querySelector(".primary-menu__hamburger-button")
const $typeEffect = $body.querySelector(".description__highlight")

const body = new Body($body)

window.addEventListener('load', () => {
    body.setMarginTop($header)
    new Hamburger($hamburger)
    
    if( $typeEffect )
        new TypeEffect($typeEffect).printWords()

    const $projects = $body.querySelector(".projects");
    let $projectsCategories = undefined
    let $modal = undefined
    let $projectsList = undefined

    if( $projects ) {
        $projectsCategories = $projects.querySelector(".projects__categories")
        $projectsList = $projects.querySelector(".projects__list")
        $modal = $projects.querySelector('.modal');

        const {state: ProjectsState} = new Projects($projects)
        new ProjectsCategories($projectsCategories, ProjectsState)
        new ProjectsList($projectsList, ProjectsState)
        const {state: ModalState} = new Modal($modal)

        $projectsList.querySelectorAll('.item__content').forEach( $itemContent => {
            const $button = $itemContent.querySelector(".item__read-more") 
        
            if(!$button || !$modal) return
        
            const button = new ReadMore($button, ModalState)
            
            button.setItemToActive( $modal )
        })
    }
})
