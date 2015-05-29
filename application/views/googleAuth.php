<?php
$this->load->view('partial/header');
$this->load->helper(array('form', 'bootstrapForm', 'htmlgenerator'));
?>
</head>
<body>
    <div class="container">
        <div style="margin-top: 120px" class="row clearfix">
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <p class="alert alert-info text-align-center">
                    <b>Your Google account is not authorized.</b><br>
                    You will automatically be redirected to Google Account Authorization in <span id="sec">5</span> seconds<br/>
                    If automatically not redirected, <a href="<?php echo $auth; ?>">Click Here</a>.
                </p>
            </div>
        </div>
    </div>
</body>

<?php
$this->load->view('partial/footer');
?>
<script type="text/javascript">
    $(document).ready(function () {
        sec = 5;
        interval = setInterval(function () {
            if (sec > 0) {
                sec--;
                $("#sec").html(sec);
            } else {
                clearInterval(interval);
                window.location.href = "<?php echo $auth; ?>";
            }
        }, 1000);
    });
</script>