<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>


 
<form action="test1-check.php" name="frmMain" id="frmMain" method="post">
<table width="284" border="1">
  <tr>
    <th width="120">CustomerID:</th>
    <td width="238"><input type="number" name="CustomerID" id="CustomerID" size="23" /></td>
    </tr>
  <tr>
    <th width="120">Username:</th>
    <td><input type="text" name="Username" id="Username" size="22" /></td>
    </tr>
  <tr>
    <th width="120">Password:</th>
    <td><input type="Password" name="Password" id="Password" size="22"/></td>
    </tr>
  <tr>
    <th width="120">Name:</th>
    <td><input type="text" name="Name" id="Name" size="22" ></td>
    </tr>
  <tr>
    <th width="120">Tel:</th>
    <td><input type="number" name="Tel" id="Tel" size="22"></td>
    </tr>
  <tr>
    <th width="120">Country:</th>
    <td><input type="text" name="Country" id="Country" size="22"></td>
    </tr>
    <th width="120"></th>

<td><input type="submit" name="send" id="send" value="send"> 
<input type="reset" value="reset"></td>
</tr>
</table>


</form>



<script>

        function send()
        {

            var CustomerID = $("#CustomerID").val();
            var Username = $("#Username").val();
            var Password = $("#Password").val();
            var Name = $("#Name").val();
            var Tel = $("#Tel").val();
            var Country = $("#Country").val();


            var temp = {};
                temp["CustomerID"] = CustomerID;
                temp["Username"] = Username;
                temp["Password"] = Password;
                temp["Name"] = Name;
                temp["Tel"] = Tel;
                temp["Country"] = Country;


            // เตรียมข้อมูลทำการส่ง
            var json = JSON.stringify(temp);


            // ajax

            $.ajax(
            {
                url: "test1-check.php",
                type: "POST",
                data: {"json":json},
                dataType: "json",
                success: function(res) 
                {
                    if(res.success == 1)
                    {
                        alert(res.message);
                    }
                    else
                    {
                        alert(res.message);

                    }

                }

            });

        }

	</script>
 
</body>
</html>
</body>
</html>

