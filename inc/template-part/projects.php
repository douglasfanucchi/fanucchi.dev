<section class="projects container">
    <ul class="projects__categories">
        <li class="projects__category active"><button class="button">All</button></li>
        <li data-category="plugins" class="projects__category"><button class="button">Plugins</button></li>
        <li data-category="themes" class="projects__category"><button class="button">Themes</button></li>
    </ul>
    <ul class="projects__list">
    <?php for($i = 0; $i < 6; $i++): ?>
        <li style="background-image: url('https://i.picsum.photos/id/765/390/270.jpg')" class="projects__item" data-category="<?php echo $i % 2 === 0 ? 'plugins' : 'themes' ?>">
            <div class="item__content">
                <h3 class="item__title">Meu projeto</h3>
                <p class="item__description">
                    <?php for($j = 0; $j <= $i + 4; $j++): echo 'Plugin que integra mercado pago com funcionalidade de assinatura!'; endfor; ?>
                </p>
                <ul class="item__tecnologies">
                    <h3 class="title">Tecnologias: </h3>
                    <li class="item__tecnology">PHP</li>
                    <li class="item__tecnology">JS</li>
                    <li class="item__tecnology">MySQL</li>
                    <li class="item__tecnology">JavaScript</li>
                </ul>
                <button class="item__read-more">Saiba mais</button>
            </div>
        </li>
    <?php endfor; ?>
    </ul>
    <div class="modal">
        <button class="modal__close">
            <span data-icon="status-v3-x" class=""><svg id="_x31_36d61d3-7c69-4943-898a-f3edd8a1568c" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#000" d="M19.8 5.8l-1.6-1.6-6.2 6.2-6.2-6.2-1.6 1.6 6.2 6.2-6.2 6.2 1.6 1.6 6.2-6.2 6.2 6.2 1.6-1.6-6.2-6.2 6.2-6.2z"></path></svg></span>
        </button>
        <h3 class="modal__title">Meu projeto - <a class="modal__demo" target="_blank" href="#">Visualizar</a></h3>
        <p class="modal__description">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam omnis eos, voluptatum quos, maxime pariatur perspiciatis, ea nemo laudantium magnam ipsum minima nostrum! Cupiditate, adipisci! Aut quia quis doloremque perspiciatis, nemo obcaecati sit vero rem quibusdam alias temporibus magni eaque ipsa quae ducimus numquam cupiditate facere repellendus tempore. Sint animi neque non eos delectus, similique, dolorem provident, velit dolore laboriosam nobis tempore corporis nesciunt id blanditiis! Incidunt eos quaerat sapiente dolores recusandae, rerum pariatur excepturi cum voluptatibus nihil, fugit eum ab sequi. Repudiandae eum molestias expedita odio quos voluptatibus. Esse rerum iste quia dignissimos praesentium repellendus odit cumque voluptatibus voluptate!
        </p>
        <ul class="modal__useful-links">
            <h4 class="list-title">Links Uteis</h4>
            <li><a href="">Download</a></li>
            <li><a href="">Documentacao</a></li>
        </ul>
    </div>
</section>
