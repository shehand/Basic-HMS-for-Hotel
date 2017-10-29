<html>

<head>
  <title>Kitchen Inventory</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}

    .modal-header-primary {
    	color:#fff;
        padding:9px 15px;
        border-bottom:1px solid #eee;
        background-color: #428bca;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
         border-top-left-radius: 5px;
         border-top-right-radius: 5px;
    }

    .modal-footer-primary {

        padding:9px 15px;
        border-bottom:1px solid #eee;

        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
         border-top-left-radius: 5px;
         border-top-right-radius: 5px;
    }
   </style>
</head>

<body>
  <div class="panel panel-success">
      <div class="panel-heading">hotel name and logo</div>

      <div class="panel-body">

		<nav class="navbar navbar-inverse">

			<div class="container-fluid">

				<div class="navbar-header">
				  <a class="navbar-brand" href="#">Home(link to main page)</a>
				</div>

				<ul class="nav navbar-nav">
				  <li class="active"><a href="#">Kitchen Inventory</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
				  <li><a href="#"><span class="glyphicon glyphicon-user"></span> #userID</a></li>
				  <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
				</ul>
			</div>
		</nav>


		<a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addDataToStock">Click Here to Add new Stocks</a>
    <br>
    <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#updateDailyConsumptions">Click Here to Add daily Consumptions to the Stocks</a>
    <br>
    <a <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addNewStockItem">New Entry</a>
    <br>
		<div class="panel panel-primary">
		<div class="panel-heading">Available Stock</div>
		<div class="panel-body" style="height:250; overflow-y: scroll;">
		<div class="panel-body">

			<div class="table">
			  <table class="table">
				<thead>
				  <tr>
					<th>Stock ID</th>
					<th>Item Name</th>
					<th>Quantity (Available)</th>
          <th>Last Updated Date</th>
				  </tr>
				</thead>
				<tbody>
          <?php

            if((sizeof($infos))>0)
            {
              foreach ($infos as $info)
              {
                ?>
                <tr>
                  <td><?php echo $info->kitchen_item_id;?></td>
                  <td><?php echo $info->kitchen_item_name;?></td>
                  <td><?php echo $info->item_quantity;?></td>
                  <td><?php echo $info->date_inserted?></td>
                <?php
              }
            }
            else
            {
              ?> <tr><td colspan='3'>Data Not Fount</td></tr>
          <?php  }

          ?>
				</tbody>
			  </table>
			</div>
		</div>
		</div>
		</div>


		<div class="panel panel-primary">
		<div class="panel-heading">So far usage</div>
		<div class="panel-body" style="height:250; overflow-y: scroll;">
		<div class="panel-body">

			<div class="table">
			  <table class="table">
				<thead>
				  <tr>
          <th>Stock ID</th>
          <th>Item Name</th>
					<th>Date</th>
					<th>Quantity</th>
				  </tr>
				</thead>
				<tbody>
          <?php

            if((sizeof($avail))>0)
            {
              foreach ($avail as $info)
              {
                ?>
                <tr>
                  <td><?php echo $info->kitchen_item_id;?></td>
                  <td><?php echo $info->kitchen_item_name;?></td>
                  <td><?php echo $info->date;?></td>
                  <td><?php echo $info->used_quantity;?></td>
                <?php
              }
            }
            else
            {
              ?> <tr><td colspan='3'>Data Not Fount</td></tr>
          <?php  }

          ?>
				</tbody>
			  </table>
			</div>
		</div>
		</div>
		</div>
		<div class="panel panel-primary">
		<div class="panel-heading">Monthly Usage</div>
		<div class="panel-body" style="height:250; overflow-y: scroll;">
		<div class="panel-body">

			<div class="table">
			  <table class="table">
				<thead>
				  <tr>
					<th>Stock ID</th>
          <th>Item Name</th>
					<th>Quantity</th>
          <th>Last Updated Date</th>
				  </tr>
				</thead>
				<tbody>
          <?php

            if((sizeof($month))>0)
            {
              foreach ($month as $info)
              {
                ?>
                <tr>
                  <td><?php echo $info->kitchen_item_id;?></td>
                  <td><?php echo $info->kitchen_item_name;?></td>
                  <td><?php echo $info->available_stock;?></td>
                  <td><?php echo $info->date_inserted;?></td>
                <?php
              }
            }
            else
            {
              ?> <tr><td colspan='3'>Data Not Fount</td></tr>
          <?php  }

          ?>
				</tbody>
			  </table>
			</div>
		</div>
		</div>
		</div>

	</div>
    </div>
