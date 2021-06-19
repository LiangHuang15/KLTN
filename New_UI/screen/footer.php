
 <footer class="bg-white">
     <div class="container py-5">
         <div class="row py-3">
             <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                 <h6 class="text-uppercase font-weight-bold mb-4">Thông tin</h6>
                 <ul class="list-unstyled mb-0">
                     <li class="mb-2"><a href="#" class="text-muted">Liên hệ</a></li>
                     <li class="mb-2"><a href="#" class="text-muted">Về chúng tôi</a></li>
                     <li class="mb-2"><a href="#" class="text-muted">Stories</a></li>
                     <li class="mb-2"><a href="#" class="text-muted">Press</a></li>
                 </ul>
             </div>
            
             <div class="col-lg-4 col-md-6 mb-lg-0">
                 <h6 class="text-uppercase font-weight-bold mb-4">Địa chỉ</h6>
                 <p class="text-muted mb-4">Song Hành, khu phố 6, Thủ Đức, Thành phố Hồ Chí Minh, Vietnam</p>
                 <ul class="list-inline mt-4">
                     <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fab fa-2x fa-twitter"></i></a></li>
                     <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fab fa-2x fa-facebook-f"></i></a></li>
                     <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fab fa-2x fa-instagram"></i></a></li>
                     <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fab fa-2x fa-youtube"></i></a></li>
                     <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fab fa-2x fa-google"></i></a></li>
                 </ul>
             </div>
         </div>
     </div>
     <hr class="p-0 m-0 b-0">
     <div class="bg-light py-2">
         <div class="container text-center">
             <p class="text-muted mb-0 py-2">© 2021 Đồ án Hệ thống gợi ý </p>
         </div>
     </div>
 </footer>
    <!-- <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/carousel.js"></script> -->
    <script src="../js/carousel_new/carousel.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://kit.fontawesome.com/b2b49d16dc.js" crossorigin="anonymous"></script>

  </body>
</html>
<!-- onclick detail  -->

<script>
function detail(clicked_id)
{
  $temp  = clicked_id;
  window.location.href = "detail.php?id="+$temp;
}
</script>	
<!-- end onclick detail  -->

<!-- onclick genres  -->

<script>

    function newpage(clicked_id)
    {
      $temp  = clicked_id;
      window.location.href = "genres.php?id="+$temp;

    }

</script>	
<!-- end onclick genres  -->