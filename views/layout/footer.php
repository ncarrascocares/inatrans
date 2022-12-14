</div>
<!--Fin del page-content-->
<script> base_url = '<?= base_url ?>' </script>
<script src="<?= base_url ?>assets/js/calendar.js"></script>
<script src="<?= base_url ?>assets/js/lib/jquery/jquery.min.js"></script>
<script src="<?= base_url ?>assets/js/lib/tether/tether.min.js"></script>
<script src="<?= base_url ?>assets/js/lib/bootstrap/bootstrap.min.js"></script>
<script src="<?= base_url ?>assets/js/plugins.js"></script>

<script type="text/javascript" src="<?= base_url ?>assets/js/lib/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?= base_url ?>assets/js/lib/lobipanel/lobipanel.min.js"></script>
<script type="text/javascript" src="<?= base_url ?>assets/js/lib/match-height/jquery.matchHeight.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
	$(document).ready(function() {

		$('.panel').lobiPanel({
			sortable: true
		});
		$('.panel').on('dragged.lobiPanel', function(ev, lobiPanel) {
			$('.dahsboard-column').matchHeight();
		});

		google.charts.load('current', {
			'packages': ['corechart']
		});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var dataTable = new google.visualization.DataTable();
			dataTable.addColumn('string', 'Day');
			dataTable.addColumn('number', 'Values');
			// A column for custom tooltip content
			dataTable.addColumn({
				type: 'string',
				role: 'tooltip',
				'p': {
					'html': true
				}
			});
			dataTable.addRows([
				['MON', 130, ' '],
				['TUE', 130, '130'],
				['WED', 180, '180'],
				['THU', 175, '175'],
				['FRI', 200, '200'],
				['SAT', 170, '170'],
				['SUN', 250, '250'],
				['MON', 220, '220'],
				['TUE', 220, ' ']
			]);

			var options = {
				height: 314,
				legend: 'none',
				areaOpacity: 0.18,
				axisTitlesPosition: 'out',
				hAxis: {
					title: '',
					textStyle: {
						color: '#fff',
						fontName: 'Proxima Nova',
						fontSize: 11,
						bold: true,
						italic: false
					},
					textPosition: 'out'
				},
				vAxis: {
					minValue: 0,
					textPosition: 'out',
					textStyle: {
						color: '#fff',
						fontName: 'Proxima Nova',
						fontSize: 11,
						bold: true,
						italic: false
					},
					baselineColor: '#16b4fc',
					ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350],
					gridlines: {
						color: '#1ba0fc',
						count: 15
					}
				},
				lineWidth: 2,
				colors: ['#fff'],
				curveType: 'function',
				pointSize: 5,
				pointShapeType: 'circle',
				pointFillColor: '#f00',
				backgroundColor: {
					fill: '#008ffb',
					strokeWidth: 0,
				},
				chartArea: {
					left: 0,
					top: 0,
					width: '100%',
					height: '100%'
				},
				fontSize: 11,
				fontName: 'Proxima Nova',
				tooltip: {
					trigger: 'selection',
					isHtml: true
				}
			};

			var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
			chart.draw(dataTable, options);
		}
		$(window).resize(function() {
			drawChart();
			setTimeout(function() {}, 1000);
		});
	});
</script>
<script type="module">
	import {
		Toast
	} from 'bootstrap.esm.min.js'

	Array.from(document.querySelectorAll('.toast'))
		.forEach(toastNode => new Toast(toastNode))
</script>

<script src="js/app.js"></script>

<script src="<?= base_url ?>assets/js/app.js"></script>
</body>

</html>