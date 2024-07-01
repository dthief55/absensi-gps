$(document).ready(function(){
    const $sidebarToggle    = $('#sidebarToggle')
    const $button           = $( "#presensi_hadir")
    const $loadingSpinner   = $('#loading_spinner')
    const $text             = $('#success_text')

    if ($sidebarToggle) {
        $sidebarToggle.on("click", function(event){
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

    function show_position(position){
        $loadingSpinner.show('slow')

        untirta_x = 106.03210177831828
        untirta_y = -5.996174612901304

        coordinate = position.coords
        x_coor     = coordinate.longitude
        y_coor     = coordinate.latitude
        
        if(Math.abs(x_coor - untirta_x) <= 0.0020 && Math.abs(y_coor - untirta_y) <= 0.0010){
            $.ajax({
                url : '/karyawan/presensi/attempt',
                type : 'get',
                data : {
                    x_coordinate : x_coor,
                    y_coordinate : y_coor
                }
            })
            
            $loadingSpinner.hide('slow')
            $text.html('Presensi Berhasil!')
        }else{
            $loadingSpinner.hide('slow')
            $text.html('Anda berada diluar jangkauan kampus!')
        }
    }

    function err_msg(msg){
        return alert('Error when get location \n' + msg)
    }

    $button.on( "click", function(){
        navigator.geolocation.getCurrentPosition(show_position, err_msg)
    })
})