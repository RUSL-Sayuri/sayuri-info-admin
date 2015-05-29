<?php
$this->load->view("partial/header");
$this->load->helper(array('htmlgenerator', 'form'));
?>
</head>
<body class="">
    <!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->

    <!-- HEADER -->
    <?php $this->load->view('partial/page_header'); ?>
    <!-- END HEADER -->

    <!-- Left panel : Navigation area -->
    <!-- Note: This width of the aside area can be adjusted through LESS variables -->
    <?php navigation($this->session->userdata('username'), 'article'); ?>
    <!-- END NAVIGATION -->

    <!-- MAIN PANEL -->
    <div id="main" role="main">

        <!-- RIBBON -->
        <div id="ribbon">

            <span class="ribbon-button-alignment"> <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true"><i class="fa fa-refresh"></i></span> </span>

            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li>Home</li><li>Articles</li>
            </ol>
            <!-- end breadcrumb -->

            <!-- You can also add more buttons to the
            ribbon for further usability

            Example below:

            <span class="ribbon-button-alignment pull-right">
            <span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
            <span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
            <span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
            </span> -->

        </div>
        <!-- END RIBBON -->

        <!-- MAIN CONTENT -->
        <div id="content">

            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark">
                        <i class="fa fa-edit fa-fw "></i> 
                        Articles
                    </h1>
                </div>

            </div>



            <!-- widget grid -->
            <section id="widget-grid" class="">


                <div class="row">

                    <!-- NEW COL START -->
                    <article class="col-sm-12 col-md-12 col-lg-12">

                        <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false">
                            <!-- widget options:
                            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                            data-widget-colorbutton="false"
                            data-widget-editbutton="false"
                            data-widget-togglebutton="false"
                            data-widget-deletebutton="false"
                            data-widget-fullscreenbutton="false"
                            data-widget-custombutton="false"
                            data-widget-collapsed="true"
                            data-widget-sortable="false"

                            -->
                            <header>
                                <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                                <h2>Standard Data Tables </h2>

                            </header>

                            <!-- widget div-->
                            <div>

                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->

                                </div>
                                <!-- end widget edit box -->

                                <!-- widget content -->
                                <div class="widget-body no-padding">
                                    <div class="widget-body-toolbar">

                                    </div>

                                    <table id="dt_basic" class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Author</th>
                                                <th>Description</th>
                                                <th>Type</th>
                                                <th>Edit</th>
                                                <th>Publish</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($articles->result() as $article) {
                                                echo "<tr id='$article->id'>";
                                                echo "<td>$article->id</td>";
                                                echo "<td>$article->title</td>";
                                                echo "<td>$article->author</td>";
                                                echo "<td>$article->description</td>";
                                                echo "<td>$article->type</td>";
                                                echo "<td><a href='" . site_url('article/edit_article/' . $article->id) . "' class='btn btn-xs btn-info'>Edit</a></td>";
                                                if ($article->published == 1) {
                                                    echo "<td><a href='" . site_url('article/unpublish_article/' . $article->id) . "' class='btn btn-xs btn-danger'>Unpublish</a></td>";
                                                } else {
                                                    echo "<td><a href='" . site_url('article/publish_article/' . $article->id) . "' class='btn btn-xs btn-info'>Publish</a></td>";
                                                }
                                                echo '</tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- end widget content -->

                            </div>
                            <!-- end widget div -->

                        </div>

                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget" id="wid-id-1" data-widget-deletebutton="false" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false">
                            <!-- widget options:
                            usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

                            data-widget-colorbutton="false"
                            data-widget-editbutton="false"
                            data-widget-togglebutton="false"
                            data-widget-deletebutton="false"
                            data-widget-fullscreenbutton="false"
                            data-widget-custombutton="false"
                            data-widget-collapsed="true"
                            data-widget-sortable="false"

                            -->
                            <header>
                                <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
                                <h2>Add new Article</h2>

                            </header>

                            <!-- widget div-->
                            <div>

                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->

                                </div>
                                <!-- end widget edit box -->

                                <!-- widget content -->
                                <div class="widget-body no-padding">
                                    <?php
                                    if (validation_errors() != '') {
                                        ?>
                                        <label class="alert alert-danger">
                                            <?php
                                            echo validation_errors();
                                            ?>
                                        </label>
                                        <?php
                                    }
                                    if (isset($error)) {
                                        ?>
                                        <label class="alert alert-danger">
                                            <?php
                                            echo $error;
                                            ?>
                                        </label>
                                        <?php
                                    }

                                    if (isset($success)) {
                                        ?>
                                        <label class="alert alert-success">
                                            <?php
                                            echo $success;
                                            ?>
                                        </label>
                                        <?php
                                    }
                                    ?>

                                    <form class="smart-form" role="form" action="<?php echo site_url('/article/new_article'); ?>" method="POST" enctype="multipart/form-data">

                                        <fieldset>
                                            <section>
                                                <label class="label">Title</label>
                                                <label class="input">
                                                    <input name="article_title" type="text">
                                                </label>
                                            </section>

                                            <section>
                                                <label class="label">Description</label>
                                                <label class="textarea textarea-resizable">
                                                    <textarea rows="3" class="custom-scroll" name="article_description" id="article_description"></textarea>
                                                </label>

                                            </section>

                                            <section>
                                                <label class="label">Article Content</label>
                                                <label class="textarea textarea-resizable">
                                                    <textarea rows="3" class="custom-scroll" name="article_content" id="article_content"></textarea>
                                                </label>
                                            </section>

                                            <section>
                                                <label class="label">Author(s)</label>
                                                <label class="input">
                                                    <input name="article_author" type="text">
                                                </label>
                                            </section>


                                            <section>
                                                <label class="label">Type of Article</label>
                                                <label class="select">
                                                    <select name="article_type">
                                                        <option value="newspaper">Newspaper</option>
                                                        <option value="research">Research Publication</option>
                                                        <option value="web">Web Article</option>
                                                    </select> <i></i> 
                                                </label>
                                            </section>

                                            <section>
                                                <label class="label">Image</label>
                                                <div class="input input-file">
                                                    <span class="button"><input type="file" id="article_image_file" name="article_image_file" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Select Image file" readonly="">
                                                </div>
                                            </section>
                                            <section>
                                                <label class="label">Attachment</label>
                                                <div class="row">
                                                    <div class="col col-6">
                                                        <label class="toggle">
                                                            <input type="checkbox" name="article_downloadable" checked="checked">
                                                            <i data-swchon-text="Yes" data-swchoff-text="No"></i>Downloadable
                                                        </label>
                                                    </div>
                                                    <div class="col col-6">
                                                        <div class="input input-file">
                                                            <span class="button"><input type="file" id="article_attachment" name="article_attachment" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" placeholder="Select Attachment" readonly="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                        </fieldset>

                                        <footer>
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                            <button type="button" class="btn btn-default" onclick="window.history.back();">
                                                Back
                                            </button>
                                        </footer>
                                    </form>

                                </div>
                                <!-- end widget content -->

                            </div>
                            <!-- end widget div -->

                        </div>




                    </article>


                </div>


            </section>



        </div>

        <!-- END MAIN CONTENT -->

    </div>
    <!-- END MAIN PANEL -->

    <!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
    Note: These tiles are completely responsive,
    you can add as many as you like
    -->
    <div id="shortcut">
        <ul>
            <li>
                <a href="#inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
            </li>
            <li>
                <a href="#calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
            </li>
            <li>
                <a href="#gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
            </li>
            <li>
                <a href="#invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
            </li>
            <li>
                <a href="#gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
            </li>
            <li>
                <a href="javascript:void(0);" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
            </li>
        </ul>
    </div>
    <!-- END SHORTCUT AREA -->

    <?php
    $this->load->view("partial/footer");
    ?>

    <script src="<?php echo base_url('assests/js/plugin/datatables/jquery.dataTables-cust.min.js') ?>"></script>
    <script src="<?php echo base_url('assests/js/plugin/datatables/ColReorder.min.js') ?>"></script>
    <script src="<?php //echo base_url('assests/js/plugin/datatables/FixedColumns.min.js')      ?>"></script>
    <script src="<?php echo base_url('assests/js/plugin/datatables/ColVis.min.js') ?>"></script>
    <script src="<?php echo base_url('assests/js/plugin/datatables/ZeroClipboard.js') ?>"></script>
    <script src="<?php echo base_url('assests/js/plugin/datatables/media/js/TableTools.min.js') ?>"></script>
    <script src="<?php echo base_url('assests/js/plugin/datatables/DT_bootstrap.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assests/js/plugin/nicEdit/nicEdit.js'); ?>"></script> 
    <script type="text/javascript">
                                                bkLib.onDomLoaded(function () {
                                                    new nicEditor().panelInstance('article_description');
                                                    new nicEditor().panelInstance('article_content');
                                                });
    </script>


    <script>
        $(document).ready(function () {

            // DO NOT REMOVE : GLOBAL FUNCTIONS!
            pageSetUp();
            /*
             * PAGE RELATED SCRIPTS
             */

            $('#dt_basic').dataTable({
                "sPaginationType": "bootstrap_full"
            });

            $(".js-status-update a").click(function () {
                var selText = $(this).text();
                var $this = $(this);
                $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
                $this.parents('.dropdown-menu').find('li').removeClass('active');
                $this.parent().addClass('active');
            });

//$.bigBox({
//                title: "Big Information box",
//                content: "This message will dissapear in 6 seconds!",
//                color: "#C46A69",
//                //timeout: 6000,
//                icon: "fa fa-warning shake animated",
//                number: "1",
//                timeout: 6000
//            });




        });</script>

    <!-- Your GOOGLE ANALYTICS CODE Below -->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-XXXXXXXX-X']);
        _gaq.push(['_trackPageview']);
        (function () {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();

    </script>

</body>

</html>