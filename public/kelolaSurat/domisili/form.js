var body = $('body');
var jsonHasil = $('.json_hasil').data('value');
console.log('json hasil', jsonHasil);

$(document).ready(function(){
    body.on('change', 'select[name="pelapor"]', function(e){
        const pelapor = $(this).val();
        const findData = jsonHasil.find(data => data.id_pend == pelapor);
        
        if(findData){
            findData.jekel = findData.jekel === "Laki-Laki" ? "LK" : "PR";
            $('input[name="nik_pelapor"]').val(findData.nik);
            $('input[name="nama_pelapor"]').val(findData.nama);
            $('select[name="jekel_pelapor"]').val(findData.jekel);
        }
    })
})