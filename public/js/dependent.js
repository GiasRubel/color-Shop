 $(document).ready(function() {

    $('select[name="country"]').on('change', function(){
        var countryId = $(this).val();
        if(countryId) {
            $.ajax({
                url: '/order/get/'+countryId,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="city"]').empty();
                    
                    $('select[name="city"]').append('<option >--select city--</option>');

                    $.each(data, function(key, value){

                        $('select[name="city"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                },
                complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
            });
        } else {
            $('select[name="state"]').empty();
        }

    });

});