<table   cellpadding=0 cellspacing=0 border="0" width=700>
	<tr  valign="top">
	<td bgcolor="{{$bgc1}}"  class=fva2_ml10><div   class=fva2_ml10>
         {{$LDRequestTo}}  <br>
		<font size=3>{{$formtitle}}   {{$LDDepartment}}</font>
		<p>
		{{$TP_checkbox_1}}   {{$LDVisitRequested}} <p>

		{{$TP_checkbox_2}}   {{$LDPatCanBeOrdered}} <p>
	
		<font size=1 color="#000099" face="verdana,arial">{{$batch_nr}}</font> <br>
        {{$TP_img_barcode}}
		
	</td>
	<td  bgcolor="{{$bgc1}}"  align="right"><div class=fva2b_ml10> {{$TP_img_patient_label}}	</div></td>
	</tr>
	
	<tr bgcolor="{{$bgc1}}">
		<td colspan=2><div class=fva2_ml10>  {{$LDDiagnosesInquiries}}  <br>
		{{$TP_vspacer_1}}
		  <font face="courier" size=2 color="#000000">
		  <{{$TP_block_1}}> {{$TP_diagnosis_quiry}} </{{$TP_block_1}}><p>
		  </font>
		</td>
	</tr>	

	<tr bgcolor="{{$bgc1}}" valign="top">
		<td ><div class=fva2_ml10><font color="#000099">
		 {{$LDDate}}  :
		 <font face="courier" size=2 color="#000000">
		{{$TP_send_date}}
		{{$TP_calender_1}}
		</font>
  </div></td>
		<td align="right"><div class=fva2_ml10><font color="#000099">
		  {{$LDDoctor}}  
		<font face="courier" size=2 color="#000000">
		<{{$TP_input_1}} type="text" name="send_doctor" size=40 maxlength=40 value="{{$TP_send_doctor}}">
		{{$TP_send_doctor}}_x      
		</font>
  </div></td>
</tr>

	<tr bgcolor="{{$bgc1}}">
		<td colspan=2>
		<div class=fva2_ml10> <br><font color="#000099">  {{$LDDeptReport}}  <br>
		{{$TP_vspacer_2}}
		<{{$TP_block_2}} name="result" cols=80 rows=10 wrap="physical">{{$TP_result}}</{{$TP_block_2}}>
		</div><br>
				</td>
		</tr>	

	<tr bgcolor="{{$bgc1}}">
		<td ><div class=fva2_ml10><font color="#000099">
		{{$LDDate}}  :
		{{$TP_report_date}}
		{{$TP_calendar_2}}
  </div></td>
			<td align="right"><div class=fva2_ml10><font color="#000099">
		  {{$LDDoctor}}  
		<{{$TP_input_2}} type="text" name="result_doctor" size=40 maxlength=40 value="{{$TP_result}}_doctor">
		{{$TP_result}}_doctor_x     
  </div></td>
</tr>
</table>
