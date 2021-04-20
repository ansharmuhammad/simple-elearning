<?php
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Siswa ".$c->config_sekolah.".xls");
  ?>
<h3 style="text-align: center">DATA SISWA <?=strtoupper($c->config_sekolah)?> </h3>
<table id="myTable" class="table table-bordered table-flush text-center" style="text-align: center; border-collapse: collapse;" border="1">
  <thead class="thead-light">
    <th width="1%">No</th>
    <th>NIS</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>Tanggal Lahir</th>
  </thead>
  <tbody>
    <?php $i=1; foreach ($data as $d) { ?>
    <tr>
      <td><?=$i++?></td>
      <td><?=$d->siswa_nis?></td>
      <td><?=$d->siswa_nama?></td>
      <td><?php if ($d->siswa_jk == 'L') { echo "Laki - Laki"; }else { echo "Perempuan"; } ?></td>
      <td><?=$d->siswa_tempatlahir?>, <?=date('d-m-Y',strtotime($d->siswa_tanggallahir))?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>