        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!-- LOGO -->
                    <a href="index-2.html" class="logo text-center mb-4">
                        <span class="logo-lg" style="font-weight: 900">
                            <img src="assets/images/travlockSide.jpg" alt="" height="50">
                        </span>
                        <span class="logo-sm">
                            <img src="assets/images/travlockSide.jpg" alt="" height="50">
                        </span>
                    </a>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                            <!-- <li class="menu-title">Navigation</li> -->

                            <li>
                                <a href="dashboard.php">
                                    <i class="fe-airplay"></i>
                                   <!--  <span class="badge badge-success float-right">08</span> -->
                                    <span> Dashboard </span>
                                </a>
                            </li>

                              <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-layers"></i>
                                    <span> Hotel </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="add_hotel.php">Add New</a>
                                    </li>
                                    <li>
                                        <a href="search_hotel.php">Search Hotel</a>
                                    </li> 
                                    <?php if($_SESSION['adminId'] == 1){ ?>
                                    <li>
                                        <a href="update_hotel.php">Update Hotel</a>
                                    </li>

                                   <!--  <li>
                                        <a href="addAmenities.php">Add Amenities</a>
                                    </li> -->
                                    

                                    <!-- <li>
                                        <a href="addAgent.php">Add Agent</a>
                                    </li> -->
                                   <!--  <li>
                                        <a href="request.php">Request for Approval</a>
                                    </li> -->
                                <?php } ?>
                                                                       
                                </ul>
                            </li>
                             <?php
                                    // <!-- SQL Query in request page line no. 17-26 -->
                                $sql_approve = "SELECT * FROM `add_update_hotels` WHERE `approval` = ''";
                                     $result_approve = mysqli_query($conn, $sql_approve);
                                     $count = mysqli_num_rows($result_approve);

                                $sql_disapprove = "SELECT * FROM `add_update_hotels` WHERE `approval` = 'Disapproved'";
                                     $result_dis = mysqli_query($conn, $sql_disapprove);
                                     $dis_count = mysqli_num_rows($result_dis);
                                          
                                 ?>
                            <?php if($_SESSION['adminId'] == 1){ ?>
                            <li>
                                <a href="addHotelFiles.php">
                                    <i class="fe-file-plus"></i>
                                    <span> Add Hotels(Files) </span>
                                </a>
                            </li>
                            <li>
                                <a href="addAmenities.php">
                                    <i class="mdi mdi-book-plus"></i>
                                    <span> Add Amenities </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-git-pull-request"></i>
                                    <span> Request </span>
                                
                                    <span class="badge badge-danger rounded-circle noti-icon-badge" style="margin-bottom: 4px;"><?php echo isset($count)?$count:''; ?></span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="request.php"> Request<span class="badge badge-success float-right"><?php echo isset($count)?$count:''; ?></span> </a>
                                    </li>
                                    <li>
                                        <a href="disapprovedHotel.php">Disapproved Hotel<span class="badge badge-danger float-right"><?php echo isset($dis_count)?$dis_count:''; ?></span></a>
                                    </li>
                                    <!-- <li>
                                        <a href="components-ribbons.html">Ribbons</a>
                                    </li>
                                    <li>
                                        <a href="components-sweet-alerts.html">Sweet Alerts</a>
                                    </li> -->
                                </ul>
                            </li>

                            <li>
                                <a href="addAgent.php">
                                    <i class="fe-user-plus"></i>
                                    <span> Add Agent </span>
                                </a>
                            </li>
                            <?php } else{ ?>
                            <li>
                                <a href="addAmenities.php">
                                    <!-- <i class="fe-briefcase"></i> -->
                                    <span class="badge badge-danger float-right"><?php echo isset($dis_count)?$dis_count:''; ?></span>
                                    <span> Disapproved hotel </span>
                                </a>
                            </li>
                        <?php } ?>
                           <!--  <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-bookmark"></i>
                                    <span class="badge badge-secondary float-right">Hot</span>
                                    <span> Forms </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="form-elements.html">General Elements</a>
                                    </li>
                                    <li>
                                        <a href="form-advanced.html">Advanced Form</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="charts.html">
                                    <i class="fe-bar-chart-2"></i>
                                    <span> Charts </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-grid"></i>
                                    <span> Tables </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="tables-basic.html">Basic Tables</a>
                                    </li>
                                    <li>
                                        <a href="tables-advanced.html">Advanced Tables</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="menu-title">More</li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-sidebar"></i>
                                    <span> Layouts </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="layouts-light-sidebar.html">Light Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="layouts-sm-sidebar.html">Small Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="layouts-dark-sidebar.html">Dark Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="layouts-light-topbar.html">Light Topbar</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="maps.html">
                                    <i class="fe-map"></i>
                                    <span> Maps </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-cpu"></i>
                                    <span> Icons </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="icons-feather.html">Feather Icons</a>
                                    </li>
                                    <li>
                                        <a href="icons-mdi.html">Material Design Icons</a>
                                    </li>
                                    <li>
                                        <a href="icons-dripicons.html">Dripicons</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-package"></i>
                                    <span> Pages </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li>
                                        <a href="pages-calendar.html">Calendar</a>
                                    </li>
                                    <li>
                                        <a href="pages-timeline.html">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="pages-invoice.html">Invoice</a>
                                    </li>
                                    <li>
                                        <a href="pages-contacts.html">Contacts</a>
                                    </li>
                                    <li>
                                        <a href="pages-login.html">Login</a>
                                    </li>
                                    <li>
                                        <a href="pages-register.html">Register</a>
                                    </li>
                                    <li>
                                        <a href="pages-recoverpw.html">Recover Password</a>
                                    </li>
                                    <li>
                                        <a href="pages-lock-screen.html">Lock Screen</a>
                                    </li>
                                    <li>
                                        <a href="pages-404.html">Error 404</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-folder-plus"></i>
                                    <span> Multi Level </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level nav" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);">Level 1.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <ul class="nav-third-level nav" aria-expanded="false">
                                            <li>
                                                <a href="javascript: void(0);">Level 2.1</a>
                                            </li>
                                            <li>
                                                <a href="javascript: void(0);">Level 2.2</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->