
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h4 class="header-title">{{ $pageName }}</h4>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-danger mb-2 goBack"><i class="mdi mdi-step-backward-2 me-2"></i>Back To Listing</button>
                </div>
            </div>
            <form id="submit-form" action="{{ $action }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                @if(isset($objData->id))
                    <input type="hidden" value="{{ $objData->id }}" name="id">
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="@if(isset($objData->name) && $objData->name){{ $objData->name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="short_name" class="form-label">Short Name</label>
                            <input type="text" id="short_name" class="form-control" name="short_name" value="@if(isset($objData->short_name) && $objData->short_name){{ $objData->short_name }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" required rows="4"> @if(isset($objData->description) && $objData->description){{ $objData->description }}@endif</textarea>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-bordered" id="dynamic_field"> 
                        @if(isset($price))    
                        @foreach($price as $key => $amount)
                             <tr id="row">  
                                <td><label for="amount" class="form-label">Amount</label>
                                    <input type="number" min="1" name="amount[]" placeholder="Enter Amount" value="{{$amount->amount}}" class="form-control name_list" />
                                </td>  
                                  <td><label for="time" class="form-label">Time</label>
                                    <select class="form-control select2" data-toggle="select2" name="time[]">
                                        <option>Select</option>
                                        @foreach($times as $value)
                                            <option value="{{$value->time}}"@if($amount->time == $value->time) selected @endif>{{$value->time."  ".$value->type}}</option>
                                        @endforeach        
                                    </select>
                                </td> 
                                  <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td> 
                                  <td><button type="button" name="remove"  class="btn btn-danger btn_remove">X</button></td> 
                             </tr>
                             @endforeach 
                        @else
                        <tr id="row">  
                                <td><label for="amount" class="form-label">Amount</label>
                                    <input type="number" min="1" name="amount[]" placeholder="Enter Amount" value="" class="form-control name_list" />
                                </td>  
                                  <td><label for="time" class="form-label">Time</label>
                                    <select class="form-control select2" data-toggle="select2" name="time[]">
                                        <option>Select</option>
                                        @foreach($times as $value)
                                            <option value="{{$value->time}}">{{$value->time."  ".$value->type}}</option>
                                        @endforeach        
                                    </select>
                                </td> 
                                  <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                             </tr>
                             @endif
                        </table>  
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="tour_id" class="form-label">Tour Name</label>
                            <select class="form-control select2" id="tour_id" data-toggle="select2" name="tour_id">
                                <option>Select</option>
                                @foreach($tours as $value)
                                    <option value="{{$value->id}}" @if(isset($objData->tour_id) && $objData->tour_id == $value->id) selected @endif>{{$value->name}}</option>
                                @endforeach    
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="time_slots_ids" class="form-label">Time Slotes</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" id="time_slots_ids" name="time_slots_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($timeSlotes as $timeSlote)
                                    <option value="{{$timeSlote->id}}" @if(isset($objData->time_slots_ids) && in_array($timeSlote->id,$objData->time_slots_ids)) selected @endif>{{$timeSlote->text}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="no_of_persons" class="form-label">No Of Persons</label>
                            <input type="number" min="1" id="no_of_persons" class="form-control" name="no_of_persons" value="@if(isset($objData->no_of_persons) && $objData->no_of_persons){{ $objData->no_of_persons }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="includes_ids" class="form-label">Includes</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" id="includes_ids" name="includes_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($includes as $include)
                                    <option value="{{$include->id}}" @if(isset($objData->includes_ids) && in_array($include->id, $objData->includes_ids)) selected @endif>{{$include->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="highlight_ids" class="form-label">Not Includes</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" id="highlight_ids" name="highlight_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($highlights as $highlight)
                                    <option value="{{$highlight->id}}" @if(isset($objData->highlight_ids) && in_array($highlight->id, $objData->highlight_ids)) selected @endif>{{$highlight->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="warning_ids" class="form-label">Must Know Befor You Book</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" id="warning_ids" name="warning_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($warnings as $warning)
                                    <option value="{{$warning->id}}" @if(isset($objData->warning_ids) && in_array($warning->id, $objData->warning_ids)) selected @endif>{{$warning->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="activities_ids" class="form-label">Extra Activities</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" id="activities_ids" name="activities_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($activities as $activitie)
                                    <option value="{{$activitie->id}}" @if(isset($objData->activities_ids) && in_array($activitie->id, $objData->activities_ids)) selected @endif>{{$activitie->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="additional_info_ids" class="form-label">Additional Info</label>
                            <select class="select2 form-control select2-multiple" data-toggle="select2" id="additional_info_ids" name="additional_info_ids[]" multiple="multiple" data-placeholder="Choose ...">
                                @foreach($addInfos as $value)
                                    <option value="{{$value->id}}" @if(isset($objData->additional_info_ids) && in_array($value->id, $objData->additional_info_ids)) selected @endif>{{$value->title}}</option>
                                @endforeach  
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="tour_itenary" class="form-label">Tour Itenary</label>
                            <textarea id="summernote" name="tour_itenary">@if(isset($objData->tour_itenary) && $objData->tour_itenary){{ $objData->tour_itenary }}@endif</textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" id="image" class="form-control" name="image" @if(!isset($objData)) required @endif>
                            @if(isset($objData->image))
                                <img src="{{ asset('admin/uploads/vehicle/' . $objData->image) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="banner_img" class="form-label">Banner Image</label>
                            <input type="file" id="banner_img" class="form-control" name="banner_img" @if(!isset($objData)) required @endif>
                            @if(isset($objData->banner_img))
                                <img src="{{ asset('admin/uploads/vehicle/' . $objData->banner_img) }}" width="50" class="mt-3">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity Of Vehicles</label>
                            <input type="number" id="quantity" min="1" class="form-control" name="quantity" value="@if(isset($objData->quantity) && $objData->quantity){{ $objData->quantity }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="disc" class="form-label">Apply Discount</label>
                            <input type="number" id="disc" min="0" class="form-control" name="disc" value="@if(isset($objData->disc) && $objData->disc){{ $objData->disc }}@endif" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="active" name="status" class="form-check-input" value="1" @if(isset($objData) && $objData->status == 1) checked @endif checked>
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inactive" name="status" class="form-check-input" value="0" @if(isset($objData) && $objData->status == 0) checked @endif>
                                    <label class="form-check-label" for="inactive">InActive</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--pick_status code start-->
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="pickup_status" class="form-label">Pickup Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="active" name="pickup_status" class="form-check-input" value="1" @if(isset($objData) && $objData->pickup_status == 1) checked @endif>
                                    <label class="form-check-label" for="active">With Pickup</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="inactive" name="pickup_status" class="form-check-input" value="0" @if(isset($objData) && $objData->pickup_status == 0) checked @endif>
                                    <label class="form-check-label" for="inactive">Without Pickup</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" id="both" name="pickup_status" class="form-check-input" value="2" @if(isset($objData) && $objData->pickup_status == 2) checked @endif>
                                    <label class="form-check-label" for="both">Both</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--pick_status code end-->
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-success mb-2">Submit</button>
                </div>
            </form>
            <!-- end row--> 
        </div> <!-- end card-body -->
    </div> <!-- end card -->
</div><!-- end col -->
<script>
    $('.select2').select2();  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row"><td><input type="text" name="amount[]" placeholder="Enter amount" class="form-control name_list" />\
            </td>\
            <td>\
                <select class="form-control select2" data-toggle="select2" name="time[]">\
                    <option>Select</option>\
                    @foreach($times as $value)\
                        <option value="{{$value->time}}">{{$value->time}}</option>\
                    @endforeach\
                    </select>\
            </td><td>\
                <button type="button" name="remove" class="btn btn-danger btn_remove">X</button>\
            </td></tr>');  
      });  
      
      $(document).on('click', '.btn_remove', function(){  
        $(this).parents("#row").remove(); 
      });  
      
      $('#summernote').summernote({
        toolbar: [
            ['style', ['style']],
            ['fontsize', ['fontsize']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['picture', 'hr']],
            ['table', ['table']]
        ],
        tabsize: 2,
        height: 200
      });
 });  
</script>