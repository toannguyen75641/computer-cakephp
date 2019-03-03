<?php
  $this->layout = "fontend";
?>
  <?= $this->element('Sidebar/category'); ?>
  <!-- /.col-lg-3 -->
  <div class="col-lg-9">
    <div class="card mt-4">
      <?= $this->Html->image('uploads/'.$product->image, ['width' => '500px', 'height' => '500px']) ?>
      <div class="card-body">
          <h3 class="card-title">
            <?= h($product->name) ?>
          </h3>
          <h4><?= $this->Number->format($product->price)."VNĐ"; ?></h4>
          <?= $this->Text->autoParagraph(h($product->description), ['class' => 'card-text']); ?>
         <!--  <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                4.0 stars -->
      </div>
    </div>
          <!-- /.card -->

      <div class="card card-outline-secondary my-4">
        <!-- <div class="card-header">
          Product Reviews
        </div> -->
          <div class="card-body">
            <button type="button" id="btn-add-cart" class="btn btn-success btn-add-cart" data-id="<?= $product->id ?>" data-name="<?= $product->name ?>" data-price="<?= $product->price ?>">Add to Cart</button>
            <div class="col-lg-2" style="margin: 5px 5px; display: inline-block; width: 80px">
              <label>Quantity</label>
              <input type="number" name="quantity" value="1" id="quantity">
            </div>
          </div>
      </div>
      <!-- /.card -->

    </div>
    <!-- /.col-lg-9 -->

  </div>
  <!--/.row-->

</div>
    <!-- /.container -->

<script type="text/javascript">
  $(document).ready(function() {
    $('#btn-add-cart').click(function() {
        // var product = JSON.parse('<?= json_encode($product) ?>'); 
        var product_id = $(this).attr("data-id");
        var product_name = $(this).attr("data-name");
        var product_price = $(this).attr("data-price");
        var product_quantity = $('#quantity').val();

        // thêm vào giỏ hàng (js animation)
        
  //       // Save vào cookie
  //       // {id, name, price, quantity}

        var current_cart = Cookies.get('cart');

        if(typeof current_cart === "undefined" || current_cart === "") {
          var cart = new Array();
        } else {
          var cart = JSON.parse(current_cart);
        }

        var position_key = false;
        for (key in cart) {
          if(cart[key]['id'] === product_id) {
            position_key = key;
            break;
          }
        }

        if(position_key !== false) {
          cart[position_key]['quantity'] = parseInt(cart[position_key]['quantity'] + product_quantity);
        } else {
          cart.push({"id" : product_id, "name" : product_name, "price" : product_price, "quantity" : parseInt(product_quantity)});
        }

        Cookies.set('cart', cart);
        console.log('cart', cart);

    });
  });
</script>