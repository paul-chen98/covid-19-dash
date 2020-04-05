<!DOCTYPE HTML>
<html>
<head>
	
</head>

<body>
<div class="container-fluid">

	<table class="table">
		<?php if (! empty($data) && is_array($data)) : ?>
				<tr class="thead-dark">
	        		<th>Country</th>
	        		<th>Date</th>
	        		<th># of Cases</th>
	        		<th># of Recovered</th>
	        		<th># of Deaths</th>
	        	</tr>
	        <?php foreach ($data as $res): ?>
	        	<tr>
	        		<td><?= $res['countryName'] ?></td>
	        		<th scope="row"><?= $res['date'] ?></th>
	        		<td><?= $res['cases'] ?></td>
	        		<td><?= $res['recovered'] ?></td>
	        		<td><?= $res['deaths'] ?></td>
	        		
	        		
	        	</tr>
	        <?php endforeach; ?>

		<?php else : ?>
	        <h3>No Data</h3>
	        <?php 
	        	print_r($data);
	        ?>
		<?php endif ?>

	</table>
  
</div>
</body>

</html>