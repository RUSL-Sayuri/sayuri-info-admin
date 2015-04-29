<?php
$this->load->view('partial/header');
$this->load->helper(array('form', 'bootstrapForm', 'htmlgenerator'));
?>
</head>

<body>
    <div class="container">
        <div style="margin-top: 120px" class="row clearfix">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 well">
                <center><h1 class="h1">Sign in</h1></center>
                <?php
                if (validation_errors() != '') {
                    ?>
                    <label class="alert alert-danger"><?php
                        echo validation_errors();
                        ?></label>
                    <?php
                }

                if (isset($result)) {
                    ?>
                    <label class="alert alert-danger"><?php
                        echo $result
                        ?></label>
                    <?php
                }
                if (isset($result_success)) {
                    ?>
                    <label class="alert alert-success"><?php
                        echo $result_success
                        ?></label>
                    <?php
                }
                echo form_open('user/loginCheck', array('role' => 'form'));
                echo form_input_div(array('id' => 'username', 'name' => 'username', 'type' => 'text', 'placeholder' => 'Username', 'class' => 'form-control', 'label' => 'Username'), set_value('username'));
                echo form_input_div(array('id' => 'password', 'name' => 'password', 'type' => 'password', 'placeholder' => 'Passsword', 'class' => 'form-control', 'label' => 'Password'), set_value('password'));
                echo form_submit(array('id' => 'submit', 'name' => 'submit', 'class' => 'btn btn-success'), 'Sign in');
                echo form_close();
                ?>
            </div>
            
        </div>


    </div>
</body>

<?php
$this->load->view('partial/footer');
?>