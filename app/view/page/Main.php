<?php
    function showTableData(){
        if(isset($_POST['param_view'])){
            $catatan = $_POST['param_view'];

            foreach($beratBadan as $catatan['berat_badan']) {
                echo"<tr>\n
                <td class='tanggal'>",$beratBadan['tanggal'],"<td>\n
                <td class='max'>",$beratBadan['max'],"<td>\n
                <td class='min'>",$beratBadan['min'],"<td>\n
                <td class='perbedaan'>",$beratBadan['perbedaan'],"<td>\n
                <td>
                <button class='btn btn-link btn-sm btn-infoBB' data-id='",$beratBadan['tanggal'],"'>Show Info</button>
                </td>\n
                </tr>\n";
            }

            echo"<tr>\n
            <td>Rata-rata</td>
            <td>",$catatan['maxRerata'],"<td>\n
            <td>",$catatan['minRerata'],"<td>\n
            <td colspan='2'>",$catatan['perbedaanRerata'],"<td>\n
            </tr>\n";
        } 
        else{
            echo"<tr>\n
            <td colspan='4'>No Data</td>
            </tr>\n";
        }
    }
?>

<!------>

<div class="d-flex my-2 justify-content-between">
<h2>Berat Badan Harian</h2>
<button id="btn-tambah" data-toggle='modal' data-target='#tambahDataBBModal' class="btn btn-primary">Tambah</button>
</div>

<div class="d-flex justify-content-center">
    <table class="table mt-2">
    <thead>
        <tr>
        <th scope="col">Tanggal</th>
        <th scope="col">Max</th>
        <th scope="col">Min</th>
        <th scope="col">Perbedaan</th>
        </tr>
    </thead>
    <tbody id="dataBB_bodyTb">
        <?php
            showTableData();
        ?>
    </tbody>
    </table>
</div>
<!------>
<script>
    $(document).on('ready', function(){
        $('#tambahDataBBModal').on('click', function(){
            var tanggal = $('input.dateInput').val();
            var max = $('input.maxInput').val();
            var min = $('input.minInput').val();

            let ajaxData = {
                action : 'tambah-data',
                tanggal : tanggal,
                max : max,
                min : min
            };

            $.ajax({
                url: "<?=base_url('controller/MainCon.php')?>",
                method: 'POST',
                data: ajaxData,
                success: function($catatanBB){
                    $('#dataBB_bodyTb tr').remove();
                    
                    var rows = '';
                    $catatanBB['berat_badan'].forEach(function(value, index, array){
                        let row = "<tr>\n";
                            row += "<td class='tanggal'>" + value['tanggal'] + "<td>\n";
                            row += "<td class='max'>" + value['max'] + "<td>\n";
                            row += "<td class='min'>" + value['min'] + "<td>\n";
                            row += "<td class='perbedaan'>" + value['perbedaan'] + "<td>\n";
                            row += "<td>";
                            row += "<button class='btn btn-link btn-sm btn-infoBB' data-id='" + $value['tanggal'] + "'>Show Info</button>";
                            row += "</td>\n";
                            row += "</tr>\n";
                        
                        rows += row;
                    });

                    rows += "<tr>\n";
                    rows += "<td>Rata-rata</td>";
                    rows += "<td>" + $catatanBB['maxRerata'] + "<td>\n";
                    rows += "<td>" + $catatanBB['minRerata'] + "<td>\n";
                    rows += "<td colspan='2'>" + $catatanBB['perbedaanRerata'] + "<td>\n";
                    rows += "</tr>\n";

                    let JRows = $(rows);
                    JRows.prependTo('#dataBB_bodyTb');
                }
            });
        });

        $('.btn-infoBB').on('click', function(){
            var tanggal = $(this).attr("data-id");
            let ajaxData = {
                action: 'ambil-data',
                tanggal: tanggal
            };

            $.ajax({
                url: "<?=base_url('controller/MainCon.php')?>",
                method: 'POST',
                data: ajaxData,
                success: function($dataBB){
                    $('p.infoTanggal').html($dataBB['tanggal']);
                    $('p.infoMax').html($dataBB['max']);
                    $('p.infoMin').html($dataBB['min']);

                    $('#showInfoModal').modal('show');
                }
            });
        });

    });
</script>
</body>
</html>
