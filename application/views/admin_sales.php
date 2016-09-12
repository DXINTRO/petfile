        <div class="panel panel-default" id="adminUsersOrder">
          <!-- Default panel contents -->
          <div class="panel-heading">Sales Report</div>
          <div class="panel-body">
          <div>
            <p>Only confirmed transactions are being calculated here.</p>
          </div>
          <div class="panel panel-default panelAddEditUser">
                    <div class="panel-heading clearfix">
                      <a style="color:#000000;" data-toggle="collapse" data-parent="#accordion" href="#generateSalesReport">
                      <span class="glyphicon glyphicon-hand-right"></span> 
                        <h3 class="panel-title" style="display:inline;">Generate Report</h3>
                      </a>
                      
                    </div>
                    <div class="panel-body panel-collapse collapse" id="generateSalesReport">
                      <div class="alert alert-danger" style="display:none;">
                                <button type="button" class="close" data-hide="alert" aria-hidden="true">&times;</button>
                                <strong></strong>
                      </div>
                       <form action="generateSalesReport" method="POST" id="generatePDF">

                        <div clas="row">
                          <div class="col-md-12">
                          <label> Mode:</label>
                          </div>
                          <div class="col-md-12">
                           <select class="form-control reportMode" name="reportMode">
                              <option value="Daily">Daily</option>
                              <option value="Weekly">Weekly</option>
                              <option value="Monthly">Monthly</option>
                            </select>
                          </div>
                        </div>       
                        <br />             
                    <div class="row">

                      
                    <div class="col-md-6 noPadding">
                      <div class="col-md-12">
                      <label> From</label>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control reportMonthFrom" name="reportMonthFrom">
                          <option value="01">January</option>
                          <option value="02">February</option>
                          <option value="03">March</option>
                          <option value="04">April</option>
                          <option value="05">May</option>
                          <option value="06">June</option>
                          <option value="07">July</option>
                          <option value="08">August</option>
                          <option value="09">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control reportYearFrom" name="reportYearFrom">
                          <option value="0">Year</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989">1989</option>
                          <option value="1988">1988</option>
                        </select>
                      </div>
                    </div>
               
                   <div class="col-md-6 noPadding">
                      <div class="col-md-12">
                      <label> To</label>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control reportMonthTo" name="reportMonthTo">
                          <option value="01">January</option>
                          <option value="02">February</option>
                          <option value="03">March</option>
                          <option value="04">April</option>
                          <option value="05">May</option>
                          <option value="06">June</option>
                          <option value="07">July</option>
                          <option value="08">August</option>
                          <option value="09">September</option>
                          <option value="10">October</option>
                          <option value="11">November</option>
                          <option value="12">December</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <select class="form-control reportYearTo" name="reportYearTo">
                          <option value="0">Year</option>
                          <option value="2014">2014</option>
                          <option value="2013">2013</option>
                          <option value="2012">2012</option>
                          <option value="2011">2011</option>
                          <option value="2010">2010</option>
                          <option value="2009">2009</option>
                          <option value="2008">2008</option>
                          <option value="2007">2007</option>
                          <option value="2006">2006</option>
                          <option value="2005">2005</option>
                          <option value="2004">2004</option>
                          <option value="2003">2003</option>
                          <option value="2002">2002</option>
                          <option value="2001">2001</option>
                          <option value="2000">2000</option>
                          <option value="1999">1999</option>
                          <option value="1998">1998</option>
                          <option value="1997">1997</option>
                          <option value="1996">1996</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>
                          <option value="1993">1993</option>
                          <option value="1992">1992</option>
                          <option value="1991">1991</option>
                          <option value="1990">1990</option>
                          <option value="1989">1989</option>
                          <option value="1988">1988</option>
                        </select>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                  <div class="col-md-12 clearfix">
                    <button type="submit" class="btn btn-sm btn-info" style="float:right;margin-top:10px;" id="generateReservationReport">Generate Report</button>
                  </div>
                    </div>
                  </form>

                  </div>
              </div>

          </div>
        </div>
      


      <div class="footer">
        <p> &copy; Company 2013</p>
      </div>

    