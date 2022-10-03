$(document).ready(function(){

    // event ketika keyword ditulis
    $('#keyword').on('keyup',function(){
   
    //.get
    $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(),function(data){
        $('#container').html(data);
    });
    });
});