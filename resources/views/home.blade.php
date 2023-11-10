@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ABC BANK</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="deposit-tab" data-bs-toggle="tab" data-bs-target="#deposit" type="button" role="tab" aria-controls="deposit" aria-selected="false">Deposit</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="withdraw-tab" data-bs-toggle="tab" data-bs-target="#withdraw" type="button" role="tab" aria-controls="withdraw" aria-selected="false">Withdraw</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="transfer-tab" data-bs-toggle="tab" data-bs-target="#transfer" type="button" role="tab" aria-controls="contact" aria-selected="false">Transfer</button>
  </li>

  <li class="nav-item" role="presentation">
    <button class="nav-link" id="statement-tab" data-bs-toggle="tab" data-bs-target="#statement" type="button" role="tab" aria-controls="contact" aria-selected="false">Statement</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">


  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<br>    
    <div class="card">

            <div class="card-header">Welcome  {{ Auth::user()->name }}</div>
        <div class="card-body">

         

            <div class="row">

                <div class="col-md-12">

                    <div class="col-md-6">
                        
                         Email Id   :   {{ Auth::user()->email }} 
                    </div>

                    <div class="col-md-6">
                        
                         Balance    :   {{ Auth::user()->balance  }}
                    </div>


                    

                </div>
                

            </div>

     

     
  </div>
</div>
  </div>


  <div class="tab-pane fade" id="deposit" role="tabpanel" aria-labelledby="deposit-tab">
      
      <br>

        <div class="card">

               <div class="card-header">Deposit Money</div>
        <div class="card-body">

           <form id="depositForm">

             <div class="row mb-3">
                    <label for="amount" class="col-md-4 col-form-label text-md-end">Amount</label>

                            <div class="col-md-6">
                            <input id="amount" type="text" class="form-control numberonly required_item"  name="amount" value="{{ old('amount') }}">

                            </div>
                        </div>

                          <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Deposit
                                </button>

                               
                            </div>
                        </div>



           </form>
     

     
  </div>
</div>



  </div>

  <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">


        <br>

        <div class="card">

               <div class="card-header">Withdraw Money</div>
        <div class="card-body">

           <form id="withdrawForm">

             <div class="row mb-3">
                    <label for="amount" class="col-md-4 col-form-label text-md-end">Amount</label>

                            <div class="col-md-6">
                            <input id="amount" type="text" class="form-control numberonly required_item"  name="amount" value="{{ old('amount') }}">

                            </div>
                        </div>

                          <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Withdraw
                                </button>

                               
                            </div>
                        </div>



           </form>
     

     
  </div>
</div>


  </div>


<div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">


        <br>

        <div class="card">

               <div class="card-header">Transfer Money</div>
        <div class="card-body">

           <form id="TransferForm">

           
                         <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control required_item" name="email">
                            </div>
                        </div>

                          <div class="row mb-3">
                    <label for="amount" class="col-md-4 col-form-label text-md-end">Amount</label>

                            <div class="col-md-6">
                            <input id="amount" type="text" class="form-control numberonly required_item"  name="amount" value="{{ old('amount') }}">

                            </div>
                        </div>


                          <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Transfer
                                </button>

                               
                            </div>
                        </div>



           </form>
     

     
  </div>
</div>


  </div>


<div class="tab-pane fade show" id="statement" role="tabpanel" aria-labelledby="statement-tab">

<br>    
    <div class="card">

            <div class="card-header">Statement of account</div>
        <div class="card-body">


            <div class="tab-pane fade show active m-0" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                  <div class="dt-responsive table-responsive data-hw">
                     <table class="table text-md-nowrap key-buttons" width="100%" id="statementTable">
                        <thead>
                           <tr>
                              <th data-data="DT_RowIndex" data-orderable="false">#</th>
                              <th data-data="created_at">DateTime</th>
                              <th data-data="amount">Amount</th>
                              <th data-data="type">Type</th>
                              <th data-data="details" >Details</th>
                              <th data-data="balance" >Balance</th>
                              
                           </tr>
                        </thead>
                     </table>
                  </div>
               </div>



         

          

     

     
  </div>
</div>
  </div>





</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

