 $(document).ready(function() {

    //SAVE WALLET
    $('#frm_save_wallet').on('submit', function() {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url + "main/ajax_save_wallet",
            data: $('#frm_save_wallet').serialize(),
            success: function(data) {
				if (data.status == "yes") {
					new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    
					$("#frm_save_wallet").closest('form').find("input[type=text]").val("");
                    setTimeout(function() {
                        $('.glyphicon-remove').trigger( "click" );

                        $('#modal-selectplan').modal('show');
                    }, 1600);
                    return false;    
                } else {
                    new PNotify({
                        title: 'Error',
                        text: data.content,
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }
            }
        }).error(function() {
            alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
        });
        return false;
    });

    $('#modal-selectplan .cancel').click(function(){
        location.reload();
    });




// transfer to wallet

    $('#frm_trans_to_wallet').on('submit', function() {
   
        $.ajax({
            type: "POST",
            dataType: "json",
            url: base_url + "main/ajax_save_transfer_to_wallet",
            data: $('#frm_trans_to_wallet').serialize(),
            success: function(data) {
                if (data.status == "yes") {
                    new PNotify({
                        title: 'Success',
                        text: data.content,
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                    setTimeout(function() {
                         location.reload();
                    }, 1600);
                    
                    return false;    
                } else {
                    new PNotify({
                        title: 'Error',
                        text: data.content,
                        type: 'error',
                        styling: 'bootstrap3'
                    });
                }
            }
        }).error(function() {
            alert('Connection problems occurred... Unable to connect to the Internet! The Internet connection has been lost.');
        });
        return false;
    });

    $('#modal-selectplan .cancel').click(function(){
        location.reload();
    });
});
