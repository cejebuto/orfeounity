<html>
<HEAD>
     <TITLE>Anyadir Filas Dinámicamente en HTML by jotaerre.net</TITLE>
     <SCRIPT language="javascript">
     var j=0;
     var c=0;
          function addRow(tableID) {
               j=j+1;
               c=c+1;
               document.frmcreate.contador.value=c;

               var myarray=new Array(3)
               myarray[0] = "VarChar";
               myarray[1] = "Int";
               myarray[2] = "Email";
               myarray[3] = "Sexo";
               myarray[4] = "Fecha";
               myarray[5] = "Pais";
               myarray[6] = "Ciudad-Municipio";

               var table = document.getElementById(tableID);
               var rowCount = table.rows.length;
               var row = table.insertRow(rowCount); 

               var cell1 = row.insertCell(0);
               var element1 = document.createElement("input");
               element1.type = "checkbox";
               cell1.appendChild(element1);

               var cell2 = row.insertCell(1);
               var element2 = document.createElement("input");
               element2.id="label_usuario"+j;
               element2.name="label_usuario"+j;
               element2.type = "text";
               cell2.appendChild(element2);

               var cell3 = row.insertCell(2);
               var element3 = document.createElement("input");
               element3.id="label_sistema"+j;
               element3.name="label_sistema"+j;
               element3.type = "text";
               cell3.appendChild(element3);

               var cell4 = row.insertCell(3);
               var element4 = document.createElement("select");
               var opt = document.createElement('option');
               element4.name="label_tipo"+j;
               for (var i = 0; i<=6; i++){
                var opt = document.createElement('option');
                opt.value = i;
                opt.innerHTML = myarray[i];
                element4.appendChild(opt);
                }
               cell4.appendChild(element4);

               var cell5 = row.insertCell(4);
               var element5 = document.createElement("input");
               element5.type = "checkbox";
               element5.checked =true;
               cell5.appendChild(element5);
          }
          function deleteRow(tableID) {
               try {
               var table = document.getElementById(tableID);
               var rowCount = table.rows.length;
               for(var i=0; i<rowCount; i++) {
                    var row = table.rows[i];
                    var chkbox = row.cells[0].childNodes[0];
                    if(null != chkbox && true == chkbox.checked) {
                         table.deleteRow(i);
                         rowCount--;
                         i--;
                         c--;
                        document.frmcreate.contador.value=document.getElementById('contador').value - 1; 
                    }
               }
               }catch(e) {
                    alert(e);
               }
          }
     </SCRIPT>

</HEAD>
<BODY>
    <INPUT type="button" class="btn btn-success" value="A&ntilde;adir Campo" onclick="addRow('dataTable');" />
     <INPUT type="button" class="btn btn-danger" value="Borrar Campo" onclick="deleteRow('dataTable');" /><br><br>
     <form action="/module/mod_generateform/process/pro_generateform.php" name="frmcreate" method="post">

     TITULO PARA LA CODUMENTACION (AFILIACIONES, CLIENTES): <br>
     <INPUT type="text" name="TITULO_D" required/><br>
        
     TITULO para el sistema(record, client): <br>
     <INPUT type="text" name="TITULO_S"  required/><br>
     VALUE PARA EL ADD(A,AC,AD): <br>
     <INPUT type="text" name="VALUE_S" required/><br><br>

     <TABLE id="dataTable" width="350px" border="1">
            <TR>
               <TD>CHK</TD>
               <TD>Nombre Label</TD>
               <TD> Nombre Sistema</TD>
               <TD> Tipo de Valor</TD>
               <TD>Visible</TD>
          </TR>
     </TABLE><br>
<TD><INPUT type="hidden" id="contador" NAME="contador" value=0 /></TD>
 <p><input type="submit" id="btn_sumbit" class="btn btn-primary" value="Enviar" /></p>
 <br>
 <br>
 <br>
</form>
</BODY>

</html>
