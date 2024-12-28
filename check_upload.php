<?php
echo "Upload max filesize: " . ini_get('upload_max_filesize') . "\n";
echo "Post max size: " . ini_get('post_max_size') . "\n";
echo "Upload directory writable: " . (is_writable('uploads/recipes') ? 'Yes' : 'No') . "\n";
phpinfo();
?>