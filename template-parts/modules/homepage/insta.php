<section id="insta">
  <div class="container">

    <?php  include 'insta-feed.php';

    $username = $obj['data'][0]['user']['username']; // for url

    ?>
    <h4 style="display:inline-block;margin-right:20px;">Life <span>@</span> DRC <span>|</span></h4><a target="_blank" href="https://www.instagram.com/<?php echo $username; ?>"><span class="fab fa-instagram"></span>&nbsp;&nbsp;<span>Follow »</span></a>
    <!--<a href="https://www.instagram.com/duluthrunningco/?" class="insta-follow"><span class="fa fa-instagram"></span>&nbsp;&nbsp;<span>Follow »</span></a> -->
    <br><br>
    <div class="insta-photos">
   <?php   foreach ($obj['data'] as $post) {

        $pic_text=$post['caption']['text'];
        $pic_link=$post['link'];
        $pic_like_count=$post['likes']['count'];
        $pic_comment_count=$post['comments']['count'];
        $pic_src=str_replace("http://", "https://", $post['images']['low_resolution']['url']);
        $pic_created_time=date("F j, Y", $post['caption']['created_time']);
        $pic_created_time=date("F j, Y", strtotime($pic_created_time . " +1 days"));

        echo "<div class='item'>";
            echo "<a href='{$pic_link}' target='_blank'>";
                echo "<div class='img-wrapper'><img class='img-responsive photo-thumb' src='{$pic_src}' alt='{$pic_text}'></div>";
            echo "</a>";
          /*  echo "<p>";
                echo "<p>";
                    echo "<div class='insta-date' style='color:#888;'>";
                        echo "<a href='{$pic_link}' target='_blank'>{$pic_created_time}</a>";
                    echo "</div>";
                echo "</p>";
                echo "<p>{$pic_text}</p>";
            echo "</p>"; */
        echo "</div>";
    }

    ?>
  </div>
 </div>
</section>
