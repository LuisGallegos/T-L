<div class="col-md-12">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active" aria-hidden="true"><a href="#transportLine" aria-controls="checkUsers" role="tab" data-toggle="tab">By Transpor Line&nbsp;&nbsp;<i class="fa fa-truck" aria-hidden="true"></i></a></li>
    <li role="presentation"><a href="#transportDates" aria-controls="createUser" role="tab" data-toggle="tab">By Dates&nbsp;&nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;<i class="fa fa-truck" aria-hidden="true"></i></a></li>
  </ul>


  <div class="tab-content">

    <div role="tabpanel" class="tab-pane active" id="transportLine"><br><br>
      <form class="form-inline">
        <div class="form-group">
          <label for="role">Transport Line:</label>
          <select class="form-control" id="role" ng-model="reportTransport" ng-change="getData1(reportTransport)">
            <option value="">--- Select the Transport Line ---</option>
            <option ng-repeat = "line in lines" ng-value="line.name">{{line.name}}</option>
          </select>
        </div>
        <button class="btn btn-default" ng-click="getReport()"><i class="fa fa-download" aria-hidden="true"></i></button>
      </form><br><br>
      <div class="col-md-12">
        <table class = "table table-striped table-bordered table-condensed"  id = "HTMLtoPDF1">
          <thead>
            <th>ID</th>
            <th>Folio</th>
            <th>Line</th>
            <th>Type</th>
            <th>License Plate</th>
            <th>Box Number</th>
            <th>Responsable</th>
            <th>Comments</th>
            <th>Enter Date</th>
            <th>End Date</th>
          </thead>
          <tbody>
            <tr ng-repeat="trasnport in transports">
              <td>{{trasnport.idtransport}}</td>
              <td>{{trasnport.folio}}</td>
              <td>{{trasnport.linea}}</td>
              <td>{{trasnport.tipo}}</td>
              <td>{{trasnport.placas}}</td>
              <td>{{trasnport.box_number}}</td>
              <td>{{trasnport.user}}</td>
              <td>{{trasnport.comments}}</td>
              <td>{{trasnport.enter_date}}</td>
              <td>{{trasnport.exit_date}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="transportDates"><br><br>
      <form class="form-inline">
        <div class="form-group">
          <label for="startDate">Star Date:</label>
          <input id="startDate" type="date" ng-model="startDate">
        </div>
        <button class="btn btn-default" ng-click="getReport2()"><i class="fa fa-download" aria-hidden="true"></i></button>
      </form><br><br>
      <div class="col-md-12">
        <table class = "table table-striped table-bordered table-condensed"  id = "HTMLtoPDF2">
          <thead>
            <th>ID</th>
            <th>Folio</th>
            <th>Line</th>
            <th>Type</th>
            <th>License Plate</th>
            <th>Box Number</th>
            <th>Responsable</th>
            <th>Comments</th>
            <th>Enter Date</th>
            <th>End Date</th>
          </thead>
          <tbody>
            <tr ng-repeat="trasnport in transports2">
              <td>{{trasnport.idtransport}}</td>
              <td>{{trasnport.folio}}</td>
              <td>{{trasnport.linea}}</td>
              <td>{{trasnport.tipo}}</td>
              <td>{{trasnport.placas}}</td>
              <td>{{trasnport.box_number}}</td>
              <td>{{trasnport.user}}</td>
              <td>{{trasnport.comments}}</td>
              <td>{{trasnport.enter_date}}</td>
              <td>{{trasnport.exit_date}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

 </div>
</div>
