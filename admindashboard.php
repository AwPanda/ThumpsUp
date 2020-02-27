<?php
require_once 'libs/main.php';

require_once 'header.php';




?>

<?php

require_once 'libs/user.php';

$user = new user();

$userList = $user->getAllUsers();

$userArray = json_decode( $userList, true );

require_once 'libs/role.php';

$role = new role();

$roleDropdownList = $role->getAllRoles();

$roleDropdownList = json_decode($roleDropdownList, true);

print_r($roleDropdownList);
?>

<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEmployeeDetailsTitle">Enter Employee Details for</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="addEmployeeAdmin.php">
            <div class="modal-body">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Hire Date</label>
                    <input type="date" class="form-control" name="hiredate" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Hire To Date</label>
                    <input type="date" class="form-control" name="hiretodate" id="message-text"></input>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Select Role</label>
                    <select class="form-control" name="roleid" id="exampleFormControlSelect1">
                    <?php
                        foreach($roleDropdownList as $role) { ?>
                        <option value="<?= $role['roleid'] ?>"><?= $role['rolename']. " : ". $role['departmentname'] ?></option>
                    <?php
                        } 
                        ?>
                    </select>
                </div>
                <input type="hidden" id="modal-userid" name="userid" value=""></input>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="addEmployee" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="removeEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="removeEmployeeModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRemoveEmployeeTitle">Remove Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="addEmployeeAdmin.php">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Hire Date</label>
                    <input type="date" class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Hire To Date</label>
                    <input type="date" class="form-control" id="message-text"></input>
                </div>

            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="employeeDetailsModal" tabindex="-1" role="dialog" aria-labelledby="employeeDetailsModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeDetailsModalTitle">Employee Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Address</label>
                    <input type="text" disabled class="form-control" id="recipient-name">
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Town</label>
                    <input type="text" disabled class="form-control" id="message-text"></input>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Postcode</label>
                    <input type="text"  disabled class="form-control" id="message-text"></input>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Phone</label>
                    <input type="text" disabled class="form-control" id="message-text"></input>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Hire Date</label>
                    <input type="text" disabled class="form-control" id="message-text"></input>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Hire To Date</label>
                    <input type="text"  disabled class="form-control" id="message-text"></input>
                </div>

                <div class="form-group">
                    <label for="message-text" class="col-form-label">Role Name</label>
                    <input type="text" disabled class="form-control" id="message-text"></input>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Role Department</label>
                    <input type="text" disabled class="form-control" id="message-text"></input>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">UserID</th>
      <th scope="col">User Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">User Type</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if(!empty($userArray))
        {
            foreach($userArray as $user)
            {
                echo "<tr>";
                echo "<th scope='row'>" . $user['userid'] . "</th>";
                echo "<th scope='row'>" . $user['username'] . "</th>";
                echo "<th scope='row'>" . $user['firstname'] . "</th>";
                echo "<th scope='row'>" . $user['surname'] . "</th>";
                echo "<th scope='row'>" . $user['usertype'] . "</th>";
                if($user['usertype'] != 2)
                {
                    echo "<th>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-userid=". $user['userid']." data-empname=". $user['username']." data-target='#addEmployeeModal'>Make Employee</button>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-empname=". $user['username']." data-target='#employeeDetailsModal'>Employee Details</button>
                    </th>";
                }
                else if($user['usertype'] == 2 && $user['usertype'] != 3)
                {
                    echo "<th>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-empname=". $user['username']." data-target='#removeEmployeeModal'>Remove Employee</button>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-empname=". $user['username']." data-target='#employeeDetailsModal'>Employee Details</button>
                    </th>";

                }
              echo "</tr>";
            }
        }
    ?>
  </tbody>
</table>
  </div>

<?php
require 'footer.php';
?>

<script>
 $('#addEmployeeModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
  

    var userName = button.data('empname');
    var userId = button.data('userid');

    $('#modal-userid').val(userId);
 

    var modal = $(this);
    modal.find('.modal-title').text('Employee Details for ' + userName);

})

$('#removeEmployeeModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
  

    var userName = button.data('empname');
 

    var modal = $(this);
    modal.find('.modal-title').text('Remove Employee ' + userName);

})
</script>