


<?php
echo link_tag('css/jquery-ui.css');
echo link_tag('css/prettify.css');
echo link_tag('css/jquery.multiselect.css');
echo script_tag('themes/js/dropdown/jquery-ui.min.js');
echo script_tag('themes/js/dropdown/prettify.js');
echo script_tag('themes/js/dropdown/jquery.multiselect.js');


$i =1;
echo '<table width="520"  border="0" class="todayinfo_tbl" cellpadding="0" cellspacing="1">
	<tr>
        <td align="center" height="30" class="field_title" colspan="8" >Send SMS</td>
  	</tr>
	<tr>
		<td class="field" > Class </td>
		<td></td>
		<td class="info" >
			<select class="class_list" name="class" id="class" onchange = "section_fun();" >
				<option value="x" >-- Select Class --</option>';
				foreach($course as $cs){
				
					echo '<option value="'.$cs->ClassId.'" >'.$cs->ClassName.'</option>';
				}
				
            echo '</select>

		</td>
	</tr>
	<tr>
		<td class="field" > Section </td>
		<td></td>
		<td class="info" >
			<select name="sectionid" id="sectionid" onchange = "numberslist_fun();" >
				<option value="x" >-- Select Section --</option>';	
			echo '</select>

		</td>
	</tr>
	<tr>
		<td class="field" > Student list </td>
		<td></td>
		<td class="info" id = "numberslist" >
			<select name="numberlist" id="numberlist" multiple="multiple" style = "width:160px" >
            </select>';

		echo '</td>
	</tr>
	<tr>
		<td class="field" > Number </td>
		<td></td>
		<td class="info"> <input type = "text" name = "Numbers" id = "Numbers" /> </td>
	</tr>
	<tr>
		<td class="field" >Message</td>
		<td></td>
		<td class="info"> <textarea col = "28" row = "5" name = "Message" id = "Message" > </textarea> </td>
	</tr>
	<tr>
		<td class="field" ></td>
		<td></td>
		<td class="info"> <input type = "button" name = "sendmail" id = "sendmail" onclick = "sendsms_fun();" value = "Send SMS"/> </td>
	</tr>';
 echo  '</table>';
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#numberlist").multiselect({
			noneSelectedText: 'Numbers List'
		});
		
	});
	
</script>
