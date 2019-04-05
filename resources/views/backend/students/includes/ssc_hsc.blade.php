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