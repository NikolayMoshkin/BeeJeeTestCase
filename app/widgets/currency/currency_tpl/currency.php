<option value="" class="label"><?=$this->currency['code'];?></option>
<?php foreach ($this->currencies as $key=>$value):?>
    <?if ($key != $this->currency['code']):?>
    <option value=<?=$key;?>><?=$key;?></option>
    <?endif;?>
<?endforeach;?>