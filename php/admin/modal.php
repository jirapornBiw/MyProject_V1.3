<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ลบข้อมูล</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="delete.php" method="get">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">กรุณากดยืนยัน เพื่อลบข้อมูล</label>
            <input type="hidden" class="form-control" id="recipient-name" name="id" value="recipient-name">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-danger">ยืนยัน</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModaldeleteProduct" tabindex="-1" aria-labelledby="exampleModaldeleteProductLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModaldeleteProductLabel">ลบข้อมูล</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="delete.php" method="get">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">กรุณากดยืนยัน เพื่อลบข้อมูล</label>
            <input type="hidden" class="form-control" id="recipient-name" name="id" value="recipient-name">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-danger">ยืนยัน</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModalNewTracking" tabindex="-1" aria-labelledby="exampleModalNewTrackingLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalNewTrackingLabel">เพิ่มหมายเลขพัสดุใหม่</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../claims/save_tracking.php" method="post">       
            <!-- <input type="hidden" class="form-control"> -->
            <input type="hidden" class="form-control" id="recipient-name" name="id" value="recipient-name">
          <div class="mb-3">
            <label  class="col-form-label">หมายเลขพพัสดุ</label>
            <input type="text" class="form-control" name="tracking" id="tracking" required>
          </div>
          <div class="mb-3">
            <label  class="col-form-label">บริษัทขนส่ง</label>
            <input type="text" class="form-control" name="company" id="company" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">ยืนยัน</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  const exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModal.querySelector('.modal-title')
    const modalBodyInput = exampleModal.querySelector('.modal-body input')

    // modalTitle.textContent = `New message to ${recipient}`
    modalTitle.textContent = `ลบข้อมูลข่าวสาร รหัส : ${recipient}`
    modalBodyInput.value = recipient
  })

  const exampleModaldeleteProduct = document.getElementById('exampleModaldeleteProduct')
  exampleModaldeleteProduct.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModaldeleteProduct.querySelector('.modal-title')
    const modalBodyInput = exampleModaldeleteProduct.querySelector('.modal-body input')

    // modalTitle.textContent = `New message to ${recipient}`
    modalTitle.textContent = `ลบข้อมูลสินค้า รหัส : ${recipient}`
    modalBodyInput.value = recipient
  })

  const exampleModalNewTracking = document.getElementById('exampleModalNewTracking')
  exampleModalNewTracking.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    const recipient = button.getAttribute('data-bs-whatever')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    const modalTitle = exampleModalNewTracking.querySelector('.modal-title')
    const modalBodyInput = exampleModalNewTracking.querySelector('.modal-body input')

    // modalTitle.textContent = `New message to ${recipient}`
    modalTitle.textContent = `เพิ่มหมายเลขพัสดุใหม่ รหัสสั่งซื้อ : ${recipient}`
    modalBodyInput.value = recipient
  })
</script>