$(this).ready(function(){
    // Menampilkan modal
    $(".transaction").each(function( index ) {
        $('#detailHistory'+index).click(function(){
            var itemReceipt = $(this).data("id");
            var date = $(this).data("date");
            $('#modalDtlHist').modal('show');
            $('#receiptMod').text(itemReceipt);
            $('#datePurcMod').text(date);
            $.ajax({
                type: "GET",
                url: "administrator/_library/_php/action.php",
                data: {
                    req: "receipt",
                    id: itemReceipt,
                },
                dataType: "JSON",
                success: function (response) {
                    var details = "";
                    $.each(response, function(i,obj){
                        details += `<div class="col-6" style="border-bottom: 1px solid black">
                                        <h6>`+ obj.product_name +`</h6>
                                    </div>
                                    <div class="col-2" style="border-bottom: 1px solid black">
                                        <h6>$<span>`+ obj.price +`</span></h6>
                                    </div>
                                    <div class="col-2" style="border-bottom: 1px solid black">
                                        <h6>x<span>`+ obj.quantity +`</span></h6>
                                    </div>
                                    <div class="col-2" style="border-bottom: 1px solid black">
                                        <h6>$<span>`+ obj.total_price +`</span></h6>
                                    </div>`
                    })
                    $('#productMod').html(details);
                },
            });
        })
    })
})