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
              <div class="card-body">
                <?php
                if(session()->getFlashdata('success')){
                  ?>
                  <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                  <h5><i class="icon fas fa-check"></i> Success</h5>
                  <?php echo session()->getFlashdata('success'); ?>
                </div>
                  <?php
                }
                ?>

               
                <a class="btn btn-sm btn-primary" href="<?php echo base_url(); ?>/mahasiswa/tambah"><i class="fa-solid fa-plus"></i>Tambah mahasiswa</a>
              <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>NIM</th>
                      <th>nama</th>
                      <th >TTL</th>
                      <th >JK</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                      foreach ($data_mahasiswa as $r){
                        ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $r['NIM']; ?></td>
                          <td><?php echo $r['nama']; ?></td>
                          <td><?php echo $r['TTL']; ?></td>
                          <td><?php echo $r['JK']; ?></td>
                          <td>
                            <a class="btn btn-xs btn-info" href="<?php echo base_url(); ?>/mahasiswa/edit/<?php echo $r['mahasiswa']; ?>"><i class="fa-solid fa-edit"></i></a>
                            <a class="btn btn-xs btn-danger" href="#" onclick="return hapusConfig(<?php echo $r['mahasiswa']; ?>);"><i class="fa-solid fa-trash"></i></a>
                          </td>
                        </tr>
                        <?php
                        $no++;
                      }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <script>
          function hapusConfig(id){
            Swal.fire({
              title: 'Anda yakin ingin menghapus data ini?',
              text: "Data akan di hapus secara permananent",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus'
            }).then((result) => {
              if (result.isConfirmed) {
               window.location.href='<?php echo base_url();?>/mahasiswa/hapus/' + id;
              }
            })
          }
        </script>
<?php
echo $this->endSection();