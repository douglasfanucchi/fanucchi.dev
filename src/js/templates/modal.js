export default function(state) {
    return ` 
    <button class="modal__close">
        <span data-icon="status-v3-x" class=""><svg id="_x31_36d61d3-7c69-4943-898a-f3edd8a1568c" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#000" d="M19.8 5.8l-1.6-1.6-6.2 6.2-6.2-6.2-1.6 1.6 6.2 6.2-6.2 6.2 1.6 1.6 6.2-6.2 6.2 6.2 1.6-1.6-6.2-6.2 6.2-6.2z"></path></svg></span>
    </button>
    <h3 class="modal__title">${state.title} - <a class="modal__demo" target="_blank" href="${state.demo}">Visualizar</a></h3>
    <p class="modal__description">${state.description}</p>
    <ul class="modal__useful-links">
        <h4 class="list-title">Links Uteis</h4>
        ${state.links.map( link => `<li><a href="${link.href}" target="_blank">${link.label}</a></li>` )}
    </ul>
    `;
}
