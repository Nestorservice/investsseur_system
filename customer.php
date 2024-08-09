<?php include('include/header.php'); ?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Gestion des client</h1>
      <div>
        <button type="button" id="add_customer"  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus text-white-50"></i> Add New Customer</button>
        <a href="print_customer.php" target="_blank" class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print text-white-50"></i> Print</a>
      </div>
    </div>

    <!-- Customers DataTale -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">CLients</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped" id="customerTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th width="5%">ID</th>
                <th>Nom</th>
                <th>Email</th>
                <th width="10%">Officer</th>
                <th width="10%">Telephone</th>
                <th width="10%">Status</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tfoot>
              <th width="5%">ID</th>
              <th>Nom</th>
              <th>Email</th>
              <th width="10%">Officer</th>
              <th width="10%">Telephone</th>
              <th width="10%">Status</th>
              <th width="10%">Action</th>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.Customers DataTale -->

  <!-- MODALS -->
  <!-- Add Customer Modal -->
  <div class="modal fade" id="formModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_title"></h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="customer_form">
            <div class="form-group">
              <label>Nom <i class="text-danger">*</i></label>
              <input type="text" id="full_name" name="full_name" class="form-control" maxlength="100" autocomplete="off" placeholder="Entrer le nom complet">
              <div id="full_name_error_message" class="text-danger"></div>
            </div>
            <div class="form-group">
              <label>Email </label>
              <input type="text" id="email" name="email" class="form-control" maxlength="100" autocomplete="off" placeholder="Entrer l'E-mail">
              <div id="email_error_message" class="text-danger"></div>
            </div>
            <div class="form-group">
              <label>Officer Name </label>
              <input type="text" id="officer_name" name="officer_name" class="form-control" maxlength="100" autocomplete="off" placeholder="Entrer le nom de l'officier">
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label>Telephone </label>
                <input type="text" id="telephone" name="telephone" class="form-control" maxlength="100" autocomplete="off" placeholder="Entrer le numero de telephone">
              </div>
              <div class="form-group col-md-4">
                <label>téléphone portable </label>
                <input type="text" id="cellphone" name="cellphone" class="form-control" maxlength="100" autocomplete="off" placeholder="Entrer téléphone portable">
              </div>
              <div class="form-group col-md-4">
                <label>Status <i class="text-danger">*</i></label>
                <select name="status" id="status" class="custom-select">
                  <option value="" hidden>Status</option>
                  <option>Active</option>
                  <option>Inactive</option>
                </select>
                <div id="status_error_message" class="text-danger"></div>
              </div>
            </div>
            <div class="form-group">
              <label>Address </i></label>
              <textarea id="address" name="address" class="form-control" rows="2" maxlength="500" autocomplete="off" placeholder="Entrer l'adress"></textarea>
            </div>
            <hr>
            <div class="form-group">
              <label>Nom de la banque </label>
              <input type="text" id="bank_name" name="bank_name" class="form-control" maxlength="100" autocomplete="off" placeholder="Entrer le nom de la banque">
              <div id="website_error_message" class="text-danger"></div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Bank Account </label>
                <input type="text" id="bank_account" name="bank_account" class="form-control" maxlength="100" autocomplete="off" placeholder="Enter le numero du compte">
              </div>
              <div class="form-group col-md-6">
                <label>Type de compte </label>
                <select name="account_type" id="account_type" class="custom-select">
                  <option value="" hidden>Type de compte</option>
                  <option>Compte courant</option>
                  <option>Compte definitif</option>
                </select>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label>Website </label>
              <input type="text" id="website" name="website" class="form-control" maxlength="100" autocomplete="off" placeholder="Enter full name">
              <div id="website_error_message" class="text-danger"></div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Username </label>
                <input type="text" id="username" name="username" class="form-control" maxlength="100" autocomplete="off" placeholder="Enter username">
              </div>
              <div class="form-group col-md-6">
                <label>Password </label>
                <input type="text" id="password" name="password" class="form-control" maxlength="100" autocomplete="off" placeholder="Enter password">
              </div>
            </div>
            <hr>
            <div class="form-group">
              <label>Notes </i></label>
              <textarea id="notes" name="notes" class="form-control" rows="5" maxlength="500" autocomplete="off" placeholder="Enter note"></textarea>
            </div>
            <br>
            <div class="modal-footer">
              <input type="hidden" name="customer_id" id="customer_id"/>
              <input type="hidden" name="action" id="action" value="add_customer"/>
              <button type="button" name="cancel_button" id="cancel_button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" name="save_button" id="save_button" class="btn btn-info" value="Save" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- /.Add Customer Modal -->

  <!-- View Customer Modal-->
  <div class="modal fade" id="readModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Détails du client</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-borderless">
            <tr>
              <th>ID</th>
              <td>
                <div id="view_id"></div>
              </td>
            </tr>
            <tr>
              <th>Nom complet</th>
              <td>
                <div id="view_full_name"></div>
              </td>
            </tr>
            <tr>
              <th>E-Mail</th>
              <td>
                <div id="view_email"></div>
              </td>
            </tr>
            <tr>
              <th>Nom de l'officier</th>
              <td>
                <div id="view_officer_name"></div>
              </td>
            </tr>
            <tr>
              <th>Téléphone</th>
              <td>
                <div id="view_telephone"></div>
              </td>
            </tr>
            <tr>
              <th>Téléphone portable</th>
              <td>
                <div id="view_cellphone"></div>
              </td>
            </tr>
            <tr>
              <th>Statut</th>
              <td>
                <div id="view_status"></div>
              </td>
            </tr>
            <tr>
              <th>Adresse</th>
              <td>
                <div id="view_address"></div>
              </td>
            </tr>
            <tr>
              <th>Nom de la banque</th>
              <td>
                <div id="view_bank_name"></div>
              </td>
            </tr>
            <tr>
              <th>Numéro de compte bancaire</th>
              <td>
                <div id="view_bank_account_number"></div>
              </td>
            </tr>
            <tr>
              <th>Type de compte bancaire</th>
              <td>
                <div id="view_bank_account_type"></div>
              </td>
            </tr>
            <tr>
              <th>Site web</th>
              <td>
                <div id="view_website"></div>
              </td>
            </tr>
            <tr>
              <th>Nom d'utilisateur</th>
              <td>
                <div id="view_username"></div>
              </td>
            </tr>
            <tr>
              <th>Mot de passe</th>
              <td>
                <div id="view_password"></div>
              </td>
            </tr>
            <tr>
              <th>Notes</th>
              <td>
                <div id="view_notes"></div>
              </td>
            </tr>
            <tr>
              <th>Créé par</th>
              <td>
                <div id="view_created_by"></div>
              </td>
            </tr>            
            <tr>
              <th>Créé le</th>
              <td>
                <div id="view_created_at"></div>
              </td>
            </tr>
            <tr>
              <th>Dernière mise à jour effectuée par</th>
              <td>
                <div id="view_last_update_by"></div>
              </td>
            </tr>
            <tr>
              <th>Dernière mise à jour</th>
              <td>
                <div id="view_updated_at"></div>
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.View Customer Modal -->

