<!-- All Jquery -->
<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>

<!-- Bootstrap tether Core JavaScript -->
<script src="{!! asset('js/adminpanel/lib/bootstrap/js/popper.min.js') !!}"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="{!! asset('js/adminpanel/jquery.slimscroll.js') !!}"></script>
<!--Menu sidebar -->
<script src="{!! asset('js/adminpanel/sidebarmenu.js') !!}"></script>
<!--stickey kit -->
<script src="{!! asset('js/adminpanel/lib/sticky-kit-master/dist/sticky-kit.min.js') !!}"></script>
<!--Custom JavaScript -->


<script src="{!! asset('js/adminpanel/lib/owl-carousel/owl.carousel.min.js') !!}"></script>
<script src="{!! asset('js/adminpanel/lib/owl-carousel/owl.carousel-init.js') !!}"></script>
<script src="{!! asset('js/adminpanel/scripts.js') !!}"></script>
<!-- scripit init-->

<script src="{!! asset('js/adminpanel/custom.min.js') !!}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{!! asset('js/adminpanel/tinymc.js') !!}"></script>

<script type="text/javascript">

    $(document).ready(function() {

      $(".btn-success").click(function(){
          var html = $(".clone").html();
          $(".increment").after(html);
      });

      $("body").on("click",".btn-danger",function(){
          $(this).parents(".control-group").remove();
      });

    });

</script>
<script>
$.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function( elem ) {
        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
});
$(document).ready(function() {
    $('#addTagBtn').click(function() {
        $('#tags option:selected').each(function() {
            $(this).appendTo($('#selectedTags'));
        });
    });
    $('#removeTagBtn').click(function() {
        $('#selectedTags option:selected').each(function(el) {
            $(this).appendTo($('#tags'));
        });
    });
    $('.tagRemove').click(function(event) {
        event.preventDefault();
        $(this).parent().remove();
    });
    $('ul.tags').click(function() {
        $('#search-field').focus();
    });
    $('#search-field').keypress(function(event) {
        if (event.which == '13') {
            if (($(this).val() != '') && ($(".tags .addedTag:contains('" + $(this).val() + "') ").length == 0 ))  {

                    $('<li class="addedTag">' + $(this).val() + '<span class="tagRemove" onclick="$(this).parent().remove();">x</span><input type="hidden" value="' + $(this).val() + '" name="tags[]"></li>').insertBefore('.tags .tagAdd');
                    $(this).val('');

            } else {
                $(this).val('');
            }
        }
    });

    if ($("div.img-wrap").length == 0) {
      $("input.multiple").prop('required',true);
    }

});

// delete button

$('.img-wrap-multiple .multiple').on('click', function() {
    var id = $(this).closest('.img-wrap').find('img').data('id');
    var product = $(this).closest('.img-wrap').find('img').data('product');

    $.ajax({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    url: "/admin/delete/multipleimages",
    type: "GET",
    data: {
        id: id
    },
    success: function(e) {
        $("#img-" + id).remove();
        if ($("div.img-wrap").length == 0) {
          $("input.multiple").prop('required',true);
        }
    }
  })
});

$('.img-wrap-slide .slide').on('click', function() {
    var id = $(this).closest('.img-wrap').find('img').data('id');
    var product = $(this).closest('.img-wrap-delete').find('img').data('image');

    $.ajax({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    url: "/admin/slider/delete",
    type: "GET",
    data: {
        id: id
    },
    success: function(e) {
        $("#img-" + id).remove();
        if ($("div.img-wrap").length == 0) {
          $("input.multiple").prop('required',true);
        }
    }
  })
});


$(".delete").on("click", function(e) {
    e.preventDefault();
    var product_id = $(this).attr("product_id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "/admin/post/delete",
        type: "GET",
        data: {
            product_id: product_id
        },
        success: function(e) {
            $("#product-" + product_id).remove()
        }
    })
});



$(".delete-category").on("click", function(e) {
    e.preventDefault();
    var category_id = $(this).attr("category_id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "/admin/category/delete",
        type: "GET",
        data: {
            category_id: category_id
        },
        success: function(e) {
            $("#category-" + category_id).remove()
        }
    })
});

</script>
<script type="text/javascript">

$('#form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    return false;
  }
});

</script>

<script type="text/javascript">

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>
</body>

</html>
