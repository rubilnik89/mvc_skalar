
<!DOCTYPE html>
<html>
	<head>
		<meta content=\"text/html; charset=utf-8\">
		<title>table</title>
		<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="/css/style.css">
		<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	</head>
<body>
	<form method="post" action="http://mvc/emploees/">
		<p>Количество сотрудников для показа:</p>
		<select name="limit" class="form-control">
			<option>20</option>
			<option>40</option>
			<option>50</option>
			<option>100</option>
		</select>
		<p><input type="submit" value="Отправить" class="btn btn-default"></p>
	</form>
	<form class="department" method="post" action="http://mvc/emploees/department">
		<p>Для вывода сотрудников по отделам, выберите отдел:</p>
		<select name="department" class="form-control">
			<option>it</option>
			<option>hr</option>
		</select>
		<p><input type="submit" value="Отправить" class="btn btn-default"></p>
	</form>

	<div class="container" role="main">
		<div class="row">
			<div class="col-md-12">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ФИО</th>
							<th>Дата рождения</th>
							<th>Отдел</th>
							<th>Должность</th>
							<th>Тип оплаты (0-почасовка 1-ставка)</th>
							<th>Зарплата</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($emploeeList as $emploee) : ?>
						<tr>
							<td><?php echo $emploee->name() ?></td>
							<td><?php echo $emploee->birthday() ?></td>
							<td><?php echo $emploee->department() ?></td>
							<td><?php echo $emploee->position() ?></td>
							<td><?php echo $emploee->payment() ?></td>
							<td><?php echo $emploee->cost() ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>


		<?php //PAGINATION
		if ($page>=1) {
			echo '<a href="http://mvc/emploees/1/' . $limit .'"><<</a> &nbsp; ';
			echo '<a href="http://mvc/emploees/' . $page . '/'. $limit .
				'">< </a> &nbsp; ';
		}
		for ($j = 1; $j<$count_pages; $j++) {
			if ($j>=$start && $j<=$end) {
				if ($j==($page+1)) echo '<a href="http://mvc/emploees/' . $j . '/' . $limit .'"><strong style="color: #df0000">' . $j .
					'</strong></a> &nbsp; ';
				else echo '<a href="http://mvc/emploees/' .
					$j . '/' . $limit .'">' . $j . '</a> &nbsp; ';
			}
		}
		if ($j>$page && ($page+2)<$j) {
			echo '<a href="http://mvc/emploees/' . ($page+2) .'/' . $limit .
				'"> ></a> &nbsp; ';
			echo '<a href="http://mvc/emploees/' . ($j-1) .'/' . $limit .
				'">>></a> &nbsp; ';
		}
		?>
	</div>
</body>
</html>
