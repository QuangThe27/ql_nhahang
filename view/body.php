<div class="container-full">
            <div class="row">
                <div class="col-3">
                    <div class="container__left">
                        <form class="container__left-headeing" action="/action_page.php">
                            <label for="search" class="form-label">Tìm kiếm sản phẩm:</label>
                            <div class="d-flex">
                                <input class="form-control me-2" type="text" placeholder="Search" id="search">
                                <button class="btn" type="button">Search</button>
                            </div>
                        </form>

                        <div class="container__left-body pt-3">
                            <label for="" class="form-label">Danh mục sản phẩm:</label>

                            <?php
                                foreach ($danhmuc_sp as $dmsp) {
                                    extract($dmsp);
                                    echo '<ul class="nav flex-column">
                                        <li class="nav-item">
                                        <a class="nav-link" href="#">'.$tenDm.'</a>
                                        </li>
                                    </ul>';
                                }
                            ?>
                        </div>
                    </div>             
                </div>

                <div class="col-9 container__rgiht">
                    <div class="container__rgiht-heading">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Giá tăng
                                    <i class="fa-solid fa-caret-up"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Giá giảm
                                    <i class="fa-solid fa-caret-down"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#">Sale</a>
                            </li>
                          </ul>
                    </div>
                    <div class="container__rgiht-body pt-3">
                        <div class="row">
                            <?php
                                foreach ($danhsach_sp as $sp) {
                                    extract($sp);
                                    $hinh = 'upload/'.$hinhAnh;
                                    $hinh2 = '';
                                    
                                    echo '<div class="col-3 pb-3">
                                        <div class="card container__rgiht-card">
                                            <a href="#">
                                                <img class="card-img-top" src="'.$hinh.'"  onerror="this.onerror=null; this.src='.$hinh2.';">
                                            </a>
                                            <div class="card-body">
                                            <h5 class="card-title">'.$tenSp.'</h5>
                                            <p class="card-text">'.$giaTien.' VNĐ</p>
                                            <a href="#" class="btn btn-primary">Đặt hàng</a>
                                            </div>
                                        </div>
                                    </div>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>