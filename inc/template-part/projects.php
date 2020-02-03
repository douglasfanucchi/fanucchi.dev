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
                <button data-post-id="<?php echo $i; ?>" class="item__read-more">Saiba mais</button>
            </div>
        </li>
    <?php endfor; ?>
    </ul>
    <div class="modal">
    </div>
</section>
