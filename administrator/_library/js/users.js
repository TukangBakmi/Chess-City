$(this).ready(function(){
    // Menampilkan data
    getUsers();
    function getUsers(){
        $.ajax({
            type: "GET",
            url: "_library/_php/action.php",
            data: {req:'user'},
            dataType: "json",
            success: function(response){
                var table;
                $.each(response, function(i,obj){
                    table += "<tr><td>" + obj.id +
                            "</td><td class='justify-content-center' style='width: 100px;'>" +
                            "<div><img src='images/profile/" + obj.profile_picture +
                                "' alt='foto' class='rounded' style='width:100%; height:100%;'>" +
                            "</div>" +
                            "</td><td>" + obj.name +
                            "</td><td>" + obj.email +
                            "</td><td>" + obj.phone +
                            "</td><td>" + obj.address +
                            "</td><td>" + obj.gender +
                            "</td><td>" + obj.date_joined +
                            "</td><td style='text-align:center'>" +
                                "<button class='btn btn-danger' id='btnDelete' data-id ='" +
                                obj.id + "' data-name='" + obj.name+ "'>Delete</button>" +
                            "</td></tr>";
                })
                $('#bodyUser').html(table);
            }
        })
    }
})

$(document).on("click", "#btnDelete", function () {
    var ItemId = $(this).data("id");
    var ItemName = $(this).data("name");
    Swal.fire({
        title: 'Are you sure you want to delete '+ItemName+'?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "_library/_php/deleteUser.php",
                data: { id: ItemId, req: "delete" },
                dataType: "JSON",
                success: function (response) {
                    if (response.result == true) {
                        Swal.fire({
                        icon: "success",
                        title: response.msg,
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        document.location.href = "adminUsers.php";
                    });
                    } else {
                        Swal.fire({
                        icon: "error",
                        title: response.msg,
                        showConfirmButton: false,
                        timer: 1500
                        });
                    }
                },
            });
        }
    })
  });