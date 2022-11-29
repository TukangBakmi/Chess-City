$(this).ready(function(){
    // Menampilkan data
    getHistory();
    function getHistory(){
        $.ajax({
            type: "GET",
            url: "_library/_php/action.php",
            data: {req:'history'},
            dataType: "json",
            success: function(response){
                var table;
                $.each(response, function(i,obj){
                    table += "<tr><td>" + obj.id +
                            "</td><td>" + obj.username +
                            "</td><td>" + obj.product_name +
                            "</td><td>" + obj.price +
                            "</td><td>" + obj.quantity +
                            "</td><td>" + obj.total_price +
                            "</td><td>" + obj.receipt +
                            "</td><td>" + obj.date_purchased +
                            "</td></tr>";
                })
                $('#bodyHistory').html(table);
            }
        })
    }
})