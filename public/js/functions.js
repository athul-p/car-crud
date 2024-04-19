var key = "U2o3ejRDbTVHT2s5aTFJbXdCSVJtUFNFUWVpNjJNSG9nTHZRUlNBUQ==";

function load_states(state)
{
    var settings = {
      "url": "https://api.countrystatecity.in/v1/countries/IN/states",
      "method": "GET",
      "headers": {
        "X-CSCAPI-KEY": key
      },
    };

    $.ajax(settings).done(function (response) {
        
        $.each(response, function( index, value ) {
            // console.log(index)
            // console.log(value);
            $('#state').append('<option value="'+value['iso2']+'-'+value['name']+'">'+value['name']+'</option>');
        });
        if(state!=0)
            $("#state").val(state).change();
      // console.log(response);
    });
}

function load_city(state,city)
{
    var settings = {
      "url": "https://api.countrystatecity.in/v1/countries/IN/states/"+state+"/cities",
      "method": "GET",
      "headers": {
        "X-CSCAPI-KEY": key
      },
    };

    $.ajax(settings).done(function (response) {
        
        $.each(response, function( index, value ) {
            // console.log(index)
            // console.log(value['name']);
            // console.log(value);
            $('.temp-cities').remove();
            $('#city').append('<option class="temp-cities" value="'+value['id']+'-'+value['name']+'">'+value['name']+'</option>');
        });
        if(city != 0)
            $("#city").val(city).change();
      // console.log(response);
    });
}     


$(document).ready(function(){
    $(".log_out").click(function() {
        if(confirm("Are you sure to logout?"))
        {
            $.post("/car-crud/cust-logout",
            {
                _token: csrf_token
            },
            function(result){
                location.reload();
            });
        }
    });

    $(".delete").click(function() {
        if(confirm("Are you sure to delete?"))
        {
            $.post("/car-crud/car/"+$(this).attr('id'),
            {
                _token: csrf_token,
                _method : 'DELETE'
            },
            function(result){
                location.reload();
            });
        }
    });

});