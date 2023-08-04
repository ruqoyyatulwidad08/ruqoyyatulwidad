<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
    <div class="row">
          <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
              </div>
              <!-- /.card-header -->
              <form action="<?php echo $action; ?>" method="post">
              <div class="card-body">
                <?php if (validation_errors()){
                  ?>
                   <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  <?php echo validation_list_errors() ?>
                </div>
                  <?php
                }
                ?>

                <?php
                if(session()->getFlashdata('error')){
                  ?>
                  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-warning"></i> Error</h5>
                  <?php echo session()->getFlashdata('error'); ?>
                </div>
                  <?php
                }
                ?>

                    <?php echo csrf_field() ?>
                    <?php
                    if(current_url(true)->getSegment(2) =='edit'){
                      ?>
                      <input type="hidden" name="param" id="param" value="<?php echo $edit_data['mahasiswa']; ?>">
                      <?php
                    }
                    ?>
                    <div class="form-group">
                      <label for="mahasiswa">No</label>
                      <input type="text" name="mahasiswa" id="mahasiswa" value="<?php echo empty(set_value('mahasiswa')) ? (empty($edit_data['mahasiswa']) ? "":$edit_data['mahasiswa']) : set_value('mahasiswa'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="mahasiswa">mahasiswa</label>
                      <input type="text" name="mahasiswa" id="mahasiswa" value="<?php echo empty(set_value('mahasiswa')) ? (empty($edit_data['mahasiswa']) ? "":$edit_data['mahasiswa']) : set_value('mahasiswa'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="NIM">NIM</label>
                      <input type="text" name="NIM" id="NIM" value="<?php echo empty(set_value('NIM')) ? (empty($edit_data['NIM']) ? "":$edit_data['NIM']) : set_value('NIM'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="nama">nama</label>
                      <input type="text" name="nama" id="nama" value="<?php echo empty(set_value('nama')) ? (empty($edit_data['nama']) ? "":$edit_data['nama']) : set_value('nama'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="TTL"></label>
                      <input type="text" name="TTL" id="TTL" value="<?php echo empty(set_value('TTL')) ? (empty($edit_data['TTL']) ? "":$edit_data['TTL']) : set_value('TTL'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="JK"></label>
                      <input type="text" name="JK" id="JK" value="<?php echo empty(set_value('JK')) ? (empty($edit_data['JK']) ? "":$edit_data['JK']) : set_value('JK'); ?>" class="form-control">
                    </div>
            </div>
            <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i>Simpan</button>
                </div>
              </form>
        </div>
    </div>
</div>
<?php
echo $this->endSection();