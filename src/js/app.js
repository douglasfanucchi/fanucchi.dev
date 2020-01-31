import Body from "./components/body"
import Hamburger from "./components/hamburger"
import TypeEffect from "./components/type-effect"
import { Projects, ProjectsCategories, ProjectsList } from "./components/projects"
import ReadMore from "./components/read-more"

const $body   = document.querySelector("body")
const $header = document.getElementById("header")
const $hamburger = $header.querySelector(".primary-menu__hamburger-button")
const $typeEffect = $body.querySelector(".description__highlight")

const $projects = $body.querySelector(".projects")
const $projectsCategories = $projects.querySelector(".projects__categories")
const $projectsList = $projects.querySelector(".projects__list")

$projectsList.querySelectorAll('.item__content').forEach( $itemContent => {
    const $button = $itemContent.querySelector(".item__read-more") 
    const $modal  = $itemContent.querySelector(".item__modal")

    if(!$button || !$modal) return

    const button = new ReadMore($button)
    
    button.setItemToActive( $modal )
})

const body = new Body($body)

window.addEventListener('load', () => {
    body.setMarginTop($header)
    new Hamburger($hamburger)
    new TypeEffect($typeEffect).printWords()

    const {state: ProjectsState} = new Projects($projects)
    new ProjectsCategories($projectsCategories, ProjectsState)
    new ProjectsList($projectsList, ProjectsState)
})
