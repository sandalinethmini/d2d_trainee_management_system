<?php foreach ($districts as $district): ?>
    <option value="<?php echo $district['district_code']; ?>">
        <?php echo $district['district_description']; ?>
    </option>
<?php endforeach; ?>
