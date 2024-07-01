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
        coordinate = position.coords
        x_coor = coordinate.longitude
        y_coor = coordinate.latitude

        $.ajax({
            method: 'post',
            url: '/karyawan/presensi/attempt',
            data : {
                x_coordinate : x_coor,
                y_coordinate : y_coor
            },
            headers : {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('conte nt')},
            success : function(result){
                $loadingSpinner.hide('slow')
                $text.html('Presensi Berhasil!')
        }})

        return window.coordinate = coordinate
    }

    function err_msg(msg){
        return alert('Error when get location \n' + msg)
    }

    $button.on( "click", function(){
        navigator.geolocation.getCurrentPosition(show_position, err_msg)
    })
})