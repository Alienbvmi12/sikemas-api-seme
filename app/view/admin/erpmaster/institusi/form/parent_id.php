<label for="ia_institusi_id" class="control-label">Institusi *</label>
<select id="ia_institusi_id" name="a_institusi_id" class="form-control" required>
    <option value="">--pilih--</option>
    <?php foreach ($institusi_list as $institusi) { ?>
    <option value="<?=$institusi->id?>"><?=ucfirst($institusi->nama)?></option>
    <?php } ?>
</select>