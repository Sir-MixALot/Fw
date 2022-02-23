<?php

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>
<div class="row mb-3">
    <div class="col-sm-10">
        <input type="<?= $result['type'] ?>" name="<?= $result['name'] ?>" class="<?= $result['additional_class'] ?>" <?php foreach($result['attr'] as $attr=>$value):?> <?= $attr . '="'?> <?= $value . '"' ?><?php endforeach;?>>
    </div>
</div>
