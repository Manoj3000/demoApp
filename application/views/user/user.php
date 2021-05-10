<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo App</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- data table cdn -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/buttons.dataTables.min.css">
    <style>
    .dataTables_wrapper .dt-buttons{
        margin : 0 0 0 20px;
    }
    .dataTables_wrapper .dt-buttons .dt-buttons .buttons-html5{
        color : red !important;
    }
    </style>
</head>
<body class="bg-light">

        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url('User/logout');?>"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <div class="container">

        <div class="card rounded mt-5 mb-5 p-4 bg-light shadow">
            <div class="d-flex justify-content-between">
                <h3 class="">Welcome <?php echo $_SESSION['name']; ?> In CRUD APP</h3>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#addModal"> + Add</button>
            </div>
            <div class="card rounded mt-3 p-3">
                <table id="myTable" class="table datatable  table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="userList">
                        
                    </tbody>
                </table>
            </div>
        </div>

        <!-- The Add Modal -->
        <div class="modal fade" id="addModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Add User</h4>
                <button type="button" id="close" class="close" style="outline:none" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body p-4">
                <form id="addUser">
                    <div class="form-group">
                      <label for="name">Name :</label>
                      <input type="text" class="form-control" placeholder="Enter Name" id="name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email :</label>
                      <input type="text" class="form-control" placeholder="demo@gmail.com" id="email">
                    </div>
                    <div class="text-right">
                        <p class="text-center" id="msg"></p>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
              </div>

            </div>
          </div>
        </div>

        <!-- The Edit Modal -->
        <div class="modal fade" id="editModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit User</h4>
                <button type="button" class="close" style="outline:none" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body p-4">
                <form id="editUser">
                    <input type="hidden" name="userId" id="UserId">
                    <div class="form-group">
                      <label for="name">Name :</label>
                      <input type="text" class="form-control" placeholder="Enter Name" id="editName">
                    </div>
                    <div class="form-group">
                      <label for="email">Email :</label>
                      <input type="text" class="form-control" placeholder="Enter Email" id="editEmail">
                    </div>
                    <div class="text-right">
                        <p class="text-center" id="msg"></p>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>
                </form>
              </div>

            </div>
          </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- data table cdn  -->
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vfs_fonts.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jszip.min.js"></script>


    <script>
        $(document).ready(function(){

            // $('#myTable').DataTable();

            
        graphDrawer = function (data) {
            table =  $('#myTable').DataTable({
                responsive: true,
                //scrollX: true,
                language: {
                    searchPlaceholder: "Master Search",
                    lengthMenu: "Show:  _MENU_",
                },
                dom: 'lBfrtip',
                buttons: [ {
                      extend: 'excel',
                      exportOptions: {
                          modifier: {
                              selected: false
                          },
                          columns: [0, 1, 2]
                      }
                  }, 
                  {
                      extend: 'pdf',
                      exportOptions: {
                          modifier: {
                              selected: false
                          },
                          columns: [0, 1, 2]
                      }
                  }
                ],
                data: data.data,
                autoWidth: false,
                searching: true,
                pageLength: 10,
                bDestroy: true,
                bFilter: true,
                paging: true,
                columns: [
                    {data: "id"},
                    {data: "name"},
                    {data: "email"},
                    {data: "id", render: function (rec, type, row) {
                        var dataStr = '<a data-id="'+rec+'" type="button" data-toggle="modal" data-target="#editModal" class="btn btn-outline-success editUserFun"><i class="fa fa-pencil"></i></a> <a data-id="'+rec+'" type="button" class="btn btn-outline-danger deleteUserFun ml-1"><i class="fa fa-trash"></i></a>';
                           return dataStr;
                       }
                    }

                ],
                select: {
                    style:    'multi',
                    selector: 'td:first-child'
                },
                order: [],
                deferRender: true,
                bDeferRender: true,
                deferLoading: 10,
                bDeferLoading: 10,
                stateSave: false,
            });
        }


            // add user
            $("form#addUser").submit(function(e){
                e.preventDefault();
                var $this = $(this);

                var name = $("#name").val();
                var email = $("#email").val();

                var formData = new FormData(this);

                formData.append('name' , name);
                formData.append('email' , email);

                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>User/addUser",
                    data: formData,
                    processData:false,
                    contentType:false,
                    cache:false,
                    success:function(res){
                        if(res){
                            
                            $this.closest(".modal").find("#msg").text("Saved successfully.").css("color", "green");
          				    setTimeout(function(){ $this.closest(".modal").find(".close").trigger("click"); $("#msg").text(""); $('form#addUser').each(function(){this.reset(); }); }, 2000);
                            getAllData();
                        }else{
                            $this.closest(".modal").find("#msg").text("Saved Failed.").css("color", "red");
          				    setTimeout(function(){ $this.closest(".modal").find(".close").trigger("click"); $("#msg").text(""); $('form#addUser').each(function(){this.reset(); }); }, 2000);
                        }
                    },
                    error:function(error){
                        console.log(error);
                        $this.closest(".modal").find("#msg").text(error.statusText).css("color", "red");
          			    setTimeout(function(){ $this.closest(".modal").find(".close").trigger("click"); $("#msg").text(""); $('form#addUser').each(function(){this.reset(); }); }, 2000);
                    }
                });

            });

            // get data for edit
            $(document).on("click", ".editUserFun", function(){
          		var id = $(this).data("id");
                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url("User/getUserDataForEdit");?>",
                    data:"id="+id,
                    cache:false,               
                    success:function(res){
                        var data = JSON.parse(res);
                        $("#UserId").val(data.id);
                        $("#editName").val(data.name);
                        $("#editEmail").val(data.email);
                    }
                });
          	});

            //   edit user
            $("form#editUser").submit(function(e){
                e.preventDefault();
                var $this = $(this);

                var id = $("#UserId").val();
                var name = $("#editName").val();
                var email = $("#editEmail").val();

                var formData = new FormData(this);

                formData.append('id' , id);
                formData.append('name' , name);
                formData.append('email' , email);

                $.ajax({
                    type:"POST",
                    url:"<?php echo base_url(); ?>User/editUser",
                    data: formData,
                    processData:false,
                    contentType:false,
                    cache:false,
                    success:function(res){
                        if(res){
                            
                            $this.closest(".modal").find("#msg").text("Update successfully.").css("color", "green");
          				    setTimeout(function(){ $this.closest(".modal").find(".close").trigger("click"); $this.closest(".modal").find("#msg").text(""); $('form#editUser').each(function(){this.reset(); }); }, 2000);
                            getAllData();
                        }else{
                            $this.closest(".modal").find("#msg").text("Update Failed.").css("color", "red");
          				    setTimeout(function(){ $this.closest(".modal").find(".close").trigger("click"); $this.closest(".modal").find("#msg").text(""); $('form#editUser').each(function(){this.reset(); }); }, 2000);
                        }
                    },
                    error:function(error){
                        console.log(error);
                        $this.closest(".modal").find("#msg").text(error.statusText).css("color", "red");
          			    setTimeout(function(){ $this.closest(".modal").find(".close").trigger("click"); $this.closest(".modal").find("#msg").text(""); $('form#editUser').each(function(){this.reset(); }); }, 2000);
                    }
                });

            });

            // delete user
            $(document).on("click", ".deleteUserFun", function(){
                var id = $(this).data("id");
                if (confirm("Delete OR Cancel.")) {
                    $.ajax({
                        type:"POST",
                        url:"<?php echo base_url('User/deleteUser'); ?>",
                        data:"id="+id,
                        cache:false,
                        success:function(res){
                            if(res){
                                alert("Deleted Successfully");
                                getAllData();
                            }else{
                                alert("Delete Failed");
                            }
                        }
                    });
                }
            });

            // get all user data
            getAllData = function (argument) {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url('User/getAllData'); ?>",
                    cache: false,
                    success: function(data) {
                        var d = JSON.parse(data);
                        graphDrawer(d);                    
                    }
                });   
            }

            getAllData();

            // getAllData = function(){
            //     $.ajax({
            //         type:"POST",
            //         url:"<?php echo base_url('User/getAllData'); ?>",  
            //         cache:false,               
            //         success:function(res){
            //             var data = JSON.parse(res);
            //             console.log(res.length);

            //             var dataStr=``;
            //             if(res.length > 11){
            //                 $.each(data.data, function(i,obj){
            //                     dataStr += `
            //                     <tr>
            //                         <td>`+obj.id+`</td>
            //                         <td>`+obj.name+`</td>
            //                         <td>`+obj.email+`</td>
            //                         <td>
            //                             <a data-id="`+obj.id+`" type="button" data-toggle="modal" data-target="#editModal" class="btn btn-outline-success editUserFun"><i class="fa fa-pencil"></i></a>
            //                             <a data-id="`+obj.id+`" type="button" class="btn btn-outline-danger deleteUserFun ml-1"><i class="fa fa-trash"></i></a>
            //                         </td>
            //                     </tr>
            //                     `;
            //                 })
            //             }else{
            //                 dataStr += `<tr><td class="text-center" colspan="4"><h6>No Record Found</h6></td></tr>`;
            //             }
            //             $("#userList").html(dataStr);
            //         }

            //     });
            // }
            // getAllData();
        })
    </script>
</body>
</html>