<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
  $('#provinces').change(function() {
    var id_province = $(this).val();
 
      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_province,function:'provinces'},
      success: function(data){
          $('#amphures').html(data); 
          $('#districts').html(' '); 
          $('#districts').val(' ');  
          $('#zip_code').val(' '); 
      }
    });
  });
 
  $('#amphures').change(function() {
    var id_amphures = $(this).val();
 
      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_amphures,function:'amphures'},
      success: function(data){
          $('#districts').html(data);  
      }
    });
  });
 
   $('#districts').change(function() {
    var id_districts= $(this).val();
 
      $.ajax({
      type: "POST",
      url: "ajax_db.php",
      data: {id:id_districts,function:'districts'},
      success: function(data){
          $('#zip_code').val(data)
      }
    });
  
  });
  function fncSubmit()
{
  //ตรวจสอบการกรอกข้อมูล ชื่อ
	/*if(document.form_register.first_name.value == "")
	{
        
		alert('กรุณากรอกชื่อ');
		document.form_register.first_name.focus();
		return false;
	}	*/

  //ตรวจสอบการกรอกข้อมูล นามสกุล
  /*if(document.form_register.last_name.value == "")
	{
        
		alert('กรุณากรอกนามสกุล');
		document.form_register.last_name.focus();
		return false;
	}	

  //ตรวจสอบการกรอกข้อมูล อีเมล
  if(document.form_register.email.value == "")
	{
        
		alert('กรุณากรอกอีเมล');
		document.form_register.email.focus();
		return false;
	}	

  //ตรวจสอบการกรอกข้อมูล ที่อยู่
  if(document.form_register.address.value == "")
	{
        
		alert('กรุณากรอกที่อยู่');
		document.form_register.address.focus();
		return false;
	}	

  //ตรวจสอบการกรอกข้อมูล จัหวัด
  if(document.form_register.provinces.value == "")
	{
        
		alert('กรุณาเลือกจังหวัด');
		document.form_register.provinces.focus();
		return false;
	}	

  //ตรวจสอบการกรอกข้อมูล อำเภอ
  if(document.form_register.amphures.value == "")
	{
        
		alert('กรุณาเลือกอำเภอ');
		document.form_register.amphures.focus();
		return false;
	}	

  //ตรวจสอบการกรอกข้อมูล ตำบล
  if(document.form_register.districts.value == "")
	{
        
		alert('กรุณาเลือกตำบล');
		document.form_register.districts.focus();
		return false;
	}	

  //ตรวจสอบการกรอกข้อมูล รหัสไปรษณีย์
  if(document.form_register.zip_code.value == "")
	{
        
		alert('กรุณากรอกรหัสไปรษณีย์');
		document.form_register.zip_code.focus();
		return false;
	}	

  //ตรวจสอบการกรอกข้อมูล เบอร์โทรศัพท์
  if(document.form_register.phone.value == "")
	{
        
		alert('กรุณากรอกเบอร์โทรศัพท์');
		document.form_register.phone.focus();
		return false;
	}	

  //ตรวจสอบการกรอกข้อมูล ชื่อผู้ใช้
  if(document.form_register.username.value == "")
	{
        
		alert('กรุณากรอกชื่อผู้ใช้');
		document.form_register.username.focus();
		return false;
	}	

  //ตรวจสอบการกรอกข้อมูล รหัสผ่าน
  if(document.form_register.password.value == "")
	{
        
		alert('กรุณากรอกรหัสผ่าน');
		document.form_register.password.focus();
		return false;
	}	*/
  
    
}
</script>