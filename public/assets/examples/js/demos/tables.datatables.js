$(function() {
	$('#datatables-example-1').DataTable();
	$('#datatables-example-2').DataTable({
		ajax: '../data/json/dataTable.json',
		responsive: true,
		keys: true
	});
});