

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Advertise Registration</title>
    <style>
      .card-registration .select-input.form-control[readonly]:not([disabled]) {
    font-size: 1rem;
    line-height: 2.15;
    padding-left: .75em;
    padding-right: .75em;
  }
  .card-registration .select-arrow {
    top: 13px;
  }
  .bg-dark {
      background-color: #dc3545!important;
  }

  button.btn.btn-warning.btn-lg.ms-2 {
    background-color: #dc3545!important;
    color: white;

}
  </style>
</head>
<body>
    


<section class="h-100 bg-dark">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img
                  src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/img4.jpg"
                  alt="Sample photo"
                  class="img-fluid"
                  style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"
                />
              </div>
              <div class="col-xl-6">
                <a href="https://runaroundnews.com" class="float-right" title="<< Back to runaroundnews.com" style="font-size: 30px">&times;</a>
                <div class="card-body p-md-5 text-black">
                  <div class="text-center">
                      
                  <a class="logo" href="https://runaroundnews.com">
                    <img src="images/icon/run-img.PNG" alt="Run Around News" />
                </a>
                  <h3 class="mb-5 text-uppercase">Advertisement Payment</h3>
                
                  <p style="color: green" >Registration Successful <br />
                Check your mail to login</p>
                <div style="overflow: auto; overflow-y:hidden" >
<img src="{{ asset($image_link) }}" />
                </div>

<p>{{$company}}, get your banner live on our website by making =N=5,000 payment</p>
<p>Pay Through </p>
<div class="row">
    <div class="col-md-6 mb-4">
      <div class="form-outline"  >
        <img src="{{asset('images/paypal.png')}}" data-toggle="tooltip" data-placement="top" title="Not Available!" class="img-thumbnail" width="100" height="50"   alt="PayPal" />
        
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="form-outline" >
            <img src="{{asset('images/paystack.png')}}" data-toggle="tooltip" data-placement="top" title="Not Available!" class="img-thumbnail" width="200" height="50" alt="flutter wave" />
            
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-4">
      <div class="form-outline">
        <img src="{{asset('images/flutterwave.png')}}" data-toggle="tooltip" data-placement="top" title="Not Available!" class="img-thumbnail" width="200" height="50"   alt="PayPal" />
        
      </div>
    </div>
    <div class="col-md-6 mb-4">
      <div class="form-outline">
            <img src="{{asset('images/bank-transfer.png')}}"  data-toggle="modal" data-target="#myModal" class="img-thumbnail" width="150" height="50" alt="flutter wave" />
            
      </div>
    </div>
  </div>

  
                  </div>
                 <div>




                 </div>
                  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
         
          <h4 class="modal-title">Transfer and fill your details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <h5>Bank Name: <br /><b style="color: red">First Bank</b></h5>
          <h5>Account Number: <br /><b style="color: red">3040492754</b></h5>
          <h5>Account Name: <br /><b style="color: red">Lawal Toheeb</b></h5>
          <hr />
          <b><u>Notify</u></b>
          <form id="SubmitForm" >
          <input type="text" class="form-control form-control-lg" name="amount" id="amount" placeholder="Amount transferred" required/> <br>
          <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Your Account Name" required/> <br>
          <input type="text" class="form-control form-control-lg" name="bank" id="bank" placeholder="Your Bank Name" required/> <br>
          <input type="date" class="form-control form-control-lg" name="date" id="date" placeholder="Transaction Date" required/> 
          <input type="hidden" class="form-control form-control-lg" name="company" id="company" value="{{$company}}" />
          <input type="hidden" class="form-control form-control-lg" name="advertise_id" id="advertise_id" value="{{$advertise_id}}"  /><br>
          <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
            Bank transfer notice sent successfully, check your mail to login  
          </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Submit</button> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>

  

  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script>
    //script for tooltip on payment icons
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
</script>

<script type="text/javascript">

$('#SubmitForm').on('submit',function(e){
    e.preventDefault();

    let name = $('#name').val();
    let company = $('#company').val();
    let date = $('#date').val();
    let bank = $('#bank').val();
    let amount = $('#amount').val();
    let advertise_id = $('#advertise_id').val();
    //let remark = '';
    
    $.ajax({
      url: "/bank_transfer",
      type:"POST",
      data:{
        "_token": "{{ csrf_token() }}",
        name:name,
        company:company,
        date:date,
        bank:bank,
        amount:amount,
        advertise_id:advertise_id,
        
      },
      success:function(response){
        $('#name').val('');
        $('#date').val('');
        $('#bank').val('');
        $('#amount').val('');
        $('#successMsg').show();
        setTimeout(function(){ location.href = "https://www.runaroundnews.com"; }, 2000);
       
        console.log(response);
       
     
      },
      
      });
     
    });
  </script>