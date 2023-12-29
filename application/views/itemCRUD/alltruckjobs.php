<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Python Scraping - AllTruckJobs</h2>
        </div>
    </div>
</div>

<select class="form-control" id="sel">
    <option value="simplyhired" >SimplyHired</option>
    <option value="indeed" >Indeed</option>
    <option value="careerjet" >CareerJet</option>
    <option value="jobisjob" >JobisJob</option>
    <option value="usajobs" >USAJobs</option>
    <option value="jobsintrucks" >JobsInTrucks</option>
    <option value="alltruckjobs" selected>AllTruckJobs</option>
	<option value="coolworks" >CoolWorks</option>
	<option value="westin" >Westin</option>
</select>
<table class="table table-bordered">
    <thead>
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Location</th>
        <th>JobBudget</th>
        <th>JobAgo</th>
        <th>DescriptionTitle</th>
        <th>Description</th>
        <th>Benefit</th>
        <th>Perks</th>
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
            <td><?php echo $item->location?></td>
            <td><?php echo $item->jobBudget?></td>
            <td><?php echo $item->jobAgo ?></td>
            <td><?php echo $item->jobDescriptionTitle ?></td>  
            <td><?php echo $item->jobDescription ?></td>  
            <td><?php echo $item->benefits ?></td>  
            <td><?php echo $item->perks ?></td>  
        </tr>
    <?php 
        $sn++;
        } ?>
    </tbody>
</table>
