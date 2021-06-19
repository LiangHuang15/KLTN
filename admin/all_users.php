<?php include("slider.php");?>
<div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 d-flex mb-2">
                            <h3 class="col-10 ">Danh người dùng trên hệ thống</h3>
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
                                        <th>Tên người dùng</th>
                                        <th>Giới tính</th>
                                        <th>Tuổi</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Lu su bu</td>
                                        <td>Nam</td>
                                        <td>12</td>
                                        <td>
                                        <a name="edit" href="edit_user.php"><i class="fas fa-edit"></i></a>
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
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
<?php include("footer.php");?>