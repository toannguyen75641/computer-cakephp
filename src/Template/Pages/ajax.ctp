<div id="resultStats">
		<p class="font-italic">Find <?= $count ?> result</p>
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
