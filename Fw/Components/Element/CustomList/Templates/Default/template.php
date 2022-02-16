<?php

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>

<div class="custom-list">
    <dl>
        <?php foreach($result['list'] as $listHeader=>$items): ?>
            <dt><?= $listHeader; ?></dt>
                <?php foreach($items as $item): ?>
                    <dd><?= $item; ?></dd>
                <?php endforeach; ?>
        <?php endforeach; ?>
    </dl>   
</div>