<template>
    <div class="container">
        <button type="button" class="btn btn-info " name = "add_user">Add user +</button>
        <hr>
        <h2>Users list</h2>
        <table id="users_tbl" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        
        <hr>
        <button type="button" class="btn btn-success " name = "add_role">Add Role +</button>
        <hr>
        <h2>Role List</h2>
        <table id="roles_tbl" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Role Name</th>
                    <th>Role Description</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <!-- EDIT USER Modal -->
        <div class="modal fade" id="users_info_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modify user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="edit_user_form">
                            <input type="text" hidden name="id">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Full name</label>
                                    <input name="fullname" type="text" class="form-control" placeholder="Full Name">
                                    <small class = "error" id = "fullname"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Email">
                                    <small class = "error" id = "email"></small>
                               </div>
                                <div class="form-group col-md-6">
                                    <label>Role</label><br>
                                    <select name="role" class="form-control" style="width: 100%"></select>
                                    <small class = "error" id = "role"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Password</label>
                                    <input type="password" name = "password" class="form-control" placeholder="Password" value="********">
                                    <small class = "error" id = "password"></small>
                                </div>
                            </div>

                            <div style="text-align: center; color:green">
                                <small id = "message"></small>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" name = "delete_user">Delete</button>
                        <button type="button" class="btn btn-primary" name = "submit_edit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>



         <!-- ADD USER MODAL -->
        <div class="modal fade" id="users_add_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Register user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="add_user_form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Full name</label>
                                    <input name="fullname" type="text" class="form-control" placeholder="Full Name">
                                    <small class = "error" id = "fullname"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Email">
                                    <small class = "error" id = "email"></small>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Role</label><br>
                                    <select name="role" class="form-control" style="width: 100%"></select>
                                    <small class = "error" id = "role"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nominated Password</label>
                                    <input type="text" name = "password" class="form-control" placeholder="Password">
                                    <small class = "error" id = "password"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Confirm Password</label>
                                    <input type="text" name = "password_confirmation" class="form-control" placeholder="Password">
                                    <small class = "error" id = "password_confirmation"></small>
                                </div>
                            </div>
                        </form>
                        <div style="text-align: center; color:green">
                            <small id = "message"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" name = "save_user">Save user</button>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- EDIT role Modal -->
        <div class="modal fade" id="edit_role_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="edit_role_form">
                            <input type="text" hidden name="id">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Role name</label>
                                    <input name="role_name" type="text" class="form-control" placeholder="Role name">
                                    <small class = "error" id = "role_name"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Role Description</label>
                                    <input name="role_description" type="text" class="form-control" placeholder="Role Description">
                                    <small class = "error" id = "role_description"></small>
                               </div>
                            </div>

                            <div style="text-align: center; color:green">
                                <small id = "message"></small>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" name = "delete_role">Delete</button>
                        <button type="button" class="btn btn-primary" name = "submit_edit_role">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- add role Modal -->
        <div class="modal fade" id="add_role_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Role</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form name="add_role_form">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Role name</label>
                                    <input name="role_name" type="text" class="form-control" placeholder="Role name">
                                    <small class = "error" id = "role_name"></small>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Role Description</label>
                                    <input name="role_description" type="text" class="form-control" placeholder="Role Description">
                                    <small class = "error" id = "role_description"></small>
                               </div>
                            </div>

                            <div style="text-align: center; color:green">
                                <small id = "message"></small>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" name = "submit_add_role">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>

<script>
import $ from 'jquery'
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";

