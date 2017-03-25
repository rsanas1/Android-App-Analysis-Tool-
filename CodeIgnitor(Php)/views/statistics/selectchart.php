<div id="page-wrapper">

	<script
		src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
$(document).ready(function(){
  $("button").click(function(){
	  /* $app=sel.val;
	       alert($app); */
	       var app = $("#sel").val();
	       var 	variable = $("#sel1").val();

	       $.post("<?php echo base_url('TempController');?>",
	    		   {
	    		     name:"Donald Duck",
	    		     city:"Duckburg"
	    		   },
	    		   function(data,status){
	    		     alert("Data: " + data + "\nStatus: " + status);
	    		   });
			
	       
      alert($("#sel1").val());
      
    });
});
  
</script>



	<h1>
		<font face="verdana" color="green">Select Chart </font><small>Select
			from the drop down</small>
	</h1>
	
	<div class="row">
		<div class="col-lg-12">		
			<form action="" class="form">
				<div class="col-lg-5">
					<div class="form-group">
						<label>Select App</label> 
						<select id="sel" name="app"  class="form-control" required>   
							<option value=""> -- Select One -- </option>             
							<?php foreach($apps as $app) {?>						
		                  		<option value="<?php echo $app['id'];?>"><?php echo $app['app_name'];?></option>
		                  	<?php } ?>	                  
		                </select>		
					</div>
				</div>
				<div class="col-lg-5">
					<div class="form-group">
						<label>Select Variable</label> 
						<select name="variable" id="sel1" class="form-control" required>
							<option value=""> -- Select One -- </option>
							<option value="events">Events</option>
							<option value="activities">Activities</option>
							<option value="installations">Global Installations</option>
						</select>		
					</div>
				</div>
				<div class="col-lg-2">
					<div class="form-group">
						<label for="">&nbsp;</label>
						<input type="submit" class="btn btn-primary form-control" value="Get Chart">			
					</div>
					
				</div>
				
			</form>
				
		</div>
	</div>
	
	<div class="charts">
		<h2>Charts</h2>			
	</div>
	
</div>