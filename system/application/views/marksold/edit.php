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
echo "<a href='".$url."marks/listview/".$this->session->userdata('yearmx')."'>";
echo "<span> <img src='".$url."images/cancel.png' border='0' /></span>";
echo "<span>Cancel</span>";
echo "</a>";
echo "</div>";

echo "<div class='events'>";
echo "<a onclick='update_data(2);'>";
echo "<span><img src='".$url."images/apply.png' border='0' /></span>";
echo "<span>Apply</span>";
echo "</a>";
echo "</div>";

echo "<div class='events'>";
echo "<a onclick='update_data(1);'>";
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
echo "<span class = 'mandatory'>*</span> Specified fileds are mandatory";
echo "<table border='0' cellpadding='0' cellspacing = '0' class='formtable'>";
foreach($result as $row):
echo "<input type='hidden' name = 'MarksId' id = 'MarksId' value = '".$row->MarksId."'";


echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Class <span class = 'mandatory'>*</span></td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' >";
echo "<select name = 'ClassId' id = 'ClassId' onchange = 'section_fun();' >";
echo "<option value = 'x'>- - Select Class - -</option>";
foreach($course as $rowa1):
if($row->StudentClass == $rowa1->ClassId){
	echo "<option value = '".$rowa1->ClassId."' selected ='selected'>".$rowa1->ClassName."</option>";
}else{
	echo "<option value = '".$rowa1->ClassId."' >".$rowa1->ClassName."</option>";
}	
endforeach;
echo "</select>";
echo "</td></tr>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Section<span class = 'mandatory'>*</span></td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' >";
echo "<select name = 'SectionId' id = 'SectionId' onchange = 'studentlist_fun();' >";
echo "<option value = 'x'>- - Select Section - -</option>";
foreach($section as $rowa){
	if($row->SectionId == $rowa->SectionId){
		echo "<option value = '".$rowa->SectionId."' selected = 'selected'>". $rowa->SectionName."</option>";
	}else{
		echo "<option value = '".$rowa->SectionId."' >". $rowa->SectionName."</option>";
	}
}	
echo "</select>";
echo "</td></tr>";


echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Student Roll No<span class = 'mandatory'>*</span></td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' >";
echo "<select name = 'RollNo' id = 'RollNo' >";
echo "<option value = 'x'>- - Select RollNo - -</option>";
echo "<option value = '".$row->RollNo."' selected = 'selected'>". $row->RollNo."</option>";
echo "</select>";
echo "</td></tr>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Exam Type<span class = 'mandatory'>*</span></td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' >";
echo "<select name = 'ExamTypeId' id = 'ExamTypeId' onchange='totalmarks();'>";
echo "<option value = 'x'>- - Select Exam - -</option>";
foreach($examtype as $rowb):
	if($rowb->ExamId == $row->ExamTypeId){
		echo "<option value = '".$rowb->ExamId."' selected = 'selected'>";
		echo $rowb->ExamType;
		echo "</option>";
	}else{
		echo "<option value = '".$rowb->ExamId."' >";
		echo $rowb->ExamType;
		echo "</option>";
	}
endforeach;
echo "</select>";
echo "</td></tr>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Total Marks</td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' ><input type = 'text' name = 'TotalMarks' id = 'TotalMarks' readonly='readonly' value='".$row->TotalMarks ."' /> </td>";
echo "</tr>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Subject Name</td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' >";
echo "<select name = 'SubjectId' id = 'SubjectId' >";
echo "<option value = 'x'>- - Select Subject - -</option>";
foreach($subject as $rowc):
	if($row->SubjectId == $rowc->SubjectId){
		echo "<option value = '".$rowc->SubjectId."' selected = 'selected' >";
		echo $rowc->SubjectName;
		echo "</option>";
	}else{
		echo "<option value = '".$rowc->SubjectId."' >";
		echo $rowc->SubjectName;
		echo "</option>";
	}
endforeach;
echo "</select>";
echo "</td></tr>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Marks</td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' ><input type = 'text' name = 'Marks' id = 'Marks' value = '".$row->Marks."' onKeyUp='JsCheckNumber(this)' /> </td>";
echo "</tr>";

