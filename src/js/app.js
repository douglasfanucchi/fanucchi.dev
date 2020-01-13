import Body from "./components/body"
import Hamburger from "./components/hamburger"
import TypeEffect from "./components/type-effect"

const $body   = document.querySelector("body")
const $header = document.getElementById("header")
const $hamburger = $header.querySelector(".primary-menu__hamburger-button")
const $typeEffect = $body.querySelector(".description__highlight")

const body = new Body($body)

window.addEventListener('load', () => {
    body.setMarginTop($header)
    new Hamburger($hamburger)
    new TypeEffect($typeEffect).printWords()
})
