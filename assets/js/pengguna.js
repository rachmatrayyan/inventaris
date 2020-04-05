$(document).ready(() => {
	let table = $('table').DataTable({
		ajax: read_url,
		columns: [
			{ data: 'foto' },
			{ data: 'nama' },
			{ data: 'role' },
			{ data: 'jenis_kelamin' },
			{ data: null }
		],
		columnDefs: [
			{
				orderable: false,
				render: data => `<img src='${base_url}/${data}' class="w-100">`,
				width: '200px',
				targets: 0
			},
			{
				render: data => data == '1' ? 'Admin' : 'Pegawai',
				targets: 2
			},
			{
				orderable: false,
				searchable: false,
				render: (data, type, row) => {
					return `
						<button class='btn btn-success btn-sm edit'><i class='fa fa-edit'></i></button>
						<button class='btn btn-danger btn-sm hapus'><i class='fa fa-trash'></i></button>
					`
				},
				targets: 4
			}
		]
	})

	function reload() {
		table.ajax.reload()
	}

	$.each($('form'), function() {
		$(this).validate({
			errorElement: 'span',
			errorPlacement: (err, el) => {
				err.addClass('invalid-feedback')
				el.closest('.form-group').append(err)
			},
			submitHandler: function (el) {
				let form = $(el)
				let data = new FormData(el)
				let file = form.find('[type=file]').prop('files')[0]
				data.append('foto', file)
				$.ajax({
					url: form.attr('action'),
					type: form.attr('method'),
					data: data,
					processData: false,
					contentType: false,
					dataType: 'json',
					success: (res) => {
						if (res === 'tambah') {
							$('.collapse').collapse('hide')
							Swal.fire('Sukses', 'Sukses Menambah Data', 'success')
						} else if (res === 'error') {
							Swal.fire('Gagal', 'Format File Tidak Didukung', 'warning')
						} else {
							$('.modal').modal('hide')
							Swal.fire('Sukses', 'Sukses Mengedit Data', 'success')
						}
						reload()
					},
					error: err => Swal.fire('Gagal', 'Pengguna Sudah Ada', 'error')
				})
			}
		})
	})

	$('tbody').on('click', '.edit', function() {
		let data = table.row($(this).parents('tr')).data();
		$('.modal form').attr('action', `${edit_url}/${data.id}`)
		$('.modal [name=nama]').val(data.nama)
		$('.modal [name=role]').val(data.role)
		$('.modal [name=jenis_kelamin]').val(data.jenis_kelamin)
		$('.modal').modal('show')
	})
	$('tbody').on('click', '.hapus', function() {
		Swal.fire({
			'title': 'Hapus',
			'text': 'Hapus Data Ini',
			'type': 'warning',
			'showCancelButton': true
		}).then(res => {
			if (res.value) {
				let row = table.row($(this).parents('tr'))
				$.ajax({
					url: `${hapus_url}/${row.data().id}`,
					type: 'get',
					dataType: 'json',
					success: () => {
						row.remove().draw()
						Swal.fire('Sukses', 'Sukses Menghapus Data', 'success')
					}
				})
			}
		})
	})

	$('.collapse').on('hidden.bs.collapse', function() {
		let form = $(this).find('form')
		form[0].reset()
		form.validate().resetForm()
	})
	$('.collapse').on('show.bs.collapse', function() {
		let button = $(this).parents('.card').find('.card-header button')
		button.html('Batal')
		button.removeClass('btn-primary')
		button.addClass('btn-danger')
	})
	$('.collapse').on('hide.bs.collapse', function() {
		let button = $(this).parents('.card').find('.card-header button')
		button.html('Tambah')
		button.removeClass('btn-danger')
		button.addClass('btn-primary')
	})

	$('.modal').on('hidden.bs.modal', function() {
		let form = $(this).find('form')
		form[0].reset()
		form.validate().resetForm()
	})
})