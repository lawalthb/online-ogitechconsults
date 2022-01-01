@extends('layouts.app')
@section('title', 'Applications ')
@section('content')

 <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="row">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <h3 class="title-5 m-b-35">Applications</h3>
                    <div class="table-data__tool">
                        
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                                <select class="js-select2" name="property">
                                    <option selected="selected">All Properties</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <div class="rs-select2--light rs-select2--sm">
                                <select class="js-select2" name="time">
                                    <option selected="selected">Today</option>
                                    <option value="">3 Days</option>
                                    <option value="">1 Week</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                            <button class="au-btn-filter">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
                        <div class="table-data__tool-right">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#myModal">
                                <i class="zmdi zmdi-plus"></i>add item</button>
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                <select class="js-select2" name="type">
                                    <option selected="selected">Export</option>
                                    <option value="">Option 1</option>
                                    <option value="">Option 2</option>
                                </select>
                                <div class="dropDownSelect2"></div>
                            </div>
                        </div>
                    </div>
                   
                    @if (session()->has('success'))
                   
                    <div class="alert alert-primary" role="alert">
                        <strong>{{ session('success') }}</strong>  
                    </div>
                    @endif
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Adv Nmae</th>
                                <th>Banner</th>
                                <th>Position/Size</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Reg. Date</th>
                                <th>Exp. Date</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i = 1)
                                @foreach($advertise as $advertises)
                                <tr class="tr-shadow">
                                    <td>
                                        {{ $i++ }}
                                        </label>
                                    </td>
                                    <td>{{ $advertises->name }}</td>
                                    <td>
                                        <span><img src="{{asset($advertises->image) }}" width="150" /></span>
                                    </td>
                                    <td class="desc">{{ $advertises->location }}/{{ $advertises->banner_size }}</td>
                                    <td>{{ number_format($advertises->amount,0) }}</td>
                                    <td>
                                        <span class="status--process">{{ $advertises->status }}</span>
                                    </td>
                                    <td>{{ Carbon\Carbon::parse($advertises->created_at)->diffForHumans() }}</td>
                                    <td>{{ $advertises->expired_date }}</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <a data-toggle="modal" href="#myModal3"> <button class="item" id="getID" advId="{{ $advertises->id }}" onclick="getAdvId({{ $advertises->id }})" data-toggle="tooltip" data-placement="top" title="Make Payment" >
                                                <i >₦</i>
                                            </button></a> &nbsp;
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>


        </div>
    </div>
 </div>    
@endsection

 <!-- The Modal -->
 <div class="modal fade" id="myModal3">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Transfer and fill your details</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <h3>Bank Name:<b style="color: red">First Bank</b></h3>
            <h3>Account Number:<b style="color: red">3040492754</b></h3>
            <h3>Account Name:<b style="color: red">Lawal Toheeb</b></h3>
            <hr />
            <b><u>Notify</u></b>
            <form id="SubmitForm" >
            <input type="text" class="form-control form-control-lg" name="amount" id="amount" placeholder="Amount transferred" required/> <br>
            <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="Your Account Name" required/> <br>
            <input type="text" class="form-control form-control-lg" name="bank" id="bank" placeholder="Your Bank Name" required/> <br>
            <input type="date" class="form-control form-control-lg" name="date" id="date" placeholder="Transaction Date" required/> 
            <input type="hidden" class="form-control form-control-lg" name="company" id="company" value="{{Auth::user()->company}}" />
            <input type="hidden" class="form-control form-control-lg" name="advertise_id" id="advertise_id" value=""  /><br>
            <input type="hidden" class="form-control form-control-lg" name="user_id" id="user_id" value="{{Auth::user()->id}}"  /><br>
            <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
              Bank transfer notice sent successfully, your banner will be live when it approved  
            </div>
          </div>
       
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Submit</button> 
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
</div>

<!-- The Modal for add new banner -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Adding New Banner</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <div style="overflow-y: auto">
                <img src="" id="prv"  width="300" alt="Banner Preview" />
            </div>
            <hr />
            <form id="SubmitForm" method="POST" action="{{ route('applications.store') }}" enctype="multipart/form-data" >
                @csrf
                <b><u>Upload Banner</u></b>
            
            <input type="file" id="imgInp"  class="form-control form-control-lg" name="image" id="image" placeholder="Click to upload banner" required/> <br>
            <b><u>Banner Name</u></b>
            <input type="text" class="form-control form-control-lg" name="name" id="name" placeholder="This Advert Name" required/> <br>
            <b><u>Banner Size</u></b>
            
            <select name="banner_size" required class="form-control form-control-lg" ><br />
                <option value="">Select Position-Size </option>
                <option value="Medium Rectangle-300-250">Medium Rectangle – 300 x 250 (N5,000)</option>
<option value="Large Rectangle-336-280">Large Rectangle – 336 x 280  (N5,000)</option>
<option value="Leaderboard-728-90">Leaderboard – 728 x 90  (N5,000)</option>
<option disabled value="Half-Page Ad-300-600">Half-Page Ad – 300 x 600</option>
<option disabled value="Mobile Leaderboard-320-50">Mobile Leaderboard – 320 x 50</option>
<option disabled value="Large Leaderboard-970-90">Large Leaderboard – 970 x 90</option>
<option disabled value="Wide Skyscraper-160-600">Wide Skyscraper – 160 x 600</option>
<option disabled value="Skyscraper-120-600">Skyscraper – 120 x 600</option>
<option value="Banner-468-60">Banner – 468 x 60 (N5,000)</option>
            </select> 
            <br>
            <b><u>Amount</u></b>
            <input type="text" class="form-control form-control-lg" name="amount" value="5000" readonly placeholder="Amount" required/> <br>
            
            
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
             <button type="submit" class="btn btn-primary" id="btn"   >Submit</button> 
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <script>
    imgInp.onchange = evt => {
      const [file] = imgInp.files
      if (file) {
        prv.src = URL.createObjectURL(file)
      }
    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script type="text/javascript">

        $('#SubmitForm').on('submit',function(e){
            e.preventDefault();
        
            let name = $('#name').val();
            let company = $('#company').val();
            let date = $('#date').val();
            let bank = $('#bank').val();
            let amount = $('#amount').val();
            let advertise_id = $('#advertise_id').val();
            let user_id = $('#user_id').val();
            $('#btn').html("Sending...");
           
            //let remark = '';
            //this.disabled=true; this.value='Sending…';
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
                user_id:user_id,
                
              },
              success:function(response){
                $('#name').val('');
                $('#date').val('');
                $('#bank').val('');
                $('#amount').val('');
                $('#successMsg').show();
                setTimeout(function(){ location.href = "{{route('applications.index')}}"; }, 2000);
               
                console.log(response);
               
              },
              
              });
             
            });

            function getAdvId(n){
                //let advId =document.getElementById('getID').getAttribute("advId");
                document.getElementById('advertise_id').value = n ;
              
            }
          </script>