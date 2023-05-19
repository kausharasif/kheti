<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

</head>
<body>
<div class="container mt-3">
<table id="example" class="table w-100 table table-bordered datatable">
			<thead>
				<tr class="table-head table-row">
					<td>Username</td>
                    <td>Phone Number</td>
					<td>Country</td>
					<td>State</td>
                    <td>City</td>

				</tr>
			</thead>
			<tbody class="store-table-body">
			</tbody>
		</table>
</div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script type="text/javascript"
    src=" https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  
    <script src="  https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</body>
<script>
$(document).ready(function () {
		var table = $('#example').DataTable({
			processing: true,
			serverSide: true,
			"lengthMenu": [25, 50, 75, 100],
			ajax: {
				url: "{!! route('users_list') !!}"
			},
			columns: [
				{ data: 'username', name: 'username' },
				{ data: 'contact', name: 'contact' },
				{ data: 'country', name: 'country' },
                { data: 'state', name: 'state'},
                { data: 'city', name: 'city'}
			]
		});
});
</script>
</html>