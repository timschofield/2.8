<table border=0 cellpadding=0 cellspacing=0 bgcolor="#cecece">
  <tr>
    <td>
	
	<table border=0 cellpadding=2 cellspacing=1 align="center"> 
	 <tr bgcolor="#ffffff">
    <td><font color="red"><b>*</b></font><font face="verdana,arial" size=2> {{$LDInternalCodeNr}} </td>
    <td><font face="verdana,arial" size=2>{{$code}}</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td><font color="red"><b>*</b></font><font face="verdana,arial" size=2> {{$LDDescription}} </td>
    <td><font face="verdana,arial" size=2>{{$description}}</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td><font face="verdana,arial" size=2> {{$LDSynonyms}} </td>
    <td><font face="verdana,arial" size=2>{{$synonyms}}</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td colspan=2><font face="verdana,arial" size=2 color="maroon"> {{$LDAuxillaryNotes}}  </td>
  </tr>
  <tr bgcolor="#ffffff">
    <td><font face="verdana,arial" size=2> {{$LDIsSubGroup}} </td>
    <td><font face="verdana,arial" size=2> {{$TP_radio_value}}
        </td>
  </tr>
  <tr bgcolor="#ffffff">
    <td><font face="verdana,arial" size=2> {{$LDParentCodeNr}} </font></td>
    <td><font face="verdana,arial" size=2> {{$parent_code}}</font>
        </td>
  </tr>
  <tr bgcolor="#ffffff">
    <td><font face="verdana,arial" size=2> {{$LDStdCodeNr}} </td>
    <td><font face="verdana,arial" size=2>{{$std_code}}</td>
  </tr>
  <tr bgcolor="#ffffff">
    <td><font face="verdana,arial" size=2> {{$LDExtraNotes}} </td>
    <td><font face="verdana,arial" size=2> {{$notes}} </td>
  </tr>
</table>
	
	</td>
  </tr>
</table>
<p>
<!--  Do not remove the following lines -->
<input type="hidden" name="mode" value="linkgroup">
<input type="submit" value="{{$TP_submit_src}}">
