<?php include("slider.php");?>


<section id="basic-horizontal-layouts">
                    <div class="row match-height">
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Cập nhật thông tin người dùng</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label>ID</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="userid" class="form-control"
                                                            name="fname" placeholder="123" disabled>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Tên người dùng</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="text" id="user-name" class="form-control"
                                                            name="user-name" placeholder="Nguyễn ô nội">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Giới tính</label>
                                                    </div>
                                                   
                                                    <fieldset class="col-md-8 form-group">
                                                        <select class="form-select" id="gender">
                                                            <option value="F">Nữ</option>
                                                            <option value="N">Nam</option>
                                                        </select>
                                                    </fieldset>
                                                    <div class="col-md-4">
                                                        <label>Ngày sinh</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                        <input type="date" id="user-name" class="form-control"
                                                            name="user-name" placeholder="Nguyễn ô nội">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label>Nghề nghiệp</label>
                                                    </div>
                                                    <div class="col-md-8 form-group">
                                                    <select class="form-select" id="jobTitle">
                                                                    <option value="1">academic/educator</option>
                                                                    <option value="2">artist</option>
                                                                    <option value="3">clerical/admin</option>
                                                                    <option value="4">college/grad student</option>
                                                                    <option value="5">customer service</option>

                                                                    <option value="6" >doctor/health care</option>
                                                                    <option value="7">executive/managerial</option>
                                                                    <option value="8">farmer</option>
                                                                    <option value="9">homemaker</option>

                                                                    <option value="10">K-12 student</option>
                                                                    <option value="11">lawyer</option>
                                                                    <option value="12">programmer</option>
                                                                    <option value="13">retired</option>
                                                                    <option value="14">sales/marketing</option>
                                                                    <option value="15">scientist</option>
                                                                    <option value="16">self-employed</option>
                                                                    <option value="17">technician/engineer</option>
                                                                    <option value="18">tradesman/craftsman</option>
                                                                    <option value="19">unemployed</option>
                                                                    <option value="20">writer</option>
                                                                    <option value="0">orther</option>
                                                        </select>
                                                    </div>
                                
                                                    <div class="col-sm-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Cập nhật</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Bỏ qua</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </section>
                <?php include("footer.php");?>