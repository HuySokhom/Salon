<div class="col-xs-6 col-sm-3">
    <div class="leftHalf">
        <!-- facbook --->
        <iframe
            src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FLucky-Salon-Spa-280393978778604%2F%3Ffref%3Dts&tabs=timeline&width=350&height=225&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
            width="280" height="200" style="border:none;overflow:hidden;" scrolling="no" frameborder="0"
            allowTransparency="true"></iframe>
        <!-- close facbook-->
        <!--- video ---->
        <div class="embed-responsive embed-responsive-16by9">
            <object width="425" height="400">
                <param name="movie" value="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1"/>
                <param name="allowFullScreen" value="true"/>

                <embed src="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1"
                   type="application/x-shockwave-flash" allowfullscreen="true"
                   style="top:14%; width:100%; height:150px;">
                </embed>
            </object>

        </div><!--close embed-responsive-16by9--->
        <div class="embed-responsive embed-responsive-16by9">
            <object width="425" height="400">
                <param name="movie" value="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1"/>
                <param name="allowFullScreen" value="true"/>

                <embed src="http://www.youtube.com/v/KEowmVZwX8A&hl=en&fs=1"
                   type="application/x-shockwave-flash" allowfullscreen="true"
                   style="top:12%; width:100%; height:150px;">
                </embed>
            </object>

        </div><!--close embed-responsive-16by9--->
        <!-- close video ---->
        <?php
        $image_query_raw = tep_db_query("select * from image_slider where image_view = 'Yes' order by sort_order asc");
        while ($image = tep_db_fetch_array($image_query_raw)) {
            echo '
                <a href="#" class="thumbnail" style="margin-top:10%;">
                    <img src="'. $image['image'].'" style="width:100%; height:124px;">
                </a>
            ';
        }
        ?>
    </div>
</div>