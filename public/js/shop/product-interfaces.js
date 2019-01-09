$(".add-to-cart").on("click", function(e) {
      e.preventDefault();
      var product_id = $(".hidden").attr("product_id");
      var product_price = $(".hidden").attr("product_price");
      var product_title = $(".hidden").attr("product_title");
      var product_featureimage = $(".hidden").attr("product_featureimage");
      var product_qty = $(".num-product").val();

      $.ajax({
          headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          },
          url: "/cart/add",
          type: "post",
          data: {product_id: product_id,product_price:product_price,product_title:product_title,product_featureimage:product_featureimage, product_qty:product_qty},
          success: function(e) {
            if ($(".product-"+e.cart.id)[0]){
              $(".total_price").remove();
              $(".header-icons-noti").remove();
              $(".product_qty").remove();
              $(".header-cart-total").append('<span class="total_price">Total:$'+e.cart_total+'</span>')
              $(".count_items").append('<span class="header-icons-noti">'+e.cart_count+'</span>')
              $(".header-cart-item-info").append('<span class="product_qty">'+e.cart.qty+' x '+e.cart.price+'</span>')

            }else{
              $(".header-icons-noti").remove();
              $(".count_items").append('<span class="header-icons-noti">'+e.cart_count+'</span>');
              $(".new-product").append('<div class="header-cart-item-img product-'+e.cart.id+'"><img src="/storage/product_feature_images/'+e.cart.options.image+'" alt="IMG"></div><div class="header-cart-item-txt"><a href="#" class="header-cart-item-name">'+e.cart.name+'</a><span class="header-cart-item-info"><span class="product_qty">'+e.cart.qty+' x '+e.cart.price+'</span></span></div>')
              $(".total_price").remove();
              $(".header-cart-total").append('<span class="total_price">Total:$'+e.cart_total+'</span>');

            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            location.reload();
          }
      })
});

$(".fa-remove").on("click", function(e) {
      e.preventDefault();
      var rowId = $(this).attr("rowId");
      var product_id = $(this).attr("product_id");
      $.ajax({
          headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          },
          url: "/cart/destroy",
          type: "post",
          data: {rowId: rowId},
          success: function(e) {
            $(".total").remove();
            $(".subtotal").remove();
            $(".tax").remove();
            $(".total_total").append('<span class="total">$'+e.cart_total+'</span>')
            $(".sub_total").append('<span class="subtotal">$'+e.cart_sub_total+'</span>')
            $(".tax_total").append('<span class="tax">$'+e.cart_tax+'</span>')

            $(".total_price").remove();
            $(".product-"+product_id+"").remove();
            $(".header-icons-noti").remove();
            $(".header-cart-total").append('<span class="total_price">Total:$'+e.cart_total+'</span>')
            $(".count_items").append('<span class="header-icons-noti">'+e.cart_count+'</span>')
            if(e.cart_count === 0){
              $(".cart").remove();
              $(".empty-cart").append("<span><h1 style='text-align: center; padding:100px'>Please add new products</h1><span>");
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            location.reload();
          }
      })
});

$(".update-qty").on("click", function(e) {
      e.preventDefault();
      var product_rowid = $(this).attr('product_rowid');
      var value = $(".num-product-"+product_rowid).val();
      $.ajax({
          headers: {
              "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
          },
          url: "/cart/update",
          type: "get",
          data: {value: value, product_rowid:product_rowid},
          success: function(e) {
            $(".subtotal_product-"+e.cart.id).remove();
            $(".total").remove();
            $(".subtotal").remove();
            $(".tax").remove();
            $(".total_total").append('<span class="total">$'+e.cart_total+'</span>')
            $(".sub_total").append('<span class="subtotal">$'+e.cart_sub_total+'</span>')
            $(".tax_total").append('<span class="tax">$'+e.cart_tax+'</span>')
            $(".column-5-"+e.cart.id).append("<span class='subtotal_product-"+e.cart.id+"'>$"+e.cart.qty * e.cart.price+"</span>");
            $(".total_price").remove();
            $(".header-icons-noti").remove();
            $(".header-cart-total").append('<span class="total_price">Total:$'+e.cart_total+'</span>')
            $(".count_items").append('<span class="header-icons-noti">'+e.cart_count+'</span>')
            if(e.cart_count === 0){
              $(".cart").remove();
              $(".empty-cart").append("<span><h1>Please add new products</h1><span>");
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            location.reload();
          }
      })

});
