<?php include("slider.php");?>
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 d-flex mb-2">
                            <h3 class="col-10 ">Danh sách phim</h3>
                            <a  href="add_new_movie.php" class="btn btn-primary float-right">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên phim</th>
                                        <th>Thể loại</th>
                                        <th>Đánh giá trung bình</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Lu su bu</td>
                                        <td>Xàm xí</td>
                                        <td><i class="fas fa-star" style="color: #F1AF00;"></i> 4.5/5</td>
                                        <td>
                                        <a name="edit" href="#"><i class="fas fa-edit"></i></a>
                                        <a name ="remove" href="#"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
            </div>
            
            <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
            <script>         
                let table1 = document.querySelector('#table1');
                let dataTable = new simpleDatatables.DataTable(table1);
            </script>
<?php include("footer.php");?>