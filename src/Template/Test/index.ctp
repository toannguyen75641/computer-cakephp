<?php
$this->layout = false;

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?= $this->Html->script('jquery.min.js') ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#button').click(function() {
				var csrfToken = $("[name='_csrfToken']").val();
		    	var checkFirst = $('#checkFirst').val();
		    	var checkLast = $('#checkLast').val();
		    	var soft = $('#soft').val();
		    	$.ajax({
		    		type: "post",
		    		url: "<?= $this->Url->build(['controller' => 'Test', 'action' => 'ajax']) ?>",
		    		data: {"checkFirst" : checkFirst, "checkLast" : checkLast, "soft" : soft},
		    		headers: {
				        'X-CSRF-Token': csrfToken
				    },
		    		success: function(response) {
		    			$('#check').html(response);
		    			// console.log(response);
		    		}
		    	});
		    });
		});
	</script>
</head>
<body>
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
<?= $this->Form->create('', ['url' => ['action' => 'index'], 'type' => 'GET', 'id' => 'search']) ?>
          <div id="custom-search-input">
            <div class="input-group col-md-12">
                <?= $this->Form->control('keyword', ['class' => 'form-control input-lg', 'placeholder' => 'Search...', 'label' => false, 'default' => $this->request->query('keyword')]) ?>
                <span class="input-group-btn">
                  <button class="btn btn-info btn-lg">Search</button>
                </span>
              </div>
          </div>
        <?= $this->Form->end(); ?>
<?= $this->Form->create('', ['url' => ['action' => 'index', '?' => ['keyword' => $this->request->query('keyword')]]]) ?>
	<?= $this->Form->select('checkFirst', $options1, ['empty' => 'Chose one', 'id' => 'checkFirst']) ?>
	<?= $this->Form->select('checkLast', $options2, ['empty' => 'Chose one', 'id' => 'checkLast']) ?>
	<?= $this->Form->control('search', ['type' => 'button', 'id' => 'button', 'label' => false]) ?>
	<?= $this->Form->select('soft', $options3, ['empty' => 'Soft', 'id' => 'soft']) ?>
<?= $this->Form->end(); ?>
	<div id="check"></div>







</body>
</html>
