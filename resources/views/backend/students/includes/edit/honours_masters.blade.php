<div class="row" style="margin-top: 20px;">
    <div class="clearfix"> </div>
    <div class="col-md-6 validation-grids widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>Graduation Level*</h4>
        </div>
        <div class="form-group" style="padding-top: 20px;">
            <label class="control-label col-md-4">Examination : </label>
            <div class="col-sm-6">
                <select name="honours[examination]" id="selector1" required class="form-control1">
                    <option selected="selected" value="">Select One</option>
                    @foreach($exams as $exam)
                        @if($exam->level == 'Graduation')
                            <option value="{{ $exam }}" @if($academicInfo['Graduation']->examination_id == $exam->id) ) selected @endif>{{ $exam ->name }}</option>
                        @endif
                    @endforeach
                </select>
                <span class="text-danger">{{$errors->has('honours.examination') ? $errors->first('honours.examination') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Subject : </label>
            <div class="col-sm-6">

                <input type="text" name="honours[subject]"  value="{{ $academicInfo['Graduation']->subject }}" class="form-control" placeholder="English" />

                <span class="text-danger">{{$errors->has('honours.subject') ? $errors->first('honours.subject') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Institution :</label>
            <div class="col-sm-6">
                <input type="text" name="honours[institute]" value="{{ $academicInfo['Graduation']->institute }}" required class="form-control" placeholder="National University"/>
                <span class="text-danger">{{$errors->has('honours.institute') ? $errors->first('honours.institute') : ''}}</span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Roll No</label>
            <div class="col-sm-6">
                <input type="text" name="honours[roll]"  value="{{ $academicInfo['Graduation']->roll_no }}" required class="form-control" placeholder="Roll No"/>
                <span class="text-danger">{{$errors->has('honours.roll') ? $errors->first('honours.roll') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Result : </label>
            <div class="col-sm-6">
                <input type="text" name="honours[result]" value="{{ $academicInfo['Graduation']->result }}" required class="form-control" placeholder="Result"/>
                <span class="text-danger">{{$errors->has('honours.result') ? $errors->first('honours.result') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Passing Year : </label>
            <div class="col-sm-6">
                <select name="honours[passing_year]" required id="selector1" class="form-control1">
                    <option selected="selected" value="">Select One</option>
                    @php($start= date('Y') - 30 )
                    @php($end= date('Y') )

                    @for ($i = $end; $i >= $start; $i--)
                        <option value="{{$i}}" @if($i == $academicInfo['Graduation']->passing_year) selected @endif >{{ $i }}</option>
                    @endfor
                </select>
                <span class="text-danger">{{$errors->has('honours.passing_year') ? $errors->first('honours.passing_year') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Course Duration : </label>

            <div class="col-sm-6">
                <select name="honours[course_duration]" required id="selector1" class="form-control1">
                    <option selected="selected" value="">Select One</option>
                    <option value="1" @if(1 == $academicInfo['Graduation']->course_duration) selected @endif>3 Years</option>
                    <option value="2" @if(2 == $academicInfo['Graduation']->course_duration) selected @endif>4 Years</option>
                    <option value="3" @if(3 == $academicInfo['Graduation']->course_duration) selected @endif>5 Years</option>
                </select>
                <span class="text-danger">{{$errors->has('honours.course_duration') ? $errors->first('honours.course_duration') : ''}}</span>

            </div>
        </div>
    </div>
    <div class="col-md-6 validation-grids validation-grids-right">
        <div class="widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>Masters Level (if any)</h4>
            </div>
            <div class="form-group" style="padding-top: 20px;">
                <label class="control-label col-md-4">Examination : </label>
                <div class="col-sm-6">
                    <select name="masters[examination]" id="selector1" class="form-control1">
                        <option value="" selected="selected">Select One</option>
                        @foreach($exams as $exam)
                            @if($exam->level == 'Masters')
                                <option value="{{ $exam }}" @if($academicInfo['Masters']->examination_id == $exam->id) ) selected @endif>{{ $exam ->name }}</option>
                            @endif
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->has('masters.examination') ? $errors->first('masters.examination') : ''}}</span>

                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Subject : </label>
                <div class="col-sm-6">
                    <input type="text" name="masters[subject]" value="{{ $academicInfo['Masters']->subject }}"  class="form-control" placeholder="English" />

                    <span class="text-danger">{{$errors->has('masters.group') ? $errors->first('masters.group') : ''}}</span>

                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Institute :</label>
                <div class="col-sm-6">
                    <input type="text" name="masters[institute]" value="{{ $academicInfo['Masters']->institute }}" class="form-control" placeholder="Jahangirnagar University"/>
                    <span class="text-danger">{{$errors->has('masters.institute') ? $errors->first('masters.institute') : ''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Roll No</label>
                <div class="col-sm-6">
                    <input type="text" name="masters[roll]" value="{{ $academicInfo['Masters']->roll_no }}" required class="form-control" placeholder="Roll No"/>
                    <span class="text-danger">{{$errors->has('masters.roll') ? $errors->first('masters.roll') : ''}}</span>

                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Result : </label>
                <div class="col-sm-6">
                    <input type="text" name="masters[result]" value="{{ $academicInfo['Masters']->result }}" class="form-control" placeholder="Result"/>
                    <span class="text-danger">{{$errors->has('masters.result') ? $errors->first('masters.result') : ''}}</span>

                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-md-4">Passing Year : </label>
                <div class="col-sm-6">
                    <select id="year" name="masters[passing_year]" class="form-control ">
                        <option selected="selected" value="">Select One</option>

                        @php($start= date('Y') - 30 )
                        @php($end= date('Y') )

                        @for ($i = $end; $i >= $start; $i--)
                            <option value="{{$i}}" @if($i == $academicInfo['Masters']->passing_year) selected @endif >{{ $i }}</option>
                        @endfor
                    </select>
                    <span class="text-danger">{{$errors->has('masters.passing_year') ? $errors->first('masters.passing_year') : ''}}</span>

                </div>
            </div>
            <div class="form-group" style="padding-bottom: 15px;">
                <label class="control-label col-md-4">Course Duration : </label>
                <div class="col-sm-6">
                    <select name="masters[course_duration]" id="selector1" class="form-control1">
                        <option selected="selected" value="">Select One</option>
                        <option value="1" @if(1 == $academicInfo['Masters']->course_duration) selected @endif>1 Year</option>
                        <option value="2" @if(2 == $academicInfo['Masters']->course_duration) selected @endif>2 Years</option>
                    </select>
                    <span class="text-danger">{{$errors->has('masters.course_duration') ? $errors->first('masters.course_duration') : ''}}</span>

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>

</div>