export default {
    mounted() {
        var userid_selected = 0;
        var roleid_selected = 0;
        var users_info_modal = $('div#users_info_modal').modal('hide');
        var edit_user_form = $('form[name="edit_user_form"]');
        var edit_role_form = $('form[name="edit_role_form"]');
        var add_role_form = $('form[name="add_role_form"]');
        var add_user_form = $('form[name="add_user_form"]');
        var users_add_modal =  $('div#users_add_modal').modal('hide');
        var edit_role_modal =  $('div#edit_role_modal').modal('hide');
        var add_role_modal =  $('div#add_role_modal').modal('hide');

        var users_tbl = $('table#users_tbl').DataTable({
            ajax: "/admin/get_users",
            serverSide: true,
            processing: true,
            columns: [
                { data: 'fullname' },
                { data: 'email' },
                { data: 'role_name' }
            ]
        });
        var roles_tbl = $('table#roles_tbl').DataTable({
            ajax: "/admin/get_roles",
            serverSide: true,
            processing: true,
            columns: [
                { data: 'role_name' },
                { data: 'role_description' },
            ]
        });
        
        $(document).on('click', 'table#roles_tbl tbody tr td', (e) => {
            var role = roles_tbl.row($(e.target).parent()).data();
            roleid_selected = role.id;
            for (let data in role) {
                edit_role_form.find('input[name="' + data + '"]').val(role[data]);
                edit_role_form.find('select[name="' + data + '"]').val(role[data]);
            }
            edit_role_modal.modal('show');
        });

        $(document).on('click', 'table#users_tbl tbody tr td', (e) => {
            var user = users_tbl.row($(e.target).parent()).data();
            userid_selected = user.id;
            for (let data in user) {
                edit_user_form.find('input[name="' + data + '"]').val(user[data]);
                edit_user_form.find('select[name="' + data + '"]').val(user[data]);
            }
            users_info_modal.modal('show');
        });

        $('button[name="add_user"]').on('click', ()=> {
            users_add_modal.modal('show');
        });
        $('button[name="add_role"]').on('click', ()=> {
            add_role_form.trigger('reset');
            add_role_modal.modal('show');
        });

        $('button[name="save_user"]').on('click', ()=>{
            // remove prev error not
            add_user_form.find('small').text("");
            // submit form
            $.ajax({
                url: "/admin/register_user",
                data: add_user_form.serialize(),
                success: (e)=> {
                   users_tbl.ajax.reload(null,false); 
                   add_user_form.trigger('reset');
                   $('small#message').text(e.message);
                },
                error: (e)=>{
                    var errors = e.responseJSON.errors;
                    for (let error in errors) {
                        console.log(error);
                        add_user_form.find('small#'+error+'').text(errors[error]);
                    }
                }
            });
        });

        // register role
        $('button[name="submit_add_role"]').on('click', ()=>{
            // remove prev error not
            add_role_form.find('small').text("");
            // submit form
            $.ajax({
                url: "/admin/register_role",
                data: add_role_form.serialize(),
                success: (e)=> {
                   roles_tbl.ajax.reload(null,false); 
                   add_role_form.trigger('reset');
                   add_role_form.find('small#message').text(e.message);
                   populate_selection();
                },
                error: (e)=>{
                    var errors = e.responseJSON.errors;
                    for (let error in errors) {
                        add_role_form.find('small#'+error+'').text(errors[error]);
                    }
                }
            });
        });

        // edit user submit
        $('button[name="submit_edit"]').on('click', function(){
            //reset all error message
             edit_user_form.find('small').text("");
            // submit edit
            $.ajax({
                url: "/admin/submit_edit",
                data: edit_user_form.serialize(),
                success: (e)=> {
                    users_tbl.ajax.reload(null,false); 
                    edit_user_form.find('small#message').text(e.message);   
                },
                error: (e)=>{
                    console.log(e);
                    var errors = e.responseJSON.errors;
                    for (let error in errors) {
                        console.log(error);
                        edit_user_form.find('small#'+error+'').text(errors[error]);
                    }
                }
            });
        });


        // edit role submit
        $('button[name="submit_edit_role"]').on('click', function(){
            //reset all error message
             edit_role_form.find('small').text("");
            // submit edit
            $.ajax({
                url: "/admin/submit_edit_role",
                data: edit_role_form.serialize(),
                success: (e)=> {
                    roles_tbl.ajax.reload(null,false); 
                    edit_role_form.find('small#message').text(e.message);   
                    populate_selection();
                },
                error: (e)=>{
                    console.log(e);
                    var errors = e.responseJSON.errors;
                    for (let error in errors) {
                        console.log(error);
                        edit_role_form.find('small#'+error+'').text(errors[error]);
                    }
                }
            });
        });

        // delete user
        $('button[name="delete_user"]').on('click', ()=>{
            $.ajax({
                url: "/admin/delete_user",
                data: {
                    user_id: userid_selected
                },
                success: (e)=> {
                    users_tbl.ajax.reload(null,false);
                    users_info_modal.modal('hide');
                },
                error: (e)=> {
                    console.log(e);
                }
            });
        });


        // delete role
        $('button[name="delete_role"]').on('click', ()=>{
            console.log(roleid_selected);
            $.ajax({
                url: "/admin/delete_role",
                data: {
                    role_id: roleid_selected
                },
                success: (e)=> {
                    roles_tbl.ajax.reload(null,false);
                    edit_role_form.find('small#message').text(e.message);
                    edit_role_form.trigger('reset');
                    edit_role_modal.modal('hide');
                    populate_selection();
                },
                error: (e)=> {
                    console.log(e);
                }
            });
        });

         // populate selection
        var populate_selection = ()=>{
            $('select[name="role"]').empty();
            $.ajax({
                url: "/admin/get_user_role",
                success: (e)=> {
                    var options = e.results;
                    var selections = "";
                    for(var i =0 ;i < options.length; i++){
                        selections += "<option value='"+options[i].id+"'>"+options[i].text+"</option>";
                    }
                    $('select[name="role"]').append(selections);
                },
                error: (e)=>{
                    console.log(e);
                }
            });
        }
        populate_selection();

    }
   
}
</script>
