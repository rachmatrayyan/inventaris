$(document).ready(() => {
	let table = $('table').DataTable({
		ajax: read_url,
		columns: [
			{ data: 'barang' },
			{ data: 'jumlah' },
			{ data: 'tanggal' },
			{ data: 'tipe' },
			{ data: 'keterangan' },
			{ data: null }
		],
		columnDefs: [
			{
				render: data => {
					if (data === 'masuk') {
						return `<span class='badge badge-success'>${data}</span>`
					} else {
						return `<span class='badge badge-danger'>${data}</span>`
					}
				},
				targets: 3
			},
			{
				render: (data, type, row) => `<button class='btn btn-danger btn-sm'><i class='fa fa-trash'></i></button>`,
				targets: 5
			}
		],
		order: [[3,'asc']]
	})

	$('tbody').on('click', 'button', function() {
		Swal.fire({
			title: 'Hapus',
			text: 'Hapus Data Ini',
			type: 'warning',
			showCancelButton: true
		}).then(res => {
			if (res.value) {
				let row = table.row($(this).parents('tr'))
				$.ajax({
					url: `${hapus_url}/${row.data().id}`,
					type: 'get',
					dataType: 'json',
					success: () => {
						row.remove().draw()
						Swal.fire('Sukses','Sukses Menghapus Data','siccess')
					}
				})
			}
		})
	})
})