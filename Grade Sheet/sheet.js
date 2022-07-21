
    function GetSelected() {
        //Reference the Table.
        var grid = document.getElementById("Table1");
 
        //Reference the CheckBoxes in Table.
        var checkBoxes = grid.getElementsByTagName("INPUT");
        var message = "Id item \n";
 
        //Loop through the CheckBoxes.
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                var row = checkBoxes[i].parentNode.parentNode;
                message += row.cells[1].innerHTML;
                message += "   " + row.cells[2].innerHTML;
                message += "\n";
            }
        }
 
        //Display selected Row data in Alert Box.
        document.write(message);
    }

// <!--REmove item fron gradesheet-->

function deleteRow(r) 
{
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("myTable").deleteRow(i);
}

// Radio option storing


const myForm = document.forms['my-form']
myForm.radioChoice = {} 
myForm.oninput = ({target}) =>
  {
    if( target.type === 'radio')
      {
        if (!myForm.radioChoice[target.name])
          myForm.radioChoice[target.name] = target.value
        else
          myForm[target.name].value = myForm.radioChoice[target.name]
      }
  }


function InsertRecord()  
        {  
            var txtid = document.getElementById('txtid').value;  
            var txtname = document.getElementById('txtname').value;  
            var txtsalary = document.getElementById('txtsalary').value;  
            var txtcity = document.getElementById('txtcity').value;  
            if (txtid.length != 0 || txtname.length !=0 || txtsalary.length !=0|| txtcity.length !=0)  
            {  
                var connection = new ActiveXObject("ADODB.Connection");  
                var connectionstring = "Data Source=.;Initial Catalog=EmpDetail;Persist Security Info=True;User ID=sa;Password=****;Provider=SQLOLEDB";  
                connection.Open(connectionstring);  
                var rs = new ActiveXObject("ADODB.Recordset");  
                rs.Open("insert into Emp_Info values('" + txtid + "','" + txtname + "','" + txtsalary + "','" + txtcity + "')", connection);  
                alert("Insert Record Successfuly");  
                txtid.value = " ";  
                connection.close();  
            }  
            else  
            {              
                alert("Please Enter Employee \n Id \n Name \n Salary \n City ");  
            }  
        } 
      
        // function lock()
        // { 
          
        //   document.getElementById("lock1").disabled = true;
        //   document.getElementById("lock2").disabled = true;
        //   document.getElementById("lock3").disabled = true;
        //   alert("The sheet has been locked.")
        //   document.getElementById("lockshow").style.display = "block";
        // }
      


// window.onload = function() {
// var pup = document.getElementById('lock')[0];
// pup.onclick=function(){
// document.getElementsByClassName('lockshow').style.display="block";
// document.getElementById('opacity')[0].style.display="block";
// };
// var close = document.getElementById('close');
// close.onclick=function(){
// document.getElementById('sh').style.display="none";
// document.getElementsByClassName('blur')[0].style.display="none";
// };
// };

function lock()
{
  document.getElementById('lock1').style.pointerEvents = 'none';
  document.getElementById('lock2').style.pointerEvents = 'none';
  document.getElementById('lock3').style.pointerEvents = 'none';
  document.getElementById("overlay").style.display = "block";
}


      function Unlock()
        { 
          
          document.getElementById('lock1').style.pointerEvents = 'auto';
  document.getElementById('lock2').style.pointerEvents = 'auto';
  document.getElementById('lock3').style.pointerEvents = 'auto';
  document.getElementById("overlay").style.display = "none";
        }
      