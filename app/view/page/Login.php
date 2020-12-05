<div class="container d-flex justify-content-center <?= isset($_SESSION['flash']) ? 'mt-0':'mt-5'?>">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Sign In</div>
                <div style="float:right; font-size: 80%; position: relative; top:-20px"><a href="#">Forgot password?</a></div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >

                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    
                <form id="loginform" action="<?= App::base_url("login")?>" method="post" class="form-horizontal" role="form" >
                            
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                    </div>
                        
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>
                        
                    <div class="input-group">
                        <div class="checkbox">
                        <label>
                            <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                        </label>
                        </div>
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->

                        <div class="col-sm-12 controls">
                            <input type="submit" value="Login" class="btn btn-success">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                Don't have an account! 
                            <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                Sign Up Here
                            </a>
                            </div>
                        </div>
                    </div> 
                       
                </form>     
            </div>                     
        </div>  
    </div>
    <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Sign Up</div>
                <div style="float:right; font-size: 85%; position: relative; top:-20px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a></div>
            </div>  
            <div class="panel-body" style="padding-top:30px">
                <form id="signupform" action="<?= App::base_url("register")?>" method="post" class="form-horizontal" role="form">
                    
                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>
                        
                    <div class="form-group mb-4">
                        <label for="email" class="col-md-3 control-label pl-0">Email</label>
                        <input type="text" class="form-control" name="username" placeholder="Email Address">
                    </div>

                    <div class="form-group mb-4">
                        <label for="password" class="col-md-3 control-label pl-0">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="form-group d-flex justify-content-center">
                        <!-- Button -->                                        
                        <input type="submit" value="Sign Up" class="btn btn-success">
                    </div>
                    
                </form>
            </div>
        </div>                
    </div> 
</div>