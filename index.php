<?php 



$postTitle = $_POST['post_title'];

$submit = $_POST['submit'];

if(isset($submit)){

    global $user_ID;

    $new_post = array(
        'post_title' => $postTitle,
       
        'post_status' => 'draft',
        'post_date' => date('Y-m-d H:i:s'),
        'post_author' => $user_ID,
        'post_type' => 'ulica',
        'post_category' => array(0)
    );

    wp_insert_post($new_post);

}

?>


<?php get_header(); ?>

<h1>Search</h1>



<form action="" method="post" >


<div class="message">
    <p>Ulica kreirana</p>
</div>
<input type="text" name="post_title" id="post_title" onkeyup="fetch()"></input>

 
<div id="datafetch">Search results will appear here</div>




</form>


</div>

<div class="crveno">

</div>

<?php get_footer(); ?>