 <!--INNER BANNER START-->

  <section id="inner-banner">

    <div class="container">

      <h1>About Us</h1>

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

                  <h4>About Us</h4>

             



<p>At AxiaTag we work to develop an efficient and flexible virtual assistance and service provision and focused in providing value for both our clients and providers.</p>

<p>Developed in 2015, AxiaTag is a leading online marketplace devoted and aimed at building the best network of values.</p>

<p>We hope to see you come home and sleep through the night knowing we have got your back for any task that would have kept you up at night.</p>

<p>Our mission at AxiaTag is to develop and sustain an innovative system to provide the best cost effective solutions to virtual freelancing and service provisions.</p>

<p>As the name implies, (Axia from a greek word for Value) we are committed providing service with nothing but a value tag.</p>

 

 

<h4>Value proposition</h4>
<ul>
    <li>To provide our clients with source of service provision around a wide range of service categories.</li>
   <li> To provide a secured medium of operation and management.</li>
    <li>To provide an optimal revenue stream for our providers.</li>
</ul>

             
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