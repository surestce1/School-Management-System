<?php

echo "<div class='container'>";
echo "<div class='content_header'>";
/*---------------     content title       ---------------------*/
echo "<div class='content_title'>";
echo $pagetitle.' > '. $event;
echo "</div>";
echo "<div class='content_message'>";

echo "</div>";
/*---------------     content events       ---------------------*/
echo "<div class='content_events'>";

echo "<div class='events'>";
echo "<a href='".$url."subject/listview'>";
echo "<span> <img src='".$url."images/cancel.png' border='0' /></span>";
echo "<span>Cancel</span>";
echo "</a>";
echo "</div>";

echo "<div class='events'>";
echo "<a onclick='save_data(2);'>";
echo "<span><img src='".$url."images/apply.png' border='0' /></span>";
echo "<span>Apply</span>";
echo "</a>";
echo "</div>";

echo "<div class='events'>";
echo "<a onclick='save_data(1);'>";
echo "<span><img src='".$url."images/save.png' border='0' /></span>";
echo "<span>Save</span>";
echo "</a>";
echo "</div>";

echo "</div>";
echo "</div>";
/*---------------     content        ---------------------*/
echo "<div align='center' class='content'>";
echo "<div id ='message'></div>";
echo "<div id ='message1'></div>";
echo "<span class = 'mandatory'>*</span> Specipied fileds are mandatory";
echo "<table border='0' cellpadding='0' cellspacing='0' class='formtable'>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Subject Name<span class = 'mandatory'>*</span></td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' ><input type = 'text' name = 'SubjectName' id = 'SubjectName' onKeyUp='JsCheckChar(this)' /> </td>";
echo "</tr>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Description</td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' ><input type = 'text' name = 'SubjectDes' id = 'SubjectDes' /></td>";
echo "</tr>";

echo "</table>";

echo "</div>";
echo "</div>";
?>
<script>

function validation(){
 	var SubjectName = $('#SubjectName').val();
	if(SubjectName == ''){
		$('#message').html('Subject Name should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#SubjectName').focus();
		return false;
	}else{
		return true;
	}

}

function save_data($e){

 var SubjectName = $('#SubjectName').val();
 var SubjectDes =$('#SubjectDes').val();
 if(validation()){
 		$.ajax({
			type: 'POST',
			url: '<?=$url?>subject/save',
			data: 'SubjectName='+SubjectName+'&SubjectDes='+SubjectDes,
			success: function(response){			
					if(response == 1){
						if($e == 1){
							window.location.href='<?=$url?>subject/listview';
						}else{
							alert('Insert Successfully');
						}	
					}else{
						alert('Insert Not Successfully');
					}
				}
					
		});
	}	
}
				
</script>