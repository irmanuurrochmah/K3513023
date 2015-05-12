<?php $this->load->view('header.php');?>
		<div class="container-fluid-full">
		<div class="row-fluid">

		<?php $this->load->view('sidebar.php');?>
		
			<!-- start: Content -->
		<div id="content" class="span10">
			<ul class="breadcrumb">
				<li>
					<i class="icon-edit"></i>
					<a href="index.html">Edit Data Mahasiswa</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit data mahasiswa</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
						</div>
					</div>
					<?php 
					foreach ($data_siswa as $data){}
					
					$tanggal_lahir2 = explode("-", $data->tanggal_lahir);
					$tahun = $tanggal_lahir2[0];
					$bulan = $tanggal_lahir2[1];
					$tanggal = $tanggal_lahir2[2];
					$tanggal_lahir3 = $bulan."/".$tanggal."/".$tahun;
					?>
					<div class="box-content">
						<form class="form-horizontal" action="<?php echo base_url('siswa/update_data'); ?>" method="post">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Nama</label>
									<div class="controls">
										<input class="input-xlarge focused" id="focusedInput" type="text" name="nama" value="<?php echo $data->nama; ?>">
										<input type="hidden" name="id" value="<?php echo $data->id;?>">
									</div>
								</div>
								<div class="control-group hidden-phone">
									<label class="control-label">Alamat</label>
									<div class="controls">
										<textarea rows="3" style="width:30%" name="alamat"><?php echo $data->alamat; ?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Jenis Kelamin</label>
									<div class="controls">
									<?php
									if ($data->jenis_kelamin == "L"){
									?>
										<label class="radio">
											<input type="radio" name="jenis_kelamin" value="L" checked>Laki-Laki
										</label>
										<label class="radio">
											<input type="radio" name="jenis_kelamin" value="P">Perempuan
										</label>
									<?php
									}
									else if ($data->jenis_kelamin == "P"){
									?>
										<label class="radio">
											<input type="radio" name="jenis_kelamin" value="L">Laki-Laki
										</label>
										<label class="radio">
											<input type="radio" name="jenis_kelamin" value="P" checked>Perempuan
										</label>
									<?php
									}
									?>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="date01">Tanggal Lahir</label>
									<div class="controls">
										<input type="text" class="input-xlarge datepicker" id="date01" name="tanggal_lahir" placeholder="pilih tanggal" value="<?php echo $tanggal_lahir3; ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="selectError">Prodi</label>
										<div class="controls">
											<select id="selectError" data-rel="chosen" name="prodi">
												<option></option>
												<option value="PTIK" <?php echo ($data->prodi == "PTIK" ? 'selected' : '');?>>PTIK</option>
												<option value="PTM" <?php echo ($data->prodi == "PTM" ? 'selected' : '');?>>PTM</option>
												<option value="PTB" <?php echo ($data->prodi == "PTB" ? 'selected' : '');?>>PTB</option>
											</select>
										</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="optionsCheckbox2">Keahlian IT</label>
										<div class="controls">
											<label class="checkbox">
												<input type="checkbox" id="optionsCheckbox2" value="Blender, " name="Blender" <?php if (preg_match("/Blender/", $data->keahlian)){echo "checked";} ?>>
												Blender
											</label>
											<label class="checkbox">
												<input type="checkbox" id="optionsCheckbox2" value="3DMax, " name="3DMax" <?php if (preg_match("/3DMax/", $data->keahlian)){echo "checked";} ?>>
												3DMax
											</label>
											<label class="checkbox">
												<input type="checkbox" id="optionsCheckbox2" value="MS Office, " name="MS_Office" <?php if (preg_match("/MS Office/", $data->keahlian)){echo "checked";} ?>>
												MS Office
											</label>
											<label class="checkbox">
												<input type="checkbox" id="optionsCheckbox2" value="Photoshop, " name="Photoshop" <?php if (preg_match("/Photoshop/", $data->keahlian)){echo "checked";} ?>>
												Photoshop
											</label>
											<label class="checkbox">
												<input type="checkbox" id="optionsCheckbox2" value="Corel Draw, " name="Corel_Draw" <?php if (preg_match("/Corel Draw/", $data->keahlian)){echo "checked";} ?>>
												Corel Draw
											</label>
											<label class="checkbox">
												<input type="checkbox" id="optionsCheckbox2" value="PHP, " name="PHP" <?php if (preg_match("/PHP/", $data->keahlian)){echo "checked";} ?>>
												PHP
											</label>
											<label class="checkbox">
												<input type="checkbox" id="optionsCheckbox2" value="Pascal, " name="Pascal" <?php if (preg_match("/Pascal/", $data->keahlian)){echo "checked";} ?>>
												Pascal
											</label>
											<label class="checkbox">
												<input type="checkbox" id="optionsCheckbox2" value="Java." name="Java" <?php if (preg_match("/Java/", $data->keahlian)){echo "checked";} ?>>
												Java
											</label>
										</div>
								</div>
								<div class="control-group hidden-phone">
									<label class="control-label">Keterangan</label>
									<div class="controls">
										<textarea rows="3" style="width:30%" name="detail"><?php echo $data->detail; ?></textarea>
									</div>
								</div>
								<div class="form-actions">
									<input type="submit" class="btn btn-primary" name="tombol" id="tombol" value="Update">
									<a href="<?php echo base_url('siswa');?>" class="btn btn-danger">Kembali</a>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			
		</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>

<?php $this->load->view('footer.php');?>