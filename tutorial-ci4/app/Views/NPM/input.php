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
                      <input type="hidden" name="param" id="param" value="<?php echo $edit_data['kode']; ?>">
                      <?php
                    }
                    ?>
                    <div class="form-group">
                      <label for="kodeNPM">Kode Kelas</label>
                      <input type="text" name="kode" id="kode" value="<?php echo empty(set_value('kode')) ? (empty($edit_data['kode']) ? "":$edit_data['kode']) : set_value('kode'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="password">password</label>
                      <input type="text" name="password" id="password" value="<?php echo empty(set_value('password')) ? (empty($edit_data['password']) ? "":$edit_data['password']) : set_value('kode'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="login">login</label>
                      <input type="text" name="login" id="login" value="<?php echo empty(set_value('login')) ? (empty($edit_data['login']) ? "":$edit_data['login']) : set_value('login'); ?>" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="sukses">sukses</label>
                      <input type="sukses" name="sukses" id="sukses" class="form-control">
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