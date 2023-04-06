<?php
/*********************************************
 *        This template for shortcode
 *********************************************/



 /**
 * jquery Fronted post form
 *
 */
function jquery_fronted_post(){
   ob_start();
       ?> 
      <div class="fronted-post fronted-post-hide" >
      <h2>Create New Post</h2>
      <p id="post-published" style="display:none"> Post Published</p>
         <label for="post-title">Title:</label><br>
         <input type="text" id="post-title" name="post-title" value=""><br>
         <label for="post-content">Content:</label><br>
         <textarea name="post-content" id="post-content" cols="30" rows="10"></textarea><br>
         <input type="submit" value="New Post" id="jq-fronted-post-submit" >
      </div> 
<div class="fronted-blog">
<?php 
      global $post;

      $args = array(
      'post_type' => 'post',
      'post_status' => 'publish'
      );

      $query = new WP_Query( $args );
      if ( $query->have_posts() ) {
      while ($query->have_posts()) {
         $query->the_post();
         ?> 
         <li class="blog-post" data-id=<?php the_ID(); ?> >
             <h3 class="title"><?php the_title(); ?></h3>
             <button class="edit" >Edit</button>
             <button class="delete" href="">Delete</button>
         </li>
         
         <?php
      }
      }
      ?>
</div>


      <div class="fronted-post fronted-post-update"  style="display:none" >
      <h2>Update Post</h2>
      <p id="post-updated" style="display:none"> Post Updated</p>
         <label for="update-post-title">Title:</label><br>
         <input type="text" id="update-post-title" name="update-post-title" ><br>
         <label for="update-post-content">Content:</label><br>
         <textarea name="update-post-content" id="update-post-content" cols="30" rows="10"></textarea><br>
         <input type="submit" value="Update post" id="jq-fronted-post-edit" >
         <input type="hidden" id="user_id" >
      </div> 
  <?php    

return ob_get_clean();

}
add_shortcode('jquery-fronted-post', 'jquery_fronted_post');

 /**
 * curl Fronted post form
 *
 */
function curl_fronted_post(){
   ob_start();


var_dump($form_data);
       ?>
     <h2>Create New Post</h2>

      <form method="POST" class="curl-fronted-post" action="" >
         <label for="post-title">Title:</label><br>
         <input type="text" id="post-title" name="post-title" value=""><br>
         <label for="post-content">Content:</label><br>
         <textarea name="post-content" id="post-content" cols="30" rows="10"></textarea><br>
         <input type="submit" value="New Post" id="fronted-post-submit" >
      </form> 

       <?php         
return ob_get_clean();

}
add_shortcode('curl-fronted-post', 'curl_fronted_post');





