<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-10" id="staticBackdropLabel">สมัครสมาชิก</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <!-- from สมัครสมาชิก -->
          <form class="mb-3" action="../../auth/saveRegister.php" method="POST" name=form_register onSubmit="JavaScript:return fncSubmit();">
            <div class="row gx-5  mt-2">
              <div class="col">
                <label class="form-label" for="form3Example1cg">ชื่อ</label>
                <div class="form-outline">
                  <input type="text" name="first_name" id="first_name" class="form-control form-control-mg" required>
                </div>
              </div>
              <div class="col">
                <label class="form-label" for="form3Example1cg">นามสกุล</label>
                <div class="form-outline">
                  <input type="text" name="last_name" id="last_name" class="form-control form-control-mg" required>
                </div>

              </div>
            </div>
            <div class="row gx-5">
              <div class="col mt-2">
                <label class="form-label" for="form3Example3cg">อีเมล</label>
                <div class="form-outline">
                  <input type="email" name="email" id="email" class="form-control form-control-mg" required>
                </div>
              </div>
              <div class="col mt-2">
                <label class="form-label" for="form3Example1cg">ที่อยู่</label>
                <div class="form-outline">
                  <input type="text" name="address" id="address" class="form-control form-control-md" required>
                </div>
              </div>
            </div>
            <div class="row gx-5">
              <div class="col mt-2">
                <label for="provinces">จังหวัด:</label>
                <select class="form-control" name="provinces" id="provinces">
                  <option value="<?= $value['name_th'] ?>" selected disabled required>-กรุณาเลือกจังหวัด-</option>
                  <?php foreach ($query as $value) { ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name_th'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col mt-2">
                <label for="amphures">อำเภอ:</label>
                <select class="form-control" name="amphures" id="amphures" required>
                </select>
              </div>
            </div>
            <div class="row gx-5">
              <div class="col mt-2">
                <label for="districts">ตำบล:</label>
                <select class="form-control" name="districts" id="districts" required>
                </select>
              </div>
              <div class="col mt-2">
                <label for="zip_code">รหัสไปรษณีย์:</label>
                <input type="text" name="zip_code" id="zip_code" class="form-control" required>
              </div>
            </div>
            <div class="row gx-5">
              <div class="col mt-2">
                <label class="form-label" for="form3Example1cg">เบอร์โทรศัพท์</label>
                <div class="form-outline">
                  <input type="text" name="phone" id="phone" class="form-control form-control-mg" required>
                </div>
              </div>
              <div class="col mt-2">

              </div>
            </div>
            <div class="row gx-5">
              <div class="col mt-2">
                <label class="form-label" for="form3Example1cg">ชื่อผู้ใช้</label>
                <div class="form-outline">
                  <input type="text" name="username" id="username" class="form-control form-control-mg" required>
                </div>
              </div>
              <div class="col mt-2">
                <label class="form-label" for="form3Example4cg">รหัสผ่าน</label>
                <div class="form-outline">
                  <input type="password" name="password" id="password" class="form-control form-control-mg" required>
                </div>
              </div>
            </div>





            <p class="text-center text-muted mt-5 mb-0">หากมีบัญชีผู้ใช้อยู่แล้ว?<a href="login.php" class="fw-bold text-body"><u> เข้าสู่ระบบ</u></a></p>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
        </div>
        </form>
      </div>
    </div>
  </div>