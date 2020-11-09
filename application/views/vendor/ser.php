<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Icon trigger</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "images/calendar.gif",
      buttonImageOnly: true,
      buttonText: "Select date"
    });
  } );
  </script>
</head>
<body>
 
<p>Date: <input type="text" id="datepicker"></p>
 
 
</body>
</html>
<table>
    <tr>
        <th id="facility_header">Facility name</th>
        <th>Phone #</th>
        <th id="city_header">City</th>
        <th>Speciality</th>
    </tr>
    <tr>
        <td>CCC</td>
        <td>00001111</td>
        <td>Amsterdam</td>
        <td>GGG</td>
    </tr>
    <tr>
        <td>JJJ</td>
        <td>55544444</td>
        <td>London</td>
        <td>MMM</td>
    </tr>
    <tr>
        <td>AAA</td>
        <td>33332222</td>
        <td>Paris</td>
        <td>RRR</td>
    </tr>
</table>
<style>
td, th { border: 1px solid #111; padding: 6px; }
th { font-weight: 700; }

</style>
<script>
        var table = $('table');

    $('#facility_header, #city_header')
      .wrapInner('<span title="sort this column"/>')
      .each(function() {

        var th = $(this),
          thIndex = th.index(),
          inverse = false;

        th.click(function() {

          table.find('td').filter(function() {

            return $(this).index() === thIndex;

          }).sortElements(function(a, b) {

            return $.text([a]) > $.text([b]) ?
              inverse ? -1 : 1 :
              inverse ? 1 : -1;

          }, function() {

            // parentNode is the element we want to move
            return this.parentNode;

          });

          inverse = !inverse;

        });

      });

</script>




<html>
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkr {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkr {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkr {
  background-color: #2196F3;
}

/* Create the checkr/indicator (hidden when not checked) */
.checkr:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkr when checked */
.container input:checked ~ .checkr:after {
  display: block;
}

/* Style the checkr/indicator */
.container .checkr:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<body>

<h1>Custom Radio Buttons</h1>
<label class="container">One
  <input type="radio" checked="checked" name="radio">
  <span class="checkr"></span>
</label>
<label class="container">Two
  <input type="radio" name="radio">
  <span class="checkr"></span>
</label>
</body>  
</html>
<!-- DataTable cdn and script
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
 <script>
 id="table1" (id give to table)
 
    $(document).ready(function () {
        $('#table1').DataTable();
    });-->
	</script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<div class="field_wrapper">
    <div>
     <select name="ser" >
			<option value="General Checkup">General Checkup</option>
			<option value="Root Canal">Root Canal</option>
			<option value="Dental Implant">Dental Implant</option>
			<option value="Cleaning">Cleaning</option>
			<option value="Tooth Fillings">Tooth Fillings</option>
			<option value="Braces">Braces</option>
			<option value="Dental Implant">Dental Implant</option>
			<option value="Cleaning">Cleaning</option>
		</select>  
		<input type="text" class="form-control"   name="price"    placeholder="Price in (€)">
		 <button class="add_button btn btn-lg btn-success" type="submit" name="service"><i class="glyphicon glyphicon-ok-sign"></i> +Add</button>
    </div>
</div>

<script>
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><select name="ser" ><option value="General Checkup">General Checkup</option>	<option value="Root Canal">Root Canal</option><option value="Dental Implant">Dental Implant</option><option value="Cleaning">Cleaning</option><option value="Tooth Fillings">Tooth Fillings</option><option value="Braces">Braces</option><option value="Dental Implant">Dental Implant</option><option value="Cleaning">Cleaning</option></select>  <input type="text" class="form-control"   name="price"    placeholder="Price in (€)"><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
<br><br><br><br><br><br><br><br>



<h2> increment in dropdown and text box dynamiclly</h2>

<!doctype html>
<html lang="en">
 <head>
 <title>Document</title>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
</head>

<body>

<form action = 'testselectprocess.php' method='POST'>

<div>
<select id='test' name='test0'>
			<option value="General Checkup">General Checkup</option>
			<option value="Root Canal">Root Canal</option>
			<option value="Dental Implant">Dental Implant</option>
			<option value="Cleaning">Cleaning</option>
			<option value="Tooth Fillings">Tooth Fillings</option>
			<option value="Braces">Braces</option>
			<option value="Dental Implant">Dental Implant</option>
			<option value="Cleaning">Cleaning</option>
		</select>  

<input id='counting' type="text" class="form-control"   name="price"    placeholder="Price in (€)">
		
</div>
   
 <button class="more btn btn-lg btn-success" type="button" name="service"><i class="glyphicon glyphicon-ok-sign"></i> +Add</button>
<script>
var c=0;
$('.more').on('click', function() {
c++;
//alert(c);
$(this).before( $(this).prev().clone());
$('#test').attr('name', 'test'+ c)
$('#counting').attr('name', 'count'+ c)
});


</script>


</form>

 </body>
</html>

<br>
<br>
<br>
<br>
<br>
<br>


<!DOCTYPE html>
<html>
<body>

<?php
$age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);

 $data=json_encode($age);
 echo $data;
?>

</body>
</html>
<br><br>
<?php  
$json = '
{
    "toppings": [
        { "id": "5002", "type": "Glazed" },
        { "id": "5006", "type": "Chocolate with Sprinkles" },
        { "id": "5004", "type": "Maple" }
    ]
}';

 $yummy = json_decode($json);  

echo $yummy->toppings[2]->id; //5004
?>  

<br><br><br>

<table id="memListTable" class="display" style="width:100%">
    <thead>
        <tr>
<!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/css/datatable-bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/css/datatable-bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/css/datatable.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/css/datatable.min.css"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/js/datatable.jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/js/datatable.jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/js/datatable.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/js/datatable.min.js"></script>-->

<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	
<!--<img src="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/img/sort_desc.png">
<img src="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/img/sort_asc.png">
<img src="https://cdnjs.cloudflare.com/ajax/libs/datatable/2.0.1/img/sort_both.png">
<img src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.20/images/sort_asc_disabled.png">--->



  <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">

 
 



<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>
<table id="table1">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Occupation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Ram</td>
            <td>21</td>
            <td>Male</td>
            <td>Doctor</td>
        </tr>
        <tr>
            <td>Mohan</td>
            <td>32</td>
            <td>Male</td>
            <td>Teacher</td>
        </tr>
        <tr>
            <td>Rani</td>
            <td>42</td>
            <td>Female</td>
            <td>Nurse</td>
        </tr>
        <tr>
            <td>Johan</td>
            <td>23</td>
            <td>Female</td>
            <td>Software Engineer</td>
        </tr>
        <tr>
            <td>Shajia</td>
            <td>39</td>
            <td>Female</td>
            <td>Farmer</td>
        </tr>
        <tr>
            <td>Jack</td>
            <td>19</td>
            <td>Male</td>
            <td>Student</td>
        </tr>
        <tr>
            <td>Hina</td>
            <td>30</td>
            <td>Female</td>
            <td>Artist</td>
        </tr>
        <tr>
            <td>Gauhar</td>
            <td>36</td>
            <td>Female</td>
            <td>Artist</td>
        </tr>
        <tr>
            <td>Jacky</td>
            <td>55</td>
            <td>Female</td>
            <td>Bank Manager</td>
        </tr>
        <tr>
            <td>Pintu</td>
            <td>36</td>
            <td>Male</td>
            <td>Clerk</td>
        </tr>
        <tr>
            <td>Sumit</td>
            <td>33</td>
            <td>Male</td>
            <td>Footballer</td>
        </tr>
        <tr>
            <td>Radhu</td>
            <td>40</td>
            <td>Female</td>
            <td>Coder</td>
        </tr>
        <tr>
            <td>Mamta</td>
            <td>49</td>
            <td>Female</td>
            <td>Student</td>
        </tr>
        <tr>
            <td>Priya</td>
            <td>36</td>
            <td>Female</td>
            <td>Worker</td>
        </tr>
        <tr>
            <td>Johnny</td>
            <td>41</td>
            <td>Male</td>
            <td>Forest Officer</td>
        </tr>
    </tbody>
</table>
