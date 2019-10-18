<template>
	<div>
		<div class="form-group">
			<label>nama</label>
			<input class="form-control" type="text" v-model="nama">
		</div>
		<div class="form-group">
			<label>alamat</label>
			<input class="form-control" type="text" v-model="alamat">
		</div>
		<div class="form-group">
			<input class="btn btn-primary" type="submit" value="simpan" @click="process()">
		</div>
	</div>
</template>
<script>
	export default {
		data: function()
		{
			return {
				nama: '',
				alamat: '',
			}
		},
		mounted: function()
		{
			this.init()
		},
		methods: {
			init: function()
			{
				this.nama = ''
				this.alamat = ''
			},
			process: function()
			{
				var params = {
					nama: this.nama,
					alamat: this.alamat
				}
				axios.post('/api/pegawai/add', params, {credential: true}).then(response => {
					alert('berhasil di simpan')
					this.init()
					
					window.location.href = './#/pegawai'
				}).catch(error => {
					alert(error.message)
				});
			}
		}
	}
</script>
