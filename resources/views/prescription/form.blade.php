@if(count($bookings)>0)
<!-- Modal -->
<div class="modal fade" id="exampleModal{{$booking->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{route('prescription')}}" method="post">@csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Prescription Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="app">
                <input type="hidden" name="user_id" value="{{$booking->user_id}}">
                <input type="hidden" name="doctor_id" value="{{$booking->doctor_id}}">
                <input type="hidden" name="date" value="{{$booking->date}}">
                <div class="form-group">
                    <label for="">Disease</label>
                    <input type="text" name="name_of_disease" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="">Symptoms</label>
                    <textarea name="symptoms" id="" class="form-control" required="" placeholder="symptoms" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Medicine</label>
                    <add-btn></add-btn>
                </div>
                <div class="form-group">
                    <label for="">Use Instructions</label>
                    <textarea name="use_instructions" id="" class="form-control" required="" placeholder="symptoms" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Doctor Feedback</label>
                    <textarea name="feedback" id="" class="form-control" required="" placeholder="symptoms" cols="30" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Doctor Signature Signoff</label>
                    <input type="text" name="signature" class="form-control" required="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endif