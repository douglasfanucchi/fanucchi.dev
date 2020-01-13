import Body from "./components/body"

const $body   = document.querySelector("body")
const $header = document.getElementById("header")

const body = new Body($body)

window.addEventListener('load', () => {
    body.setMarginTop($header)
})
