<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
           <a href="#" class="navbar-left"><img src="./resources/logo-icon.png"></a>
        </h4>
      </div>
      <div class="modal-body">
          <input class="form-control" type="text" placeholder="Firstname" id="firstname" onKeyup ="validate();"/><br/>
          <input class="form-control" type="text" placeholder="Lastname" id="lastname" onKeyup="validate()"/><br/>
          <input class="form-control" type="email" placeholder="Email" id="email" onKeyup="validate(); validate_email();"/>
          <p id="email_msg" class="text text-danger">Must be a valid email address</p>
          <input class="form-control" type="text" placeholder="Phone Number eg. xxx-xxx-xxxx" id="phone" onKeyup="validate(); validate_phone_number();" />
          <p id="phone_msg" class="text text-danger">Must be a valid phone number</p>
          <button class="btn btn-primary btn-block disabled" id="submit"><span class="glyphicon glyphicon-check"></span> Submit</button><br/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>