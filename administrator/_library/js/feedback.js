$(this).ready(function(){
    // Menampilkan data
    getFeedback();
    function getFeedback(){
        $.ajax({
            type: "GET",
            url: "_library/_php/action.php",
            data: {req:'feedback'},
            dataType: "json",
            success: function(response){
                var table;
                $.each(response, function(i,obj){
                    table += "<tr><td>" + obj.id +
                            "</td><td>" + obj.name +
                            "</td><td>" + obj.date +
                            "</td><td>" + obj.text +
                            "</td></tr>";
                })
                $('#bodyFeedback').html(table);
            }
        })
    }
})