<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Python Scraping - USAJobs</h2>
        </div>
    </div>
</div>

<select class="form-control" id="sel">
    <option value="simplyhired">SimplyHired</option>
    <option value="indeed" >Indeed</option>
    <option value="careerjet" >CareerJet</option>
    <option value="jobisjob" >JobisJob</option>
    <option value="usajobs" selected>USAJobs</option>
    <option value="jobsintrucks" >JobsInTrucks</option>
    <option value="alltruckjobs" >AllTruckJobs</option>
	<option value="coolworks" >CoolWorks</option>
	<option value="westin" >Westin</option>
</select>

<table class="table table-bordered">
    <thead>
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Agency</th>
        <th>Department</th>
        <th>Location</th>
        <th>JobType</th>
        <th>OpenDate</th>
        <th>CloseDate</th>
        <th>Salary</th>
        <th>PayGrade</th>
        <th>Condition</th>
        <th>Summary</th>
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
            <td><?php echo $item->agency?></td>
            <td><?php echo $item->department?></td>
            <td><?php echo $item->location?></td>
            <td><?php echo $item->jobType?></td>
            <td><?php echo $item->opendate ?></td>
            <td><?php echo $item->closedate?></td>
            <td><?php echo $item->salary?></td>
            <td><?php echo $item->paygrade?></td>
            <td><?php echo $item->condition?></td>
            <td><?php echo $item->summary ?></td>
            <td><?php echo $item->qualification ?></td>  
        </tr>
    <?php 
        $sn++;
        } ?>
    </tbody>
</table>
