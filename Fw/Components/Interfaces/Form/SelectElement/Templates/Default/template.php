<div class="form-group">
    <div class="row mb-3">
        <label for="<?= $result['attr']['data-id'] ?>" class="col-sm-2 col-form-label"><?= $result['title'] ?></label>
        <div class="col-sm-10">
            <select type="<?= $result['type'] ?>" name="<?= $result['name'] ?>" class="<?= $result['additional_class'] ?>" id="<?= $result['attr']['data-id'] ?>">
            <?php foreach($result['list'] as $options): ?>
                <option value="<?= $options['value'] ?>" class="<?= $options['additional_class'] ?>" id="<?= $options['attr']['data-id'] ?>" selected="<?php echo isset($options['selected']) ? $options['selected'] : '' ?>"><?= $options['title'] ?></option>
            <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>