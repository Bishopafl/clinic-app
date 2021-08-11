<!-- Edit Doctor Information Modal -->
<div class="modal fade" id="editDoctor{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="editDoctorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editDoctorLabel">Doctor Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
                <div class="col-md-5 mx-auto">
                    <div >
                        <img src="{{asset('images')}}/{{$doctor->image}}" width="200" alt="">
                    </div>
                    <div class="p-4 d-flex justify-content-center">
                        <p class="badge badge-pill badge-dark">Role: {{$doctor->role->name}}</p>
                    </div>
              </div>
              <div class="col-md-7">
                <p>Name: {{$doctor->name}}</p>    
                <p>Email: {{$doctor->email}}</p>    
                <p>Address: {{$doctor->address}}</p>    
                <p>Phone Number: {{$doctor->phone_number}}</p>    
                <p>Department: {{$doctor->department}}</p>    
                <p>Education: {{$doctor->education}}</p>    
                <p>Bio: {{$doctor->description}}</p>    
              </div>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>