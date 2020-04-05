<!DOCTYPE HTML>
<html>
<head>
	
</head>

<body>
<div class="container-fluid">
	<div class="row my-4">
		<div class="col-md-10 mx-auto">
			<h2>Confirmed Cases</h2>
			<canvas id="line-graph"></canvas>
		</div>
	</div>

	<div class="row my-4 py-4 bg-light">	
		<div class="col-md-6">
			<h2>New Cases</h2>
			<canvas id="line-graph-recover"></canvas>
		</div>

		<div class="col-md-6">
			<h2>Tabular Data</h2>
			<table class="table">
				<?php if (! empty($data) && is_array($data)) : ?>
						<tr class="thead-dark">
			        		<th>Country</th>
			        		<th>Date</th>
			        		<th># of Cases</th>
			        		<th># of New Cases</th>
			        		<th># of Recovered</th>
			        		<th># of Deaths</th>
			        	</tr>
			       	<?php $cur=0; ?>
			        <?php foreach ($data as $res): ?>
			        	<tr>
			        		<td><?= $res['countryName'] ?></td>
			        		<th scope="row"><?= $res['date'] ?></th>
			        		<td><?= $res['cases'] ?></td>
			        		<td><?php 
				        			if($cur<=0)
				        			{
				        				echo $cur;
				        			}
				        			else
				        			{
				        				echo $res['cases'] - $cur;
				        			}
				        			$cur = $res['cases'];
		        		 		?>
			        		</td>
			        		 	
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

  	</div>
</div>
</body>
<script type="text/javascript">
	var data_set = <?php echo json_encode($data); ?>;

	function genChart(id,type,labels,title,bgcolor,bordercolor,data)
	{
		var ctx = document.getElementById(id).getContext('2d');
		var chart = new Chart(ctx, {
		    // The type of chart we want to create
		    type: type,

		    // The data for our dataset
		    data: {
		        //labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
		        labels: labels,
		        datasets: [{
		            label: title,
		            backgroundColor: bgcolor,
		            borderColor: bordercolor,
		            data: data
		        }]
		    },

		    // Configuration options go here
		    options: {}
		});	
	}

	var title = "Confirmed Cases Count"
	var labels = data_set.map(function(e) {
	   return e.date;
	});

	var data = data_set.map(function(e) {
	   return e.cases;
	});;

	genChart('line-graph','line',labels,title,'rgb(0, 0, 0)','rgb(255, 205, 0)',data);

	// =================================================================

	var title_rec = "New Cases Count";
	var labels_rec = data_set.map(function(e) {
	   return e.date;
	});

	var data_rec = data_set.map(function(e) {
	   return e.cases;
	});;
	//console.log(data_rec);

	var len = data_rec.length;
	var cur = 0;
	var data_new = [];
	for (var i = 0; i < len; i++) 
	{
		if(cur <= 0)
		{
			data_new.push(cur);
		}
		else
		{
			data_new.push(data_rec[i] - cur);
		}
		cur = data_rec[i];
	    //console.log(data_rec[i]);
	    //Do something
	}
	//console.log(data_new);
	genChart('line-graph-recover','line',labels_rec,title_rec,'rgb(0, 0, 0)','rgb(255, 205, 0)',data_new);

</script>
</html>