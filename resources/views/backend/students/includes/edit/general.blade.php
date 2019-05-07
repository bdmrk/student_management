<div class="form-grids row widget-shadow" data-example-id="basic-forms">
    <div class="form-title">
        <h4>General Information : </h4>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label col-md-4" >Applicant's Name : </label>
        <div class="col-md-6">
            <input type="text" name="applicant_name" required value="{{ $students->full_name}}" class="form-control" placeholder="Mahabubur Rahman Kausar" />
            <span class="text-danger">{{$errors->has('applicant_name') ? $errors->first('applicant_name') : ''}}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Father's Name : </label>
        <div class="col-md-6">
            <input type="text" name="father_name" value="{{ $students->father_name}}" required class="form-control" placeholder="Father's Name"/>
            <span class="text-danger">{{$errors->has('father_name') ? $errors->first('father_name') : ''}}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Mother's Name : </label>
        <div class="col-md-6">
            <input type="text" name="mother_name" value="{{ $students->mother_name}}" required class="form-control" placeholder="Mother's Name"/>
            <span class="text-danger">{{$errors->has('mother_name') ? $errors->first('mother_name') : ''}}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Date of Birth : </label>
        <div class="col-md-6">
            <input type="date" name="dob" value="{{ $students->dob}}" class="form-control" required placeholder="18/03/1992"/>
            <span class="text-danger">{{$errors->has('dob') ? $errors->first('dob') : ''}} </span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Contact Number : </label>
        <div class="col-md-6">
            <input type="text" name="contact_number" value="{{ $students->contact_number}}" class="form-control" required placeholder="01839590972"/>
            <span class="text-danger">{{$errors->has('contact_number') ? $errors->first('contact_number') : ''}}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Email : </label>
        <div class="col-md-6">
            <input type="email" name="email" value="{{ $students->email}}" class="form-control" required placeholder="hostkausar@gmail.com"/>
            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Password : </label>
        <div class="col-md-6">
            <input type="password" name="password" value="{{ old('password')}}" class="form-control" placeholder="123456"/>
            <span class="text-info">Min 6 characters and max 10 characters</span>
            <span class="text-danger">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
        </div>
    </div>
    <div class="form-group form-inline">

        <label class="control-label col-md-4">Gender : </label>
        <div class="col-sm-2">
            <select name="gender" value="{{ old("gender") }}" required id="gender" class="form-control1">
                <option value="Male" @if($students->gender == 'Male') selected @endif>Male</option>
                <option value="Female" @if($students->gender == 'Female') selected @endif>Female</option>
            </select>
            <span class="text-danger">{{$errors->has('gender') ? $errors->first('gender') : ''}}</span>
        </div>


        <label class="control-label col-md-2">Religion : </label>
        <div class="col-sm-2">
            <select name="religion" value="{{ old("religion") }}" required id="religion" class="form-control1">
                @foreach( $religions as $religion)
                    <option value="{{ $religion }}" @if($students->religion == $religion) selected @endif>{{ $religion }}</option>
                    @endforeach

            </select>
            <span class="text-danger">{{$errors->has('religion') ? $errors->first('religion') : ''}}</span>
        </div>

    </div>
    <div class="form-group form-inline">
        <label class="control-label col-md-4">Blood Group : </label>
        <div class="col-sm-2">
            <select name="blood_group" id="blood_group" class="form-control1">
               @foreach( $bloods as $blood)
                    <option value="{{ $blood }}" @if($students->blood_group == $blood)  selected @endif>{{$blood}}</option>
                   @endforeach
            </select>
            <span class="text-danger">{{$errors->has('blood_group') ? $errors->first('blood_group') : ''}}</span>
        </div>

        <label class="control-label col-md-2">Nationality : </label>
        <div class="col-md-2">
            <input type="text" required name="nationality" value="{{ $students->nationality}}{{ old("nationality") }}" class="form-control1" placeholder="Nationality"/>
            <span class="text-danger">{{$errors->has('nationality') ? $errors->first('nationality') : ''}}</span>
        </div>

    </div>
    <div class="form-group">
        <label class="control-label col-md-4">National ID : </label>
        <div class="col-md-6">
            <input type="text" name="nid" value="{{ $students->nid}}" class="form-control" placeholder="National ID No."/>
            <span class="text-danger">{{$errors->has('nid') ? $errors->first('nid') : ''}}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Present Address : </label>
        <div class="col-md-6">
            <textarea type="text" required name="present_address"   class="form-control"> {{ $students->present_address}}</textarea>
            <span class="text-danger">{{$errors->has('present_address') ? $errors->first('present_address') : ''}}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Permanent Address : </label>
        <div class="col-md-6">
            <textarea type="text" required name="permanent_address"  class="form-control"> {{ $students->permanent_address}}</textarea>
            <span class="text-danger">{{$errors->has('permanent_address') ? $errors->first('permanent_address') : ''}}</span>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-4">Student Photo : </label>
        <div class="col-md-6">
            <input type="file" name="student_photo" accept="image/*"/>
            <img  src="{{ asset($students->student_photo) }}" height="70px" width="70px"/>
            <span class="text-danger">{{$errors->has('student_photo') ? $errors->first('student_photo') : ''}}</span>
        </div>
    </div>
</div>