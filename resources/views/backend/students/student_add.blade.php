@extends('backend.admin_master')

@section('title')
    Add Student
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="text-center "> Student Registration</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-9 pull-right">
                            @include('backend.includes.message')
                        </div>
                    </div>


                    {{Form::open(['route'=>'students.store', 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data'])}}
                    <div class="form-grids row widget-shadow" data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>General Information : </h4>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label col-md-3" >Applicant's Name : </label>
                            <div class="col-md-6">
                                <input type="text" name="applicant_name" required value="{{ old("applicant_name") }}" class="form-control" placeholder="Applicant's Name" />
                                <span class="text-danger">{{$errors->has('applicant_name') ? $errors->first('applicant_name') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Father's Name : </label>
                            <div class="col-md-6">
                                <input type="text" name="father_name" value="{{ old("father_name") }}" required class="form-control" placeholder="Father's Name"/>
                                <span class="text-danger">{{$errors->has('father_name') ? $errors->first('father_name') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Mother's Name : </label>
                            <div class="col-md-6">
                                <input type="text" name="mother_name" value="{{ old("mother_name") }}" required class="form-control" placeholder="Mother's Name"/>
                                <span class="text-danger">{{$errors->has('mother_name') ? $errors->first('mother_name') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date of Birth : </label>
                            <div class="col-md-6">
                                <input type="date" name="dob" value="{{ old("dob") }}" class="form-control" required placeholder="18/03/1992"/>
                                <span class="text-danger">{{$errors->has('dob') ? $errors->first('dob') : ''}} </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Contact Number : </label>
                            <div class="col-md-6">
                                <input type="text" name="contact_number" value="{{ old("contact_number") }}" class="form-control" required placeholder="Contact Number"/>
                                <span class="text-danger">{{$errors->has('contact_number') ? $errors->first('contact_number') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email : </label>
                            <div class="col-md-6">
                                <input type="email" name="email" value="{{ old("email") }}" class="form-control" required placeholder="hostkausar@gmail.com"/>
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password : </label>
                            <div class="col-md-6">
                                <input type="password" name="password" value="{{ old("password") }}" class="form-control" required placeholder="hostkausar@gmail.com"/>
                                <span class="text-info">Min 6 characters and max 10 characters</span>
                                <span class="text-danger">{{$errors->has('email') ? $errors->first('password') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group form-inline">

                            <label class="control-label col-md-3">Gender : </label>
                            <div class="col-sm-2">
                                <select name="gender" value="{{ old("gender") }}" required id="gender" class="form-control1">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                <span class="text-danger">{{$errors->has('gender') ? $errors->first('gender') : ''}}</span>
                            </div>


                            <label class="control-label col-md-2">Religion : </label>
                            <div class="col-sm-2">
                                <select name="religion" value="{{ old("religion") }}" required id="religion" class="form-control1">
                                    <option>Islam</option>
                                    <option>Hindu</option>
                                    <option>Cristan</option>
                                    <option>buddha</option>
                                    <option>Other</option>
                                </select>
                                <span class="text-danger">{{$errors->has('religion') ? $errors->first('religion') : ''}}</span>
                            </div>

                        </div>
                        <div class="form-group form-inline">
                            <label class="control-label col-md-3">Blood Group : </label>
                            <div class="col-sm-2">
                                <select name="blood_group" value="{{ old("blood_group") }}" id="blood_group" class="form-control1">
                                    <option value="A+">A+</option>
                                    <option alue="A-">A-</option>
                                    <option alue="B+">B+</option>
                                    <option alue="B-">B-</option>
                                    <option alue="O+">O+-</option>
                                    <option alue="O-">O--</option>
                                    <option alue="AB+">AB+-</option>
                                    <option alue="AB-">AB-</option>
                                </select>
                                <span class="text-danger">{{$errors->has('blood_group') ? $errors->first('blood_group') : ''}}</span>
                            </div>

                            <label class="control-label col-md-2">Nationality : </label>
                            <div class="col-md-2">
                                <input type="text" required name="nationality" value="{{ old("nationality") }}" class="form-control1" placeholder="Nationality"/>
                                <span class="text-danger">{{$errors->has('nationality') ? $errors->first('nationality') : ''}}</span>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">National ID : </label>
                            <div class="col-md-6">
                                <input type="text" name="nid" value="{{ old("nid") }}" class="form-control" placeholder="National ID No."/>
                                <span class="text-danger">{{$errors->has('nid') ? $errors->first('nid') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Present Address : </label>
                            <div class="col-md-6">
                                <textarea type="text" required name="present_address" value="{{ old("present_address") }}"  class="form-control"> </textarea>
                                <span class="text-danger">{{$errors->has('present_address') ? $errors->first('present_address') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Permanent Address : </label>
                            <div class="col-md-6">
                                <textarea type="text" required name="permanent_address" value="{{ old("permanent_address") }}" class="form-control"> </textarea>
                                <span class="text-danger">{{$errors->has('permanent_address') ? $errors->first('permanent_address') : ''}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Student Photo : </label>
                            <div class="col-md-6">
                                <input type="file" required name="student_photo" accept="image/*"/>
                                <span class="text-danger">{{$errors->has('student_photo') ? $errors->first('student_photo') : ''}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-grids row widget-shadow " data-example-id="basic-forms">
                        <div class="form-title">
                            <h4>Academic Qualifications : </h4>
                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="clearfix"> </div>
                            <div class="col-md-6 validation-grids widget-shadow" data-example-id="basic-forms">
                                <div class="form-title">
                                    <h4>SSC or Equivalent Level*</h4>
                                </div>
                                <div class="form-group" style="padding-top: 20px;">
                                    <label class="control-label col-md-4">Examination</label>
                                    <div class="col-sm-6">
                                        <select name="ssc[examination]" value="{{ old("ssc.examination") }}" required id="selector1" class="form-control1">
                                            <option selected="selected" value="">Select One</option>
                                            <option value="SSC">S.S.C</option>
                                            <option value="Dakhil">Dakhil</option>
                                            <option value="SSC Vocational">S.S.C Vocational</option>
                                            <option value="O Level/Cambridge">O Level/Cambridge</option>
                                            <option value="SSC Equivalent">S.S.C Equivalent</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('ssc.examination') ? $errors->first('ssc.examination') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Board</label>
                                    <div class="col-sm-6">
                                        <select name="ssc[board]" value="{{ old("ssc.board") }}" required id="selector1" class="form-control1">
                                            <option selected="selected" value="">Select One</option>
                                            <option value="DHAKA">Dhaka</option>
                                            <option value="COMILLA">Comilla</option>
                                            <option value="RAJSHAHI">Rajshahi</option>
                                            <option value="JESSORE">Jessore</option>
                                            <option value="CHITTAGONG">Chittagong</option>
                                            <option value="BARISAL">Barisal</option>
                                            <option value="SYLHET">Sylhet</option>
                                            <option value="DINAJPUR">Dinajpur</option>
                                            <option value="MADRASAH">Madrasah</option>
                                            <option value="TECHNICAL">Technical</option>
                                            <option value="IGCSE">Cambridge International - IGCSE</option>
                                            <option value="EDEXCEL INTERNATIONAL">Edexcel International</option>
                                            <option value="OTHERS">Others</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('ssc.board') ? $errors->first('ssc.board') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Roll No</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ssc[roll]" required class="form-control" placeholder="Roll No"/>
                                        <span class="text-danger">{{$errors->has('ssc.roll') ? $errors->first('ssc.roll') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Result</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="ssc[result]" required class="form-control" placeholder="Result"/>
                                        <span class="text-danger">{{$errors->has('ssc.result') ? $errors->first('ssc.result') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Group</label>
                                    <div class="col-sm-6">
                                        <select name="ssc[group]" id="selector1" required class="form-control1">
                                            <option selected="selected" value="">Select One</option>
                                            <option value="SCIENCE">Science</option>
                                            <option value="HUMANITIES">Humanities</option>
                                            <option value="BUSINESS STUDIES">Business Studies</option>
                                            <option value="OTHERS">Others</option>
                                        </select>

                                        <span class="text-danger">{{$errors->has('ssc.group') ? $errors->first('ssc.group') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Passing Year</label>
                                    <div class="col-sm-6">
                                        <select name="ssc[passing_year]" required id="selector1" class="form-control1">
                                            <option selected="selected" value="">Select One</option>
                                            <option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
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
                                                <option value="HSC">H.S.C</option>
                                                <option value="ALIM">Alim</option>
                                                <option value="BUSINESS MANAGEMENT">Business Management</option>
                                                <option value="DIPLOMA IN ENGINEERING/AGRICULTURE">Diploma in Engineering/Agriculture</option>
                                                <option value="A LEVEL/SR. CAMBRIDGE">A Level/Sr. Cambridge</option>
                                                <option value="HSC EQUIVALENT">H.S.C Equivalent</option>
                                            </select>

                                            <span class="text-danger">{{$errors->has('hsc.examination') ? $errors->first('hsc.examination') : ''}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Board</label>
                                        <div class="col-sm-6">
                                            <select name="hsc[board]" required id="selector1" class="form-control1">
                                                <option selected="selected" value="">Select One</option>
                                                <option value="DHAKA">Dhaka</option>
                                                <option value="COMILLA">Comilla</option>
                                                <option value="RAJSHAHI">Rajshahi</option>
                                                <option value="JESSORE">Jessore</option>
                                                <option value="CHITTAGONG">Chittagong</option>
                                                <option value="BARISAL">Barisal</option>
                                                <option value="SYLHET">Sylhet</option>
                                                <option value="DINAJPUR">Dinajpur</option>
                                                <option value="MADRASAH">Madrasah</option>
                                                <option value="TECHNICAL">Technical</option>
                                                <option value="IGCSE">Cambridge International - IGCSE</option>
                                                <option value="EDEXCEL INTERNATIONAL">Edexcel International</option>
                                                <option value="OTHERS">Others</option>
                                            </select>

                                            <span class="text-danger">{{$errors->has('hsc.board') ? $errors->first('hsc.board') : ''}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Roll No</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="hsc[roll]" required class="form-control" placeholder="Roll No"/>
                                            <span class="text-danger">{{$errors->has('hsc.roll') ? $errors->first('hsc.roll') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Result</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="hsc[result]" required class="form-control" placeholder="Result"/>
                                            <span class="text-danger">{{$errors->has('hsc.result') ? $errors->first('hsc.result') : ''}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Group</label>
                                        <div class="col-sm-6">
                                            <select name="hsc[group]" id="selector1" required class="form-control1">
                                                <option selected="selected" value="">Select One</option>
                                                <option value="SCIENCE">Science</option>
                                                <option value="HUMANITIES">Humanities</option>
                                                <option value="BUSINESS STUDIES">Business Studies</option>
                                                <option value="OTHERS">Others</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('hsc.group') ? $errors->first('hsc.group') : ''}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group" style="padding-bottom: 15px;">
                                        <label class="control-label col-md-4">Passing Year</label>
                                        <div class="col-sm-6">
                                            <select name="hsc[passing_year]" required id="selector1" class="form-control1">
                                                <option selected="selected" value="">Select One</option>
                                                <option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                                <option value="2019">2019</option>
                                            </select>

                                            <span class="text-danger">{{$errors->has('hsc.passing_year') ? $errors->first('hsc.passing_year') : ''}}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>

                        </div>
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
                                            <option value="" selected="selected">Select One</option>
                                            <option value="B.SC (ENGINEERING/ARCHITECTURE)">B.Sc (Engineering/Architecture)</option>
                                            <option value="B.SC (AGRICULTURAL SCIENCE)">B.Sc (Agricultural Science)</option>
                                            <option value="HONOURS">Honours</option>
                                            <option value="OTHERS">Others</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('honours.examination') ? $errors->first('honours.examination') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Subject : </label>
                                    <div class="col-sm-6">
                                        <select name="honours[subject]" required id="selector1" class="form-control1">
                                            <option value="" selected="selected">Select One</option>
                                            <option value="COMPUTER SCIENCE (CS)">Computer Science (CS)</option>
                                            <option value="COMPUTER ENGINEERING (CE)">Computer Engineering (CE)</option>
                                            <option value="COMPUTER SCIENCE AND ENGINEERING (CSE)">Computer Science and Engineering (CSE)</option>
                                            <option value="ELECTRONICS AND COMPUTER SCIENCE (ECS)">Electronics and Computer Science (ECS)</option>
                                            <option value="COMPUTER AND INFORMATION TECHNOLOGY (CIT)">Computer and Information Technology (CIT)</option>
                                            <option value="INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)">Information and Communication Technology (ICT)</option>
                                            <option value="INFORMATION TECHNOLOGY (IT)">Information Technology (IT)</option>
                                            <option value="SOFTWARE ENGINEERING (SE)">Software Engineering (SE)</option>
                                            <option value="Textile Engineering">Textile Engineering</option>
                                            <option value="ELECTRICAL AND ELECTRONICS ENGINEERING (EEE)">Electrical and Electronics Engineering (EEE)</option>
                                            <option value="ELECTRONICS AND TELECOMMUNICATION ENGINEERING (ETE)">Electronics and Telecommunication Engineering (ETE)</option>
                                            <option value="ELECTRONICS AND COMMUNICATION ENGINEERING (ECE)">Electronics and Communication Engineering (ECE)</option>
                                            <option value="CIVIL ENGINEERING (CE)">Civil Engineering (CE)</option>
                                            <option value="MECHANICAL ENGINEERING (ME)">Mechanical Engineering (ME)</option>
                                            <option value="INDUSTRIAL AND PRODUCTION ENGINEERING (IPE)">Industrial and Production Engineering (IPE)</option>
                                            <option value="ARCHITECTURE">Architecture</option>
                                            <option value="MATHEMATICS">Mathematics</option>
                                            <option value="PHYSICS">Physics</option>
                                            <option value="CHEMISTRY">Chemistry</option>
                                            <option value="STATISTICS">Statistics</option>
                                            <option value="GEOLOGICAL SCIENCES">Geological Sciences</option>
                                            <option value="ENVIRONMENTAL SCIENCES">Environmental Sciences</option>
                                            <option value="PGD IN COMPUTER SCIENCE (CS)">PGD in Computer Science (CS)</option>
                                            <option value="PGD IN COMPUTER ENGINEERING (CE)">PGD in Computer Engineering (CE)</option>
                                            <option value="PGD IN COMPUTER SCIENCE AND ENGINEERING (CSE)">PGD in Computer Science and Engineering (CSE)</option>
                                            <option value="PGD IN ELECTRONICS AND COMPUTER SCIENCE (ECS)">PGD in Electronics and Computer Science (ECS)</option>
                                            <option value="PGD IN COMPUTER AND INFORMATION TECHNOLOGY (CIT)">PGD in Computer and Information Technology (CIT)</option>
                                            <option value="PGD IN INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)">PGD in Information and Communication Technology (ICT)</option>
                                            <option value="PGD IN INFORMATION TECHNOLOGY (IT)">PGD in Information Technology (IT)</option>
                                            <option value="PGD IN SOFTWARE ENGINEERING (SE)">PGD in Software Engineering (SE)</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('honours.subject') ? $errors->first('honours.subject') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Institution :</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="honours[institute]" required class="form-control" placeholder="Write Your Institution Name"/>
                                        <span class="text-danger">{{$errors->has('honours.institute') ? $errors->first('honours.institute') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Roll No</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="honours[roll]" required class="form-control" placeholder="Roll No"/>
                                        <span class="text-danger">{{$errors->has('honours.roll') ? $errors->first('honours.roll') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Result : </label>
                                    <div class="col-sm-6">
                                        <input type="text" name="honours[result]" required class="form-control" placeholder="Result"/>
                                        <span class="text-danger">{{$errors->has('honours.result') ? $errors->first('honours.result') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Passing Year : </label>
                                    <div class="col-sm-6">
                                        <select name="honours[passing_year]" required id="selector1" class="form-control1">
                                            <option selected="selected" value="">Select One</option>
                                            <option value="1967">1967</option>
                                            <option value="1968">1968</option>
                                            <option value="1969">1969</option>
                                            <option value="1970">1970</option>
                                            <option value="1971">1971</option>
                                            <option value="1972">1972</option>
                                            <option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                            <option value="2018">2018</option>
                                        </select>
                                        <span class="text-danger">{{$errors->has('honours.passing_year') ? $errors->first('honours.passing_year') : ''}}</span>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-4">Course Duration : </label>

                                    <div class="col-sm-6">
                                        <select name="honours[course_duration]" required id="selector1" class="form-control1">
                                            <option selected="selected" value="">Select One</option>
                                            <option value="1">1 Year</option>
                                            <option value="2">2 Years</option>
                                            <option value="3">3 Years</option>
                                            <option value="4">4 Years</option>
                                            <option value="5">5 Years</option>
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
                                                <option value="M.SC (ENGINEERING/ARCHITECTURE)">M.Sc (Engineering/Architecture)</option>
                                                <option value="M.SC (AGRICULTURAL SCIENCE)">M.Sc (Agricultural Science)</option>
                                                <option value="Masters">Masters</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('masters.examination') ? $errors->first('masters.examination') : ''}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Subject : </label>
                                        <div class="col-sm-6">
                                            <select name="masters[subject]" id="selector1" class="form-control1">
                                                <option value="" selected="selected">Select One</option>
                                                <option value="COMPUTER SCIENCE (CS)">Computer Science (CS)</option>
                                                <option value="COMPUTER ENGINEERING (CE)">Computer Engineering (CE)</option>
                                                <option value="COMPUTER SCIENCE AND ENGINEERING (CSE)">Computer Science and Engineering (CSE)</option>
                                                <option value="ELECTRONICS AND COMPUTER SCIENCE (ECS)">Electronics and Computer Science (ECS)</option>
                                                <option value="COMPUTER AND INFORMATION TECHNOLOGY (CIT)">Computer and Information Technology (CIT)</option>
                                                <option value="INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)">Information and Communication Technology (ICT)</option>
                                                <option value="INFORMATION TECHNOLOGY (IT)">Information Technology (IT)</option>
                                                <option value="SOFTWARE ENGINEERING (SE)">Software Engineering (SE)</option>
                                                <option value="Textile Engineering">Textile Engineering</option>
                                                <option value="ELECTRICAL AND ELECTRONICS ENGINEERING (EEE)">Electrical and Electronics Engineering (EEE)</option>
                                                <option value="ELECTRONICS AND TELECOMMUNICATION ENGINEERING (ETE)">Electronics and Telecommunication Engineering (ETE)</option>
                                                <option value="ELECTRONICS AND COMMUNICATION ENGINEERING (ECE)">Electronics and Communication Engineering (ECE)</option>
                                                <option value="CIVIL ENGINEERING (CE)">Civil Engineering (CE)</option>
                                                <option value="MECHANICAL ENGINEERING (ME)">Mechanical Engineering (ME)</option>
                                                <option value="INDUSTRIAL AND PRODUCTION ENGINEERING (IPE)">Industrial and Production Engineering (IPE)</option>
                                                <option value="ARCHITECTURE">Architecture</option>
                                                <option value="MATHEMATICS">Mathematics</option>
                                                <option value="PHYSICS">Physics</option>
                                                <option value="CHEMISTRY">Chemistry</option>
                                                <option value="STATISTICS">Statistics</option>
                                                <option value="GEOLOGICAL SCIENCES">Geological Sciences</option>
                                                <option value="ENVIRONMENTAL SCIENCES">Environmental Sciences</option>
                                                <option value="PGD IN COMPUTER SCIENCE (CS)">PGD in Computer Science (CS)</option>
                                                <option value="PGD IN COMPUTER ENGINEERING (CE)">PGD in Computer Engineering (CE)</option>
                                                <option value="PGD IN COMPUTER SCIENCE AND ENGINEERING (CSE)">PGD in Computer Science and Engineering (CSE)</option>
                                                <option value="PGD IN ELECTRONICS AND COMPUTER SCIENCE (ECS)">PGD in Electronics and Computer Science (ECS)</option>
                                                <option value="PGD IN COMPUTER AND INFORMATION TECHNOLOGY (CIT)">PGD in Computer and Information Technology (CIT)</option>
                                                <option value="PGD IN INFORMATION AND COMMUNICATION TECHNOLOGY (ICT)">PGD in Information and Communication Technology (ICT)</option>
                                                <option value="PGD IN INFORMATION TECHNOLOGY (IT)">PGD in Information Technology (IT)</option>
                                                <option value="PGD IN SOFTWARE ENGINEERING (SE)">PGD in Software Engineering (SE)</option>
                                                <option value="Others">Others</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('masters.group') ? $errors->first('masters.group') : ''}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Institute :</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="masters[institute]" class="form-control" placeholder="Write Your Institute"/>
                                            <span class="text-danger">{{$errors->has('masters.institute') ? $errors->first('masters.institute') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Roll No</label>
                                        <div class="col-sm-6">
                                            <input type="text" name="masters[roll]" required class="form-control" placeholder="Roll No"/>
                                            <span class="text-danger">{{$errors->has('masters.roll') ? $errors->first('masters.roll') : ''}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Result : </label>
                                        <div class="col-sm-6">
                                            <input type="text" name="masters[result]" class="form-control" placeholder="Result"/>
                                            <span class="text-danger">{{$errors->has('masters.result') ? $errors->first('masters.result') : ''}}</span>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-4">Passing Year : </label>
                                        <div class="col-sm-6">
                                            <select name="masters[passing_year]" id="selector1" class="form-control1">
                                                <option selected="selected" value="">Select One</option>
                                                <option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option>
                                                <option value="2014">2014</option>
                                                <option value="2015">2015</option>
                                                <option value="2016">2016</option>
                                                <option value="2017">2017</option>
                                                <option value="2018">2018</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('masters.passing_year') ? $errors->first('masters.passing_year') : ''}}</span>

                                        </div>
                                    </div>
                                    <div class="form-group" style="padding-bottom: 15px;">
                                        <label class="control-label col-md-4">Course Duration : </label>
                                        <div class="col-sm-6">
                                            <select name="masters[course_duration]" id="selector1" class="form-control1">
                                                <option selected="selected" value="">Select One</option>
                                                <option value="1">1 Year</option>
                                                <option value="2">2 Years</option>
                                                <option value="3">3 Years</option>
                                                <option value="4">4 Years</option>
                                                <option value="5">5 Years</option>
                                            </select>
                                            <span class="text-danger">{{$errors->has('masters.course_duration') ? $errors->first('masters.course_duration') : ''}}</span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"> </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-3">
                            <input type="submit" value="Save Student" name="btn" class="btn btn-success btn block" />
                        </div>
                    </div>

                    {{Form::close()}}
                </div>

            </div>
        </div>

    </div>

@endsection