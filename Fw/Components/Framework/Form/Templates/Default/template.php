<?php

use Fw\Core\Application;
$app = new Application;

if (!defined('FW_CORE_INCLUDED') || FW_CORE_INCLUDED !== true) die();
?>
<div class="container"  <?php foreach($result['form']['attr'] as $attr=>$value):?> <?= $attr . '="'?> <?= $value . '"' ?><?php endforeach;?>>
    <form class = "<?=$result['form']['additional_class']?>" id = "<?=$result['form']['id']?>" method = "<?=$result['form']['method']?>" action = "<?php echo $result['form']['action'] ?: '#'?>">
        <?php
            foreach($result['elements'] as $elementName=>$elementProperties){
                if(strpos($elementName, '-') === false){
                    $app->includeComponent($namespace . ':' . ucfirst($elementName), 'default', $elementProperties);
                }else{
                    $newElementName = '';
                    $elementNamePieces = explode('-', $elementName);

                    foreach($elementNamePieces as $piece){
                        $newElementName .= ucfirst($piece);
                    }

                    $app->includeComponent($namespace . ':' . $newElementName, 'default', $elementProperties);
                }
                
            }
        ?>
    </form>
</div>