<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left" style="display: flex">
			<button id="btn-excel" style="margin-left: 50px">Download Excel</button>
        </div>
    </div>
</div>
<!-- <p id="status">Preparing the scaping list.</p> -->
<div id="<?php echo $data;?>" class="hist-id"></div>
<div>
<table class="display dataTable" id="google-hist">
    <thead>
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Level</th>
        <th>Rate</th>
        <th>Review</th>
        <th>Type</th>
        <th>Location</th>
        <th>Email</th>
        <!-- <th>Price</th> -->
        <th>Straight (m)</th>
        <th>Direction (mile)</th>
        <th><img src="<?php echo base_url('img/car.png'); ?>" alt="car">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th><img src="<?php echo base_url('img/walk.png'); ?>" alt="walk">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th><img src="<?php echo base_url('img/transit.png'); ?>" alt="transit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th><img src="<?php echo base_url('img/bike.png'); ?>" alt="bike">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Photo</th>
        <th>Website</th>
        <th>Phone Number</th>
        <th>ZipCode</th>
        <th>Housing Contact Email</th>
        <th>Contact Name</th>
        <th>Additional Contact</th>
        <th>Amenity</th>
        <th>Details</th>
    </tr>
	
    </thead>
</table>
<table id="excel-table" style="display: none"></table>


