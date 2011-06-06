<?php if(count($requisitos) > 0): ?>
<h4>Los Requisitos son:</h4>
<ol>
    <?php foreach ($requisitos as $requisito): ?>
    <li><?php echo $requisito->getNombreRequisito() ?></li>
    <?php endforeach; ?>
</ol>

<?php endif; ?>
