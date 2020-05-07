<?php 
	require('../koneksi.php');
	$heynama = mysqli_query($koneksi,"SELECT nama,jabatan FROM karyawan ORDER BY nama");
	$karyawan = [];
	$jabatan = [];
	while($baris=mysqli_fetch_array($heynama)){
		$karyawan[] = (string)$baris['nama'];
		$jabatan[] = (string)$baris['jabatan'];

		$total = 0;
		$totalpie = mysqli_query($koneksi, "SELECT * FROM penilaian	INNER JOIN karyawan ON penilaian.nik = karyawan.nik INNER JOIN bobotkriteria ON penilaian.idbotbot = bobotkriteria.idbotbot WHERE nama='$baris[nama]'");

		while($baris = mysqli_fetch_array($totalpie)){
			$dia = $baris['nilai']*$baris['bobot'];
			$total += $dia;
		}$totalnya[] = (float)$total;
	} //penutup while	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Highcharts</title>
		<script src="jquery.js"></script>
		<script src="highcharts.js"></script>
		<script src="exporting.js"></script>
</head>
<body>
	<div id="container" style="width: 100%; height: 400px"></div>	
<script>
	Highcharts.chart('container', {
    chart: {
        type: 'area'
    },
    title: {
        text: 'Total Evaluasi'
    },
    subtitle: {
        text: 'Source: Wikipedia.org'
    },
    xAxis: {
        categories: <?=json_encode($karyawan)?>,
        tickmarkPlacement: 'on',
        title: {
            enabled: false
        }
    },
    yAxis: {
        title: {
            text: 'Nilai'
        },
        labels: {
            formatter: function () {
                return this.value / 1;
            }
        }
    },
    tooltip: {
        split: true,
        valueSuffix: ''
    },
    plotOptions: {
        area: {
            stacking: 'normal',
            lineColor: '#666666',
            lineWidth: 1,
            marker: {
                lineWidth: 1,
                lineColor: '#666666'
            }
        }
    },
    series: [{
        name: 'Karyawan Terbaik',
        data: <?= json_encode($totalnya) ?>
    },{
    	name: 'Kehadiran',
        data: <?= json_encode($totalnya) ?>
    }]
});
</script>
</body>
</html>