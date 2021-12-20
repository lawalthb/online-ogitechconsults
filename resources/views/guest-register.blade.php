

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
                  <h3 class="mb-5 text-uppercase">Advertisement registration</h3>
                  </div>
                  @if(session('success'))
                        <div class="alert alert-primary alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>{{ session('success') }}</span>
                        </div>
                        @endif
                  <form class="form-horizontal" method="POST" action="{{ route('advertise.store') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1m" autofocus name="name" value="{{ old('name') }}" class="form-control form-control-lg" required />
                        <label class="form-label" for="form3Example1m">Full name <span class="text-danger">*</span></label>
                        
                        @error('name')
                        <span  style="font-size: 80%; color:red"> {{ $message }}</span>
                        @enderror
                   
  

                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" id="form3Example1n" name="company" value="{{ old('company') }}" class="form-control form-control-lg" required />
                        <label class="form-label" for="form3Example1n">Company Name <span class="text-danger">*</span>  </label>
                        @error('company')
                        <span  style="font-size: 80%; color:red"> {{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
  
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="email" id="form3Example1m1" name="email" value="{{ old('email') }}" class="form-control form-control-lg" required />
                        <label class="form-label" for="form3Example1m1">Email <span class="text-danger">*</span></label>
                        @error('email')
                        <span  style="font-size: 80%; color:red"> {{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" name="phone" id="form3Example1n1" value="{{ old('phone') }}" class="form-control form-control-lg"  required />
                        <label class="form-label" for="form3Example1n1">Phone <span class="text-danger">*</span></label>
                        @error('phone')
                        <span  style="font-size: 80%; color:red"> {{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                  </div>
                  <div class="form-outline mb-4">
                  
                   
                    <input type="text" name="website" value="{{ old('website') }}" class="form-control form-control-lg"  />
                    <label class="form-label" for="form3Example8">Website URL</label>
                  </div>
                 
  
                  <div class="form-outline mb-4">
                  
                    <select class="form-control form-control-lg" name="banner_size" required>
                      <option value="300-250">Medium Rectangle – 300 x 250 (N5,000)</option>
<option value="336-280">Large Rectangle – 336 x 280  (N5,000)</option>
<option value="728-90">Leaderboard – 728 x 90  (N5,000)</option>
<option disabled value="300-600">Half-Page Ad – 300 x 600</option>
<option disabled value="320-50">Mobile Leaderboard – 320 x 50</option>
<option disabled value="970-90">Large Leaderboard – 970 x 90</option>
<option disabled value="160-600">Wide Skyscraper – 160 x 600</option>
<option disabled value="120-600">Skyscraper – 120 x 600</option>
<option value="468-60">Banner – 468 x 60 (N5,000)</option>
                      
                      
                        
                    </select>
                    <label class="form-label" for="form3Example8">Banner Size <span class="text-danger">*</span></label>
                  </div>
                  @error('banner_size')
                  <span  style="font-size: 80%; color:red"> {{ $message }}</span>
                  @enderror
                  <div class="form-outline mb-4">
                    <input type="file" required id="form3Example8" name="image" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example8">Upload Banner <span class="text-danger">*</span></label>
                    @error('image')
                    <span  style="font-size: 80%; color:red"> {{ $message }}</span>
                    @enderror
                  </div>

                 
                  <input type="hidden" name="location" value="top" />
                    
                    
                  
  
  
                  <div class="form-outline mb-4">
                    <input type="text" readonly required value="=N= 5,000" id="form3Example99" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example99">Amount <span class="text-danger">*</span></label>
                  </div>
                  <input name="amount" type="hidden" id="hidden_amount" value="5000" />
                  <div class="form-outline mb-4">
                    <input type="text" id="form3Example97" class="form-control form-control-lg" />
                    <label class="form-label" for="form3Example97">Additional Info.</label>
                  </div>
  
                  <div class="d-flex justify-content-end pt-3">
                    
                    <input type="reset" class="btn btn-primary btn-lg ms-2" value="Reset">  
                    <input type="submit" onClick="this.form.submit(); this.disabled=true; this.value='Processing…'; " class="btn btn-warning btn-lg ms-2" style="background-color: #dc3545; color: white " value="Proceed To Payment" />
                  </div>
  
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  

  </body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>