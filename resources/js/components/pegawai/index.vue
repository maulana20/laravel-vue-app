<template>
	<div class="table-responsive">
		<button class="btn btn-primary" id="show-modal" @click="openModal('add')">add pegawai</button>
		<hr>
		<table class="table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Created</th>
					<th>Updated</th>
					<th class="text-right">Actions</th>
				</tr>
			</thead>

			<tbody>
				<tr v-for="(pegawai, index) in list.data">
					<td>#</td>
					<td>{{ pegawai.pegawai_nama }} </td>
					<td>{{ pegawai.pegawai_alamat }} </td>
					<td>{{ pegawai.created_at }} </td>
					<td>{{ pegawai.updated_at }} </td>
					<td class="text-right"><button class="btn btn-primary" id="show-modal" @click="openModal('edit', pegawai.id)">edit</button></td>
				</tr>
			</tbody>
		</table>
		<pagination :data="list" @pagination-change-page="getPage"></pagination>
		<modal v-if="show_modal" @close="show_modal = false">
			<h3 slot="header" id="modal_title">custom header</h3>
			<div slot="body">
				<validation-errors :errors="validationErrors" v-if="validationErrors"></validation-errors>
				<div class="form-group">
					<label>nama</label>
					<input class="form-control" type="text" v-model="pegawai.nama">
				</div>
				<div class="form-group">
					<label>alamat</label>
					<input class="form-control" type="text" v-model="pegawai.alamat">
				</div>
			</div>
			<div slot="footer">
				<button class="btn btn-primary" @click="add()" v-if="session_active == 'add'">Simpan</button>
				<button class="btn btn-primary" @click="edit(pegawai.id)" v-else-if="session_active == 'edit'">Edit</button>
				&nbsp;
				<button class="btn btn-secondary" @click="show_modal = false">Close</button>
			</div>
		</modal>
	</div>
</template>
<script>
	export default {
		data: function()
		{
			return {
				list: {},
				show_modal: false,
				session_active: 'add',
				pegawai: {
					id: '',
					nama: '',
					alamat: '',
				},
				validationErrors: '' 
			}
		},
		mounted: function()
		{
			this.getPage()
		},
		methods: {
			init: function()
			{
				this.pegawai.id = ''
				this.pegawai.nama = ''
				this.pegawai.alamat = ''
			},
			getPage: function(page)
			{
				if (typeof page === 'undefined') page = 1
				
				axios.get('/api/pegawai/page?page=' + page).then(response => {
					this.list = response.data
				}).catch(error => {
					alert(error.message)
				});
			},
			openModal: function(method, id)
			{
				this.session_active = method
				this.show_modal = true
				
				this.init()
				
				if (method == 'add') {
					$('#modal_title').html('ADD NEW PEGAWAI')
				} else if (method == 'edit') {
					$('#modal_title').html('EDIT PEGAWAI')
					
					axios.get('/api/pegawai/edit/' + id).then(response => {
						this.pegawai.id = response.data.id
						this.pegawai.nama = response.data.pegawai_nama
						this.pegawai.alamat = response.data.pegawai_alamat
					}).catch(error => {
						alert(error.message)
					});
				} else {
					$('#modal_title').html('UNKNOWN')
				}
			},
			add: function()
			{
				var params = {
					nama: this.pegawai.nama,
					alamat: this.pegawai.alamat
				}
				axios.post('/api/pegawai/add', params, {credential: true}).then(response => {
					alert('berhasil di simpan')
					
					this.init()
					this.getPage()
					
					this.show_modal = false
				}).catch(error => {
					if (error.response.status == 422) {
						this.validationErrors = error.response.data.errors
					} else {
						alert('Connection error !')
					}
				});
			},
			edit: function(id)
			{
				var params = {
					nama: this.pegawai.nama,
					alamat: this.pegawai.alamat
				}
				axios.post('/api/pegawai/update/' + id, params, {credential: true}).then(response => {
					alert('berhasil di update')
					
					this.init()
					this.getPage()
						
					this.show_modal = false
				}).catch(error => {
					if (error.response.status == 422) {
						this.validationErrors = error.response.data.errors
					} else {
						alert('Connection error !')
					}
				});
			},
		}
	}
</script>
