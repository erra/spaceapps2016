<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Informe An&aacute;lisis</title>
		
		
		<!-- 1. Add these JavaScript inclusions in the head of your page -->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/highcharts.js"></script>
		<!--[if IE]>
			<script type="text/javascript" src="js/excanvas.compiled.js"></script>
		<![endif]-->
		
		
		<!-- 2. Add the JavaScript to initialize the chart on document ready -->
		<script type="text/javascript">
		var chart;
		
		var nom_eje_y	= 'Temperatura';	//Nombre Eje Y
		var nom_eje_x	= 'Año 2016';	//Nombre Eje X
		var nom_eje_z	= 'Precipitaciones';	//Eje Z
		var nom_serie_y = 'Estado del Aire';	//Nombre serie Y
		var nom_serie_z = 'Año 2015';	//Nombre serie X
		var car_eje_y 	= '°C';		//Caracter que acompaña al numero eje Y
		var car_eje_z 	= ' mm';	//Caracter que acompaña al numero eje Z
		
		$(document).ready(function() {
			chart = new Highcharts.Chart({
				width: 1500,
				height: 1700,
				chart: {
					renderTo: 'container',
					margin: [80, 100, 60, 100],
					zoomType: 'xy'
				},
				title: {
					text: 'Proyecci&oacute;n 2016',
					style: {
						margin: '10px 0 0 0' // center it
					}
				},
				subtitle: {
					text: 'Valores sonda',
					style: {
						margin: '0 0 0 0' // center it
					}
				},
				credits: {
					enabled: true,
					href: "http://www.sistemasondacentinela.cl",
					target: "_blank",
					text: "Modulonet.cl"
				},
				xAxis: [{
					categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
					title: {
						enabled: true,
						text: nom_eje_x,//Nombre Eje X
						margin: 50
					}			
				}],
				
				yAxis: [{ // Primary yAxis
					labels: {
						formatter: function() {
							return this.value + car_eje_y;//Caracter que acompaña al dato eje Y
						},
						style: {
							color: '#89A54E'
						}
					},
					title: {
						text: nom_eje_y,//Nombre Eje Y
						style: {
							color: '#89A54E'
						},
						margin: 60
					}
				}, { // Secondary yAxis
					title: {
						text: nom_eje_z,//Eje Z
						margin: 70,
						style: {
							color: '#4572A7'
						}
					},
					labels: {
						//rotation: -45,
						formatter: function() {
							return this.value +car_eje_z;//Caracter que acompaña al dato eje Z
						},
						style: {
							color: '#4572A7'
						}
					},
					opposite: true
				}],
				tooltip: {
					enabled: false,
					formatter: function() {
						return '<b>'+ this.series.name +'</b><br/>'+
							this.x +': '+ this.y +
							(this.series.name == nom_serie_y ? car_eje_z : car_eje_y);
					}
				},
				legend: {
					enabled: true,
					//reversed: true,
					layout: 'horizontal',
					style: {
						left: '0px',
						bottom: 'auto',
						right: '10px',
						top: '370px'
					},
					backgroundColor: '#FFFFFF'
				},
				plotOptions: {
					 value: 0,
					 width: 1,
					 color: '#808080',
				
					line: {
							dataLabels: {enabled: true},
							marker: {
								radius: 4,
								lineColor: '#666666',
								lineWidth: 1
							}
					},
				  column: {
					 dataLabels: {enabled: true},
					 pointPadding: 0.2,
					 borderWidth: 0

/*					 
					data: 'datatable',
						// define a custom data parser function for both series
					dataParser: function(data) {
					var table = document.getElementById(data),
						// get the data rows from the tbody element
					rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr'),
						// define the array to hold the real data
					result = [], 
						// decide which column to use for this series
					column = { 'Jane': 0, 'John': 1 }[this.options.name];
               
							// loop through the rows and get the data depending on the series (this) name
						for (var i = 0; i < rows.length; i++) {                  
						   result.push(
							  parseInt(
								 rows[i].getElementsByTagName('td')[column]. // the data cell
								 innerHTML
							  )
						   );
						}
					return result;
					}
				  */
				  
				  }
				},

				series: [{
					name: nom_serie_z,
					color: '#4572A7',
					type: 'column',
					yAxis: 1,
					//{y: 26.5, marker: {symbol: 'url(/graphics/sun.png)'}},//agrega imagen entre los numeros
					data: [249.9, 271.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
				},
				{
					name: '_',
					color: '#cc88A7',
					type: 'scatter',//puntos de para observacion
					data: [19.9, 17.5, 16.4, 19.2]
				},
				{
					name: nom_serie_z,
					color: '#cc88A7',
					type: 'line',
					//zAxis: 1,
					//{y: 26.5, marker: {symbol: 'url(/graphics/sun.png)'}},//agrega imagen entre los numeros
					data: [9.9, 7.5, 6.4, 9.2, 4.0, 6.0, 5.6, 8.5, 6.4, 4.1, 5.6, 4.4]
				},				
				{
					name: nom_serie_y,
					color: '#89A54E',
					type: 'line',//'spline',
					data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, null, 26.5, 23.3, 18.3, 13.9, 9.6],

					dataLabels: {
						 enabled: true,
						 rotation: -40,
						 color: '#000000',
						 align: 'center',
						 x: 3,
						 y: -10,
						 formatter: function() {
							return this.y;
						 },
						 style: {
							font: 'normal 13px Verdana, sans-serif'
						 }
					}
				}]
			});
			
			
		});
		</script>
		
