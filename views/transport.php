<div class="col-md-12">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active" aria-hidden="true"><a href="#checkUsers" aria-controls="checkUsers" role="tab" data-toggle="tab">Show Transports&nbsp;&nbsp;<i class="fa fa-truck" aria-hidden="true"></i></a></li>
    <li role="presentation"><a href="#createUser" aria-controls="createUser" role="tab" data-toggle="tab">Add Transport&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;<i class="fa fa-truck" aria-hidden="true"></i></a></li>
  </ul>


  <div class="tab-content">

    <div role="tabpanel" class="tab-pane active" id="checkUsers">
      <div class="col-md-12">
        <br><br><br>
        <table datatable="" dt-options="vm.dtOptions" dt-columns="vm.dtColumns" class="table table-striped table-bordered" dt-instance="vm.dtInstance"></table>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="createUser">
      <div class="col-md-12">
        <br><br><br>
        <form class="form-horizontal" name="newTransport">
          <div class="form-group">
            <label class="control-label col-sm-2" for="user">Folio:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="user" ng-model="transport.folio" ng-disabled="true" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="role">Transport Line:</label>
            <div class="col-sm-10">
              <select class="form-control" id="role" ng-model="transport.linea" required>
                <option value="">--- Select the Transport Line ---</option>
                <option ng-repeat = "line in lines" ng-value="line.id_transport_line">{{line.name}}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="role">Transport Type:</label>
            <div class="col-sm-10">
              <select class="form-control" id="role" ng-model="transport.tipo" required>
                <option value="">--- Select the Transport Type ---</option>
                <option ng-repeat = "type in types" ng-value="type.id_type">{{type.name}}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="user">License Plate:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="user" placeholder="Enter License Plate" ng-model="transport.placas" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="user">Box Number:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="user" placeholder="Enter Box Number" ng-model="transport.caja" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="role">Responsable:</label>
            <div class="col-sm-10">
              <select class="form-control" id="role" ng-model="transport.responsable" required>
                <option value="">--- Select the Responsable ---</option>
                <option ng-repeat = "responsable in resposables" ng-value="responsable.id_Users">{{responsable.user}}</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="comment">Comments:</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="5" id="comment" ng-model="transport.comment" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-success" ng-click="addTransport()" ng-disabled="newTransport.$invalid">Create</button>
            </div>
          </div>
        </form>
      </div>
    </div>

 </div>
</div>
