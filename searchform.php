<?php
/**
 * Custom Search Form.
 */
 ?>
<form role="search" action="<?php echo esc_url( home_url('/'))?>" class="mb-50 mb-sm-30 mt-sm-30 placeholder-1 form-style-1 pos-relative"id="searchform" method="get">
    

     <input class="pr-50" type="text" placeholder="Search" name="s" id="search" value="<?php the_search_query();?>" required>
    <button class="abs-tbr plr-20" type="submit"><i class="ion-android-search"></i></button>

</form>