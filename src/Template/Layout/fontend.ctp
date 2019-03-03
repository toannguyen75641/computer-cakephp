<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset("UTF-8") ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
        <?= $this->Html->meta('icon') ?>

        <?= $this->Html->css(['base', 'style', 'homepage', 'bootstrap.min']) ?>
        <?= $this->Html->script(['jquery.min', 'bootstrap.min', 'popper.min', 'search', 'js.cookie']) ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <?= $this->Html->link('XSmax - Website for computer', ['action' => 'index'], ['class' => 'navbar-brand']) ?>
        <?= $this->Form->create('', ['url' => ['action' => 'search'], 'type' => 'GET', 'id' => 'search']) ?>
          <div id="custom-search-input">
            <div class="input-group col-md-12">
                <?= $this->Form->control('keyword', ['class' => 'form-control input-lg', 'placeholder' => 'Search...', 'label' => false, 'default' => $this->request->query('keyword')]) ?>
                <span class="input-group-btn">
                  <button class="btn btn-info btn-lg"><i class="fas fa-search"></i></button>
                </span>
              </div>
          </div>
        <?= $this->Form->end(); ?>        
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <?= $this->Html->link('Home', ['action' => 'index'], ['class' => 'nav-link']) ?>
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cmp/pages/shoppingCart">
                <i class="fas fa-shopping-cart">(<?php if(isset($_COOKIE['cart'])) echo $count_cart ?>)</i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="row">

        
        <?= $this->fetch('content') ?>
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">XSmax - Website for computer</p><br>
        <p class="m-0 text-center text-white">Email: toannguyen75641@gmail.com</p>
      </div>
      <!-- /.container -->
    </footer>
</body>
</html>
