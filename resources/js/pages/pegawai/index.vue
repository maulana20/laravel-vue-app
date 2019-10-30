<template>
	<div class="card card-default">
		<div class="card-header">Pegawai</div>
			<div class="card-body">
				<div class="table-responsive">
					<button class="btn btn-primary btn-sm" id="show-modal" @click="openModal('add')">add</button>&nbsp;
					<router-link :to="{ name: 'pegawai.trash' }"><button class="btn btn-primary btn-sm">recycle bin</button></router-link>
					<hr>
					<table class="table">
						<thead>
							<tr>
								<th width="5%">No.</th>
								<th width="10%">Nama</th>
								<th width="35%">Alamat</th>
								<th width="10%">Created</th>
								<th width="10%">Updated</th>
								<th width="10%" class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(pegawai, index) in list.data">
								<td>#</td>
								<td>{{ pegawai.pegawai_nama }}</td>
								<td>{{ pegawai.pegawai_alamat }}</td>
								<td>{{ pegawai.created_at }}</td>
								<td>{{ pegawai.updated_at }}</td>
								<td class="text-center">
									<button class="btn btn-primary btn-sm" id="show-modal" @click="openModal('edit', pegawai.id)">edit</button>&nbsp;
									<button class="btn btn-danger btn-sm" @click="del(pegawai.id)">del</button>
								</td>
							</tr>
						</tbody>
					</table>
					<pagination :data="list" @pagination-change-page="getPage"></pagination>
					<modal v-if="show_modal" @close="show_modal = false">
						<h3 slot="header" id="modal_title">Data Pegawai</h3>
						<div slot="body">
							<div class="form-group">
								<label>nama</label>
								<input v-model="form.nama" :class="{ 'is-invalid': form.errors.has('nama') }" class="form-control" type="text" name="nama">
								<has-error :form="form" field="nama" />
							</div>
							<div class="form-group">
								<label>alamat</label>
								<input v-model="form.alamat" :class="{ 'is-invalid': form.errors.has('alamat') }" class="form-control" type="text" name="alamat">
								<has-error :form="form" field="alamat" />
							</div>
						</div>
						<div slot="footer">
							<button class="btn btn-primary" @click="add()" v-if="session_active == 'add'">Simpan</button>
							<button class="btn btn-primary" @click="edit(form.id)" v-else-if="session_active == 'edit'">Edit</button>
							&nbsp;
							<button class="btn btn-secondary" @click="show_modal = false">Close</button>
						</div>
					</modal>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import Form from 'vform'
	
	export default
	{
		data: function()
		{
			return {
				list: {},
				show_modal: false,
				session_active: 'add',
				form: new Form({
					id: '',
					nama: '',
					alamat: '',
				})
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
				
				axios.get('pegawai/page?page=' + page).then(response => {
					this.list = response.data
				}).catch(error => {
					alert(error.message)
				})
			},
			openModal: function(method, id)
			{
				this.session_active = method
				this.show_modal = true
				
				if (method == 'add') {
					$('#modal_title').html('ADD NEW PEGAWAI')
				} else if (method == 'edit') {
					$('#modal_title').html('EDIT PEGAWAI')
					
					axios.get('pegawai/edit/' + id).then(response => {
						this.form.id = response.data.id
						this.form.nama = response.data.pegawai_nama
						this.form.alamat = response.data.pegawai_alamat
					}).catch(error => {
						alert(error.message)
					})
				} else {
					$('#modal_title').html('UNKNOWN')
				}
			},
			async add()
			{
				const { data } = await this.form.post('/pegawai/add')
				
				alert('berhasil di simpan')
				
				this.getPage()
				this.show_modal = false
			},
			async edit(id)
			{
				const { data } = await this.form.post('pegawai/update/' + id)
				
				alert('berhasil di update')
				
				this.getPage()
				this.show_modal = false
			},
			del: function(id)
			{
				axios.post('pegawai/delete/' + id, {}, {credential: true}).then(response => {
					alert('berhasil di delete')
					
					this.getPage()
				}).catch(error => {
					alert(error.message)
				})
			},
		}
	}
</script>
