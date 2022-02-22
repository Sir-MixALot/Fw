<?php

use Fw\Core\Application;
$app = new Application;

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>
   <div class="form-check">
        <input class="<?= $result['additional_class'] ?>" type="<?= $result['type'] ?>" name="<?= $result['name'] ?>" <?php foreach($result['attr'] as $attr=>$value):?> <?= $attr . '="'?> <?= $value . '"' ?><?php endforeach;?> value="<?= $result['value'] ?>">
        <label class="form-check-label" for="<?= $result['attr']['data-id'] ?>"><?= $result['title'] ?></label>
    </div>

