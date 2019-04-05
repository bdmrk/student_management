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