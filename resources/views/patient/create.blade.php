<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<!-- Latest compiled and minified CSS --> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<!-- font awesome  -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- font khmer     -->
<link href="https://fonts.googleapis.com/css2?family=Battambang&display=swap" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Main content -->

<div class="container-fluid">
 
<div class="container">
     <div class="body">
<form action="{{ route('store.patient') }}" method="POST" id="form-submit" class="form-horizontal" enctype="multipart/form-data">
@csrf  

<!-- start row 1 -->
<br>
<div class="form-row">
    <div class="col-md-6 col-sm-6 already-registered-login">
        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
            <input type="text" class="form-control unicase-form-control text-input" name="name" value="" placeholder="Full Name" required="">
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
            <input type="email" class="form-control unicase-form-control text-input" name="email" value="" placeholder="Email" required="">
        </div>

        <div class="form-group">
            <label class="info-title" for="exampleInputEmail1">Phone <span>*</span></label>
            <input type="number" class="form-control unicase-form-control text-input" name="phone" value="" placeholder="Phone" required="">
        </div>
    </div>
    <!-- End new 	 -->
    <!-- already-registered-login -->
    <div class="col-md-6 col-sm-6 already-registered-login">
    
            <div class="form-group">
                <label class="control-label">Provice: <span class="text-danger">*</span></label>
                <select name="province_id" id="province_id" class="province_id form-control selectpicker" 
                 data-live-search="true" 
                required="" data-size="5">
                    <option value="" selected="" disabled="">--- Select Provice ---</option>
                    @foreach(@$provices as $item)
                        <option value="{{ $item->id }}">{{ @$item->name }} ({{ @$item->khmer_name }})</option>
                    @endforeach
                </select>
                @error('province_id')
                    <span class="text-danger">{{ @$message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">District: <span class="text-danger">*</span></label>
                <select id="district_id" name="district_id" class="district_id form-control selectpicker" 
                 data-live-search="true" 
                required="" 
                data-size="5">
                    <option value="" selected="" disabled="">--- Select District ---</option>
                    
                </select>
                @error('district_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Commune: <span class="text-danger">*</span></label>
                <select name="commune_id" id="commune_id" class="commune_id form-control selectpicker" required="" 
                data-live-search="true" data-size="5">
                    <option value="" selected="" disabled="">--- Select Commune ---</option>
                    
                </select>
                @error('commune_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label">Village: <span class="text-danger">*</span></label>
                <select name="village_id" id="village_id" class="village_id form-control selectpicker" required="" 
                data-live-search="true" data-size="5">
                    <option value="" selected="" disabled="">--- Select Village ---</option>
                    
                </select>
                @error('village_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">Noted: <span class="text-danger">*</span></label>
                <textarea  class="form-control" name="noted" id="noted" cols="30" rows="5" placeholder="Noted....."></textarea>
            </div>
              
    </div>	   
</div>
 <!-- End start  -->
    
    <!-- footer  -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 text-right">
            <input type="submit" class="btn btn-info" value="Submit">
        </div>
    </div>
</form>
</body>
</div>
</div>

{{-- Warning Modal --}}
<div class="modal fade" id="warning-message-modal" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title text-danger" id="defaultModalLabel">
                    <i class="fa fa-image m-r-10"></i> {{ trans('hmis.warning') }}
                </h6>
            </div>
            <div class="modal-body">
                <p id="msg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal"><i
                        class="fas fa-times"></i> {{ trans('hmis.close') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Custom Script for specific page -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
   <!-- sweetalert -->

<!-- write javascript -->
<script type="text/javascript">
    $(document).ready(function(){
        // Get Province
        $('select[name="province_id"]').on('change', function(){
            var province_id = $(this).val();
            if(province_id){
                $.ajax({
                    url: "{{ url('/province-get/ajax') }}/"+province_id,
                    type: "GET",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // 
                    dataType: "json",
                    beforeSend: function(){
                        $('#district_id').html("Loading...");
                    },
                    success:function(data){
                        $('select[name="village_id"]').empty('');
                        $('select[name="commune_id"]').empty('');
                        var d = $('select[name="district_id"]').empty('');
                        // var d = $('select[name="district_id"]').empty();
                        //$(".district_id").append('<option></option>');
                        $.each(data, function(key,value){
                            $('select[name="district_id"]').append
                            ('<option value="'+value.id+'">'+value.name+' ('+value.khmer_name+')'+'</option>');
                        }); 
                        $('.district_id').selectpicker('refresh');
                    },
                });
            }else{
                alert('danger');
            }
        });
        // get district
        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id){
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/"+district_id,
                    type: "GET",
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // 
                    beforeSend: function(){
                        $('#commune_id').html("Loading...");
                    },
                    success:function(data){
                        $('select[name="village_id"]').empty('');
                        var d = $('select[name="commune_id"]').empty('');
                        //$(".commune_id").append('<option></option>');
                        $.each(data, function(key,value){
                            $('select[name="commune_id"]').append
                             ('<option value="'+value.id+'">'+value.name+' ('+value.khmer_name+')'+'</option>');
                        }); 
                        $('.commune_id').selectpicker('refresh');
                    },
                });
            }else{
                alert('danger');
            }
        });
        // get Commune
        $('select[name="commune_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id){
                $.ajax({
                    url: "{{ url('/commune-get/ajax') }}/"+district_id,
                    type: "GET",
                    dataType: "json",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, // 
                     beforeSend: function(){
                        $('#village_id').html("Loading...");
                    },
                    success:function(data){
                        var d = $('select[name="village_id"]').empty('');
                        //$(".village_id").append('<option></option>');
                        $.each(data, function(key,value){
                            $('select[name="village_id"]').append
                             ('<option value="'+value.id+'">'+value.name+' ('+value.khmer_name+')'+'</option>');
                        }); 
                        $('.village_id').selectpicker('refresh');
                    },
                });
            }else{
                alert('danger');
            }
        });
    });

    $(".btn_save_patient").click(function(e) {
        e.preventDefault();
        $('form#form-submit').submit();    
    });

    // Date time
    // $('#date_of_birth').datetimepicker({
    //     format: 'DD-MMM-YYYY',
    //     keepOpen: false,
    //     viewMode: 'years',
    //     maxDate: $.now()
    // });
</script>


