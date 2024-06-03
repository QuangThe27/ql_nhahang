<div class="col-10 admin-boxright" style="min-height: 100vh;">
                <div class="admin-boxright-heading">

                </div>
                <div class="admin-boxright-body pt-4">
                    <form action="index.php?act=them_dmsp" method="post">
                        <div class="mb-3 mt-3">
                            <label class="form-label">Mã danh mục:</label>
                            <input type="text" class="form-control" name="id_dmsp" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="ten_dmsp" class="form-label">Tên danh mục:</label>
                            <input type="text" class="form-control" id="ten_dmsp" placeholder="Nhập tên danh mục" name="ten_dmsp">
                        </div>

                        <input type="submit" class="input_primary" name="themmoi" value="Thêm mới">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>