<script type="text/javascript" src="js/highslide-full.min.js"></script>
<script type="text/javascript" src="js/highslide.config.js" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="js/highslide.css" />

</head>
	<body>
		
		<!-- 3. Add the container -->
		<div id="container" style="width: 800px; height: 400px; margin: 0 auto"></div>
        <table width="801" align="center">
        	<tr><td width="586"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        	    <tr>
        	      <td width="32%">Depto Química Ambiental y Ecología</td>
        	      <td width="2%">:</td>
        	      <td colspan="5">Giovanni Vinccenzo Ramirez</td>
       	        </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td colspan="5">&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>Depto Electrónica</td>
        	      <td>:</td>
        	      <td colspan="5">Sebastian Robledo Gajardo</td>
       	        </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td colspan="5">Mauricio Norambuena Meza</td>
       	        </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td colspan="5">Bastían Andrés Gomez Gutierrez</td>
       	        </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td width="21%">&nbsp;</td>
        	      <td width="2%">&nbsp;</td>
        	      <td width="14%">&nbsp;</td>
        	      <td width="2%">&nbsp;</td>
        	      <td width="27%">&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>Depto Informática</td>
        	      <td>:</td>
        	      <td colspan="5">Luis Oliva García</td>
       	        </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td colspan="5">Rodrigo Núñez Loyola</td>
       	        </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>Sensores</td>
        	      <td>:</td>
        	      <td>MQ2</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>MQ14</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>MQ150</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>Número Sonda</td>
        	      <td>:</td>
        	      <td>0001</td>
        	      <td>&nbsp;</td>
        	      <td>Fecha</td>
        	      <td>:</td>
        	      <td>24-03-2016</td>
      	      </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
            </table></td></tr>
            <tr>
              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td width="19%">&nbsp;</td>
                  <td width="4%">&nbsp;</td>
                  <td width="15%">&nbsp;</td>
                  <td width="15%">&nbsp;</td>
                  <td width="15%">&nbsp;</td>
                  <td width="15%">&nbsp;</td>
                  <td width="17%">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="7">Análisis suelo</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="7">Análisis del Aire</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="7">Análisis temperatura</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="7">Análisis Agua</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
            </table></td></tr>
        </table>
		
				
	</body>
</html>