<?php include('include/footer.php'); ?>

<script>

  $(document).ready(function(){
    var datatable = $('#customerTable').DataTable({
      'processing': true,
      'serverSide': true,
      'ajax': {
        url:'customer_action.php',
        type: 'POST',
        data: {action:'customer_fetch'}
      },
      'columns': [
        { data: 'customer_id' },
        { data: 'customer_full_name'},
        { data: 'customer_email'},
        { data: 'customer_officer_name'},
        { data: 'customer_telephone'},
        { data: 'customer_status'},
        { data: 'action',"orderable":false}
      ]
    });

    $('#add_customer').click(function(){
      $('#modal_title').text('Ajouter un Fournisseur');
      $('#button_action').val('Save');
      $('#action').val('add_customer');
      $('#formModal').modal('show');
      clearField();
    });

    // Clear form.
    function clearField() {
      $('#customer_form')[0].reset();
      $("#full_name_error_message").hide();
      $("#full_name").removeClass("is-invalid");
      $("#email_error_message").hide();
      $("#email").removeClass("is-invalid");
      $("#status_error_message").hide();
      $("#status").removeClass("is-invalid");
    }

    var error_full_name = false;
    var error_email = false;
    var error_status = false;

    $("#full_name").focusout(function() {
      checkFullName();
    });

    $("#email").focusout(function() {
      checkEmail();
    });

    $("#status").focusout(function() {
      checkStatus();
    });

    // Validate fullname field.
    function checkFullName() {
      if ( $.trim( $('#full_name').val() ) == '' ){
        $("#full_name_error_message").html("Le nom complet es un champs obligatoire.");
        $("#full_name_error_message").show();
        $("#full_name").addClass("is-invalid");
        error_full_name = true;
      } else {
        $("#full_name_error_message").hide();
        $("#full_name").removeClass("is-invalid");
      }
    }

    // Validate email field.
    function checkEmail() {
      var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);

      if ($.trim($('#email').val()) == '') {
        $("#email_error_message").hide();
        $("#email").removeClass("is-invalid");
      } else if (!(pattern.test($("#email").val()))) {
        $("#email_error_message").html("Adress email invalide");
        $("#email_error_message").show();
        error_email = true;
        $("#email").addClass("is-invalid");
      } else {
        $("#email_error_message").hide();
        $("#email").removeClass("is-invalid");
      }
    }

    // Validate status field.
    function checkStatus() {
      if ( $.trim( $('#status').val() ) == '' ){
        $("#status_error_message").html("Le status es un champs obligatoire.");
        $("#status_error_message").show();
        $("#status").addClass("is-invalid");
        error_status = true;
      } else {
        $("#status_error_message").hide();
        $("#status").removeClass("is-invalid");
      }
    }

    // Create new customer.
    $('#customer_form').on('submit', function(event){
      event.preventDefault();
      
      error_full_name = false;
      error_email = false;
      error_status = false;
  
      checkFullName();
      checkEmail();
      checkStatus();
  
      if (error_full_name == false && error_email == false && error_status == false) {
        $.ajax({
          type:"POST",
          data: $('#customer_form').serialize(),
          url:"customer_action.php",
          dataType:"json",
          beforeSend:function(){
            $('#save_button').val('SVP patientez...');
            $('#save_button').attr('disabled', 'disabled');
            $('#cancel_button').attr('disabled', 'disabled');
          },success:function(data){
            $('#formModal').modal('hide');
            clearField();
            datatable.ajax.reload();
            Notiflix.Notify.Success(data.message);
            $('#save_button').val('Save');
            $('#save_button').attr('disabled', false);
            $('#cancel_button').attr('disabled', false);
          },error:function(){
            Notiflix.Notify.Failure('Oops! un probleme es survenue.');
            $('#save_button').val('Save');
            $('#save_button').attr('disabled', false);
            $('#cancel_button').attr('disabled', false);
          }
        });
      } else {
        Notiflix.Notify.Failure('Svp remplissez tous les champs.');
      }
    });

    // Udpate customer information
    $(document).on('click', '.update_customer', function(){
      customer_id = $(this).attr('id');
      $('#modal_title').text('Update Customer');
      $('#action').val('update_customer');
      $('#formModal').modal('show');
      clearField();

      $.ajax({
        type:"POST",
        data: {action:'single_fetch', customer_id:customer_id},
        url:"customer_action.php",
        dataType:"json",
        success:function(data){
          $('#customer_id').val(data.customer_id);
          $('#full_name').val(data.customer_full_name);
          $('#email').val(data.customer_email);
          $('#officer_name').val(data.customer_officer_name);
          $('#telephone').val(data.customer_telephone);
          $('#cellphone').val(data.customer_cellphone);
          $('#status').val(data.customer_status);
          $('#address').val(data.customer_address);
          $('#bank_name').val(data.customer_bank_name);
          $('#bank_account').val(data.customer_bank_account_number);
          $('#account_type').val(data.customer_bank_account_type);
          $('#website').val(data.customer_website);
          $('#username').val(data.customer_username);
          $('#password').val(data.customer_password);
          $('#notes').val(data.customer_note);
        }
      });
    });

    // Display customer information
    $(document).on('click', '.view_customer', function(){
      customer_id = $(this).attr('id');
      console.log(customer_id);
      $.ajax({
        type:"POST",
        data: {action:'single_fetch', customer_id:customer_id},
        url:"customer_action.php",
        dataType:"json",
        success:function(data){
          console.log(data);
          $('#view_id').text(data['customer_id']);
          $('#view_full_name').text(data['customer_full_name']);
          $('#view_email').text(data['customer_email']);
          $('#view_officer_name').text(data['customer_officer_name']);
          $('#view_telephone').text(data['customer_telephone']);
          $('#view_cellphone').text(data['customer_cellphone']);
          $('#view_address').text(data['customer_address']);
          $('#view_bank_name').text(data['customer_bank_name']);
          $('#view_bank_account_number').text(data['customer_bank_account_number']);
          $('#view_bank_account_type').text(data['customer_bank_account_type']);
          $('#view_website').text(data['customer_website']);
          $('#view_username').text(data['customer_username']);
          $('#view_password').text(data['customer_password']);
          $('#view_status').text(data['customer_status']);
          $('#view_notes').text(data['customer_note']);
          $('#view_created_by').text(data['customer_created_by']);
          $('#view_created_at').text(data['customer_created_at']);
          $('#view_last_update_by').text(data['customer_last_update_by']);
          $('#view_updated_at').text(data['customer_updated_at']);
        }
      });
    });
  });
</script>