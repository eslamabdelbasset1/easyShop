@extends('admin.admin_master')
@section('admin')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Create Contact</h2>
        </div>
        <div class="card-body">
            <form action="{{route('store.contact')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Email</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Contact Email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Contact Phone</label>
                    <input type="number" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="Contact Phone">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Contact Address</label>
                    <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>


                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Add Contact</button>
                </div>
            </form>
        </div>
    </div>
@endsection

