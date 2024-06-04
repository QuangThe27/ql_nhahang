<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading">

                </div>
                <div class="admin-boxright-body pt-4">
                    <form action="index.php?act=them_dmtk" method="post">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Mã danh mục:</label>
                            <input type="text" class="form-control" name="id_dmtk" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ten_dmtk" class="form-label">Loại tài khoản:</label>
                            <input type="text" class="form-control" id="ten_dmtk" placeholder="Nhập tên loại tài khoản" name="ten_dmtk">
                        </div>
                        
                        <input type="submit" class="input_primary" name="themmoi" value="Thêm mới">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>