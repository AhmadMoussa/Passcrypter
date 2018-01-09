<!-- template for account category -->
<div class="container" id="category" style="display: none;">
	<!-- site type -->
    <div class="container">
        <div class="row" id="tag"> 
            <div class="col-md-12">
                <h4 class="h4-responsive"> @tag <span id="tagCount" class="text-muted">(@count)</span></h4>
            </div>
        </div>

        <hr>
    </div>
</div>

<!-- template for row -->
<div id="rowTemplate" style="display: none;">
    <div class="container">
	   <div class="row wow" id="accountRow"></div>
    </div>
</div>

<div id="spaceTemplate" style="display: none;">
	<br><hr>
</div>

<!-- template for account card -->
<div class="container" id="accountCard" style="display: none;">
	<br>
	<hr>
	<!--column-->
    <div class="col-lg-3" data-wow-delay="0.0s">
        <!--Card-->
        <div class="card hoverable">

            <!--Card image-->
            <div class="view overlay hm-white-slight img-card-container">
                <img id ="thumbnail" class="img-fluid img-card mx-auto" style="width: 50px; height: 50px;">
                <a href="#!">
                    <div class="mask"></div>
                </a>
            </div>

            <!--Card content-->
            <div class="card-block">
            	<hr>
                <!--Title-->
                <p class="card-text"><strong id="websiteName" class="websiteName">@websiteName</strong></p>

                <!--Text-->
                <p class="card-text text-muted">@emailOrUsername</p>
            </div>
            <!--/.Card content-->
        </div>
        <!--/.Card-->
    </div>
    <!--/.column-->
</div>