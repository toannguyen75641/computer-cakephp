<div class="col-lg-3">

  <h1 class="my-4">Category</h1>
  <?php foreach ($category as $category) : ?>
    <div class="list-group">
      <?= $this->Html->link(h($category->name), ['action' => 'view2', $category->id,], ['class' => 'list-group-item']) ?>
    </div>
  <?php endforeach; ?>

</div>