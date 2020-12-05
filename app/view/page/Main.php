<?php
    function showTableData(){
        if(isset($_POST['param_view'])){
            $catatan = $_POST['param_view'];

            foreach($catatan['berat_badan'] as $beratBadan) {
                echo"<tr>\n
                <td class='tanggal'>",$beratBadan['tanggal'],"</td>\n
                <td class='max'>",$beratBadan['max'],"</td>\n
                <td class='min'>",$beratBadan['min'],"</td>\n
                <td class='perbedaan'>",$beratBadan['perbedaan'],"</td>\n
                <td>
                <button class='btn btn-link btn-sm btn-infoBB' data-id='",$beratBadan['tanggal'],"'>Show Info</button>
                </td>\n
                </tr>\n";
            }

            echo"<tr>\n
            <td class='text-white bg-info'><strong>Rata-rata</strong></td>
            <td class='text-white bg-info'>",$catatan['maxRerata'],"</td>\n
            <td class='text-white bg-info'>",$catatan['minRerata'],"</td>\n
            <td class='text-white bg-info'>",$catatan['perbedaanRerata'],"</td>\n
            <td class='text-white bg-info'></td>\n
            </tr>\n";
        } 
        else{
            echo"<tr>\n
            <td colspan='5'>No Data</td>
            </tr>\n";
        }
    }
?>

<!------>
<div style="margin: <?= isset($_SESSION['flash']) ? '25pt':'75pt'?> 50pt 25pt 50pt">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-2">
        <h3 class="h3">Berat Badan Harian</h3>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button id="btn-tambah" type="button" data-toggle='modal' data-target='#tambahDataBBModal' class="btn btn-sm btn-outline-secondary">Tambah Data</button>
        </div>
        </div>
    </div>

    <div class="d-flex justify-content-center table-responsive">
        <table class="table text-center">
        <thead>
            <tr>
                <thead class="thead-dark">
                    <th scope="col">Tanggal</th>
                    <th scope="col">Max</th>
                    <th scope="col">Min</th>
                    <th scope="col">Perbedaan</th>
                    <th scope="col">Info</th>
                </thead>
            </tr>
        </thead>
        <tbody id="dataBB_bodyTb">
            <?php
                showTableData();
            ?>
        </tbody>
        </table>
    </div>
</div>
<!------>
<script>
    $(document).ready(function(){
        $('#tambahbtn').on('click', function(){
            var tanggal = $('input#dateInput').val();
            var max = $('input#maxInput').val();
            var min = $('input#minInput').val();

            let ajaxData = {
                tanggal : tanggal,
                max : max,
                min : min
            };

            $.ajax({
                url: "<?= App::base_url('dashboard/tambah') ?>",
                method: 'POST',
                data: ajaxData,
                dataType: "json",
                success: function(catatanBB){
                    $('#dataBB_bodyTb tr').remove();
                    
                    if(catatanBB != []){
                        var rows = '';
                        catatanBB['berat_badan'].forEach(function(value, index, array){
                            let row = "<tr>\n";
                                row += "<td class='tanggal'>" + value['tanggal'] + "</td>\n";
                                row += "<td class='max'>" + value['max'] + "</td>\n";
                                row += "<td class='min'>" + value['min'] + "</td>\n";
                                row += "<td class='perbedaan'>" + value['perbedaan'] + "</td>\n";
                                row += "<td>";
                                row += "<button class='btn btn-link btn-sm btn-infoBB' data-id='" + value['tanggal'] + "'>Show Info</button>";
                                row += "</td>\n";
                                row += "</tr>\n";
                            
                            rows += row;
                        });

                        rows += "<tr>\n";
                        rows += "<td class='text-white bg-info'><strong>Rata-rata</strong></td>";
                        rows += "<td class='text-white bg-info'>" + catatanBB['maxRerata'] + "</td>\n";
                        rows += "<td class='text-white bg-info'>" + catatanBB['minRerata'] + "</td>\n";
                        rows += "<td class='text-white bg-info'>" + catatanBB['perbedaanRerata'] + "</td>\n";
                        rows += "<td class='text-white bg-info'></td>\n";
                        rows += "</tr>\n";

                        let JRows = $(rows);
                        JRows.prependTo('#dataBB_bodyTb');

                        swal("Data ditambahkan", "Data anda berhasil ditambahkan", "success");
                    }
                }
            });

            $('#tambahDataBBModal').modal('hide')
        });

        $('#dataBB_bodyTb').on('click', '.btn-infoBB', function(){
            var tanggal = $(this).attr("data-id");
            let ajaxData = {
                tanggal: tanggal
            };

            $.ajax({
                url: "<?= App::base_url('dashboard/ambil') ?>",
                method: 'POST',
                data: ajaxData,
                dataType: "json",
                success: function(dataBB){
                    $('p.infoTanggal').html(dataBB['tanggal']);
                    $('p.infoMax').html(dataBB['max']);
                    $('p.infoMin').html(dataBB['min']);

                    $('#showInfoModal').modal('show');
                }
            });
        });

    });
</script>
