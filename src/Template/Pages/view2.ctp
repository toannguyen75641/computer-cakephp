<?php 
  $this->layout = "fontend";
?>
    <?= $this->element('Sidebar/category'); ?>
    <!-- /.col-lg-3 -->

    <div class="col-lg-9">

      <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel"> 
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active">
            <?= $this->Html->image('uploads/slide1.jpg', ['class' => 'd-block img-fluid', 'alt' => 'First slide', 'width' => '900px', 'height' => '350px']) ?>
          </div>
          <div class="carousel-item">
            <?= $this->Html->image('uploads/slide2.jpg', ['class' => 'd-block img-fluid', 'alt' => 'Second slide', 'width' => '900px', 'height' => '350px']) ?>
          </div>
          <div class="carousel-item">
            <?= $this->Html->image('uploads/slide4.jpg', ['class' => 'd-block img-fluid', 'alt' => 'Third slide', 'width' => '900px', 'height' => '300px']) ?>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true" style="border-radius: 120%; background-color: black"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true" style="border-radius: 120%; background-color: black"></span>
          <span class="sr-only">Next</span>
        </a>
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
    <!-- /.col-lg-9 -->

  </div>
  <!-- /.row -->
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




</body>
</html>