<!--modals-->
    <div class="modal fade" id="addDataToStock" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Stocks</h4>
        </div>
      <!--asdfsadf-->
      <br>
      <form method="post" action="mainstock/form_validation">
				<div class="input-group" style="width: 100%">
				  <span class="input-group-addon" style="width: 20%;">Item Code: </span>
				  <input type="text" class="form-control" style="width: 98%" name="item_code" placeholder="Insert item code">

				</div>
				<br>

				<div class="input-group" style="width: 100%">
				  <span class="input-group-addon" style="width: 20%;">Quantity: </span>
				  <input type="text" class="form-control" style="width:80%" name="item_quantity" placeholder="Amount of quantity">
          <select class="input-group-addon" data-live-search="true" style="width: 18%;" >
  					<option>kg</option>
  					<option>l</option>
  					<option>Count </option>
				  </select>
				</div>
        <br>

        <div class="bootstrap-iso">
         <div class="container-fluid">
           <div class="row">
             <div>
               <div class="form-group ">
                 <div >

                   <div class="input-group" style="width: 100%;">
                   <span class="input-group-addon" style="width: 20%;">Date: </span>
                   <input class="form-control" style="width: 98%;" name="date" placeholder="YYYY-MM-DD" type="text"/>
                   </div>

                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>

        <div class="modal-footer">
          <input type="submit" name="submit_item" value="Submit" class="btn btn-primary">
        </div>
			 </form>
      <!--asdfsadf-->

      </div>

    </div>
  </div>

  <div class="modal fade" id="updateDailyConsumptions" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Stocks</h4>
        </div>
      <!--asdfsadf-->
      <br>
      <form method="post" action="main/form_validation">
        <div class="input-group" style="width: 100%">
          <span class="input-group-addon" style="width: 20%;">Insert Item Code: </span>
          <input type="text" class="form-control" style="width: 98%" name="item_code" placeholder="Search the item">

        </div>
        <br>

        <div class="input-group" style="width: 100%">
          <span class="input-group-addon" style="width: 20%;">Quantity: </span>
          <input type="text" class="form-control" style="width:80%" name="item_quantity" placeholder="Amount of quantity">
          <select class="input-group-addon" data-live-search="true" style="width: 18%;" name="drop_box" >
  					<option value="kg">kg</option>
  					<option value="l">l</option>
  					<option value="Count">Count </option>
				  </select>
        </div>
        <br>
        <div class="bootstrap-iso">
     			<div class="container-fluid">
     				<div class="row">
     					<div>
     						<div class="form-group ">
     							<div >

     								<div class="input-group" style="width: 100%;">
     								<span class="input-group-addon" style="width: 20%;">Date: </span>
     								<input class="form-control" style="width: 98%;" name="date" placeholder="YYYY-MM-DD" type="text"/>
     								</div>

     							</div>
     						</div>
     					</div>
     				</div>
     			</div>
     		</div>
        <div class="modal-footer">
          <input type="submit" name="submit_item" value="Submit" class="btn btn-primary">
        </div>
      </div>
       </form>
      <!--asdfsadf-->
      </div>
  </div>

  <div class="modal fade" id="addNewStockItem" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header modal-header-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add New Stock Items</h4>
        </div>
      <!--asdfsadf-->
      <br>
      <form method="post" action="addstock/form_validation">
        <div class="input-group" style="width: 100%">
          <span class="input-group-addon" style="width: 20%;">Item Code: </span>
          <input type="text" class="form-control" style="width: 98%" name="item_code" placeholder="Insert item code">

        </div>
        <br>

        <div class="input-group" style="width: 100%">
          <span class="input-group-addon" style="width: 20%;">Item Name: </span>
          <input type="text" class="form-control" style="width: 98%" name="item_name" placeholder="Insert item code">

        </div>
        <br>

        <div class="input-group" style="width: 100%">
          <span class="input-group-addon" style="width: 20%;">Quantity: </span>
          <input type="text" class="form-control" style="width:80%" name="item_quantity" placeholder="Amount of quantity">
          <select class="input-group-addon" data-live-search="true" style="width: 18%;" name="drop_box">
            <option value="kg">kg</option>
            <option value="l">l</option>
            <option value="Count">Count </option>
          </select>
        </div>
        <br>

        <div class="bootstrap-iso">
         <div class="container-fluid">
           <div class="row">
             <div>
               <div class="form-group ">
                 <div >

                   <div class="input-group" style="width: 100%;">
                   <span class="input-group-addon" style="width: 20%;">Date: </span>
                   <input class="form-control" style="width: 98%;" name="date" placeholder="YYYY-MM-DD" type="text"/>
                   </div>

                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>

        <div class="modal-footer">
          <input type="submit" name="submit_item" value="Submit" class="btn btn-primary">
        </div>
       </form>
      <!--asdfsadf-->
      </div>
    </div>
  </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  		<script>
  			$(document).ready(function(){
  				var date_input=$('input[name="date"]'); //our date input has the name "date"
  				var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
  				date_input.datepicker({
  					format: 'yyyy-mm-dd',
  					container: container,
  					todayHighlight: true,
  					autoclose: true,
  				})
  			})
  		</script>
</body>
</html>
