<?php include("header.php")?>
<div class="main" style="width:100%;height:950px;">
    <div class="title" style="width:100%;height:6%;background:white;display:flex;">
        <div class="content_title" style="width:90%;height:60%;background:white; margin:auto;">
            <?php
                if(isset($_GET["id"])) 
                {
                    if($_GET["id"]=='Action')
                    {
                        $genres='Phim hành động';
                    }
                    elseif($_GET["id"]=='Adventure')
                    {
                        $genres='Phim phiêu lưu';
                    }
                    elseif($_GET["id"]=='Animation')
                    {
                        $genres='Phim hoạt hình';
                    }
                    elseif($_GET["id"]=="Children")
                    {
                        $genres='Phim dành cho trẻ em';
                    }
                    elseif($_GET["id"]=="Comedy")
                    {
                        $genres='Phim hài hước';
                    }
                    elseif($_GET["id"]=="Crime")
                    {
                        $genres='Phim hình sự';
                    }
                    elseif($_GET["id"]=="Documentary")
                    {
                        $genres='Phim tài liệu';
                    }
                    elseif($_GET["id"]=="Drama")
                    {
                        $genres='Phim hài';
                    }
                    elseif($_GET["id"]=="Fantasy")
                    {
                        $genres='Phim viễn tưởng';
                    }
                    elseif($_GET["id"]=="Film-Noir")
                    {
                        $genres='Phim tội phạm Hollywood';
                    }
                    elseif($_GET["id"]=="Horror")
                    {
                        $genres='Phim kinh dị (ma)';
                    }
                    elseif($_GET["id"]=="Musical")
                    {
                        $genres='Phim âm nhạc';
                    }
                    elseif($_GET["id"]=="Mystery")
                    {
                        $genres='Phim thần bí';
                    }
                    elseif($_GET["id"]=="Romance")
                    {
                        $genres='Phim tình cảm';
                    }
                    elseif($_GET["id"]=="Sci-Fi")
                    {
                        $genres='Phim khoa học viễn tưởng';
                    }
                    elseif($_GET["id"]=="Thriller")
                    {
                        $genres='Phim kinh dị';
                    }
                    elseif($_GET["id"]=="War")
                    {
                        $genres='Phim chiến tranh';
                    }
                    elseif($_GET["id"]=="Western")
                    {
                        $genres='Phim viễn tây';
                    }
                }
             
            echo'<span style="vertical-align: middle; ">Kết quả tìm kiếm theo: '.$genres.'<span>';
            ?>
        </div>
    </div>
    <div class="content" style="width:100%;height:94%;background:white; display:flex;">
        <div id="dynamic_content" class="row" style="display:flex;width:90%;height:94%;margin:auto;background:white;">

        </div>
    </div>
</div>
<?php include("footer.php") ?>

<!-- load pagination -->
<script>
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
        var genres = <?php echo json_encode($_GET['id']); ?>;
      $.ajax({
        url:"fetch_genres.php",
        method:"POST",
        data:{page:page, query:query,genres:genres},
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
    });

  });
</script>
<!-- end load pagination -->