<div class="col-md-12">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active" aria-hidden="true"><a href="#checkUsers" aria-controls="checkUsers" role="tab" data-toggle="tab">Edit Users<i class="fa fa-users" aria-hidden="true"></i></a></li>
    <li role="presentation"><a href="#createUser" aria-controls="createUser" role="tab" data-toggle="tab">Create User <i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
    <li role="presentation"><a href="#deleteUser" aria-controls="deleteUser" role="tab" data-toggle="tab">Ban User <i class="fa fa-user-times" aria-hidden="true"></i></a></li>
  </ul>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        <form class="form-inline">
          <h3>Edit Username</h3>
          <div class="form-group">
            <label for="userName">Username:</label>
            <input type="text" class="form-control" id="userName" ng-model="updateUserName" ng-change="checkUsername()">
          </div>
          <button class="btn btn-success" ng-disabled="validUserName" ng-click="updateUser()">Save</button>
        </form>

        <form class="form-inline">
          <h3>Edit Password</h3>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" ng-model="updateUserPassword" ng-change="checkPass()">
          </div>
          <button class="btn btn-success" ng-disabled="validPassword" ng-click="updatePassword()">Save</button>
        </form>

        <form class="form-inline">
          <h3>Change Rol</h3>
          <div class="form-group">
            <select class="form-control" id="role" ng-model="updateUserRole" ng-change="checkRol()">
              <option value="">--- Select the Rol ---</option>
              <option ng-repeat = "role in roles" ng-value="role.id_Rol">{{role.name}}</option>
            </select>
          </div>
          <button class="btn btn-success" ng-disabled="validRol" ng-click="updateRole()">Save</button>
        </form>

        <form class="form-inline">
          <h3>Change Status</h3>
          <button class="btn btn-warning" ng-disabled="validStatus" ng-click="updateStatus()">Change</button>
        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" ng-click="getUsers();getUsersActives();">Close</button>
      </div>
    </div>
  </div>
</div>


  <div class="tab-content">

    <div role="tabpanel" class="tab-pane active" id="checkUsers">
      <div class="col-md-12">
        <br><br><br>
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <th>UserName</th>
            <th>Role</th>
            <th>Status</th>
            <th>Options</th>
          </thead>
          <tbody>
            <tr ng-repeat = "user in users">
              <td>{{user.user}}</td>
              <td>{{getRolName(user.rol)}}</td>
              <td>{{getStatus(user.active)}}</td>
              <td><button type="button" class="btn btn-info btn-circle" ng-click="setIDandRol(user.id_Users,user.active)" data-toggle="modal" data-target="#myModal" ><i class="fa fa-pencil-square-o"></i></button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="createUser">
      <div class="col-md-12">
        <br><br><br>
        <form class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-2" for="user">Username:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="user" placeholder="Enter username" ng-model="newUser" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" ng-model="newUserPass" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="role">Role:</label>
            <div class="col-sm-10">
              <select class="form-control" id="role" ng-model="newUserRole" required>
                <option value="">--- Select the Rol ---</option>
                <option ng-repeat = "role in roles" ng-value="role.id_Rol">{{role.name}}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success" ng-click="addUser()">Create</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="deleteUser">
      <div class="col-md-12">
        <br><br><br>
        <table class="table table-striped table-hover table-bordered">
          <thead>
            <th>UserName</th>
            <th>Role</th>
            <th>Status</th>
            <th>Options</th>
          </thead>
          <tbody>
            <tr ng-repeat = "user in usersActives">
              <td>{{user.user}}</td>
              <td>{{getRolName(user.rol)}}</td>
              <td>{{getStatus(user.active)}}</td>
              <td><button type="button" class="btn btn-danger btn-circle" ng-click = "banUser(user.id_Users)"><i class="fa fa-ban" aria-hidden="true"></i></button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

 </div>
</div>
