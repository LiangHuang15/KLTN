<?php include("slider.php");?>
<?php
      if(isset($_GET['success'])) {?>
          <p class="success" style="background: white;color:rgb(115,201,145) ;border-radius:5px;"><?php echo $_GET["success"]; ?> </p>
      <?php
      }
      ?>
<?php
      if(isset($_GET['error'])) {?>
          <p class="success" style="background: #F2DEDE;color:#A94442;border-radius:5px;"><?php echo $_GET["error"]; ?> </p>
      <?php
      }
      ?>
    

<div class="page-heading d-flex">
                <h3>Sửa thông tin phim</h3>

            </div>
<div class="content">
<section class="multiple-choices">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <form class="form form-vertical" action="check_edit_movie.php?id=<?php echo $_GET['id']?>" method="post" >
                                        <?php
                                             include './conn.php';
                                             $connect=conn();
                                             $id =$_GET['id'];  
                                             $sql=" select * from movies  where MovieID = $id ";
                                            $result = mysqli_query($connect, $sql);
                                            if(mysqli_num_rows($result) === 1) 
                                            {
                                                while($row = mysqli_fetch_assoc($result))
                                                {
                                                    $title = $row['Title'];
                                                    $genres = $row['Genres'];
                                                    $url = $row['url'];
                                                    $url_video = $row['url_video'];
                                                   
                                                }
                                            }
                                        ?> 
                                        <div class="row d-block">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-group row align-items-center">
                                                <div class="col-lg-2 col-3">
                                                    <h6 class="col-form-label">Tên phim</h6>
                                                </div>
                                                <div class="col-lg-10 col-9">
                                                    <input type="text" id="movie-name" class="form-control" name="fname" value="<?php echo $title ?>"
                                                        >
                                                </div>
                                                <input style="display: none" type="text"  id="result_select" class="form-control" name="result_select">
                                                <input style="display: none" type="text" value="<?php echo $url ?>" id="result_image" class="form-control" name="result_image">
                                                <input style="display: none" type="text" value="<?php echo $url_video ?>" id="result_video" class="form-control" name="result_video">
                                            </div>
                                        </div>
                                            <div class="col-md-6 mb-4">
                                                <h6>Thể loại</h6>
                                                <div class="form-group">
                                                    <select class="choices form-select multiple-remove"
                                                        multiple="multiple" id="pets" name="multiple" >
                                                            <?php 
                                                                    $list_genres = array("Action","Adventure","Animation","Children's","Comedy","Crime","Documentary","Drama","Fantasy","Film-Noir","Horror","Musical","Mystery","Romance","Sci-Fi","Thriller","War","Western");
                                                                    for($i = 0;$i < count($list_genres);$i++ )
                                                                    {
                                                                        //strpos check thể loại có tồn tại trong genres
                                                                        if (strpos($genres, $list_genres[$i]) !== false)
                                                                        {
                                                                           echo '<option selected="selected" value="'.$list_genres[$i].'" >'.$list_genres[$i].'</option>';
                                                                        }
                                                                       else
                                                                        {
                                                                           echo '<option value="'.$list_genres[$i].'" >'.$list_genres[$i].'</option>';
                                                                        } 
                                                                    }
    
                                                            ?>

                                                            <!-- <option value="Action" >Action</option>
                                                            <option value="Adventure">Adventure</option>
                                                            <option value="Animation">Animation</option>
                                                            <option value="Children's">Children's</option>
                                                            <option value="Comedy">Comedy</option>
                                                            <option value="Crime">Crime</option>
                                                            <option value="Documentary">Documentary</option>
                                                            <option value="Drama">Drama</option>
                                                            <option value="Fantasy">Fantasy</option>
                                                            <option value="Film-Noir">Film-Noir</option>
                                                            <option value="Horror">Horror</option>
                                                            <option value="Musical">Musical</option>
                                                            <option value="Mystery">Mystery</option>
                                                            <option value="Romance">Romance</option>
                                                            <option value="Sci-Fi">Sci-Fi</option>
                                                            <option value="Thriller">Thriller</option>
                                                            <option value="War" >War</option>
                                                            <option value="Western">Western</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="card">
                                                <h6>Tải lên ảnh bìa</h6>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <!-- Auto filter image file uploader -->
                                                            <input type="file"  id="upload_file" name="upload_file" class="image-filter-filepond">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                               
                                            <div class="col-md-6 mb-4">
                                            <h6>Tải lên nguồn phim</h6>
                                                 <!-- <input type="file" id="upload_video" name="upload_video" class="video-filter-filepond"> -->
                                                <input class="form-control"  type="file" id="upload_video" >
                                            </div>
                                            <div class="col-6 d-flex justify-content-end">
                                                        <button id="submit" type="submit"
                                                            class="btn btn-primary me-1 mb-1">Cập nhật</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Xóa hết</button>
                                                    </div>
                                        </div>
                                        </form>


                                                 
                                        <script>
                                        // event multiple select
                                     

                                        document.getElementById('submit').onclick = function() {
                                        var selected = [];
                                        for (var option of document.getElementById('pets').options)
                                        {
                                            if (option.selected) {
                                                selected.push(option.value);
                                            }
                                        }
                                        // alert(selected);
                                        document.getElementById("result_select").value = selected;
                                       }
                                        // event image
                                       $(function(){
                                            $("#upload_file").change(function(event){
                                                // console.log(event.target.files[0].name)
                                                var pathfile = event.target.files[0].name;
                                                document.getElementById("result_image").value = pathfile;
                                            });
                                        })
                                  
                                 
                                        
                                        $(function(){
                                            $("#upload_video").change(function(event){
                                                // console.log(event.target.files[0].name)
                                                var pathvideo = event.target.files[0].name;
                                                document.getElementById("result_video").value = pathvideo;
                                            });
                                        })
                                        // $(document).ready(function() {
                                        //     document.getElementById("result_image").value ="";
                                        //     document.getElementById("result_video").value ="";
                                        // });



                                       
                                        </script>
                                        









                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
