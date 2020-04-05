$(document).ready(() => {
	let table = $('table').DataTable({
		ajax: read_url,
		columns: [
			{ data: 'barang' },
			{ data: 'jumlah' },
			{ data: 'tanggal' },
			{ data: 'keterangan' },
			{ data: null }
		],
		columnDefs: [
			{
				orderable: false,
				searchable: false,
				render: () => `<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>`,
				targets: 4
			}
		],
		order: [[2,'asc']]
	})

	function reload() {
		table.ajax.reload()
	}

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
						Swal.fire('Sukses','Sukses Menghapus Data','success')
					}
				})
			}
		})
	})

	$('[name=kode]').select2({
		placeholder: 'Kode',
		ajax: {
			url: get_barang_url,
			type: 'get',
			dataType: 'json',
			data: params => ({
				kode: params.term
			}),
			processResults: res => ({
				results: res
			}),
			cache: true
		}
	})
	$('[name=kode]').on('select2:select', e => {
		let stok = e.params.data.stok
		$('small').html(`Stok ${stok}`)
		$('[name=jumlah]').attr('max', stok)
	})

	$('form').validate({
		errorElement: 'span',
		errorPlacement: (err, el) => {
			err.addClass('invalid-feedback')
			el.closest('.form-group').append(err)
		},
		submitHandler: function (el) {
			let form = $(el)
			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success: (res) => {
					Swal.fire('Sukses', 'Sukses Menambah Stok', 'success')
					$('small').html('')
					reload()
					form[0].reset()
				},
			})
		}
	})
})