<?php
	$this->layout = "fontend";
?>
	<?= $this->element('Sidebar/search') ?>
	<!-- /.col-lg-3 -->
	<div class="col-lg-9">
		<div id="filter">
			<div id="resultStats">
				<p class="font-italic" style="display: inline-block;">Find <?= $count ?> result</p>
			</div>
			<div class="row">
		        <?php foreach ($product as $product) : ?>
		          <div class="col-lg-4 col-md-6 mb-4">
		            <div class="card h-100">
		              <?= $this->Html->image('uploads/resize/'.$product->image, ['url' => ['action' => 'view', $product->id]]) ?>
		              <div class="card-body">
		                <h4 class="card-title">
		                  <?= $this->Html->link(h($product->name), ['action' => 'view', $product->id]) ?>
		                </h4>
		                <h5><?= $this->Number->format($product->price).'VNĐ' ?></h5>
		              </div>
		              <!-- <div class="card-footer">
		                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
		              </div> -->
		            </div>
		          </div>
		        <?php endforeach; ?>

	     	</div>
	      <!-- /.row -->

	    </div>
	</div>
	    <!-- /.col-lg-9 -->
</div>
	  <!--/.row-->
	  <div class="paginator">
	      <ul class="pagination">
	          <?= $this->Paginator->first('<< ' . __('first')) ?>
	          <?= $this->Paginator->prev('< ' . __('previous')) ?>
	          <?= $this->Paginator->numbers() ?>
	          <?= $this->Paginator->next(__('next') . ' >') ?>
	          <?= $this->Paginator->last(__('last') . ' >>') ?>
	      </ul>
	      <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
	  </div>
</div>
    <!-- /.container -->

<script type="text/javascript">
	$(document).ready(function() {
		$('#button').click(function() {
			var csrfToken = $("[name='_csrfToken']").val();
			var checkPriceStart = $('#checkPriceStart').val();
			var checkPriceEnd = $('#checkPriceEnd').val();
			var sort = $('#sort').val();
    		var loader = $("<div>").addClass("loader");
    		var loader_img = $("<div>").addClass('loader_img');
			$.ajax({
				type: "post",
				url: "<?= $this->Url->build(['action' => 'ajax', '?' => ['keyword' => $this->request->query('keyword')]]) ?>",
				data: {"checkPriceStart" : checkPriceStart, "checkPriceEnd" : checkPriceEnd, "sort" : sort},
				headers: {
				    'X-CSRF-Token': csrfToken
				},
				beforeSend: function() {
    				$("body").append(loader);
    				$("body").append(loader_img);
				},
				success: function(response) {
				    $('div').removeClass("loader");
				    $('div').removeClass("loader_img");
				    $('#filter').html(response);
				}
			});
		});

		$('#sort').change(function() {
			$('#button').click();
		});
    });




</script>