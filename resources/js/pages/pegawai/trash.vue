<template>
	<div class="container">
		<div class="card card-default">
			<div class="card-header">Pegawai Recycle Bin</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="10%">Nama</th>
								<th width="35%">Alamat</th>
								<th width="10%">Deleted</th>
								<th width="20%" class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(pegawai, index) in list.data">
								<td>#</td>
								<td>{{ pegawai.pegawai_nama }}</td>
								<td>{{ pegawai.pegawai_alamat }}</td>
								<td>{{ pegawai.deleted_at }}</td>
								<td class="text-center">
									<button class="btn btn-primary btn-sm" @click="restore(pegawai.id)">restore</button>&nbsp;
									<button class="btn btn-danger btn-sm" @click="del(pegawai.id)">del</button>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default
	{
		data: function()
		{
			return {
				list: {}
			}
		},
		mounted: function()
		{
			this.getPage()
		},
		methods: {
			getPage: function(page)
			{
				if (typeof page === 'undefined') page = 1
				
				axios.get('pegawai/trash?page=' + page).then(response => {
					this.list = response.data
				}).catch(error => {
					alert(error.message)
				})
			},
			restore: function(id)
			{
				var params = {}
				axios.post('pegawai/restore/' + id, params, {credential: true}).then(response => {
					alert('berhasil di restore')
					
					this.getPage()
				}).catch(error => {
					alert(error.message)
				})
			},
			del: function(id)
			{
				if (confirm("Yakin hapus permanen ?")) {
					var params = {}
					axios.post('pegawai/delete-force/' + id, params, {credential: true}).then(response => {
						alert('berhasil di delete permanen')
					}).catch(error => {
						alert(error.message)
					})
				}
				this.getPage()
			},
		}
	}
</script>
