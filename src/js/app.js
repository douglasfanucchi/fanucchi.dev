import Body from "./components/body"
import Hamburger from "./components/hamburger"
import TypeEffect from "./components/type-effect"
import { Projects, ProjectsCategories, ProjectsList } from "./components/projects"

const $body   = document.querySelector("body")
const $header = document.getElementById("header")
const $hamburger = $header.querySelector(".primary-menu__hamburger-button")
const $typeEffect = $body.querySelector(".description__highlight")

const $projects = $body.querySelector(".projects")
const $projectsCategories = $projects.querySelector(".projects__categories")
const $projectsList = $projects.querySelector(".projects__list")

const body = new Body($body)

window.addEventListener('load', () => {
    body.setMarginTop($header)
    new Hamburger($hamburger)
    new TypeEffect($typeEffect).printWords()

    const {state: ProjectsState} = new Projects($projects)
    new ProjectsCategories($projectsCategories, ProjectsState)
    new ProjectsList($projectsList, ProjectsState)
})
