<div class="modal" tabindex="-1" id="BackdropCancelOrder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ยืนยันยกเลิกการสั่งซื้อ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>หากทำการยกเลิกคำสั่งซื้อแล้ว ไม่สามารถแก้ไขได้</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <a href="cancel_order.php?id=<?php echo $order['o_id'] ?>&action=cancel" class="btn btn-danger" role="button" aria-pressed="true">ยืนยัน</a>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="BackdropCancelOrder2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ยืนยันยกเลิกการสั่งซื้อ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>หากทำการยกเลิกคำสั่งซื้อแล้ว ไม่สามารถแก้ไขได้</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <a href="cancel_order.php?id=<?php echo $order['o_id'] ?>&action=cancel" class="btn btn-danger" role="button" aria-pressed="true">ยืนยัน</a>
            </div>
        </div>
    </div>
</div>