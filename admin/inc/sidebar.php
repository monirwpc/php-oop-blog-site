<div class="grid_2">
    <div class="box sidemenu" style="height: 494px;">
        <div class="block ui-accordion ui-widget ui-helper-reset ui-accordion-icons" id="section-menu" role="tablist">
             <ul class="section menu">
                <li class=""><a class="menuitem ui-accordion-header ui-helper-reset current ui-state-active ui-corner-top" role="tab" aria-expanded="true" aria-selected="true" tabindex="0"><span class="ui-icon ui-icon-triangle-1-s"></span>Site Option</a>
                    <ul class="submenu ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom current ui-accordion-content-active" role="tabpanel" style="height: 105px; display: block; overflow: auto; padding-top: 0px; padding-bottom: 0px;">
                        <li><a href="titleslogan.php">Title &amp; Slogan</a></li>
                        <li><a href="social.php">Social Media</a></li>
                        <li><a href="copyright.php">Copyright</a></li>
                        
                    </ul>
                </li>
				
                 <li class=""><a class="menuitem ui-accordion-header ui-helper-reset ui-state-default ui-corner-all" role="tab" aria-expanded="false" aria-selected="false" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-e"></span>Page Option</a>
                    <ul class="submenu ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" role="tabpanel" style="height: 70px; overflow: auto; display: none; padding-top: 0px; padding-bottom: 0px;">
                        <li><a href="addpage.php">Add New Page</a></li>
                        <?php 
                            $query ="SELECT * FROM tbl_page";
                            $pages = $db->select($query);
                            if( $pages ) {
                            while( $result = $pages->fetch_assoc() ) {
                        ?>
                            <li><a href="page.php?pageID=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></li>
                        <?php } } ?>
                    </ul>
                </li>
                <li class=""><a class="menuitem ui-accordion-header ui-helper-reset ui-state-default ui-corner-all" role="tab" aria-expanded="false" aria-selected="false" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-e"></span>Category Option</a>
                    <ul class="submenu ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" role="tabpanel" style="height: 70px; overflow: auto; display: none; padding-top: 0px; padding-bottom: 0px;">
                        <li><a href="addcat.php">Add Category</a> </li>
                        <li><a href="catlist.php">Category List</a> </li>
                    </ul>
                </li>
                <li class=""><a class="menuitem ui-accordion-header ui-helper-reset ui-state-default ui-corner-all" role="tab" aria-expanded="false" aria-selected="false" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-e"></span>Slider Option</a>
                    <ul class="submenu ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" role="tabpanel" style="height: 70px; overflow: auto; display: none; padding-top: 0px; padding-bottom: 0px;">
                        <li><a href="add-slider.php">Add Slider</a> </li>
                        <li><a href="slider-list.php">Slider List</a> </li>
                    </ul>
                </li>
                <li class=""><a class="menuitem ui-accordion-header ui-helper-reset ui-state-default ui-corner-all" role="tab" aria-expanded="false" aria-selected="false" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-e"></span>Post Option</a>
                    <ul class="submenu ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom" role="tabpanel" style="height: 70px; overflow: auto; display: none; padding-top: 0px; padding-bottom: 0px;">
                        <li><a href="addpost.php">Add Post</a> </li>
                        <li><a href="postlist.php">Post List</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>