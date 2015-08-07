<!--
<div id="sidebar-wrapper">
    <img class="img-circle img-responsive img-brand" alt="500x500" src="<?//=base_url('assets/1.jpg'); ?>"/>
    <ul class="sidebar-nav">
        <div class="align-center">
            <br>
            <li>
                <div class="form-group">
                     <label>Data Option</label>
                     <select class="form-control sheet_option">
                         <option value="regional daily">Regional Daily</option>
                         <option value="RNC daily">RNC Daily</option>
                         <option value="RNC Hourly">RNC Hourly</option>
                    </select>
                     <br>
                </div>
            </li>
            <li>
                <div class="form-group sheet_conf hidden">
                     <label>RNC Date Range</label>
                     <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                        <span></span> <b class="caret"></b>
                    </div>
                     <br>
                </div>
            </li>
        </div>
    </ul>
</div>

-->
 <!--BEGIN Modal For Edit Ticket-->
<div class="modal fade" id="apps_option" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Graph Option</h4>
      </div>
      <div class="modal-body">
         <div class="align-center">
            
            <div class="form-group">
                 <label>Data Option</label>
                 <select class="form-control sheet_option">
                     <option value="regional_daily">Regional Daily</option>
                     <option value="rnc_daily">RNC Daily</option>
                     <option value="rnc_hourly">RNC Hourly</option>
                </select>
                 <br>
            </div>
            <div class="form-group col-md-6 sheet_conf hidden">
            <label>Start Date</label>
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                <input type="text" class="startDate_input" name"startDate_input" value="10/24/1984"/>
            </div>
            <div class="form-group col-md-6 sheet_conf hidden">
                <label>End Date</label>
                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>&nbsp;
                <input type="text" class="endDate_input" name"endDate_input" value="10/24/1984"/>
            </div>
            <br>
            <br>
            <br>
        </div> 

        

      </div>
      <div class="modal-footer">
      <button type="button" class="opt-apply btn btn-success btn-large">Sucess</button>
      </div>
       </div>
    </div>
  </div>

                        <!--END Modal For EDIT Ticket-->