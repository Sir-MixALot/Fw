<div class="container" id = "<?=$result['form']['attr']['data-form-id']?>">
    <form class = "<?=$result['form']['additional_class']?>" method="<?=$result['form']['method']?>" action="<?php echo $result['form']['action'] ?: '#'?>">
        <?=$result['out'] ?>
    </form>
</div>