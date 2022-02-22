<?php

use Fw\Core\Application;
$app = new Application;

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>
<div class="row mb-3">
    <label for="<?= $result['attr']['data-id'] ?>" class="col-sm-2 col-form-label"><?= $result['title'] ?></label>
    <div class="col-sm-10">
        <input type="<?= $result['type'] ?>" name="<?= $result['name'] ?>" class="<?= $result['additional_class'] ?>" <?php foreach($result['attr'] as $attr=>$value):?> <?= $attr . '="'?> <?= $value . '"' ?><?php endforeach;?>>
    </div>
</div>
