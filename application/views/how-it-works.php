 <!--INNER BANNER START-->

  <section id="inner-banner">

    <div class="container">

      <h1>How it Works</h1>

    </div>

  </section>

  <!--INNER BANNER END--> 

  

  <!--MAIN START-->

  <div id="main"> 

    <!--RECENT JOB SECTION START-->

    <section class="recent-row padd-tb job-detail">

      <div class="container">

        <div class="row">

          <div class="col-md-9 col-sm-8">

            <div id="content-area">

              <div class="box">

             

                <div class="clearfix">

               <span style="color: #ff0000; float:left">PROVIDERS</span>                                                                                                               <span style="color: #0000ff; float:right">CLIENTS</span>

<strong> </strong><br><br>

<span style="color: #ff0000;">REGISTER</span><br>


<p>Sign up for your AxiaTag account providing just a functional email address, desired Username and password. This is a very simple process, a verification email will be sent your e-mail address and you are ready to go.</p>

<span style="color: #ff0000;">VERIFY ACCOUNT</span><br>

<p>As we are committed to running a system based on transparency, integrity and intelligence, all provider will go through verification before participating</p>

<p style="text-align: right;"><span style="color: #0000ff; float:right">POST A PROJECT</span></p><br>
<p>Login if you are already a providing member and post from the “Post a project” button.</p>

<p>If not a member, sign up or simply fill up a job form from the “Post a project” button on the home-page and our team will contact you asap. Upload/share link to necessary files.</p>

<p>We highly recommend you sign up immediately to enable you flow smoothly with the process.</p>

&nbsp;

<span style="color: #ff0000;">BID FOR A PROJECT</span><br>

<p>Bid for project of your strength area specifying your execution budget (your commission + system charge + fixed transaction charge), projected duration, work method statement/proposal (concise but smart) and anyother comment. Attach any necessary reference link.</p>

<span style="color: #ff0000;">WIN PROJECT</span><br>

<p>Via a selection process, the best fit is made from all bidders and a provider is assigned to the project. Provider is informed and needs to accept or reject the offer.</p>

<p style="text-align: right;"><span style="color: #0000ff; float:right">PAY FOR A PROJECT</span></p><br><br>
<p>The Client pays 100% of the project value to Axiatag. The money is retained and only paid to the provider on completing the project. Terms and conditions apply</p>

<span style="color: #ff0000;">EXECUTE A PROJECT</span><br>

<p>Complete the needed tasks while communicating all stakeholders at every stage. A low fidelity prototype/ sample will be required at most stages. Originality of work is highly recommended. Any form of copy work will be thoroughly purnished.</p>
<p style="text-align: right;"><span style="color: #0000ff; float:right">MONITOR PROJECTS</span></p><br><br>

<p>Be part of the execution process by being keeping up to date on the stages of the execution process via AxiaTag project manager</p>

&nbsp;
<p style="text-align: right;"><span style="color: #0000ff; float:right">CONFIRM DELIVERABLES</span></p>
<p>Receive and confirm deliverables and fill the job completion form.</p>


<span style="color: #ff0000;">GET PAID</span>

&nbsp;

&nbsp;

&nbsp;

<p>Provider’s wallet is credited on conclusion of which he can request for fund withdrawal. Provider will get fund within 2 working days.</p>

<p><span style="color: #ff6600;"><strong>Note:</strong> </span>Because of associated data storage capacity, we recommend third party platforms be employed in file sharing. Kindly note that data security is highly recommended therefore employ only secured platforms.</p>
               
                </div>

              </div>

            </div>

          </div>

          <div class="col-md-3 col-sm-4">

         

            <aside>

              <div class="sidebar">

           


                <h2>Featured Projects</h2>

                <div class="sidebar-jobs">
<?php foreach ($featured as $proj): ?>
                  <ul>
					 <?php $string = $proj['title']; ?>
                    <li> <a href="<?php echo base_url('project/'.$proj['project_id']); ?>"><?php echo $string = character_limiter($string, 50); ?></a> <span><?php echo $proj['category']; ?> </span> <span><i class="fa fa-calendar"></i> Posted:<?php  $date = strtotime($proj['date']); ?>
 <?php echo date('j F Y', $date);  ?> </span>
                    
                     <span><i class="fa fa-money"></i>  N<?php echo $proj['mini_budget']; ?> - N<?php echo $proj['max_budget']; ?></span>
                     </li>

                     </ul><hr />

<?php endforeach; ?>
                </div>

              </div>

            </aside>

          </div>

        </div>

      </div>

    </section>

    <!--RECENT JOB SECTION END--> 

  </div>

  <!--MAIN END--> 