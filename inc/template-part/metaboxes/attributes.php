<p>
    <label>
        <h4>URL Projeto</h4>
        <input <?php $this->value('project-url'); ?> name="project-url" type="url" />
    </label>
</p>
<p>
        <h4>Tecnologias</h4>
        <br>
        <label>
            <span>PHP</span>
            <input <?php $this->checked('tecnologies', 'PHP'); ?> type="checkbox" name="tecnologies[]" value="PHP" />
        </label><br>
        <label>
            <span>MySQL</span>
            <input <?php $this->checked('tecnologies', 'MySQL'); ?> type="checkbox" name="tecnologies[]" value="MySQL" />
        </label><br>
        <label>
            <span>HTML5</span>
            <input <?php $this->checked('tecnologies', 'HTML5'); ?> type="checkbox" name="tecnologies[]" value="HTML5" />
        </label><br>
        <label>
            <span>JavaScript</span>
            <input <?php $this->checked('tecnologies', 'JavaScript'); ?> type="checkbox" name="tecnologies[]" value="JavaScript" />
        </label><br>
        <label>
            <span>jQuery</span>
            <input <?php $this->checked('tecnologies', 'jQuery'); ?> type="checkbox" name="tecnologies[]" value="jQuery" />
        </label><br>
        <label>
            <span>React</span>
            <input <?php $this->checked('tecnologies', 'React'); ?> type="checkbox" name="tecnologies[]" value="React" />
        </label><br>
</p>
