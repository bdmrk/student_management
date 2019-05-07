<div class="row" style="margin-top: 20px;">
    <div class="clearfix"> </div>
    <div class="col-md-6 validation-grids widget-shadow" data-example-id="basic-forms">
        <div class="form-title">
            <h4>SSC or Equivalent Level*</h4>
        </div>
        <div class="form-group" style="padding-top: 20px;">
            <label class="control-label col-md-4">Examination</label>
            <div class="col-sm-6">
                <select name="ssc[examination]"  required id="selector1" class="form-control1">

                    <option selected="selected" value="">Select One</option>
                    @foreach($exams as $exam)
                        @if($exam->level == 'SSC')
                            <option value="{{ $exam }}" @if($academicInfo['SSC']->examination_id == $exam->id) ) selected @endif>{{ $exam ->name }}</option>
                        @endif
                    @endforeach
                </select>
                <span class="text-danger">{{$errors->has('ssc.examination') ? $errors->first('ssc.examination') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Board</label>
            <div class="col-sm-6">
                <select name="ssc[board]" value="{{ old("ssc.board") }}" required id="selector1" class="form-control1">
                    <option selected="selected" value="">Select One</option>
                    @foreach($boards as $board)

                        <option value="{{ $board }}" @if($academicInfo['SSC']->board_id == $board->id ) selected @endif> {{$board->name}}</option>

                    @endforeach
                </select>
                <span class="text-danger">{{$errors->has('ssc.board') ? $errors->first('ssc.board') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Roll No</label>
            <div class="col-sm-6">
                <input type="text" name="ssc[roll]"  value="{{ $academicInfo['SSC']->roll_no }}" required class="form-control" placeholder="Roll No"/>
                <span class="text-danger">{{$errors->has('ssc.roll') ? $errors->first('ssc.roll') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Result</label>
            <div class="col-sm-6">
                <input type="text" name="ssc[result]"  value="{{ $academicInfo['SSC']->result }}" required class="form-control" placeholder="Result"/>
                <span class="text-danger">{{$errors->has('ssc.result') ? $errors->first('ssc.result') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Group</label>
            <div class="col-sm-6">
                <select name="ssc[group]" id="selector1" required class="form-control1">
                    <option selected="selected" value="">Select One</option>
                    @foreach($groups as $group)
                        <option  value="{{ $group }}" @if($group == $academicInfo['SSC']->group) selected @endif >{{ $group }}</option>
                    @endforeach
                </select>

                <span class="text-danger">{{$errors->has('ssc.group') ? $errors->first('ssc.group') : ''}}</span>

            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-4">Passing Year</label>
            <div class="col-sm-6">
                <select name="ssc[passing_year]" required id="selector1" class="form-control1">
                    <option selected="selected" value="">Select One</option>
                    @php($start= date('Y') - 30 )
                    @php($end= date('Y') )

                    @for ($i = $end; $i >= $start; $i--)
                        <option value="{{$i}}" @if($i == $academicInfo['SSC']->passing_year) selected @endif >{{ $i }}</option>
                    @endfor
                </select>
                <span class="text-danger">{{$errors->has('ssc.passing_year') ? $errors->first('ssc.passing_year') : ''}}</span>

            </div>
        </div>
    </div>
    <div class="col-md-6 validation-grids validation-grids-right">
        <div class="widget-shadow" data-example-id="basic-forms">
            <div class="form-title">
                <h4>HSC or Equivalent Level*</h4>
            </div>
            <div class="form-group" style="padding-top: 20px;">
                <label class="control-label col-md-4">Examination</label>
                <div class="col-sm-6">
                    <select name="hsc[examination]" required id="selector1" class="form-control1">
                        <option selected="selected" value="">Select One</option>
                        @foreach($exams as $exam)
                            @if($exam->level == 'HSC')
                                <option value="{{ $exam }}" @if($academicInfo['HSC']->examination_id == $exam->id) ) selected @endif>{{ $exam ->name }}</option>
                            @endif
                        @endforeach
                    </select>

                    <span class="text-danger">{{$errors->has('hsc.examination') ? $errors->first('hsc.examination') : ''}}</span>

                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Board</label>
                <div class="col-sm-6">
                    <select name="hsc[board]" required id="selector1" class="form-control1">
                        <option selected="selected" value="">Select One</option>
                        @foreach($boards as $board)

                            <option value="{{ $board }}" @if($academicInfo['HSC']->board_id == $board->id ) selected @endif> {{$board->name}}</option>

                        @endforeach
                    </select>

                    <span class="text-danger">{{$errors->has('hsc.board') ? $errors->first('hsc.board') : ''}}</span>

                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Roll No</label>
                <div class="col-sm-6">
                    <input type="text" name="hsc[roll]" value="{{ $academicInfo['HSC']->roll_no }}" required class="form-control" placeholder="Roll No"/>
                    <span class="text-danger">{{$errors->has('hsc.roll') ? $errors->first('hsc.roll') : ''}}</span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Result</label>
                <div class="col-sm-6">
                    <input type="text" name="hsc[result]" value="{{ $academicInfo['HSC']->result }}"  required class="form-control" placeholder="Result"/>
                    <span class="text-danger">{{$errors->has('hsc.result') ? $errors->first('hsc.result') : ''}}</span>

                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-4">Group</label>
                <div class="col-sm-6">
                    <select name="hsc[group]" id="selector1" required class="form-control1">
                        <option selected="selected" value="">Select One</option>
                        @foreach($groups as $group)
                            <option  value="{{ $group }}" @if($group == $academicInfo['HSC']->group) selected @endif>{{ $group }}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{$errors->has('hsc.group') ? $errors->first('hsc.group') : ''}}</span>

                </div>
            </div>
            <div class="form-group" style="padding-bottom: 15px;">
                <label class="control-label col-md-4">Passing Year</label>
                <div class="col-sm-6">
                    <select name="hsc[passing_year]" required id="selector1" class="form-control1">
                        <option selected="selected" value="">Select One</option>
                        @php($start= date('Y') - 30 )
                        @php($end= date('Y') )
                        @for ($i = $end; $i >= $start; $i--)
                            <option value="{{$i}}" @if($i == $academicInfo['HSC']->passing_year) selected @endif >{{ $i }}</option>
                        @endfor
                    </select>

                    <span class="text-danger">{{$errors->has('hsc.passing_year') ? $errors->first('hsc.passing_year') : ''}}</span>

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"> </div>

</div>
