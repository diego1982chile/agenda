<?php if(count($examenes) > 0): ?>
<h4>Además debe pasar estos examenes:</h4>
<ol>
    <?php foreach ($examenes as $examen): ?>
    <li><?php echo $examen->getNombreExamen() ?></li>
    <?php endforeach; ?>
</ol>

<?php endif; ?>