echo "<tr>";
echo "<td align='right' width='15%' class = 'datafield' >Description</td>";
echo "<td width='2%' class='spacetd' > </td>";
echo "<td width='33%' class = 'dataview' ><input type = 'text' name = 'MarksDes' id = 'MarksDes' value='".$row->MarksDes."'/></td>";
echo "</tr>";
endforeach;
echo "</table>";

echo "</div>";
echo "</div>";
?>
<script>

function validation(){
 
	 var ClassId = $('#ClassId').val();
	 var SectionId = $('#SectionId').val();
	 var RollNo = $('#RollNo').val();
	 var ExamId = $('#ExamTypeId').val();
	 var TotalMarks = $('#TotalMarks').val();
	 var SubjectId =$('#SubjectId').val();
	 var Marks = $('#Marks').val();
	 var MarksDes = $('#MarksDes').val();
	 
	  if(ClassId == 'x'){
	 	$('#message').html('Class should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#ClassId').focus();
		return false;
	 }else if(SectionId == 'x'){
	 	$('#message').html('Section should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#SectionId').focus();
		return false;
	 }else if(RollNo =='x'){
		$('#message').html('RollNo should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#RollNo').focus();
		return false;
	}else if(ExamId == 'x'){
		$('#message').html('Exam Type should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#ExamId').focus();
		return false;
	}else if(TotalMarks == ''){
		$('#message').html('Total Marks should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#TotalMarks').focus();
		return false;
	}else if(SubjectId == 'x'){
		$('#message').html('Subject should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#SubjectId').focus();
		return false;
	}else if(Marks == ''){
		$('#message').html('Marks should not be blank').show().fadeOut('slow').fadeIn('slow');
		$('#Marks').focus();
		return false;
	}else{
		return true;
	}
}

function update_data($e){
 
 
 var ClassId = $('#ClassId').val();
 var SectionId = $('#SectionId').val();
 var MarksId = $('#MarksId').val();
 var RollNo = $('#RollNo').val();
 var ExamId = $('#ExamTypeId').val();
 var TotalMarks = $('#TotalMarks').val();
 var SubjectId =$('#SubjectId').val();
 var Marks = $('#Marks').val();
 var MarksDes = $('#MarksDes').val();
 alert(Marks);
 if(validation()){
 		$.ajax({
				type: 'POST',
				url: '<?=$url?>marks/update',
				data: 'ClassId='+ClassId+'&SectionId='+SectionId+'&MarksId='+MarksId+'&RollNo='+RollNo+'&ExamId='+ExamId+'&TotalMarks='+TotalMarks+'&SubjectId='+SubjectId+'&Marks='+Marks+'&MarksDes='+MarksDes,
				success: function(response){
				        alert(response);					
						if(response == 1){
							if($e == 1){
								window.location.href='<?=$url?>marks/listview/<?=$this->session->userdata('yearmx')?>';
							}else{
								alert('Update Successfully');
							}
						}else{
							alert('Update Not Successfully');
						}
					}
					
		});
	}	
}

function totalmarks(){
	 var ExamTypeId = $('#ExamTypeId').val();
 	 $.ajax({
			type: 'POST',
			url: '<?=$url?>marks/examtype',
			data: 'ExamTypeId='+ExamTypeId,
			success: function(response){
					if(response != ''){
						var totalmarks = $('#TotalMarks').val();
						$('#TotalMarks').val(totalmarks.replace(totalmarks, response ));
					}else{
						alert('Please set exam marks');
					}
			}
					
	 });
}	

function section_fun(){
	var Class = $('#ClassId').val();
	  
 		$.ajax({
				type: 'POST',
				url: '<?=$url?>marks/section',
				data: 'Class='+Class,
				success: function(response){
				    alert(response);
						if(response != ''){
							$('#SectionId').html(response);
						}
					}	
		});
}
function studentlist_fun(){
	var Class = $('#ClassId').val();
	var SectionId = $('#SectionId').val();
 		$.ajax({
				type: 'POST',
				url: '<?=$url?>marks/studentlist',
				data: 'Class='+Class+'&SectionId='+SectionId,
				success: function(response){
						if(response != ''){
							$('#RollNo').html(response);
						}
					}	
		});
}						


</script>
