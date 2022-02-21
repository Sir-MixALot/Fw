<div class="form-group">
    <fieldset class="row mb-3 <?=$result['element']['additional_class'] ?>" name="<?=$result['element']['name'] ?>" id="<?=$result['element']['attr']['data-id'] ?>">
        <legend class="col-form-label col-sm-2 pt-0"><?= $result['element']['title'] ?></legend>
        <div class="col-sm-10">
            <?= $result['out'] ?>
        </div>
    </fieldset>
</div>