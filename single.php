<?php

//Vacatures
if (in_category('4')) {include (TEMPLATEPATH . '/single/single-posts.php');
}
//Aflossers
elseif (in_category('3')) {include (TEMPLATEPATH . '/single/single-blog.php');
}
else { include (TEMPLATEPATH . '/page.php');
}
?>