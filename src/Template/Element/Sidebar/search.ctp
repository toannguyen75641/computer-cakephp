<?php 
    $options1 = [
        '0' => '0',
        '15000000' =>  $this->Number->format(15000000).'VNĐ',
        '30000000' =>  $this->Number->format(30000000).'VNĐ',
        '45000000' =>  $this->Number->format(45000000).'VNĐ'
    ];

    $options2 = [
        '15000000' =>  $this->Number->format(15000000).'VNĐ',
        '30000000' =>  $this->Number->format(30000000).'VNĐ',
        '45000000' =>  $this->Number->format(45000000).'VNĐ',
        '60000000' =>  $this->Number->format(60000000).'VNĐ'
    ];  

     $options3 = [
        'ASC' => 'Low to hight',
        'DESC' => 'Hight to low'
      ]; 
?>
<div class="col-lg-3">

 	<h1 class="my-4">Search</h1>
	<div class="list-group">
		<?= $this->Form->create('', ['url' => ['action' => 'search', '?' => ['keyword' => $this->request->query('keyword')]]]) ?>
		  <h4>By Price</h4>
			From
  			<?= $this->Form->select('checkPriceStart', $options1, ['empty' => 'Chose one', 'id' => 'checkPriceStart']) ?>
  			To
        <?= $this->Form->select('checkPriceEnd', $options2, ['empty' => 'Chose one', 'id' => 'checkPriceEnd']) ?>
        <button type="button" id="button" class="btn btn-success">Search</button>
      <h4>Sort</h4>
        <?= $this->Form->select('Sort', $options3, ['empty' => 'Sort', 'id' => 'sort']) ?>
  		<?= $this->Form->end(); ?>
	</div>

</div>
<style type="text/css">
  .input  {
    background-color: white;
  }

  .input:hover {
    background-color: white;
  }
</style>

