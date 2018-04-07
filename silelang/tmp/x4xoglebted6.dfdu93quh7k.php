</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?= ($BASE.'/'.$media_vendor.'/jquery/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= ($BASE.'/'.$media_vendor.'/bootstrap/js/bootstrap.min.js') ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?= ($BASE.'/'.$media_vendor.'/metisMenu/metisMenu.min.js') ?>"></script>

<!-- Morris Charts JavaScript -->
<script src="<?= ($BASE.'/'.$media_vendor.'/raphael/raphael.min.js') ?>"></script>
<script src="<?= ($BASE.'/'.$media_vendor.'/morrisjs/morris.min.js') ?>"></script>
<!--<script src="../data/morris-data.js"></script>-->

<!-- Bootstrap datetimepicker -->
<script src="<?= ($BASE.'/'.$media_vendor.'/bootstrap-datetimepicker/bootstrap-datetimepicker.js') ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?= ($BASE.'/'.$media_js.'/sb-admin-2/sb-admin-2.js') ?>"></script>

<!-- Custom Library JavaScript -->
<script src="<?= ($BASE.'/'.$media_js.'/local_lib.js') ?>"></script>

<script type="text/javascript">
$(document).ready(function(){
   /*$('#btnCariIdCont').click(function()
        {
            var cId = $('#id_kontraktor').val();
            $.ajax({
                type: 'POST',
                url: '<?= ($BASE."/kontraktor/getcontractorbyid") ?>' + cid;                
                success: function(alldata){
                    alert("berhasil");
                }                
            });
        }
    );*/
    
    $("#success-message").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-message").slideUp(500);
    });
    
    $('#id_kriteria').change(function(evt){
        evt.preventDefault(); 
        var kriteria_id = $(this).val().toString();
        
        $('#tbskriteria > tbody').empty();
        $.ajax({
            url : '<?= ($BASE. "/penilaian/getsubkriteriabyid/") ?>' + kriteria_id,
            type : 'GET',
            dataType : 'json',
            success: function(data) {                
                $.each(data,function(index,element){
                    console.log(element.deskripsi);
                    var newRow = $(document.createElement('tr')).attr("id", 'trskriteriadata_' + element.id_sub);
                    var newInputNilai = '<input type="nilai" placeholder="Input Nilai" name="nilai['+ kriteria_id + '][' + element.id_sub +']" />';
                    newRow.append("<td>"+ element.id_sub +"</td><td>" + element.deskripsi + "</td><td>" + newInputNilai + "</td>");
                    
                    $('#tbskriteria').append(newRow);
                });
            }
        });
    });
});        
</script>
</body>

</html>