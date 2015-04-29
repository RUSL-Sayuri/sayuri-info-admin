<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function navigator($active_id) {
    // key = controller name, value = text
    $pages = array(
        'home' => 'Home',
        'students' => 'Students',
        'howitworks' => 'How it Works',
        'aboutus' => 'About Us',
        'contacts' => 'Contacts'
    );
    $return_string = "";
    $i = 0;
    foreach ($pages as $key => $value) {
        if ($i == $active_id) {
            $return_string .= '<li class="active"><a href="' . base_url('index.php/' . $key) . '">' . $value . '</a></li>';
        } else {
            $return_string .= '<li><a href="' . base_url('index.php/' . $key) . '">' . $value . '</a></li>';
        }
        $i++;
    }
    $return_string.='<li class="pull-right"><a href="http://www.twitter.com/colouradream"><img height="30" src="' . base_url('assests/images/icon4.jpg') . '"/></a></li>
                    <li class="pull-right"><a href="https://www.facebook.com/IMCD.ColourADream"><img height="30" src="' . base_url('assests/images/icon1.jpg') . '"/></a></li>
                    <li class="pull-right"><a href="http://www.imcds.org/"><img width="80" src="' . base_url('assests/images/imcd.jpg') . '"/></a></li>';
    return $return_string;
}

function carousel() {
    ?>
    <div class="carousel slide" id="carousel-50962">
        <ol class="carousel-indicators">
            <li class="active" data-slide-to="0" data-target="#carousel-50962">
            </li>
            <li data-slide-to="1" data-target="#carousel-50962">
            </li>
            <li data-slide-to="2" data-target="#carousel-50962">
            </li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img alt="" src="<?php echo base_url('assests/images/bg1.png'); ?>" />
                <div class="carousel-caption">
                    <h4>
                        First Thumbnail label
                    </h4>
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                </div>
            </div>
            <div class="item">
                <img alt="" src="<?php echo base_url('assests/images/bg1.png'); ?>" />
                <div class="carousel-caption">
                    <h4>
                        Second Thumbnail label
                    </h4>
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                </div>
            </div>
            <div class="item">
                <img alt="" src="<?php echo base_url('assests/images/bg1.png'); ?>" />
                <div class="carousel-caption">
                    <h4>
                        Third Thumbnail label
                    </h4>
                    <p>
                        Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.
                    </p>
                </div>
            </div>
        </div> 
        <a class="left carousel-control" href="#carousel-50962" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-50962" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <?php
}

function featuredProjects() {
    ?>
    <h3 style="margin-top: 30px; margin-bottom: 15px" class="text-center">
        Featured Projects
    </h3>
    <h4>
        Needy Readers
    </h4>
    <p class="text-justify">
        Uplifting educational standards. Under this project it is expected to facilitate reading material to selected underprivileged schools.
    </p>
    <p>
        <a class="btn" href="http://imcds.org/index.php/imcd-projects/needy-readers">View details »</a>
    </p>
    <h4>
        Colour A Dream
    </h4>
    <p class="text-justify">
        Where anyone can help to make a child's dream come true based on what we believe "From the society, To the society, With the society".
    </p>
    <p>
        <a class="btn" href="<?php echo base_url(); ?>">View details »</a>
    </p>
    <?php
}
