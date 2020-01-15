<section class="projects container">
    <ul class="projects__categories">
        <li class="projects__category active"><button class="button">All</button></li>
        <li data-category="plugins" class="projects__category"><button class="button">Plugins</button></li>
        <li data-category="themes" class="projects__category"><button class="button">Themes</button></li>
    </ul>
    <ul class="projects__list" data-items='<?php echo json_encode($data) ?>'>
        <li class="projects__item">
            <img src="https://i.picsum.photos/id/765/390/270.jpg" alt="1">
        </li>
        <li class="projects__item">
            <img src="https://i.picsum.photos/id/825/360/360.jpg" alt="2">
        </li>
        <li class="projects__item">
            <img src="https://i.picsum.photos/id/768/360/238.jpg" alt="3">
        </li>
        <li class="projects__item">
            <img src="https://i.picsum.photos/id/690/360/240.jpg" alt="4">
        </li>
        <li class="projects__item">
            <img src="https://i.picsum.photos/id/237/360/240.jpg" alt="5">
        </li>
        <li class="projects__item">
            <img src="https://i.picsum.photos/id/289/360/218.jpg" alt="6">
        </li>
    </ul>
</section>
