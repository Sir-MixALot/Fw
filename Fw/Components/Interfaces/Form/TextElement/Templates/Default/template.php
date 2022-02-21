<div class="row mb-3">
    <label for="<?= $result['attr']['data-id'] ?>" class="col-sm-2 col-form-label"><?= $result['title'] ?></label>
    <div class="col-sm-10">
        <input type="<?= $result['type'] ?>" name="<?= $result['name'] ?>" class="<?= $result['additional_class'] ?>" id="<?= $result['attr']['data-id'] ?>" value="<?= $result['default'] ?>">
    </div>
</div>
