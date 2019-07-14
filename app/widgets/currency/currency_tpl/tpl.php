<option value="" class="label"><?=$this->currency['code'];?> </option>
<?php foreach($this->currencies as $k => $v ): ?>
<?php if($k == $this->currency['code']) continue; ?>

<option value="<?=$k; ?>"><?=$k; ?></option>

<?php endforeach; ?>