<script src="assets/vendors/choices.js/choices.min.js"></script>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<!-- filepond validation -->
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>

<!-- image editor -->
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-filter/dist/filepond-plugin-image-filter.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>

<!-- toastify -->
<script src="assets/vendors/toastify/toastify.js"></script>

<!-- filepond -->
<script src="https://unpkg.com/filepond/dist/filepond.js"></script>
<script>
    // register desired plugins...
	FilePond.registerPlugin(
        // validates the size of the file...
        FilePondPluginFileValidateSize,
        // validates the file type...
        FilePondPluginFileValidateType,

        // calculates & dds cropping info based on the input image dimensions and the set crop ratio...
        FilePondPluginImageCrop,
        // preview the image file type...
        FilePondPluginImagePreview,
        // filter the image file
        FilePondPluginImageFilter,
        // corrects mobile image orientation...
        FilePondPluginImageExifOrientation,
        // calculates & adds resize information...
        FilePondPluginImageResize,
    );
    
    
    // Filepond: Image Filter
    FilePond.create( document.querySelector('.image-filter-filepond'), {
        allowImagePreview: true, 
        allowImageFilter: true,
        allowImageExifOrientation: false,
        allowImageCrop: false,
        imageFilterColorMatrix: [
            0.299, 0.587, 0.114, 0, 0,
            0.299, 0.587, 0.114, 0, 0,
            0.299, 0.587, 0.114, 0, 0,
            0.000, 0.000, 0.000, 1, 0
        ],
        acceptedFileTypes: ['image/png','image/jpg','image/jpeg'],
        fileValidateTypeDetectType: (source, type) => new Promise((resolve, reject) => {
            // Do custom type detection here and return with promise
            resolve(type);
        })
    });


</script>

</div>
<?php include("footer.php");?>