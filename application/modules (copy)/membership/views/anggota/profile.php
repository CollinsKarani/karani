<div class="wraper container-fluid">
        <div class="row">
                <div class="col-sm-12">
                        <div class="bg-picture text-center" style="background-image:url('<?= base_url('assets/images/big/bg.jpg') ?>')">
                                <div class="bg-picture-overlay"></div>
                                <div class="profile-info-name">
                                        <img src="<?= base_url('assets/images/users/avatar-1.jpg') ?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                        <h3 class="text-white"><?= $query['nameUser'] ?></h3>
                                </div>
                        </div>
                </div>
        </div>
        <div class="row user-tabs">
                <div class="col-lg-6 col-md-9 col-sm-9">
                        <ul class="nav nav-tabs tabs">
                                <li class="tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false" class="">
                                                <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                                <span class="hidden-xs">About Me</span>
                                        </a>
                                </li>
                                <li class="tab">
                                        <a href="#profile-2" data-toggle="tab" aria-expanded="false">
                                                <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                                <span class="hidden-xs">Activities</span>
                                        </a>
                                </li>
                                <li class="tab">
                                        <a href="#messages-2" data-toggle="tab" aria-expanded="true">
                                                <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                                <span class="hidden-xs">Projects</span>
                                        </a>
                                </li>
                                <div class="indicator"></div>
                        </ul>
                </div>
                <div class="col-lg-6 col-md-3 col-sm-3 hidden-xs">
                        <div class="pull-right">
                                <div class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle btn-rounded btn btn-primary waves-effect waves-light" href="#">
                                                Following <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                <li><a href="#">Poke</a></li>
                                                <li><a href="#">Private message</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Unfollow</a></li>
                                        </ul>
                                </div>
                        </div>
                </div>
        </div>

        <div class="row">
                <div class="col-lg-12">
                        <div class="tab-content profile-tab-content">
                                <div class="tab-pane active" id="home-2">
                                        <div class="row">
                                                <div class="col-md-4">
                                                        <div class="panel panel-default panel-fill">
                                                                <div class="panel-heading">
                                                                        <h3 class="panel-title">Personal Information</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                        <div class="about-info-p">
                                                                                <strong>Full Name</strong>
                                                                                <br>
                                                                                <p class="text-muted"><?= $query['nameUser'] ?></p>
                                                                        </div>
                                                                        <div class="about-info-p">
                                                                                <strong>Email</strong>
                                                                                <br>
                                                                                <p class="text-muted"><?= $query['emailUser'] ?></p>
                                                                        </div>
                                                                        <div class="about-info-p m-b-0">
                                                                                <strong>Location</strong>
                                                                                <br>
                                                                                <p class="text-muted">
                                                                                        <?= $query['nama_kota'].", ".$query['nama_provinsi'] ?>
                                                                                </p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                        <div class="panel panel-default panel-fill">
                                                                <div class="panel-heading">
                                                                        <h3 class="panel-title">Languages</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                        <ul>
                                                                                <li>English</li>
                                                                                <li>Franch</li>
                                                                                <li>Greek</li>
                                                                        </ul>
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="col-md-8">
                                                        <div class="panel panel-default panel-fill">
                                                                <div class="panel-heading">
                                                                        <h3 class="panel-title">Biography</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                        <p><?= $query['aboutMe'] ?></p>
                                                                </div>
                                                        </div>
                                                        <div class="panel panel-default panel-fill">
                                                                <div class="panel-heading">
                                                                        <h3 class="panel-title">Skills</h3>
                                                                </div>
                                                                <div class="panel-body">
                                                                        <div class="m-b-15">
                                                                                <h5>Angular Js <span class="pull-right">60%</span></h5>
                                                                                <div class="progress">
                                                                                        <div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                                                                                <span class="sr-only">60% Complete</span>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="m-b-15">
                                                                                <h5>Javascript <span class="pull-right">90%</span></h5>
                                                                                <div class="progress">
                                                                                        <div class="progress-bar progress-bar-pink wow animated progress-animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                                                                <span class="sr-only">90% Complete</span>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="m-b-15">
                                                                                <h5>Wordpress <span class="pull-right">80%</span></h5>
                                                                                <div class="progress">
                                                                                        <div class="progress-bar progress-bar-purple wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                                                                                <span class="sr-only">80% Complete</span>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <div class="m-b-0">
                                                                                <h5>HTML5 &amp; CSS3 <span class="pull-right">95%</span></h5>
                                                                                <div class="progress">
                                                                                        <div class="progress-bar progress-bar-info wow animated progress-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
                                                                                                <span class="sr-only">95% Complete</span>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="tab-pane" id="profile-2">
                                        <div class="panel panel-default panel-fill">
                                                <div class="panel-body">
                                                        <div class="timeline-2">
                                                                <div class="time-item">
                                                                        <div class="item-info"><div class="text-muted">5 minutes ago
                                                                        </div>
                                                                        <p>
                                                                                <strong><a href="#" class="text-info">John Doe</a></strong> 
                                                                                Uploaded a photo 
                                                                                <strong>"DSC000586.jpg"</strong>
                                                                        </p>
                                                                </div>                                                                
                                                        </div>
                                                        <div class="time-item">
                                                                <div class="item-info">
                                                                        <div class="text-muted">30 minutes ago</div>
                                                                        <p>
                                                                                <a href="#" class="text-info">Lorem</a> commented your post.
                                                                        </p>
                                                                        <p>
                                                                                <em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                                                        </p>
                                                                </div>

                                                        </div>
                                                        <div class="time-item">
                                                                <div class="item-info">
                                                                        <div class="text-muted">59 minutes ago</div>
                                                                        <p>
                                                                                <a href="#" class="text-info">Jessi</a> attended a meeting with
                                                                                <a href="#" class="text-success">John Doe</a>.
                                                                        </p>
                                                                        <p>
                                                                                <em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                                                        </p>
                                                                </div>
                                                        </div>
                                                        <div class="time-item">
                                                                <div class="item-info">
                                                                        <div class="text-muted">5 minutes ago</div>
                                                                        <p>
                                                                                <strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos
                                                                        </p>
                                                                </div>
                                                        </div>
                                                        <div class="time-item">
                                                                <div class="item-info">
                                                                        <div class="text-muted">30 minutes ago</div>
                                                                        <p>
                                                                                <a href="#" class="text-info">Lorem</a> commented your post.
                                                                        </p>
                                                                        <p>
                                                                                <em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                                                        </p>
                                                                </div>
                                                        </div>
                                                        <div class="time-item">
                                                                <div class="item-info">
                                                                        <div class="text-muted">59 minutes ago</div>
                                                                        <p>
                                                                                <a href="#" class="text-info">Jessi</a> attended a meeting with
                                                                                <a href="#" class="text-success">John Doe</a>.
                                                                        </p>
                                                                        <p>
                                                                                <em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em>
                                                                        </p>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="tab-pane" id="messages-2">
                                <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                                <h3 class="panel-title">My Projects</h3>
                                        </div>
                                        <div class="panel-body">
                                                <div class="table-responsive">
                                                        <table class="table">
                                                                <thead>
                                                                        <tr>
                                                                                <th>#</th>
                                                                                <th>Project Name</th>
                                                                                <th>Start Date</th>
                                                                                <th>Due Date</th>
                                                                                <th>Status</th>
                                                                                <th>Assign</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <tr>
                                                                                <td>1</td>
                                                                                <td>Moltran Admin</td>
                                                                                <td>01/01/2015</td>
                                                                                <td>07/05/2015</td>
                                                                                <td><span class="label label-info">Work in Progress</span></td>
                                                                                <td>Coderthemes</td></tr><tr>
                                                                                <td>2</td>
                                                                                <td>Moltran Frontend</td>
                                                                                <td>01/01/2015</td>
                                                                                <td>07/05/2015</td>
                                                                                <td><span class="label label-success">Pending</span></td>
                                                                                <td>Coderthemes</td></tr><tr>
                                                                                <td>3</td>
                                                                                <td>Moltran Admin</td>
                                                                                <td>01/01/2015</td>
                                                                                <td>07/05/2015</td>
                                                                                <td><span class="label label-pink">Done</span></td>
                                                                                <td>Coderthemes</td></tr><tr>
                                                                                <td>4</td>
                                                                                <td>Moltran Frontend</td>
                                                                                <td>01/01/2015</td>
                                                                                <td>07/05/2015</td>
                                                                                <td><span class="label label-purple">Work in Progress</span></td>
                                                                                <td>Coderthemes</td>
                                                                        </tr>
                                                                        <tr>
                                                                                <td>5</td>
                                                                                <td>Moltran Admin</td>
                                                                                <td>01/01/2015</td>
                                                                                <td>07/05/2015</td>
                                                                                <td><span class="label label-warning">Coming soon</span></td>
                                                                                <td>Coderthemes</td>
                                                                        </tr>
                                                                </tbody>
                                                        </table>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</div>