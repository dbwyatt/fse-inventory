<div class="main">
	<div class="content">		
		<div class="padding_top_large padding_bottom_large">
			<h2>Vehicles</h2>
		</div>

		<table id="vehicles-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
			<thead>
				<tr>
				<?php
					foreach($vehicles_columns as $column) {
						echo "<th>";
						echo "$column";
						echo "</th>";
					}
				?> 
				</tr>
			</thead>
			<tfoot>
				<tr>
				<?php
					foreach($vehicles_columns as $column) {
						echo "<th>";
						echo "$column";
						echo "</th>";
					}
				?> 
				</tr>
			</tfoot>
			<tbody>
				<?php
					foreach($all_vehicles as $column => $vehicle)
					{
						echo "<tr data-id={$vehicle['id']}>";
						foreach($vehicle as $v)
							echo "<td>$v</td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
</div>