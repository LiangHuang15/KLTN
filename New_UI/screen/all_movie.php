
<?php include("header.php") ?>

<div class="content" style="width:100%;height:3400px;background:white; display:flex;">
        <div id="dynamic_content" class="row" style="display:flex;width:98%;height:98%;margin:auto;background:white;">
               
        </div>
    </div>

<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch_all_movie.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
          $('#dynamic_content').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
      document.body.scrollTop = 0;
     document.documentElement.scrollTop = 0;
    });

  });
</script>




<?php include("footer.php") ?>