<script>

 $(document).ready(function(){

    callBackDataTablesSan('#statementTable',"{{ url('statement') }}",{dom:'frtip'});
    
  $('#depositForm').validate({ // initialize the validation
        rules: {
            amount :{
               required: true,
            },
          
        },
        messages: {
            amount:{
                required: "Please enter amount",
            },
                     
        },

        errorElement: "div",
       
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.required_item'));
        }
    });

      $('#withdrawForm').validate({ // initialize the validation
        rules: {
            amount :{
               required: true,
            },
          
        },
        messages: {
            amount:{
                required: "Please enter amount",
            },
                     
        },

        errorElement: "div",
       
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.required_item'));
        }
    });

       $('#TransferForm').validate({ // initialize the validation
        rules: {
            amount :{
               required: true,
            },
             email :{
               required: true,
               email:true
            },
          
        },
        messages: {
            amount:{
                required: "Please enter amount",
            },
             email:{
                required: "Please enter email",
                email:" Please enter valid email"
            },
                     
        },

        errorElement: "div",
       
        errorPlacement: function(error, element) {
            error.insertAfter($(element).closest('.required_item'));
        }
    });  

       $('#TransferForm').submit(function(e){
            e.preventDefault();

        if($('#TransferForm').valid()){

         var form = $('#TransferForm')[0];
         var formData = new FormData(form);
         formData.append("_token",'{{ csrf_token() }}');
         
          $.ajax({
                    type: "POST",
                    url: '/addTransfer',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                    data: formData, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        if(response.status==true){

                           iziToast.success({
                                    title: 'Success!',
                                    message:response.message,
                                    position: 'topRight'
                                });  

                                $('#statement-tab').addClass('active'); 
                                $('#statement').addClass('active');
                                $('#transfer-tab').removeClass('active'); 
                                $('#transfer').removeClass('active');     

                            // setTimeout(function() {
                            //         window.location.href = "/home";
                            //     },6000);


                        }
                        else
                        {
                             iziToast.error({
                                        title: 'error !',
                                        message: response.message,
                                        position: 'topRight'
                                    });

                        
                        }
                      
                    },
                    error: function(err) {

                             iziToast.error({
                                        title: 'error !',
                                        message: 'Something went wrong from server',
                                        position: 'topRight'
                                    });

                        
                    }
                });
      }
                

            });   

     $('#withdrawForm').submit(function(e){
            e.preventDefault();

        if($('#withdrawForm').valid()){

         var form = $('#withdrawForm')[0];
         var formData = new FormData(form);
         formData.append("_token",'{{ csrf_token() }}');
         
          $.ajax({
                    type: "POST",
                    url: '/addWithdraw',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                    data: formData, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        if(response.status==true){

                           iziToast.success({
                                    title: 'Success!',
                                    message:response.message,
                                    position: 'topRight'
                                });  

                                $('#statement-tab').addClass('active'); 
                                $('#statement').addClass('active');
                                $('#withdraw-tab').removeClass('active'); 
                                $('#withdraw').removeClass('active');      

                            // setTimeout(function() {
                            //         window.location.href = "/home";
                            //     },6000);


                        }
                        else
                        {
                             iziToast.error({
                                        title: 'error !',
                                        message: response.message,
                                        position: 'topRight'
                                    });

                        
                        }
                      
                    },
                    error: function(err) {

                             iziToast.error({
                                        title: 'error !',
                                        message: 'Something went wrong from server',
                                        position: 'topRight'
                                    });

                        
                    }
                });
      }
                

            });  



    $('#depositForm').submit(function(e){
            e.preventDefault();

        if($('#depositForm').valid()){

         var form = $('#depositForm')[0];
         var formData = new FormData(form);
         formData.append("_token",'{{ csrf_token() }}');
         

          $.ajax({
                    type: "POST",
                    url: '/addDeposit',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
                    data: formData, 
                    processData: false,
                    contentType: false,
                    success: function( response ) {
                        if(response.status==true){

                           iziToast.success({
                                    title: 'Success!',
                                    message:response.message,
                                    position: 'topRight'
                                });  

                                $('#statement-tab').addClass('active'); 
                                $('#statement').addClass('active');
                                $('#deposit-tab').removeClass('active'); 
                                $('#deposit').removeClass('active');  

                            // setTimeout(function() {
                            //         window.location.href = "/home";
                            //     },6000);


                        }
                        else
                        {
                             iziToast.error({
                                        title: 'error !',
                                        message: response.message,
                                        position: 'topRight'
                                    });

                        
                        }
                      
                    },
                    error: function(err) {

                             iziToast.error({
                                        title: 'error !',
                                        message: 'Something went wrong from server',
                                        position: 'topRight'
                                    });

                        
                    }
                });
      }
                

            });


 });

</script>




@endsection
