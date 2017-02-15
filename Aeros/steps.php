<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Companies House | Mailing List</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="wrapper">
            <div id="tabs">
              <ul>
                <li><a href="#step1">Step 1 - Begin</a></li>
                <li><a href="#step2">Step 2 - Industry</a></li>
                <li><a href="#step3">Step 3 - Organisation Type</a></li>
                <li><a href="#step4">Step 4 - Finances</a></li>
                <li><a href="#step5">Step 5 - Status</a></li>
                <li><a href="#step6">Step 6 - Addressee</a></li>
                <li><a href="#step7">Step 7 - Summary</a></li>
                <li><a href="#step8">Step 8 - Complete</a></li>
              </ul>
              <!-- Start Step -->
              <div id="step1">
                <div class="form-group">
                    <label for="list_name">List Name</label>
                    <input type="text" class="form-control" name="list_name" placeholder="List Name" maxlength="30">
                </div>
                <div class="form-group">
                    <label for="list_size">List Size</label>
                    <input type="text" class="form-control max-value format-number" data-max="10000" name="list_size" placeholder="List Size" maxlength="6">
                </div>
                <div class="form-group">
                    <h4>Location</h4>
                    <div class="radio">
                      <label>
                        <input type="radio" name="location" value="United Kingdom">
                        United Kingdom
                      </label>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="location" data-toggle="tog_option1" value="United Kingdom">
                        Selected Countries of UK
                      </label>
                      <div id="tog_option1" class="hidden-area sub-area form-group">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="country" value="England">
                            England
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="country" value="Wales">
                            Wales
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="country" value="Scotland">
                            Scotland
                          </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="country" value="Northern Ireland">
                            Northern Ireland
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="radio">
                      <label>
                        <input type="radio" name="location" data-toggle="tog_option2" value="Geographic Areas">
                        Geographic Areas
                      </label>
                      <div id="tog_option2" class="hidden-area sub-area form-inline">
                        <div class="form-group">
                            <label for="postal_code">Postal Code</label>
                            <input type="text" class="form-control" name="postal_code" maxlength="7" placeholder="Postal Code">
                          </div>
                          <div class="form-group">
                            <label for="distance">Miles From Location</label>
                            <input type="text" class="form-control" name="distance" placeholder="Distance">
                          </div>
                      </div>
                    </div>
                </div>
              </div>
              <!-- End Step -->
              <!-- Start Step -->
              <div id="step2">
                <h3>SIC List</h3>
                <hr/>
                <table class="generalTable" id="sic-codes">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th class="hidden">Code</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $json = file_get_contents('sic.json');
                            $elements = json_decode($json, true);
                            $counter = 0;

                            foreach ($elements as $elem) {
                                echo '<tr class="section" data-toggle="section-'.$counter.'">';
                                echo '<td><span><strong>+</strong></span></td>';
                                echo '<td class="hidden">'. $elem['code'] .'</td>';
                                echo '<td><strong>'. $elem['description'] .'</strong></td>';
                                echo '</tr>';
                                foreach ($elem['categories'] as $item) {
                                    echo '<tr class="categories section-'.$counter.'">';
                                    echo '<td><input type="checkbox" name="code" value="'. $item['code'] .'"></td>';
                                    echo '<td class="hidden">'. $item['code'] .'</td>';
                                    echo '<td>'. $item['description'] .'</td>';
                                    echo '</tr>';
                                }

                                $counter++;
                            }
                        ?>
                    </tbody>
                </table>
              </div>
              <!-- End Step -->
              <!-- Start Step -->
              <div id="step3">
                <div class="form-group">
                  <h3>Company Type</h3>
                  <hr/>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type_all" data-toggle="company_type" value="all">
                      All Type </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="private-unlimited">
                      Private unlimited company </label>
                      <span class="help-block">Unlimited companies are a fairly rare type of corporation aggregate as each member is jointly and severally liable for the  debts of the company in the event of its winding-up.</span>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="ltd">
                      Private limited company </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="plc">
                      Public limited company </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="old-public-company">
                      Old public company </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="private-limited-guarant-nsc-limited-exemption">
                      Private Limited Company by guarantee without share capital, use of 'Limited' exemption </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="limited-partnership">
                      Limited partnership </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="private-limited-guarant-nsc">
                      Private limited by guarantee without share capital </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="converted-or-closed">
                      Converted / closed </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="private-unlimited-nsc">
                      Private unlimited company without share capital </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="private-limited-shares-section-30-exemption">
                      Private Limited Company, use of 'Limited' exemption </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="assurance-company">
                      Assurance company </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="oversea-company">
                      Overseas company </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="eeig">
                      European economic interest grouping (EEIG) </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="icvc-securities">
                      Investment company with variable capital </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="icvc-warrant">
                      Investment company with variable capital </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="icvc-umbrella">
                      Investment company with variable capital </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="industrial-and-provident-society">
                      Industrial and provident society </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="northern-ireland">
                      Northern Ireland company </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="northern-ireland-other">
                      Credit union (Northern Ireland) </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="llp">
                      Limited liability partnership </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="royal-charter">
                      Royal charter company </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="investment-company-with-variable-capital">
                      Investment company with variable capital </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="unregistered-company">
                      Unregistered company </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="other">
                      Other company type </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="european-public-limited-liability-company-se">
                      European public limited liability company (SE) </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="company_type" value="uk-establishment">
                      UK establishment company </label>
                  </div>
                </div>
              </div>
              <!-- End Step -->
              <!-- Start Step -->
              <div id="step4">
                <div class="form-inline finances-form">
                    <h3>Finances</h3>
                    <hr/>
                    <div class="form-group">
                        <label for="annual_sales_from">Annual Sales (From)</label>
                        <div class="input-group">
                          <div class="input-group-addon">£</div>
                          <input type="text" class="form-control format-number" name="annual_sales_from" placeholder="Amount">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="annual_sales_to">&nbsp; &nbsp; Annual Sales (To)</label>
                        <div class="input-group">
                          <div class="input-group-addon">£</div>
                          <input type="text" class="form-control format-number" name="annual_sales_to" placeholder="Amount">
                        </div>
                    </div>
                </div>
                <div class="form-inline finances-form">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <div class="input-group">
                          <div class="input-group-addon">£</div>
                          <input type="text" class="form-control format-number" name="amount" placeholder="Amount">
                        </div>
                    </div>
                </div>
              </div>
              <!-- End Step -->
              <!-- Start Step -->
              <div id="step5">
                <div class="form-group">
                    <h3>Status</h3>
                    <div class="radio">
                      <strong>Active &nbsp;&nbsp;</strong>
                      <label>
                        <input type="radio" name="status_active" value="Include" checked>
                        Include
                      </label>
                      <label>
                        <input type="radio" name="status_active" value="Exclude">
                        Exclude
                      </label>
                    </div>
                    <div class="radio">
                      <strong>Active Proposal to Strike Off &nbsp;&nbsp;</strong>
                      <label>
                        <input type="radio" name="status_proposal" value="Include">
                        Include
                      </label>
                      <label>
                        <input type="radio" name="status_proposal" value="Exclude" checked>
                        Exclude
                      </label>
                    </div>
                    <div class="radio">
                      <strong>Liquidation &nbsp;&nbsp;</strong>
                      <label>
                        <input type="radio" name="status_liquidation" value="Include">
                        Include
                      </label>
                      <label>
                        <input type="radio" name="status_liquidation" value="Exclude" checked>
                        Exclude
                      </label>
                    </div>
                    <div class="radio">
                      <strong>Dormant &nbsp;&nbsp;</strong>
                      <label>
                        <input type="radio" name="status_dormant" value="Include">
                        Include
                      </label>
                      <label>
                        <input type="radio" name="status_dormant" value="Exclude" checked>
                        Exclude
                      </label>
                    </div>
                    <div class="radio">
                      <strong>Dissolved &nbsp;&nbsp;</strong>
                      <label>
                        <input type="radio" name="status_dissolved" value="Include">
                        Include
                      </label>
                      <label>
                        <input type="radio" name="status_dissolved" value="Exclude" checked>
                        Exclude
                      </label>
                    </div>
                </div>
                <hr/>
                <div class="form-group">
                    <h3>Health</h3>
                    <div class="radio">
                      <strong>Overdue Annual Return &nbsp;&nbsp;</strong>
                      <label>
                        <input type="radio" name="health_overdue_return" value="Include">
                        Include
                      </label>
                      <label>
                        <input type="radio" name="health_overdue_return" value="Exclude" checked>
                        Exclude
                      </label>
                    </div>
                    <div class="radio">
                      <strong>Overdue Accounts &nbsp;&nbsp;</strong>
                      <label>
                        <input type="radio" name="heath_overdue_account" value="Include">
                        Include
                      </label>
                      <label>
                        <input type="radio" name="heath_overdue_account" value="Exclude" checked>
                        Exclude
                      </label>
                    </div>
                    <div class="radio">
                      <strong>Active Charges &nbsp;&nbsp;</strong>
                      <label>
                        <input type="radio" name="heath_active_charges" value="Include">
                        Include
                      </label>
                      <label>
                        <input type="radio" name="heath_active_charges" value="Exclude" checked>
                        Exclude
                      </label>
                    </div>
                </div>
                <hr/>
                <div class="form-group">
                    <h3>Charges</h3>
                    <div class="radio">
                      <strong>Companies with Outstanding Charges &nbsp;&nbsp;</strong>
                      <label>
                        <input type="radio" name="charges_outstanding" value="Include">
                        Include
                      </label>
                      <label>
                        <input type="radio" name="charges_outstanding" value="Exclude" checked>
                        Exclude
                      </label>
                    </div>
                </div>
              </div>
              <!-- End Step -->
              <!-- Start Step -->
              <div id="step6">
                <h3>Addressee</h3>
              </div>
              <!-- End Step -->
              <!-- Start Step -->
              <div id="step7">
                <h3>Summary</h3>
              </div>
              <!-- End Step -->
              <!-- Start Step -->
              <div id="step8">
                <h3>Complete</h3>
              </div>
              <!-- End Step -->
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
