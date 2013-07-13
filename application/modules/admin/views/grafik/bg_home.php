	<section class="container">
	
		<!-- Headings
			================================================== -->
		<section class="row-fluid">
			<h1 class="box-header"><span class="icon-cog"></span> Penyiar | <?php echo $GLOBALS['site_title']; ?></h1>
			<div class="box">
				<div class="well">
					<?php echo form_open("admin/grafik/set"); ?>
					<select name="tahun_chart">
					<?php 
						for($i=2010;$i<=date("Y");$i++)
						{
							echo "<option value='".$i."'>".$i."</option>";
						}
					?>
					</select>
					<input type="submit" class="btn btn-danger">
					<?php echo form_close(); ?>
					  <script type="text/javascript">
					      window.onload = function () {
					          var chart = new CanvasJS.Chart("chartContainer", {
					              theme: "theme2",//theme1
					              title:{
					                  text: "Grafik Pemasangan Iklan <?php echo $this->session->userdata("tahun_chart"); ?>"              
					             },
					              data: [              
					              {
					// Change type to "bar", "splineArea", "area", "spline", "pie",etc.
					                  type: "column",
					                  dataPoints: [
					                  <?php
					                  	$dt_result = $this->db->query("select promo as label, count(a.id_transaksi_pemasangan) as y from dlmbg_transaksi_pemasangan a left join dlmbg_tarif_iklan b on a.id_tarif_iklan=b.id_tarif_iklan where tanggal like '%".$this->session->userdata("tahun_chart")."%' group by a.id_tarif_iklan");
					                  	$i=1;
										foreach($dt_result->result() as $d)
										{
											if($i==1)
											{
												echo '{label: "'.$d->label.'", y : '.$d->y.' },';
											}
											else
											{
												echo '{label: "'.$d->label.'", y : '.$d->y.' }';
											}
											$i++;
										}
					                  ?>
					                  ]
					              }
					              ]
					          });

					          chart.render();
					      }
					  </script>
  						<script type="text/javascript" src="<?php echo base_url(); ?>asset/canvasjs.min.js"></script>
  						<div id="chartContainer" style="height: 300px; width: 100%;"></div>
				</div>
			</div>
		</section>