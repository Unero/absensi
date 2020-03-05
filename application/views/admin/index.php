<div class="container mt-5">
	<table class="table table-bordered">
		<thead class="thead-inverse">
			<tr>
				<th scope="col" class="text-center">Username</th>
				<th scope="col" class="text-center">Password</th>
				<th scope="col" class="text-center">Level</th>
				<th scope="col" class="text-center">Status</th>
				<th scope="col" class="text-center">Action</th>
			</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user):?>
				<tr>
					<td scope="row" class="text-center"><?= $user['username'];?></td>
					<td scope="row" class="text-center"><?= $user['password'];?></td>
					<td scope="row" class="text-center"><?= $user['level'];?></td>
					<td scope="row" class="text-center"><?= $user['status'];?></td>
					<td scope="row" class="text-center">
						<a href="admin/activate/<?= $user['id'];?>" class="btn btn-info mr-2">🔓 Aktifkan</a>
						<a href="admin/disable/<?= $user['id'];?>" class="btn btn-danger">🔏 Disable</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
	</table>
</div>
