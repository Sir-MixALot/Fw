<?php

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>

<div class="container list" id="custom-list">
    <dl class="list-group">
        <?php foreach($result['list'] as $listHeader=>$items): ?>
            <dt class="list-group-item active"><?= $listHeader; ?></dt>
                <?php foreach($items as $item): ?>
                    <dd class="list-group-item"><?= $item; ?></dd>
                <?php endforeach; ?>
        <?php endforeach; ?>
    </dl>   
</div>