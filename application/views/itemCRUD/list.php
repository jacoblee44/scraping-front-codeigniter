<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Python Scraping - SimplyHired</h2>
        </div>
    </div>
</div>

<select class="form-control" id="sel">
    <option value="simplyhired" selected>SimplyHired</option>
    <option value="indeed" >Indeed</option>
	<option value="westin" >Westin</option>
</select>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Company</th>
        <th>Location</th>
        <th>JobType</th>
        <th>JobCompensation</th>
        <th>Benefits</th>
        <th>Qualification</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $sn=1;
        foreach ($data as $item) { 
            ?>
        <tr>
            <td><?php echo $sn; ?></td>
            <td><?php echo $item->title?></td>
            <td><?php echo $item->company?></td>
            <td><?php echo $item->location?></td>
            <td><?php echo $item->jobType?></td>
            <td><?php echo $item->jobCompensation ?></td>
            <td><?php echo $item->benefits ?></td>
            <td><?php echo $item->qualification ?></td>  
        </tr>
    <?php 
        $sn++;
        } ?>
    </tbody>
</table>
